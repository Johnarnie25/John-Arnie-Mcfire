<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
	 
    body {
      font-family: Arial, sans-serif;
    }

    center {
      text-align: center;
    }

    

    #emailInput {
      padding: 8px;
      margin: 8px 0;
      width: 200px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    #submitBtn {
      padding: 10px;
      background-color: #512da8;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    #submitBtn:hover {
      background-color: #000;
    }

	/* styles.css */




  body {
    background-color: #171b22;
    background: linear-gradient(to right, #121212, #171b22);
  }
  #cookie-bar img {
            max-height: 40px; /* Set the max height of the image */
            margin-right: 10px; /* Adjust the margin as needed */
        }

  </style>
</head>


<!-- Add this at the bottom of your HTML, before the closing </body> tag -->

  <!-- Cover -->
  <main>
    <div class="hero">
      <a href="shop.php" class="btn1">View all products
</a>
    </div>
    <!-- Main -->
    <div class="wrapper">
    <h1 style="color: #FFFFFF;">New Arrivals</h1>

            
      </div>


      <script src="https://cdn.commoninja.com/sdk/latest/commonninja.js" defer></script>
<div class="commonninja_component pid-43d64ca7-94db-4418-a593-1cbdc4e358e1"></div>
    <div id="content" class="container"><!-- container Starts -->

    <div class="row"><!-- row Starts -->

    <?php

    getPro();

    ?>

    </div><!-- row Ends -->

    </div><!-- container Ends -->
    <!-- FOOTER -->
	<?php
include("includes/footer.php");
?>
<!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "190634674136691");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v18.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>