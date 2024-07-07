<?php
include("includes/db.php");
include("includes/header.php");
?>
</head>
<body>
<header class="page-header">
    <div class="page-header__topline">
      <div class="container clearfix">

        <div class="currency">
          <a class="currency__change" href="customer/my_account.php?my_orders">
          <?php
          if(!isset($_SESSION['customer_email'])){
          echo "Welcome :Guest"; 
          }
          else
          { 
              echo "Welcome : " . $_SESSION['customer_email'] . "";
            }
?>
          </a>
        </div>

        <div class="basket">
          <a href="cart.php" class="btn btn--basket">
            <i class="icon-basket"></i>
            <?php items(); ?> items
          </a>
        </div>

        <div class="login">
          <?php
          if(!isset($_SESSION['customer_email'])){
            echo '<div class="login__item"><a href="checkout.php" class="login__link">Sign In</a></div>';
          } 
          else
          { 
              echo '<div class="login__item"><a href="./logout.php" class="login__link">Logout</a></div>';
          }   
          ?>
        </div>
      
      </div>
    </div>

    <!-- bottomline -->
    <div class="page-header__bottomline">
      <div class="container clearfix">

        <div class="logo">
          <a class="logo__link" href="index.php">
            <img class="logo__img" src="images/Mcfire.png" alt="Avenue fashion logotype" width="100" height="0">
          </a>
        </div>

        <nav class="main-nav">
          <div class="categories">

            <div class="categories__item">
              <a class="categories__link categories__link--active" href="index.php">
               Home
              </a>
            </div>

            <div class="categories__item">
              <a class="categories__link categories__link--active" href="shop.php">
                Shop
              </a>
            </div>

            <div class="categories__item">
              <a class="categories__link categories__link--active" href="howtoorder.php">
                How to Order
              </a>
            </div>
           
            <div class="categories__item">
              <a class="categories__link categories__link--active" href="localstore.php">
                Branch
              </a>
            </div>
           
            <div class="categories__item">
              <a class="categories__link categories__link--active" href="about.php">
                About
              </a>
            </div>

            <div class="categories__item">
              <a class="categories__link categories__link--active" href="contact.php">
                Contact
              </a>
            </div>

            <div class="categories__item">
              <a class="categories__link" href="customer/my_account.php?my_orders">
                My Account
                <i class="icon-down-open-1"></i>
              </a>
            </div>

          </div>
        </nav>
      </div>
    </div>
  </header>

