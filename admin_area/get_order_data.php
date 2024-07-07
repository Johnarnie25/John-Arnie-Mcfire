<?php
session_start();
include("includes/db.php");

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Fetch order details based on the order_id
    $get_order_details = "SELECT * FROM pending_orders WHERE order_id='$order_id'";
    $run_order_details = mysqli_query($con, $get_order_details);

    if ($run_order_details && $row_order_details = mysqli_fetch_assoc($run_order_details)) {
        // Fetch customer details
        $customer_id = $row_order_details['customer_id'];
        $get_customer = "SELECT * FROM customers WHERE customer_id='$customer_id'";
        $run_customer = mysqli_query($con, $get_customer);
        $row_customer = mysqli_fetch_assoc($run_customer);

        // Fetch product details
        $product_id = $row_order_details['product_id'];
        $get_product = "SELECT * FROM products WHERE product_id='$product_id'";
        $run_product = mysqli_query($con, $get_product);
        $row_product = mysqli_fetch_assoc($run_product);

        // Fetch order date from customer_orders table
        $get_customer_order = "SELECT * FROM customer_orders WHERE order_id='$order_id'";
        $run_customer_order = mysqli_query($con, $get_customer_order);

        // Check if $run_customer_order is not null and fetch the row
        if ($run_customer_order && $row_customer_order = mysqli_fetch_assoc($run_customer_order)) {
            // Use DateTime to format the order date
            $order_date = new DateTime($row_customer_order['order_date']);
            $formatted_order_date = $order_date->format('Y-m-d H:i:s');
        } else {
            // Instead of setting to 'N/A', you can set an alternative value or leave it empty
            $formatted_order_date = ''; // Set to an alternative value if needed
        }

        // Calculate total amount
        $total_amount = $row_order_details['qty'] * $row_product['product_price'];

        // Output the order details HTML
        echo '<html>';
        echo '<head>';
        echo '<title>Order Details</title>';
        echo '<style>';
        echo '  body { font-family: "Poppins", sans-serif; color: black; font-size: 14px; background-color: white; }';
        echo '  table { width: 100%; border-collapse: collapse; color: black; }';
        echo '  th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }';
        echo '  th { background-color: #f2f2f2; }';
        echo '  .invoice-wrapper { min-height: 100vh; background-color: rgba(0, 0, 0, 0.1); padding-top: 20px; padding-bottom: 20px; }';
        echo '  .invoice { max-width: 850px; margin-right: auto; margin-left: auto; background-color: white; padding: 70px; border: 1px solid rgba(0, 0, 0, 0.2); border-radius: 5px; min-height: 920px; }';
        // Add more styles here if needed
        echo '</style>';
        echo '</head>';
        echo '<body>';
        
        // Your existing HTML template goes here with placeholders
        echo '<img src="../images/Mcfire.png" alt="Logo" style="max-width: 100px; max-height: 100px;"><br>';
        echo '<h2>Order Details</h2>';
        echo '<table>';
        echo '<tr><th>Customer</th><td>' . $row_customer['customer_name'] . '</td></tr>';
        echo '<tr><th>Customer Email</th><td>' . $row_customer['customer_email'] . '</td></tr>';
        echo '<tr><th>Customer Address</th><td>' . $row_customer['customer_address'] . '</td></tr>'; // Add this line
        echo '<tr><th>Invoice</th><td>' . $row_order_details['invoice_no'] . '</td></tr>';
        echo '<tr><th>Product</th><td>' . $row_product['product_title'] . '</td></tr>';
        echo '<tr><th>Qty</th><td>' . $row_order_details['qty'] . '</td></tr>';
        echo '<tr><th>Nic / MG</th><td>' . $row_order_details['size'] . '</td></tr>';
        echo '<tr><th>Order Date</th><td>' . $formatted_order_date . '</td></tr>';
        echo '<tr><th>Price</th><td>₱' . number_format($row_product['product_price'], 2) . '</td></tr>';
        echo '<tr><th>Total Amount</th><td>₱' . number_format($total_amount, 2) . '</td></tr>';
        // Add more rows for other details
        echo '</table>';
        
        echo '</body>';
        echo '</html>';

    } else {
        // Handle the case where order details are not found
        echo 'Order details not found';
    }
} else {
    // Handle the case where order_id is not provided
    echo 'Invalid request';
}
?>