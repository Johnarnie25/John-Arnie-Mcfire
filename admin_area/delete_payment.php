<?php

session_start();

include("includes/db.php");

?>

<?php

// Check if the payment_id parameter is set
if (isset($_GET['payment_id'])) {
    $payment_id = $_GET['payment_id'];

    // Perform the deletion
    $delete_query = "DELETE FROM payments WHERE payment_id = $payment_id";
    $run_delete_query = mysqli_query($con, $delete_query);

    // Check if the deletion was successful
    if ($run_delete_query) {
        echo "Payment deleted successfully";
    } else {
        echo "Error deleting payment: " . mysqli_error($con);
    }
} else {
    echo "Invalid request";
}

// Close your database connection
mysqli_close($con);
?>
