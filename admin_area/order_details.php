<?php

session_start();

include("includes/db.php");

?>

<?php
// Include your database connection file

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Fetch order details using the order_id
    $get_order_details = "SELECT * FROM pending_orders WHERE order_id = $order_id";
    $run_order_details = mysqli_query($con, $get_order_details);

    if ($run_order_details && $row_order_details = mysqli_fetch_assoc($run_order_details)) {
        // Fetch additional details as needed from related tables
        // ...

        // Create an array with order details
        $orderDetails = [
            'order_id' => $row_order_details['order_id'],
            'customer_email' => $customer_email,
            'invoice_no' => $row_order_details['invoice_no'],
            'product_title' => $product_title,
            'qty' => $row_order_details['qty'],
            'size' => $row_order_details['size'],
            'order_date' => $order_date,
            'due_amount' => $row_order_details['due_amount'],
            'order_status' => $row_order_details['order_status'],
        ];

        // Return order details as JSON
        echo json_encode($orderDetails);
    }
}
?>
