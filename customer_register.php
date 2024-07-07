<?php
session_start();
$msg = ""; // Initialize $msg here

if (!isset($_SESSION['customer_email'])) {
    include("includes/header.php");
    include("functions/functions.php");
    include("includes/navbar.php");
}

require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['register'])) {
    include("includes/db.php");

    $c_name = mysqli_real_escape_string($con, $_POST['c_name']);
    $c_email = mysqli_real_escape_string($con, $_POST['c_email']);
    $c_pass = mysqli_real_escape_string($con, $_POST['c_pass']);
    $code = mysqli_real_escape_string($con, md5(rand()));

    if ($_POST['c_pass'] !== $_POST['confirm_pass']) {
        $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
    } else {
        $existing_user_query = mysqli_query($con, "SELECT * FROM customers WHERE customer_email='{$c_email}'");
        if (mysqli_num_rows($existing_user_query) > 0) {
            $msg = "<div class='alert alert-danger'>{$c_email} - This email address already exists.</div>";
        } else {
            $sql = "INSERT INTO customers (customer_name, customer_email, customer_pass, code) VALUES ('{$c_name}', '{$c_email}', '{$c_pass}', '{$code}')";
            $result = mysqli_query($con, $sql);

            if ($result) {
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'jayzxc.mariano25@gmail.com';
                    $mail->Password   = 'dbfp emln hqyx mxks';
                    $mail->SMTPSecure = "tls";
                    $mail->Port = 587;

                    $mail->setFrom('jayzxc.mariano25@gmail.com', 'Mcfire Online Vapeshop');
                    $mail->addAddress($c_email);

                    $mail->isHTML(true);
                    $mail->Subject = 'no reply';
                    $mail->Body    = 'This is you verification link click this to verify your account. <b><a href="https://mcfireovs.com/checkout.php?verification=' . $code . '">https://mcfireovs.com/checkout.php/?verification=' . $code . '</a></b>';

                    $mail->send();
                    $msg = "<div class='alert alert-info'>We've sent a verification link to your email address.</div>";
                } catch (Exception $e) {
                    $msg = "<div class='alert alert-danger'>Message could not be sent. Mailer Error: {$e->getMessage()}</div>";
                }
            } else {
                $msg = "<div class='alert alert-danger'>Something went wrong.</div>";
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login Form - Brave Coder</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Login Form" />
    <!-- //Meta tag Keywords -->

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->
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
                            <h2>Register Now</h2>
                            <p>Create your Account. </p>
                            <?php echo $msg; ?>
                            <form action="" method="post">
                                <input type="text" class="name" name="c_name" placeholder="Enter Your Name" value="<?php if (isset($_POST['register'])) { echo $_POST['c_name']; } ?>" required>
                                <input type="email" class="email" name="c_email" placeholder="Enter Your Email" value="<?php if (isset($_POST['register'])) { echo $_POST['c_email']; } ?>" required>
                                <input type="password" class="password" name="c_pass" placeholder="Enter Your Password" required>
                                <input type="password" class="password" name="confirm_pass" placeholder="Confirm Your Password" required>
                                <button name="register" class="btn" type="submit">Register</button>
                            </form>
                            <div class="social-icons">
                                <p>Have an account! <a href="checkout.php">Login</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //form -->
            </div>
        </section>
    </section>

    <?php
    include("includes/footer.php");
    ?>

    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function(c) {
            $('.alert-close').on('click', function(c) {
                $('.main-mockup').fadeOut('slow', function(c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>
</body>

</html>
