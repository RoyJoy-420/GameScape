<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameScape| Home page</title>
    <link rel="stylesheet" href ="css/Style.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <img src = "Images/gamescape-low-resolution-logo-black-on-transparent-background.png" width="200px"> <!--LOGO IMAGE-->
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="products.html">Products</a></li>
                  
                    <li><a href="../support/HTML/CustomerSupport.html">Contact</a></li> 
                    <li><a href="myaccount.php" target="_blank" >Account</a></li>
                    <li><a href="../../cart.php" target="_blank"><img class = "shopping" src="Images/cart.png" width="30px" height="30px"  ></a></li>
                </ul>
            </nav>
            
        </div>
        <div class="row">
            <div class="col-2">
                <h1>Custom build<br>Your own pc!</h1>
                <p>Hesitant about choosing the right PC parts? Consult<br>our team here at NAME for expertise guidance!<br></p>
                <a href="../support/HTML/CustomerSupport.html" class="btn">Contact Us &#8594;</a>
            </div>
            <div class="col-2">
                <img src="Images/CustomPC.png" alt="">
            </div>
        </div>
    </div>
</div>
   
<!--Featured categories--->

    <div class="categories">
        <div class="small-container">
        <div class="row">

            <div class="col-3">
                <img src="Images/LOGITECH.jpg" alt="">
            </div>
            <div class="col-3">
                <img src="Images/KEYBOARD.jpg" alt="">
            </div>
            <div class="col-3">
                <img src="Images/HEADSET.jpg" alt="">
            </div>
            </div>
        </div>
    </div>

<!----Featured products-->
    <div class = "small-container">
        <h2 class="title">Featured Products</h2>
        <div class="row">
            <div class="col-4">
                <img src="Images/benQ.jpg" alt="">
                <h4>BenQ ZOWIE XL2740 27" 240Hz Gaming Monitor with G-Sync</h4>
                <p>RS 39,990.00</p>
            </div>

            <div class="col-4">
                <img src="Images/Wkeyboard2.jpg" alt="">
                <h4>Alcatroz XKB-100 Spill Proof Gaming Keyboard with 9 Backlight Effect Gaming Keyboard </h4>
                <p>Rs 575</p>
            </div>

            <div class="col-4">
                <img src="Images/LOGITECH.jpg" alt="">
                <h4>Logitech G102 Prodigy Gaming Mouse</h4>
                <p>MUR RS 1,250</p>
            </div>
        </div>
        <h2 class="title">Latest Products</h2>
        <div class="row">
            <div class="col-4">
                <img src="Images/LG.jpg" alt="">
                <h4>LG 23.8" ULTRAGEAR FHD IPS GAMING MONITOR-24GN650-B</h4>
                <p>RS 11,999</p>
            </div>

            <div class="col-4">
                <img src="Images/wide.jpg" alt="">
                <h4>LG 34" ULTRAWIDE FHD IPS DISPLAY MONITOR-34WP500</h4>
                <p>Rs 19,990.00</p>
            </div>

            <div class="col-4">
                <img src="Images/hyperX.jpg" alt="">
                <h4>HyperX Cloud II - Gaming Headset</h4>
                <p>Rs 5,500</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img src="Images/mofii.jpg" alt="">
                <h4>MOFII 18go - TEKEL gold edition</h4>
                <p>Rs 55,000</p>
            </div>

            <div class="col-4">
                <img src="Images/coolermaster.jpg" alt="">
                <h4>Coolermaster Devastator 3 Plus, Tekel edition</h4>
                <p>Rs 1,000,000</p>
            </div>

            <div class="col-4">
                <img src="Images/woyjoy.jpg" alt="">
                <h4>Razer WoyJoy Mini Ultralight Gaming Mouse</h4>
                <p>RS 10,000,000</p>
            </div>
        </div>
    </div>

<!-------OFFER------->
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="Images/exclusive.png" class="offer-img">
                </div>
                <div class="col-2">
                    <p>Exclusively Available At GameScape</p>
                    <h1>TekeW Watch 3</h1>
                    <small>The TekeW Watch 3 is a smartwatch that can analyse your exercise pattern, <br>manage your health and allows you to use a variety of convenient apps for making phone calls and playing music.<br></small>
                    <a href=""class="btn">Buy now &#8594;</a>
                </div>
            </div>
        </div>
    </div>

<!---BRANDS-->

    <div class="brands">
        <div class="small-container">
            <div class="row">
                <div class="col-5">
                    <img src="Images/logo-godrej.png" alt="">
                </div>
                <div class="col-5">
                    <img src="Images/logo-oppo.png" alt="">
                </div>'
                <div class="col-5">
                    <img src="Images/logo-philips.png" alt="">
                </div>
                <div class="col-5">
                    <img src="Images/logo-paypal.png" alt="">
                </div>'
            </div>
        </div>
    </div>

<!----FOOTER----->

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h3>Download our APP</h3>
                <p>Download app from android and IOS mobile</p>
                <div class="app-logo"> 
                    <img src="Images/play-store.png" alt="">
                    <img src="Images/app-store.png" alt="">
                </div>
            </div> 
            <div class="footer-col-2">
                <img src="Images/gamescape-high-resolution-logo-white-on-transparent-background.png" alt="">
                <p>Feel free to contact us anytime!</p>
            </div> 
            <div class="footer-col-3">
                <h3>Useful links</h3>
                <ul>
                    <li>Coupons</li>
                    <li>Return policy</li>
                    <li>Join affiliate</li>
                </ul>
            </div> 
            <div class="footer-col-4">
                <h3>Follow us</h3>
                <ul>
                    <li>Facebook</li>
                    <li>Twitter</li>
                    <li>Instagram</li>
                    <li>Youtube</li>
                </ul>
            </div> 
        </div>
        <hr>
        <p class="copyrights">
          Copyright 2023 @GameScape 
        </p>
    </div>
</div>







</body>
</html>