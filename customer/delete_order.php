<?php
include("includes/db.php");

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    
    // Perform the delete operation here (Update the query as needed)
    $delete_order = "DELETE FROM customer_orders WHERE order_id='$order_id'";
    $run_delete = mysqli_query($con, $delete_order);

    if ($run_delete) {
        echo "Order deleted successfully";
        // You can perform additional actions after successful deletion
    } else {
        echo "Error deleting order: " . mysqli_error($con);
    }
}
?>
