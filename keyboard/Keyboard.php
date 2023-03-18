
<?php
include("Keyboardgrid.php");
?>



<!Doctype html>
    <html>
        <head>
            <title>Keyboard</title>
            
            <div class="header">
                <div class="contain">
                    <div class="navbar">
                        <div class="logo">
                            <img src = "../images/image/gamescape-low-resolution-logo-black-on-transparent-background.png" width="200px">
                        </div>
                    
                                <nav>
                                    <ul>
                                    <li><a href="../support+login/login/Index.php">Home</a></li>
                                    <li><a href="../support+login/login/products.html">Products</a></li>
                                    <li><a href="../support+login/support/HTML/CustomerSupport.html">Contact</a></li>
                                    <li><a href="../support+login/login/myaccount.php">Account</a></li>
                                    <li>
                                        <div class ="count">
                                            <a href="../cart.php"><img class = "shopping" src="../images/image/cart.png"  ></a>
                                            <div>
                                                <?php 
                                                    if (isset($_SESSION['cart'])) {
                                                    $count = 0;
                                                    foreach ($_SESSION['cart'] as $item) {
                                                        $count += $item['quantity'];
                                                    }
                                                        echo "<span id=\"cart_count\">$count</span>";
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            
                                            
                                        </li>
                                    </ul>
                                </nav>
                        
                        
                    </div>
                
            
                </nav>
                </div>
            </div>
            
            <div class ="category">
                <div> 
                     <div class = "title">
                        <h1 >Keyboard</h1>
                    </div>
                    <div class = "text">
                    <p>Shop for high quality Keyboard </p>
                    </div>
                </div>

               
            </div>
            
            <link rel="stylesheet" href = "Keyboard.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
            
        </head>
        <body>
        
            <div class = "products">
                <div class = "filters">
                    <div class= "sort">
                 
                        Sorted by:
                        <div class="dropdown">
                            <div class = "select">
                                
                                <span class="selected">Descending Price</span>
                                
                                <div class= "caret"></div>
                            </div>
                     
                            <ul class = "menu">
                            <li class = "active"> Descending Price</li>
                            <li> Ascending Price</li>
                            <li>A-Z </li>
                            <li>Z-A</li>
        
                            </ul>
                        
                     
                        </div>
                    
                    </div>
                    <div class=filter>
                        Connectivity
                        <div class="dropdown2">
                            <div class = "select">
                                
                                <span class="selected">All</span>
                                
                                <div class= "caret"></div>
                            </div>
                     
                            <ul class = "menu">
                            <li class = "active"> All</li>
                            <li> Wireless</li>
                            <li>Wired </li>
                            
        
                            </ul>
                        
                    
                        </div>

                    </div>  
                   
                    
                    
                    
                    
                </div>
                <div class="container">
                    
                    <div class = "product-items" id ="products-items">
                    
                     <?php echo generateProductHTML($db, 'testing', ['ItemID','Name', 'Price', 'image'],$find); ?>  
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src ="Keyboard.js"></script>  
            <div class="footer">
                <div class="contain">
                    <div class="row">
                        <div class="footer-col-1">
                            <h3>Download our APP</h3>
                            <p>Download app from android and IOS mobile</p>
                            <div class="app-logo"> 
                                <img src="../images/image/play-store.png" alt="">
                                <img src="../images/image/app-store.png" alt="">
                            </div>
                        </div> 
                        <div class="footer-col-2">
                            <img src="../images/image/gamescape-low-resolution-logo-white-on-transparent-background.png" alt="">
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
                    Copyright 2023 @GameLounge  
                    </p>
                </div>
            </div> 
            
            
            
            
        </body>
    </html>


    