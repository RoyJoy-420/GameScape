
<header id="header">
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
                                        <li><a href="">Home</a></li>
                                        <li><a href="">Products</a></li>
                                        <li><a href="">About</a></li>
                                        <li><a href="">Contact</a></li>
                                        <li><a href="">Account</a></li>
                                        <li><a href="cart.php"><img class = "shopping" src="images/image/cart.png"  ></a></li>
                                    </ul>
                                </nav>
                        
                        <div class ="count">
                            <?php if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\">$count</span>";
                            }else{
                            echo "<span id=\"cart_count\" >0</span>";
                            }?>
                        </div>
                    </div>
                
            
                </nav>
                </div>
            </div>
            
            
            
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
           
    </head>
    
        
</header>






