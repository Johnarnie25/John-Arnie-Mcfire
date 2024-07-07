<?php

$msg = "";

if (isset($_GET['verification'])) {
    // Check if a customer with the provided verification code exists
    $verification_code = mysqli_real_escape_string($con, $_GET['verification']);
    $check_customer_query = "SELECT * FROM customers WHERE code='$verification_code'";
    $check_customer_result = mysqli_query($con, $check_customer_query);

    if (mysqli_num_rows($check_customer_result) > 0) {
        // Update the customer's record to clear the verification code
        $update_query = "UPDATE customers SET code='' WHERE code='$verification_code'";
        $update_result = mysqli_query($con, $update_query);

        if ($update_result) {
            // Verification successful
            $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
        } else {
            // Error updating the database
            $msg = "<div class='alert alert-danger'>Error updating database. Please try again later.</div>";
        }
    } else {
        // No matching customer found with the verification code
        header("Location: customer/customer_login.php"); // Redirect to index.php
        exit; // Terminate script execution
    }
}


// Check if the form is submitted
if(isset($_POST['login'])){
    // Retrieve email and password from the form
    $customer_email = $_POST['c_email'];
    $customer_pass = $_POST['c_pass'];

    // Database Connection - Assuming $con represents a valid database connection
   
    // Query to check if the customer exists
    $select_customer = "SELECT * FROM customers WHERE customer_email='$customer_email' AND customer_pass='$customer_pass'";
    $run_customer = mysqli_query($con, $select_customer);

    if(!$run_customer) {
        die("Query failed: " . mysqli_error($con)); // Check for query errors
    }

    $check_customer = mysqli_num_rows($run_customer);

    if($check_customer == 0){
        // If customer email does not exist or password is incorrect
        $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
    } else {
        // If customer email and password match
        $customer_data = mysqli_fetch_assoc($run_customer);

        if (!empty($customer_data['code'])) {
            // Account is not verified
            $msg = "<div class='alert alert-warning'>Your account is not verified. Please verify your account first.</div>";
        } else {
            // Account is verified
            $_SESSION['customer_email'] = $customer_email;

            // Check the cart for the user
            $get_ip = getRealUserIp(); // Assuming getRealUserIp() is defined and working correctly
            $select_cart = "SELECT * FROM cart WHERE ip_add='$get_ip'";
            $run_cart = mysqli_query($con, $select_cart);
            if(!$run_cart) {
                die("Query failed: " . mysqli_error($con)); // Check for query errors
            }
            $check_cart = mysqli_num_rows($run_cart);

            if ($check_cart == 0) {
                // If user is logged in and has no items in cart
                $msg = "<script>alert('You are Logged In')</script>";
                $msg .= "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
            } else {
                // If user is logged in and has items in cart
                $msg = "<script>alert('You are Logged In')</script>";
                $msg .= "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
            }
        }
    }
}
?>




<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login Form </title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Login Form" />
    <!-- //Meta tag Keywords -->

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>


<body>
<section>
    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="images/mcfire.jpg" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Login Now</h2>
                        <p>Welcome to Mcfire Online Vape Shop. </p>
                        <?php echo $msg; ?>
                        <form name="signInForm" action="" method="post" onsubmit="return validateForm();">
                            <input type="email" class="email" name="c_email" placeholder="Enter Your Email" required>
                            <input type="password" class="password" name="c_pass" placeholder="Enter Your Password" style="margin-bottom: 2px;" required>
                            <div class="g-recaptcha" data-sitekey="6LfdWq0pAAAAACRE5MLWTMpUJDcaJiIR70VJTyBU"></div>
                            <p><a href="forgot_pass.php" style="margin-bottom: 15px; display: block; text-align: right;">Forgot Password?</a></p>
                            <button name="login" class="btn" type="submit">Login</button>
                        </form>
                        <div class="social-icons">
                            <p>Create Account! <a href="customer_register.php">Register</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-mockup').fadeOut('slow', function (c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>

</body>

</html>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php
// Check if the reCAPTCHA response is present
if(isset($_POST['g-recaptcha-response'])){
    $recaptchaResponse = $_POST['g-recaptcha-response'];
    // Your secret key from Google reCAPTCHA admin console
    $secretKey = '6LfdWq0pAAAAABOKwrrl-K0z6ipuqcwo_6qexbzn'; // Replace with your actual secret key
    
    // Verify the reCAPTCHA response
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$recaptchaResponse);
    $responseData = json_decode($verifyResponse);
    
    // If reCAPTCHA response is valid
    if($responseData->success){
        // Proceed with login
        // Your existing login logic here
        if(isset($_POST['login'])){
            // Your existing login logic here
            $customer_email = $_POST['c_email'];
            $customer_pass = $_POST['c_pass'];
            // Your authentication logic...
        }
    } else {
        // If reCAPTCHA response is invalid, display an error message
        $captcha_error = true;
    }
}

// HTML form for CAPTCHA
?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
  function validateForm() {
    // Check if the email and password fields are not empty
    var email = document.forms["signInForm"]["c_email"].value;
    var password = document.forms["signInForm"]["c_pass"].value;
    
    if (email.trim() === "" || password.trim() === "") {
      alert("Please fill in all the fields.");
      return false;
    }
    
    // Check if the reCAPTCHA is completed
    if (!grecaptcha.getResponse()) {
      alert("Please complete the CAPTCHA.");
      return false;
    }
    
    // If everything is complete, submit the form
    return true;
  }
</script>



  



