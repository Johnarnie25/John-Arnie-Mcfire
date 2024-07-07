
<?php

session_start();

include("includes/db.php");

?>
<?php
// Include your database connection code (mysqli connection, etc.)
include('your_database_connection.php');

// Check if the customer_id parameter is set
if (isset($_GET['customer_id'])) {
    $customer_id = $_GET['customer_id'];

    // Perform the deletion
    $delete_query = "DELETE FROM customers WHERE customer_id = $customer_id";
    $run_delete_query = mysqli_query($con, $delete_query);

    // Check if the deletion was successful
    if ($run_delete_query) {
        echo "Customer deleted successfully";
    } else {
        echo "Error deleting customer: " . mysqli_error($con);
    }
} else {
    echo "Invalid request";
}

// Close your database connection
mysqli_close($con);
?>
