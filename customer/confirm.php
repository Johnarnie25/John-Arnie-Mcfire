<style>
     body {
        background-color: #171b22;
    background: linear-gradient(to right, #121212, #171b22);
  }
    </style>
<?php
session_start();

if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('../checkout.php','_self')</script>";
} else {
    include("includes/db.php");
    include("includes/header.php");
    include("functions/functions.php");
    include("includes/main.php");

    if (isset($_GET['order_id'])) {
        $order_id = $_GET['order_id'];
        
        // Fetch the invoice number and order date associated with the order ID
        $get_order_info = "SELECT invoice_no, order_date FROM customer_orders WHERE order_id = '$order_id'";
        $run_order_info = mysqli_query($con, $get_order_info);
        $row_order_info = mysqli_fetch_array($run_order_info);
        $invoice_no = $row_order_info['invoice_no'];
        $order_date = $row_order_info['order_date'];

        // Fetch the product amount associated with the order
        $get_order_amount = "SELECT due_amount FROM customer_orders WHERE order_id = '$order_id'";
        $run_order_amount = mysqli_query($con, $get_order_amount);
        $row_order_amount = mysqli_fetch_array($run_order_amount);
        $amount_due = $row_order_amount['due_amount'];
    }
?>

<div id="content"> <!-- content Starts -->
    <div class="container"> <!-- container Starts -->
        <div class="col-md-3"> <!-- col-md-3 Starts -->
            <?php include("includes/sidebar.php"); ?>
        </div> <!-- col-md-3 Ends -->

        <div class="col-md-9"> <!-- col-md-9 Starts -->
            <div class="box"> <!-- box Starts -->
                <h1 align="center"> Please Confirm Your Payment </h1>
                <div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th> Gcash Number </th>

<th> Gcash Name</th>


</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<tr>

<td> Gcash: 123456789 </td>

<td>Name: Mcfire Clouds Vape Shop  </td>




</tr>

</tbody><!-- tbody Ends -->


</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->
                <form action="confirm.php?order_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data"> <!--- form Starts -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label>Invoice No:</label>
                        <input type="text" class="form-control" name="invoice_no" value="<?php echo $invoice_no; ?>" readonly>
                    </div><!-- form-group Ends -->

                    <div class="form-group"><!-- form-group Starts -->
                        <label>Order Date:</label>
                        <input type="text" class="form-control" name="order_date" value="<?php echo $order_date; ?>" readonly>
                    </div><!-- form-group Ends -->
                   

                    <div class="form-group"><!-- form-group Starts -->
                        <label>Amount Sent:</label>
                        <input type="text" class="form-control" name="amount_sent" value="<?php echo $amount_due; ?>" required>
                    </div><!-- form-group Ends -->

                    <div class="form-group"><!-- form-group Starts -->
                        <label>Select Payment Mode:</label>
                        <select name="payment_mode" class="form-control"><!-- select Starts -->
                           
                            <option>Gcash</option>
                           
                        </select><!-- select Ends -->
                    </div><!-- form-group Ends -->

                    <div class="form-group"><!-- form-group Starts -->
                        <label>Transaction/Reference Id:</label>
                        <input type="text" class="form-control" name="ref_no" required>
                    </div><!-- form-group Ends -->

                   

                    <div class="text-center"><!-- text-center Starts -->
                        <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">
                            <i class="fa fa-user-md"></i> Confirm Payment
                        </button>
                    </div><!-- text-center Ends -->
                </form><!--- form Ends -->

                <?php
                if (isset($_POST['confirm_payment'])) {
                    $invoice_no = $_POST['invoice_no'];
                    $amount = $_POST['amount_sent'];
                    $payment_mode = $_POST['payment_mode'];
                    $ref_no = $_POST['ref_no'];
                    $payment_date = $_POST['date'];

                    // Sanitize and validate inputs
                    $amount = mysqli_real_escape_string($con, $amount);
                    $payment_mode = mysqli_real_escape_string($con, $payment_mode);
                    $ref_no = mysqli_real_escape_string($con, $ref_no);
                    $payment_date = mysqli_real_escape_string($con, $payment_date);

                    $complete = "Complete";

                    $insert_payment = "INSERT INTO payments (invoice_no, amount, payment_mode, ref_no, payment_date) VALUES ('$invoice_no', '$amount', '$payment_mode', '$ref_no', '$payment_date')";
                    $run_payment = mysqli_query($con, $insert_payment);

                    $update_customer_order = "UPDATE customer_orders SET order_status='$complete' WHERE order_id='$order_id'";
                    $run_customer_order = mysqli_query($con, $update_customer_order);

                    if ($run_customer_order) {
                        echo "<script>alert('Your payment has been received. The order will be completed within 24 hours.')</script>";
                        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                    } else {
                        echo "<script>alert('Error occurred while confirming payment. Please try again.')</script>";
                    }
                }
                ?>
            </div><!-- box Ends -->
        </div><!-- col-md-9 Ends -->
    </div><!-- container Ends -->
</div><!-- content Ends -->

<?php
include("includes/footer.php");
?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Include jQuery UI library -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(function () {
        // Datepicker initialization
        $("#payment_date").datepicker({
            dateFormat: "yy-mm-dd",  // Set the desired date format
            changeMonth: true,
            changeYear: true,
            yearRange: "c-10:c+10"   // Set the range of selectable years
        });
    });
</script>
<?php
}
?>