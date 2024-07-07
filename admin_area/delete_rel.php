<?php

session_start();

include("includes/db.php");

?>

<?php
// Include your database connection or any necessary configurations

if (isset($_GET['rel_id'])) {
    $rel_id = $_GET['rel_id'];

    // Perform the deletion in the database
    $delete_query = "DELETE FROM bundle_product_relation WHERE rel_id = $rel_id";
    $run_delete_query = mysqli_query($con, $delete_query);

    if ($run_delete_query) {
        // Successfully deleted, you can send a success response if needed
        echo "Relation deleted successfully";
    } else {
        // Failed to delete, you can send an error response if needed
        echo "Error deleting relation";
    }
} else {
    // Invalid request, you can send an error response if needed
    echo "Invalid request";
}
?>

