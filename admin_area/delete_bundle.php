<?php

session_start();

include("includes/db.php");

?>


<?php
// Include your database connection or any necessary configurations

if (isset($_GET['bundle_id'])) {
    $bundle_id = $_GET['bundle_id'];

    // Perform the deletion in the database
    $delete_query = "DELETE FROM products WHERE product_id = $bundle_id";
    $run_delete_query = mysqli_query($con, $delete_query);

    if ($run_delete_query) {
        // Successfully deleted, you can send a success response if needed
        echo "Bundle deleted successfully";
    } else {
        // Failed to delete, you can send an error response if needed
        echo "Error deleting bundle";
    }
} else {
    // Invalid request, you can send an error response if needed
    echo "Invalid request";
}
?>



