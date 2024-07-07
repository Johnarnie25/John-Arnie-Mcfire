<?php

session_start();

include("includes/db.php");

?>
<?php
if (isset($_GET['order_id']) && isset($_GET['new_status'])) {
    $order_id = $_GET['order_id'];
    $new_status = $_GET['new_status'];

    // Update the order status in the database
    $update_query = "UPDATE pending_orders SET order_status='$new_status' WHERE order_id='$order_id'";
    $run_update = mysqli_query($con, $update_query);

    // Check if the update was successful
    if ($run_update) {
        echo "Order status updated successfully!";
    } else {
        echo "Failed to update order status.";
    }
} else {
    echo "Invalid parameters.";
}

?>
