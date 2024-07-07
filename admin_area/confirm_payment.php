<?php

session_start();

include("includes/db.php");

?>
<?php
if (isset($_GET['payment_id'])) {
    $payment_id = $_GET['payment_id'];

    // Update the payment status in the database to "Paid"
    $update_payment_status = "UPDATE payments SET status='Paid' WHERE payment_id='$payment_id'";
    $run_update = mysqli_query($con, $update_payment_status);

    if ($run_update) {
        // Successfully updated the payment status
        echo "success";
    } else {
        // Error updating the payment status
        echo "error";
    }
} else {
    // Invalid request
    echo "invalid";
}

if (isset($_GET['payment_id']) && isset($_GET['status'])) {
    $payment_id = $_GET['payment_id'];
    $status = $_GET['status'];

    // Update the payment status in the database
    $update_payment_status = "UPDATE payments SET status='$status' WHERE payment_id='$payment_id'";
    $run_update = mysqli_query($con, $update_payment_status);

    if ($run_update) {
        // Successfully updated the payment status
        echo "success";
    } else {
        // Error updating the payment status
        echo "error";
    }
} else {
    // Invalid request
    echo "invalid";
}
?>
