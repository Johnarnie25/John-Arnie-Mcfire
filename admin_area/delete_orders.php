
<?php

session_start();

include("includes/db.php");

?>
<?php
// Check if the order_id parameter is set
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Perform the deletion
    $delete_query = "DELETE FROM pending_orders WHERE order_id = $order_id";
    $run_delete_query = mysqli_query($con, $delete_query);

    // Check if the deletion was successful
    if ($run_delete_query) {
        echo "Order deleted successfully";
    } else {
        echo "Error deleting order: " . mysqli_error($con);
    }
} else {
    echo "Invalid request";
}

// Close your database connection
mysqli_close($con);
?>