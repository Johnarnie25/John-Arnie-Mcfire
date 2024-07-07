<?php

session_start();

include("includes/db.php");

?>

<?php

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Fetch customer email based on order ID
    $get_customer_email = "SELECT customer_email FROM customers WHERE customer_id = (SELECT customer_id FROM pending_orders WHERE order_id = '$order_id')";
    $run_customer_email = mysqli_query($con, $get_customer_email);

    if ($run_customer_email && $row_customer_email = mysqli_fetch_assoc($run_customer_email)) {
        echo $row_customer_email['customer_email'];
    } else {
        // Handle the case where the query didn't return a result
        echo "Customer email not found";
    }
} else {
    // Handle the case where order_id is not set
    echo "Order ID not set";
}
?>



