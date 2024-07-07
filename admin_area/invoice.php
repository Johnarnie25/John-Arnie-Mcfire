<?php
include("includes/db.php");

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Fetch order details from the database
    $query = "SELECT * FROM pending_orders WHERE order_id = $order_id";
    $result = mysqli_query($con, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $orderDetails['customer_email'] = $row['customer_email'];
        $orderDetails['invoice_no'] = $row['invoice_no'];
        $orderDetails['order_date'] = $row['order_date'];

        // Fetch product details for the order
        $get_products = "SELECT * FROM products WHERE product_id = " . $row['product_id'];
        $run_products = mysqli_query($con, $get_products);

        while ($product_row = mysqli_fetch_assoc($run_products)) {
            $orderDetails['products'][] = [
                'product_title' => $product_row['product_title'],
                'qty' => $row['qty'],
                'size' => $row['size'],
                'price' => $product_row['product_price'],
            ];
        }

        // Return order details as JSON
        echo json_encode($orderDetails);
    } else {
        // Handle the case where the order is not found
        echo json_encode(['error' => 'Order not found']);
    }
} else {
    // Handle the case where order_id is not set
    echo json_encode(['error' => 'Order ID not provided']);
}
?>


