<?php

session_start();

include("includes/db.php");

?>

<?php

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Perform the deletion in the database
    $delete_query = "DELETE FROM products WHERE product_id = $product_id";
    $run_delete_query = mysqli_query($con, $delete_query);

    if ($run_delete_query) {
        // Successfully deleted, you can send a success response if needed
        echo "Product deleted successfully";
    } else {
        // Failed to delete, you can send an error response if needed
        echo "Error deleting product";
    }
} else {
    // Invalid request, you can send an error response if needed
    echo "Invalid request";
}
?>
