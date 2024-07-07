<?php
session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");
?>
<style>
    .jay6{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.jay{
    min-height: 70vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #171b22;
}
       .about-femfashion{
        background: url(images/Mcfireabout.jpg) no-repeat left;
        background-size: 55% 100%; 
        background-color: #171b22;
    overflow: hidden;
    padding: 100px 0;
}
.femfashion-section{
    width: 45%;
    float: right;
    background-color: #fefae0;
    padding: 60px;
    box-shadow: 10px 10px 8px rgba(0,0,0,0.3);
}
.inner-section h1{
    margin-bottom: 50px;
    font-size: 30px;
    font-weight: 900;
}
.text-femfashion{
    font-size: 15px;
    color: #545454;
    line-height: 30px;
    text-align: justify;
    margin-bottom: 40px;
}
.skills button{
    font-size: 22px;
    text-align: center;
    letter-spacing: 2px;
    border: none;
    border-radius: 20px;
    padding: 8px;
    width: 200px;
    background-color:  #ffb703;
    color: white;
    cursor: pointer;
}
.skills button:hover{
    transition: 1s;
    background-color: #121212;
    color: #00999c;
}
@media screen and (max-width:1200px){
    .inner-section{
        padding: 80px;
    }
}
@media screen and (max-width:1000px){
    .about{
        background-size: 100%;
        padding: 100px 40px;
    }
    .inner-section{
        width: 100%;
    }
}
@media screen and (max-width: 600px) {
        .about-femfashion {
            background-size: 100% 100%; /* Adjust as needed */
            padding: 60px 0; /* Adjust padding if necessary */
        }
    }
    
@media screen and (max-width:600px){
    .about{
        padding: 0;
    }
    .femfashion-section{
        padding: 60px;
    }
    .skills button{
        font-size: 19px;
        padding: 5px;
        width: 160px;
    }
}
    </style>
<section>
    <div class="jay6">
    <div class="jay">
<div class="about-femfashion">
        <div class="femfashion-section">
            <h1>About Us</h1>
            <p class="text-femfashion">
            Welcome to McFire Vape Shop, your ultimate destination for all things vaping! At McFire, we're passionate about providing you with the latest and greatest in the world of vaping. Our mission is to offer a wide range of high-quality vape products, from cutting-edge devices to an extensive selection of e-liquids, ensuring that you have everything you need for an exceptional vaping experience. Discover the freedom of flavor and join us on the journey to a smoke-free lifestyle. McFire Vape Shop – where your vaping desires come to life!
            </p>
            <div class="skills">
                <button>Mcfire Clouds</button>
            </div>
        </div>
    </div>
</section>





<?php
include("includes/footer.php");
?>
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
