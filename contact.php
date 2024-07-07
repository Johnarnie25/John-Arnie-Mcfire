<?php
session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");
?>


<section>
    <div class="contact-wrap">
        <div class="contact-in">
				<ul>
					<li><a href="https://www.facebook.com/profile.php?id=61552221081107"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				</ul>
			</div>
        <div class="contact-in">
            <h1>Send a Message</h1>
            <form id="contactForm">
    <input type="text" id="name" placeholder="Your Name" class="contact-in-input" required>
    <input type="email" id="email" placeholder="Email id" class="contact-in-input" required>
    <input type="tel" id="phone" placeholder="Phone no." class="contact-in-input" required>
    <textarea id="message" placeholder="Message" class="contact-in-textarea"></textarea>
    <button type="button" onclick="sendEmail()" class="contact-in-btn">Send</button>
</form>


        </div>
        <div class="contact-in">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30367.185260134347!2d120.96167660504804!3d15.468942077982727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396e0c0a0a7b4f5%3A0x6d10d0e273b4d841!2sCabanatuan%20City%2C%20Nueva%20Ecija!5e0!3m2!1sen!2sph!4v1601968196548!5m2!1sen!2sph"
                width="100%" height="auto" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
</section>

<!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "201534356367893");
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

<?php
include("includes/footer.php");
?>

<!-- Include jQuery and Bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.emailjs.com/dist/email.min.js"></script>
<script>
    // Initialize EmailJS with your user ID and service ID
    emailjs.init("FUwFWMIKPAA_EIGKL");

    // Wait for the DOM to be ready
    $(document).ready(function() {
        // Attach a submit handler to the form
        $("#contactForm").submit(function(event) {
            // Prevent the default form submission
            event.preventDefault();

            // Call the sendEmail function
            sendEmail();
        });
    });

    function sendEmail() {
        // Get form data
        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var message = $("#message").val();

        // Use the 'emailjs' library to send the email
        emailjs.send("service_fhnnnyv", "template_9nalree", {
            to_email: "jayzxc.trader01@gmail.com",
            name: name,
            email: email,
            phone: phone,
            message: message
        })
        .then(function(response) {
            console.log('Email sent successfully:', response);
            alert('Your message has been sent successfully!');
            
            // Clear the form fields
            $("#name, #email, #phone, #message").val('');
        }, function(error) {
            console.log('Failed to send email. Error:', error);
            alert('Failed to send your message. Please try again later.');
        });
    }
</script>
