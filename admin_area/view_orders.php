<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / View Orders
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> View Orders
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Invoice</th>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Nic / MG</th>
                                    <th>Order Date</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Print</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $get_orders = "SELECT * FROM pending_orders";
                                $run_orders = mysqli_query($con, $get_orders);

                                while ($row_orders = mysqli_fetch_array($run_orders)) {
                                    $order_id = $row_orders['order_id'];
                                    $c_id = $row_orders['customer_id'];
                                    $invoice_no = $row_orders['invoice_no'];
                                    $product_id = $row_orders['product_id'];
                                    $qty = $row_orders['qty'];
                                    $size = $row_orders['size'];
                                    $order_status = $row_orders['order_status'];



                                    // Fetch customer email
                                    $get_customer = "SELECT * FROM customers WHERE customer_id='$c_id'";
                                    $run_customer = mysqli_query($con, $get_customer);
                                    $row_customer = mysqli_fetch_array($run_customer);
                                    $customer_email = isset($row_customer['customer_email']) ? $row_customer['customer_email'] : '';

                                    // Fetch product details
                                    $get_products = "SELECT * FROM products WHERE product_id='$product_id'";
                                    $run_products = mysqli_query($con, $get_products);
                                    $row_products = mysqli_fetch_array($run_products);
                                    $product_title = isset($row_products['product_title']) ? $row_products['product_title'] : '';

                                    // Fetch order details
                                    $get_customer_order = "SELECT * FROM customer_orders WHERE order_id='$order_id'";
                                    $run_customer_order = mysqli_query($con, $get_customer_order);

                                    // Check if $run_customer_order is not null and fetch the row
                                    if ($run_customer_order && $row_customer_order = mysqli_fetch_array($run_customer_order)) {
                                        $order_date = isset($row_customer_order['order_date']) ? $row_customer_order['order_date'] : '';
                                        $due_amount = isset($row_customer_order['due_amount']) ? $row_customer_order['due_amount'] : '';
                                    } else {
                                        // Handle the case where $run_customer_order is null or fetch failed
                                        $order_date = '';
                                        $due_amount = '';
                                    }

                                    $i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $customer_email; ?></td>
                                        <td bgcolor="orange"><?php echo $invoice_no; ?></td>
                                        <td><?php echo $product_title; ?></td>
                                        <td><?php echo $qty; ?></td>
                                        <td><?php echo $size; ?></td>
                                        <td><?php echo $order_date; ?></td>
                                        <td>₱<?php echo !empty($due_amount) ? number_format($due_amount, 2) : '0.00'; ?></td>

                                        <td>
            <?php
            if ($order_status == 'pending') {
                echo '<div style="color:red;">Pending</div>';
                echo '<button class="btn btn-success" onclick="updateOrderStatus(' . $order_id . ', \'confirmed\')">Confirm</button>';
                echo '<button class="btn btn-danger" onclick="updateOrderStatus(' . $order_id . ', \'cancelled\')">Cancel</button>';
            } elseif ($order_status == 'confirmed') {
                echo 'Confirmed';
            } elseif ($order_status == 'cancelled') {
                echo 'Cancelled';
            } else {
                echo 'Unknown Status';
            }
            ?>
        </td>
                                        <td>
                                        <button class="btn btn-danger" onclick="deleteOrder(<?php echo $order_id; ?>)"> <i class="fa fa-trash-o"></i> Delete </button>
                                        </td>
                                        <td>
                                        <button class="btn btn-primary"  onclick="printOrder(<?php echo $order_id; ?>)"> Receipt </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script>
function updateOrderStatus(orderId, newStatus) {
    if (confirm('Are you sure you want to update the order status?')) {
        // AJAX request to update order status
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Reload the page or update the status dynamically without reloading
                // For simplicity, let's reload the page in this example
                location.reload();

                // Send email notification to customer if order is confirmed
                if (newStatus === 'confirmed') {
                    sendConfirmationEmail(orderId);
                }
            }
        };
        xhttp.open("GET", "update_orders.php?order_id=" + orderId + "&new_status=" + newStatus, true);
        xhttp.send();
    }
}

function deleteOrder(orderId) {
    if (confirm('Are you sure you want to delete this order?')) {
        // AJAX request to delete the order
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Reload the page or update the order list dynamically without reloading
                // For simplicity, let's reload the page in this example
                location.reload();
            }
        };
        xhttp.open("GET", "delete_orders.php?order_id=" + orderId, true);
        xhttp.send();
    }
}
</script>
<!-- Add this script at the end of your HTML file, before the closing </body> tag -->
<script>
function printOrder(orderId) {
    // AJAX request to fetch the order details for printing
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Create a hidden iframe
            var printFrame = document.createElement('iframe');
            printFrame.style.display = 'none';
            document.body.appendChild(printFrame);

            // Set the content of the iframe to the order details
            printFrame.contentDocument.write(this.responseText);
            printFrame.contentDocument.close();

            // Wait for the content to load before triggering the print dialog
            printFrame.onload = function() {
                // Trigger the print dialog
                printFrame.contentWindow.print();

                // Remove the iframe after printing
                document.body.removeChild(printFrame);
            };
        }
    };
    xhttp.open("GET", "get_order_data.php?order_id=" + orderId, true);
    xhttp.send();
}
</script>
<script>
function sendConfirmationEmail(orderId) {
    // AJAX request to fetch customer email
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var customerEmail = this.responseText;

            // AJAX request to send email
            var emailXhttp = new XMLHttpRequest();
            emailXhttp.onreadystatechange = function () {
                // You can handle the response here if needed
            };
            emailXhttp.open("GET", "send_confirmation_email.php?order_id=" + orderId + "&customer_email=" + customerEmail, true);
            emailXhttp.send();
        }
    };
    xhttp.open("GET", "get_customer_email.php?order_id=" + orderId, true);
    xhttp.send();
}
</script>



</body>
</html>