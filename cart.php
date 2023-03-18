<?php

include ("component.php");
?>

<!doctype html>
<html lang="en">
<head>

<title>shopping Cart</title>
            
            <div class="header">
                <div class="contain">
                    <div class="navbar">
                        <div class="logo">
                            <img src = "images/image/gamer.png" width="200px">
                        </div>
                    
                                <nav>
                                    <ul>
                                    <li><a href="support+login/login/index.php">Home</a></li>
                                    <li><a href="support+login/login/products.html">Products</a></li>
                                    <li><a href="support+login/support/HTML/CustomerSupport.html">Contact</a></li>
                                    <li><a href="support+login/login/myaccount.php">Account</a></li>
                                    <li>
                                        <div class ="count">
                                            <a href="cart.php"><img class = "shopping" src="images/image/cart.png"  ></a>
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
            
            
            
            
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link rel="stylesheet" href="cart.css">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"  />
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    


</head>
<body class="bg-light">



<div class="container">
    <div class="column ">
        <div class="col">
            <div class="shopping-cart">
                <div class="text2">
                    <h2 >My Cart</h6>
                </div>
                
            

                <?php

                $total = 0;
                
                    if (isset($_SESSION['cart'])){
                        $product_id = $_SESSION['cart'];
                        $result = $db->getData();
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $item) {
                                $id=$item['product_id'];
                                if ( $row['ItemID']==$id ) {
                                    $quantity=$item['quantity'];
                                    cartElement($row['image'], $row['Name'],$row['Price'], $row['ItemID'],$quantity);
                                    
                                    $total = $total + ((int)$row['Price'] * (int)$quantity);
                                }
                              }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }

                ?>

            </div>
        </div>
        <div class="col2">

            <div class="Details">
                <div class= "text2">
                <h2 class="D2">PRICE DETAILS</h2>
                </div>
                
                
                <div class="price-details">
                    <div class="price-border">
                        <div class="item-price">
                        <?php
                            if (isset($_SESSION['cart'])) {
                                $count = 0;
                                foreach ($_SESSION['cart'] as $item) {
                                    $count += $item['quantity'];
                                }
                                echo "<h6 class=\"amount\">Price ($count items)</h6>";
                            }else{
                                echo "<h6 >Price (0 items)</h6>";
                            }
                        ?>
                        <h6 class="total">Rs <?php echo $total; ?></h6 >
                        
                        </div>

                    </div>
                    
                    
                    <div class="checkout-container">
                    <button type="button" class="checkout"><a href="Checkout.php"target="_blank">Check out</a></i></button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src ="cart.js"></script>
<div class="footer">
                <div class="contain">
                    <div class="row3">
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>
