<?php

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
?>


<div class="row"><!-- 1 row Starts -->
    <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <ol class="breadcrumb"><!-- breadcrumb Starts -->
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Payments
            </li>
        </ol><!-- breadcrumb Ends -->
    </div><!-- col-lg-12 Ends -->
</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->
    <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <div class="panel panel-default"><!-- panel panel-default Starts -->
            <div class="panel-heading"><!-- panel-heading Starts -->
                <h3 class="panel-title"><!-- panel-title Starts -->
                    <i class="fa fa-money fa-fw"> </i> View Payments
                </h3><!-- panel-title Ends -->
            </div><!-- panel-heading Ends -->
            <div class="panel-body"><!-- panel-body Starts -->
                <div class="table-responsive"><!-- table-responsive Starts -->
                    <table class="table table-hover table-bordered table-striped"><!-- table table-hover table-bordered table-striped Starts -->
                        <thead><!-- thead Starts -->
                            <tr>
                                <th>#</th>
                                <th>Invoice No</th>
                                <th>Amount Paid</th>
                                <th>Payment Method</th>
                                <th>Reference #</th>
                               
                                <th>Order Date</th>
                                <th>Action</th>
                            </tr>
                        </thead><!-- thead Ends -->
                        <tbody><!-- tbody Starts -->
                            <?php
                            $i = 0;
                            $get_payments = "SELECT * FROM payments";
                            $run_payments = mysqli_query($con, $get_payments);
                            while ($row_payments = mysqli_fetch_array($run_payments)) {
                                $payment_id = $row_payments['payment_id'];
                                $invoice_no = $row_payments['invoice_no'];
                                $amount = $row_payments['amount'];
                                $payment_mode = $row_payments['payment_mode'];
                                $ref_no = $row_payments['ref_no'];
                                $code = $row_payments['code'];

                                // Fetch order date from customer_orders table based on invoice_no
                                $get_order_date = "SELECT order_date FROM customer_orders WHERE invoice_no = '$invoice_no'";
                                $run_order_date = mysqli_query($con, $get_order_date);

                                // Check if the query returned any results
                                if ($run_order_date && mysqli_num_rows($run_order_date) > 0) {
                                    $row_order_date = mysqli_fetch_array($run_order_date);
                                    $order_date = $row_order_date['order_date'];
                                } else {
                                    // Handle the case when no order date is found
                                    $order_date = "N/A";
                                }

                                // Fetch the payment status from the database
                                $status = $row_payments['status'];
                                $i++;
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td bgcolor="yellow"><?php echo $invoice_no; ?></td>
                                    <td>₱<?php echo $amount; ?></td>
                                    <td><?php echo $payment_mode; ?></td>
                                    <td><?php echo $ref_no; ?></td>
                                  
                                    <td><?php echo $order_date; ?></td>
                                    <td>
                                        <?php
                                        if ($status == 'Paid') {
                                            // If the payment is already paid, display a disabled button
                                            echo '<button class="btn btn-success" disabled><i class="fa fa-check"></i> Paid</button>';
                                        } else {
                                            // If the payment is not paid, display the buttons for confirmation and deletion
                                            echo '<button class="btn btn-danger" onclick="deletePayment(' . $payment_id . ')"><i class="fa fa-trash-o"></i> Delete</button>';
                                            echo '<button class="btn btn-success" onclick="confirmPayment(' . $payment_id . ', this)"><i class="fa fa-check"></i> Confirm</button>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody><!-- tbody Ends -->
                    </table><!-- table table-hover table-bordered table-striped Ends -->
                </div><!-- table-responsive Ends -->
            </div><!-- panel-body Ends -->
        </div><!-- panel panel-default Ends -->
    </div><!-- col-lg-12 Ends -->
</div><!-- 2 row Ends -->


<?php } ?>
<script>
    function deletePayment(paymentId) {
        if (confirm('Are you sure you want to delete this payment?')) {
            // AJAX request to delete the payment
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Reload the page or update the payment list dynamically without reloading
                    // For simplicity, let's reload the page in this example
                    location.reload();
                }
            };
            xhttp.open("GET", "delete_payment.php?payment_id=" + paymentId, true);
            xhttp.send();
        }
    }
</script>
<script>
    function confirmPayment(paymentId, buttonElement) {
        if (confirm('Are you sure you want to confirm this payment?')) {
            // AJAX request to update the payment status to "Paid"
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        // Update the button text to "Paid" and disable the button
                        buttonElement.innerHTML = '<i class="fa fa-check"></i> Paid';
                        buttonElement.disabled = true;
                        // Display a message or perform any other actions if needed
                        alert("Payment confirmed and marked as paid!");

                        // Immediately update payment status in the frontend
                        updatePaymentStatus(paymentId, 'Paid');
                    } else {
                        // Handle error cases
                        alert("Error confirming payment. Please try again.");
                    }
                }
            };
            xhttp.open("GET", "confirm_payment.php?payment_id=" + paymentId, true);
            xhttp.send();
        }
    }

    function updatePaymentStatus(paymentId, status) {
        // AJAX request to update payment status in the database
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Optional: You can handle the response if needed
            }
        };
        xhttp.open("GET", "update_payment_status.php?payment_id=" + paymentId + "&status=" + status, true);
        xhttp.send();
    }
</script>




