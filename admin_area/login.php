<?php
session_start();

include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login Panel</title>
  <link rel="stylesheet" href="css/styles.css" >
</head>
<body>
  
  <div class="container">
    <div class="myform">
      <form class="form-login" action="" method="post" ><!-- form-login Starts -->
        <h2>ADMIN LOGIN</h2>
        <input type="text" class="form-control" name="admin_email" placeholder="Email Address" required >

<input type="password" class="form-control" name="admin_pass" placeholder="Password" required >
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login" >

Log in

</button>
      </form>
    </div>
    <div class="image">
      <img src="../images/Mcfireadmin.jpg">
    </div>
  </div>

</body>
</html>

<?php

if(isset($_POST['admin_login'])){

$admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);

$admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);

$get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";

$run_admin = mysqli_query($con,$get_admin);

$count = mysqli_num_rows($run_admin);

if($count==1){

$_SESSION['admin_email']=$admin_email;

echo "<script>alert('You are Logged in into admin panel')</script>";

echo "<script>window.open('index.php?dashboard','_self')</script>";


}
else {

echo "<script>alert('Email or Password is Wrong')</script>";

}

}

?>