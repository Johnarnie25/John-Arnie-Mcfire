<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

?>

<?php

$ip_add = getRealUserIp();

if(isset($_POST['id']) && isset($_POST['quantity']) && isset($_POST['size'])){

    $id = $_POST['id'];
    $qty = $_POST['quantity'];
    $size = $_POST['size'];

    // Update quantity and size in the cart
    $update_cart = "UPDATE cart SET qty='$qty', size='$size' WHERE p_id='$id' AND ip_add='$ip_add'";
    $run_update = mysqli_query($con, $update_cart);

    if($run_update){
        echo "success"; // Response to indicate successful update
    } else {
        echo "error"; // Response to indicate error
    }

}

?>
