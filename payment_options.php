<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<style>*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
@font-face {
    font-family: pop;
    src: url(./Fonts/Poppins-Medium.ttf);
}

.jayzzz{
    width: 100%;
    height: 40vh;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: pop;
    flex-direction: column;
}
.headjayzzz{
    text-align: center;
}
.head_1{
    font-size: 40px;
    font-weight: 600;
    color: #333;
}
.head_1 span{
    color: #ff4732;
}
.head_2{
    font-size: 40px;
    font-weight: 600;
    color: #333;
    margin-top: 3px;
}
ul{
    display: flex;
    margin-top: 40px;
}
ul li{
    list-style: none;
    display: flex;
    flex-direction: column;
    align-items: center;
}
ul li .icon{
    font-size: 40px;
    color: #ff4732;
    margin: 0 60px;
}
ul li .text{
    font-size: 14px;
    font-weight: 600;
    color: #ff4732;
}

/* Progress Div Css  */

ul li .progress{
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: rgba(68, 68, 68, 0.781);
    margin: 14px 0;
    display: grid;
    place-items: center;
    color: #fff;
    position: relative;
    cursor: pointer;
}
.progress::after{
    content: " ";
    position: absolute;
    width: 125px;
    height: 5px;
    background-color: rgba(68, 68, 68, 0.781);
    right: 30px;
}
.one::after{
    width: 0;
    height: 0;
}
ul li .progress .uil{
    display: none;
}
ul li .progress p{
    font-size: 13px;
}

/* Active Css  */

ul li .active{
    background-color: #ff4732;
    display: grid;
    place-items: center;
}
li .active::after{
    background-color: #ff4732;
}
ul li .active p{
    display: none;
}
ul li .active .uil{
    font-size: 20px;
    display: flex;
}

/* Responsive Css  */

/* Existing CSS */

/* Responsive Css for all devices */
@media (max-width: 600px) {
    /* Adjusting the layout of the list items */
    ul li {
        flex-direction: column;
        align-items: center;
    }
    
    /* Adjusting the margin for the progress circles */
    ul li .progress {
        margin: 10px 0;
    }
    
    /* Adjusting the progress bar width */
    ul li .progress::after {
        width: 5px;
        height: 65px; /* Increase height for visibility */
        right: auto;
        bottom: -30px;
        left: 50%;
        transform: translateX(-50%);
    }

    /* Hiding unnecessary elements */
    .progress::after,
    .one::after {
        display: none;
    }

    /* Adjusting font sizes */
    .head_1 {
        font-size: 28px;
    }
    
    .head_2 {
        font-size: 18px;
    }

    /* Adjusting margin for icons */
    ul li .icon {
        margin: 10px 0;
    }
}

</style>
<div class="box"><!-- box Starts -->

<?php

$session_email = $_SESSION['customer_email'];

$select_customer = "select * from customers where customer_email='$session_email'";

$run_customer = mysqli_query($con,$select_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];


?>

<div class="jayzzz">
        <div class="headjayzzz">
            <p class="head_1">Click This To <span>Proceed Checkout</span></p>
            <a href="order.php?c_id=<?php echo $customer_id; ?>" style="font-size: 30px;">Payment Options For You</a>
        </div>

        <ul>
            <li class="active"> <!-- Add 'active' class directly -->
                <i class="icon uil uil-capture"></i>
                <div class="progress one">
                    <p>1</p>
                    <i class="uil uil-check"></i>
                </div>
                <p class="text">Add To Cart</p>
            </li>
            <li class="active"> <!-- Add 'active' class directly -->
                <i class="icon uil uil-clipboard-notes"></i>
                <div class="progress two">
                    <p>2</p>
                    <i class="uil uil-check"></i>
                </div>
                <p class="text">Fill Details</p>
            </li>
            <li class="active"> <!-- Add 'active' class directly -->
                <i class="icon uil uil-credit-card"></i>
                <div class="progress three">
                    <p>3</p>
                    <i class="uil uil-check"></i>
                </div>
                <p class="text">Make Payment</p>
            </li>
            <li class="active"> <!-- Add 'active' class directly -->
                <i class="icon uil uil-exchange"></i>
                <div class="progress four">
                    <p>4</p>
                    <i class="uil uil-check"></i>
                </div>
                <p class="text">Order in Progress</p>
            </li>
            <li class="active"> <!-- Add 'active' class directly -->
                <i class="icon uil uil-map-marker"></i>
                <div class="progress five">
                    <p>5</p>
                    <i class="uil uil-check"></i>
                </div>
                <p class="text">Delivered</p>
            </li>
        </ul>
    </div>
</div>
<center><!-- center Starts -->


<?php

$i = 0;


$ip_add = getRealUserIp();

$get_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$get_cart);

while($row_cart = mysqli_fetch_array($run_cart)){

$pro_id = $row_cart['p_id'];

$pro_qty = $row_cart['qty'];

$pro_price = $row_cart['p_price'];

$get_products = "select * from products where product_id='$pro_id'";

$run_products = mysqli_query($con,$get_products);

$row_products = mysqli_fetch_array($run_products);

$product_title = $row_products['product_title'];

$i++;

?>


<input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $product_title; ?>" >

<input type="hidden" name="item_number_<?php echo $i; ?>" value="<?php echo $i; ?>" >

<input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo $pro_price; ?>" >

<input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $pro_qty; ?>" >

<?php } ?>

</form><!-- form Ends -->
</center><!-- center Ends -->

</div>

<script>
    const one = document.querySelector(".one");
const two = document.querySelector(".two");
const three = document.querySelector(".three");
const four = document.querySelector(".four");
const five = document.querySelector(".five");

one.onclick = function() {
    one.classList.add("active");
    two.classList.remove("active");
    three.classList.remove("active");
    four.classList.remove("active");
    five.classList.remove("active");
}

two.onclick = function() {
    one.classList.add("active");
    two.classList.add("active");
    three.classList.remove("active");
    four.classList.remove("active");
    five.classList.remove("active");
}
three.onclick = function() {
    one.classList.add("active");
    two.classList.add("active");
    three.classList.add("active");
    four.classList.remove("active");
    five.classList.remove("active");
}
four.onclick = function() {
    one.classList.add("active");
    two.classList.add("active");
    three.classList.add("active");
    four.classList.add("active");
    five.classList.remove("active");
}
five.onclick = function() {
    one.classList.add("active");
    two.classList.add("active");
    three.classList.add("active");
    four.classList.add("active");
    five.classList.add("active");
}
// JavaScript to handle click events for responsive layout
const lis = document.querySelectorAll("ul li");


    </script>



