<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include necessary files
require 'includes/db.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

// Check if order_id and customer_email are set
if (isset($_GET['order_id']) && isset($_GET['customer_email'])) {
    $order_id = $_GET['order_id'];
    $customer_email = $_GET['customer_email'];

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'jayzxc.mariano25@gmail.com';
        $mail->Password   = 'dbfp emln hqyx mxks';
        $mail->SMTPSecure = "tls";
$mail->Port = 587; // You can change this to the desired port


        // Recipients
        $mail->setFrom('jayzxc.mariano25@gmail.com', 'Mcfire Online Vapeshop');
        $mail->addAddress($customer_email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Order Confirmation';

        // Fetch order details from the database
        $get_order_details = "SELECT * FROM pending_orders WHERE order_id = '$order_id'";
        $run_order_details = mysqli_query($con, $get_order_details);

        if ($run_order_details && $row_order_details = mysqli_fetch_assoc($run_order_details)) {
            $invoice_no = $row_order_details['invoice_no'];
            $product_id = $row_order_details['product_id'];
            $qty = $row_order_details['qty'];

            // Fetch product details
            $get_product_details = "SELECT * FROM products WHERE product_id = '$product_id'";
            $run_product_details = mysqli_query($con, $get_product_details);

            if ($run_product_details && $row_product_details = mysqli_fetch_assoc($run_product_details)) {
                $product_title = $row_product_details['product_title'];
                $product_image1 = $row_product_details['product_img1'];
                $product_image2 = $row_product_details['product_img2'];
                $product_image3 = $row_product_details['product_img3'];

                // Fetch order date and total amount from customer_orders table
                $get_customer_order = "SELECT * FROM customer_orders WHERE order_id = '$order_id'";
                $run_customer_order = mysqli_query($con, $get_customer_order);

                if ($run_customer_order && $row_customer_order = mysqli_fetch_assoc($run_customer_order)) {
                    $order_date = $row_customer_order['order_date'];
                    $due_amount = $row_customer_order['due_amount'];

                    // Email body
                    $mail->Body = "
                        <p>Dear customer,</p>
                        <p>Your order with ID $order_id has been confirmed. Thank you for shopping with us!</p>
                        <p>Order Details:</p>
                        <ul>
                            <li>Invoice No: $invoice_no</li>
                            <li>Product: $product_title</li>
                            <li>Quantity: $qty</li>
                            <li>Order Date: $order_date</li>
                            <li>Total Amount: ₱" . number_format($due_amount, 2) . "</li>
                        </ul>
                        <p>Delivery Details of Mcfire:</p>
                        <p>1-3 days delivery inside Luzon</p>
                        <p>1-7 days delivery outside Luzon</p>
                        <p>You Can Track your parcel via LBC if your are outside luzon and if you are inside luzon your parcel will deliver of mcfire delivery rider in 1-3days</p>
                        <p>Thank you for choosing our products!</p>
                    ";

                    // Send the email
                    $mail->send();
                    echo 'Message has been sent';
                } else {
                    echo 'Failed to fetch order date and total amount';
                }
            } else {
                echo 'Failed to fetch product details';
            }
        } else {
            echo 'Failed to fetch order details';
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Order ID or Customer Email not set";
}
?>



