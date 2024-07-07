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

	#cookie-bar img {
            max-height: 40px; /* Set the max height of the image */
            margin-right: 10px; /* Adjust the margin as needed */
        }
  </style>
</head>

<footer class="page-footer">
    <div class="footer-nav">
        <div class="container clearfix">
            <div class="footer-nav__col footer-nav__col--info">
                <div class="footer-nav__heading">Information</div>
                <a href="#" class="footer-nav__link">Vape Products</a><br>
                <a href="#" class="footer-nav__link">Local Branch</a><br>
                <a href="#" class="footer-nav__link">Customer service</a><br>
                <a href="#" class="footer-nav__link">Privacy &amp; cookies</a><br>
                <a href="#" class="footer-nav__link">Site map</a>
            </div>

            <div class="footer-nav__col footer-nav__col--whybuy">
                <div class="footer-nav__heading">Why buy from us</div>
                <a href="#" class="footer-nav__link">Shipping &amp; returns</a><br>
                <a href="#" class="footer-nav__link">Secure shipping</a><br>
                <a href="#" class="footer-nav__link">Testimonials</a><br>
                <a href="#" class="footer-nav__link">Good Quality</a><br>
                <a href="#" class="footer-nav__link">Ethical trading</a>
            </div>

            <div class="footer-nav__col footer-nav__col--account">
                <div class="footer-nav__heading">Your account</div>
                <a href="#" class="footer-nav__link">Sign in</a><br>
                <a href="#" class="footer-nav__link">Register</a><br>
                <a href="#" class="footer-nav__link">View cart</a><br>
                <a href="#" class="footer-nav__link">View your Profile</a><br>
                <a href="#" class="footer-nav__link">Track an order</a><br>
                <a href="#" class="footer-nav__link">Update information</a>
            </div>

            <div class="footer-nav__col footer-nav__col--contacts">
                <div class="footer-nav__heading">Contact details</div>
                <address class="address">
                    Brands: Mcfire Clouds.<br>
                    Located in Zaragoza / Aliaga
                </address>
                <div class="phone">
                    Telephone:
                    <a class="phone__number" href="tel:0123456789">0123-456-789</a>
                </div>
                <div class="email">
                    Email:
                    <a href="mailto:support@yourwebsite.com" class="email__addr">Mcfire@gmail.com</a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-footer__subline">
        <div class="container clearfix">
            <div class="copyright">
                &copy; 2023 Mcfire OVS V1.0&trade;
            </div>
            <div class="developer">
                Dev by 3RD Year BSIT
            </div>
            <div class="designby">
                Design by Mcfire
            </div>
        </div>
    </div>
</footer>
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
    
<div id="cookie-bar" style="position: fixed; bottom: 0; left: 0; width: 100%; background-color: #fefae0; color: #000; padding: 10px; text-align: center; display: none;">
<img src="images/cookie.png" alt="Cookie Image">
    This website uses cookies. By continuing to use this site, you consent to our use of cookies.
    <button onclick="allowCookies()" style="background-color: #ffb703; color: white; border: none; padding: 10px 16px; margin-left: 10px; cursor: pointer;">Allow</button>
</div>

<script>
    // Check if the user has already allowed cookies
    if (getCookie("cookiesAllowed") !== "true") {
        document.getElementById("cookie-bar").style.display = "block";
    }

    // Function to set the "cookiesAllowed" cookie
    function allowCookies() {
        setCookie("cookiesAllowed", "true", 365);
        document.getElementById("cookie-bar").style.display = "none";
    }

    // Function to set a cookie
    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + value + expires + "; path=/";
    }

    // Function to get the value of a cookie
    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }
</script>

