<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session
}

// Check if the user is logged in as an admin, if not, redirect to login page
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
    exit; // Stop further execution
}

// Include database connection
include("includes/db.php");

// Check if the order deletion request is sent
if (isset($_GET['delete_order_id'])) {
    // Sanitize the input
    $order_id = mysqli_real_escape_string($con, $_GET['delete_order_id']);

    // Delete the order from the database
    $delete_query = "DELETE FROM customer_orders WHERE order_id = '$order_id'";
    $delete_result = mysqli_query($con, $delete_query);

    // Check if deletion was successful
    if ($delete_result) {
        // Return a success response
        echo "Order deleted successfully";
        exit;
    } else {
        // Handle deletion error, if any
        echo "Error deleting order: " . mysqli_error($con);
        exit;
    }
}

// Check if the status update request is sent
if (isset($_GET['update_order_id']) && isset($_GET['new_status'])) {
    // Sanitize the input
    $order_id = mysqli_real_escape_string($con, $_GET['update_order_id']);
    $new_status = mysqli_real_escape_string($con, $_GET['new_status']);

    // Update the order status in the database
    $update_query = "UPDATE customer_orders SET order_status = '$new_status' WHERE order_id = '$order_id'";
    $update_result = mysqli_query($con, $update_query);

    // Check if update was successful
    if ($update_result) {
        // Return a success response
        echo "Status updated successfully";
        exit;
    } else {
        // Handle update error, if any
        echo "Error updating status: " . mysqli_error($con);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Tracking</title>
    <!-- Include your CSS and other meta tags here -->
</head>
<body>
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
                                    <th>Amount</th>
                                    <th>Invoice</th>
                                    <th>Qty</th>
                                    <th>MG</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Delete</th>
                                </tr>
                            </thead><!-- thead Ends -->

                            <tbody><!--- tbody Starts --->
                                <?php
                                // Retrieve orders from the database
                                $get_orders_query = "SELECT * FROM customer_orders";
                                $run_orders = mysqli_query($con, $get_orders_query);
                                $i = 0;
                                while ($row_orders = mysqli_fetch_array($run_orders)) {
                                    $order_id = $row_orders['order_id'];
                                    $due_amount = $row_orders['due_amount'];
                                    $invoice_no = $row_orders['invoice_no'];
                                    $qty = $row_orders['qty'];
                                    $size = $row_orders['size'];
                                    $order_date = substr($row_orders['order_date'], 0, 11);
                                    $order_status = $row_orders['order_status'];
                                    $i++;
                                ?>
                                    <tr id="orderRow_<?php echo $order_id; ?>"><!-- tr Starts -->
                                        <th><?php echo $i; ?></th>
                                        <td>₱<?php echo number_format($due_amount, 2); ?></td>
                                        <td><?php echo $invoice_no; ?></td>
                                        <td><?php echo $qty; ?></td>
                                        <td><?php echo $size; ?></td>
                                        <td><?php echo $order_date; ?></td>
                                        <td class="status-column" data-order-id="<?php echo $order_id; ?>">
                                        <select class="form-control status-select">
    <option value="pending" <?php if ($order_status == 'pending') echo 'selected'; ?>>Pending</option>
    <option value="processing" <?php if ($order_status == 'processing') echo 'selected'; ?>>Processing</option>
    <option value="shipped" <?php if ($order_status == 'shipped') echo 'selected'; ?>>Shipped</option>
    <option value="in_transit" <?php if ($order_status == 'in_transit') echo 'selected'; ?>>In Transit</option>
    <option value="out_for_delivery" <?php if ($order_status == 'out_for_delivery') echo 'selected'; ?>>Out for Delivery</option>
    <option value="delivered" <?php if ($order_status == 'delivered') echo 'selected'; ?>>Delivered</option>
    <!-- Add more options as needed -->
</select>

                                        </td>
                                        <td>
                                            <button class="btn btn-success btn-xs update-status" data-order-id="<?php echo $order_id; ?>">Update Status</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-xs delete-order" data-order-id="<?php echo $order_id; ?>"> Delete </button>
                                        </td>
                                    </tr><!-- tr Ends -->
                                <?php } ?>
                            </tbody><!--- tbody Ends -->
                        </table><!-- table table-bordered table-hover Ends -->
                    </div><!-- table-responsive Ends -->
                </div><!-- panel-body Ends -->
            </div><!-- panel panel-default Ends -->
        </div><!-- col-lg-12 Ends -->
    </div><!-- 2 row Ends -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Update status event listener
            document.querySelectorAll('.update-status').forEach(function (button) {
                button.addEventListener('click', function () {
                    var row = this.closest('tr');
                    var orderId = row.getAttribute('id').split('_')[1];
                    var statusSelect = row.querySelector('.status-select');
                    var newStatus = statusSelect.value;

                    // AJAX request to update status
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            // Update status on success
                            // You may display a message or handle the response as needed
                            // For example, you can dynamically update the status text
                            var statusColumn = row.querySelector('.status-column');
                            statusColumn.innerHTML = newStatus; // Update status text
                        }
                    };
                    xmlhttp.open("GET", "tracking.php?update_order_id=" + orderId + "&new_status=" + newStatus, true);
                    xmlhttp.send();
                });
            });

            // Delete order event listener
            document.querySelectorAll('.delete-order').forEach(function (button) {
                button.addEventListener('click', function () {
                    var orderId = this.getAttribute('data-order-id');

                    if (confirm("Are you sure you want to delete this order?")) {
                        // AJAX request to delete order
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                                // Remove the respective table row upon successful deletion
                                var row = document.getElementById("orderRow_" + orderId);
                                row.parentNode.removeChild(row);
                            }
                        };
                        xmlhttp.open("GET", "tracking.php?delete_order_id=" + orderId, true);
                        xmlhttp.send();
                    }
                });
            });
        });
    </script>
</body>
</html>