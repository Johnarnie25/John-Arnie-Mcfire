<?php

session_start();

include("includes/db.php");

?>

<?php
// Include your database connection or any necessary configurations

if (isset($_GET['p_cat_id'])) {
    $p_cat_id = $_GET['p_cat_id'];

    // Perform the deletion in the database
    $delete_query = "DELETE FROM product_categories WHERE p_cat_id = $p_cat_id";
    $run_delete_query = mysqli_query($con, $delete_query);

    if ($run_delete_query) {
        // Successfully deleted, you can send a success response if needed
        echo "Product category deleted successfully";
    } else {
        // Failed to delete, you can send an error response if needed
        echo "Error deleting product category";
    }
} else {
    // Invalid request, you can send an error response if needed
    echo "Invalid request";
}
?>
