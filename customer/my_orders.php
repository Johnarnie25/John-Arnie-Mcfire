<style>
    body {
        background-color: #171b22;
        background: linear-gradient(to right, #121212, #171b22);
    }
</style>

<center>
    <h1>My Orders</h1>
    <p class="lead"> Your orders on one place.</p>
    <p class="text-muted">
        If you have any questions, please feel free to <a href="../contact.php"> contact us,</a> our customer service center is working for you 24/7.
    </p>
</center>
<!-- center Ends -->

<hr>

<div class="table-responsive"><!-- table-responsive Starts -->
    <table class="table table-bordered table-hover"><!-- table table-bordered table-hover Starts -->
        <thead><!-- thead Starts -->
            <tr>
                <th>#</th>
                <th>Amount</th>
                <th>Invoice</th>
                <th>Product</th>
                <th>Qty</th>
                <th>MG</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Payment</th>
                <th>Cancel</th>
            </tr>
        </thead><!-- thead Ends -->

        <tbody><!--- tbody Starts --->
            <?php
            $customer_session = $_SESSION['customer_email'];
            $get_customer = "select * from customers where customer_email='$customer_session'";
            $run_customer = mysqli_query($con, $get_customer);
            $row_customer = mysqli_fetch_array($run_customer);
            $customer_id = $row_customer['customer_id'];
            $get_orders = "select * from customer_orders where customer_id='$customer_id'";
            $run_orders = mysqli_query($con, $get_orders);
            $i = 0;
            while ($row_orders = mysqli_fetch_array($run_orders)) {
                $order_id = $row_orders['order_id'];
                $due_amount = $row_orders['due_amount'];
                $invoice_no = $row_orders['invoice_no'];
                $qty = $row_orders['qty'];
                $size = $row_orders['size'];
                $order_date = substr($row_orders['order_date'], 0, 11);
                $order_status = $row_orders['order_status'];

                // Retrieve product details for this order
                $get_order_details = "SELECT p.product_title, p.product_img1 FROM products p INNER JOIN pending_orders po ON p.product_id = po.product_id WHERE po.order_id = '$order_id'";
                $run_order_details = mysqli_query($con, $get_order_details);
                $row_order_details = mysqli_fetch_array($run_order_details);
                $product_title = $row_order_details['product_title'];
                $product_img1 = $row_order_details['product_img1'];

                $i++;
                switch ($order_status) {
                    case 'pending':
                        $order_status = "<b style='color:red;'>Unpaid</b>";
                        break;
                    case 'processing':
                        $order_status = "<b style='color:black;'>Processing</b>";
                        break;
                    case 'shipped':
                        $order_status = "<b style='color:blue;'>Shipped</b>";
                        break;
                    case 'in_transit':
                        $order_status = "<b style='color:orange;'>In Transit</b>";
                        break;
                    case 'out_for_delivery':
                        $order_status = "<b style='color:purple;'>Out for Delivery</b>";
                        break;
                    case 'delivered':
                        $order_status = "<b style='color:gray;'>Delivered</b>";
                        break;
                    default:
                        $order_status = "<b style='color:green;'>Paid</b>";
                        break;
                }
            ?>
                <tr><!-- tr Starts -->
                    <th><?php echo $i; ?></th>
                    <td>₱<?php echo number_format($due_amount, 2); ?></td>
                    <td><?php echo $invoice_no; ?></td>
                    <td>
                        <img src="../admin_area/product_images/<?php echo $product_img1; ?>" alt="<?php echo $product_title; ?>" style="max-width: 50px; max-height: 50px;">
                        <?php echo $product_title; ?>
                    </td>
                    <td><?php echo $qty; ?></td>
                    <td><?php echo $size; ?></td>
                    <td><?php echo $order_date; ?></td>
                    <td><?php echo $order_status; ?></td>
                    <td>
                        <a href="confirm.php?order_id=<?php echo $order_id; ?>" target="blank" class="btn btn-success btn-xs">Payment</a>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-xs" onclick="deleteOrder(<?php echo $order_id; ?>)"> Cancel </button>
                    </td>
                </tr><!-- tr Ends -->
            <?php } ?>
        </tbody><!--- tbody Ends -->
    </table><!-- table table-bordered table-hover Ends -->
</div><!-- table-responsive Ends -->

<script>
    function deleteOrder(orderId) {
        if (confirm("Are you sure you want to cancel this order?")) {
            // AJAX request
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // Reload the page or update the list dynamically without reloading
                    // For simplicity, let's reload the page in this example
                    location.reload();
                    var row = document.getElementById("orderRow_" + orderId);
                    row.parentNode.removeChild(row);
                }
            };
            xmlhttp.open("GET", "delete_order.php?order_id=" + orderId, true);
            xmlhttp.send();
        }
    }
</script>
