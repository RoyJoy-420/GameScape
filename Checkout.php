<?php



require("component.php");

$db = new CreateDb("localhost", "root");

// check if the checkout button has been clicked
if (isset($_POST['checkout'])) {
    
    // retrieve the user's details from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $cardname = $_POST['cardname'];
    $cardnumber = $_POST['cardnumber'];
    $expmonth = $_POST['expmonth'];
    $expyear = $_POST['expyear'];
    $cvv = $_POST['cvv'];
    
    // insert the user's details into the orders table
    $query = "INSERT INTO orders (name, email, address, city, state, zip, cardname, cardnumber, expmonth, expyear, cvv) VALUES ('$name', '$email', '$address', '$city', '$state', '$zip', '$cardname', '$cardnumber', '$expmonth', '$expyear', '$cvv')";
    $result = mysqli_query($db->conn, $query);
    
    // retrieve the order ID
    $order_id = mysqli_insert_id($db->conn);
    
    // retrieve the products in the cart
    $product_ids = array_column($_SESSION['cart'], 'product_id','quantity');
    $product_ids_str = implode(',', $product_ids);
    $query = "SELECT * FROM testing WHERE ItemID IN ($product_ids_str)";
    $result = mysqli_query($db->conn, $query);
    // insert the products into the order_items table
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['ItemID'];
        $product_name = $row['Name'];
        $product_price = $row['Price'];
        $query = "INSERT INTO order_items (OrderID, ItemID, Name, Price) VALUES ('$order_id', '$product_id', '$product_name', '$product_price')";
        mysqli_query($db->conn, $query);
    }
    
    // empty the cart
    unset($_SESSION['cart']);
    
    //redirect to the confirmation page
    header("Location: support+login/login/Index.php ");
    exit();

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
     
	<link rel="stylesheet" href="style3.css">
   <link rel="stylesheet" href="style.css">
	<title>Checkout</title>
   
</head>
<body>
	<header>
		<h1 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Checkout</h1>
	</header>


<?php
    require_once ('header2.php');
?>

<div class="summary">
			<div class="shopping-cart">
				<h2>Order Summary</h2>
				<hr>
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
                                displaycheckout($row['image'], $row['Name'],$row['Price'],$quantity);
                                
                                $total = $total + ((int)$row['Price'] * (int)$quantity);
                            }
                          }
                    }
                }
				?>
				<hr>
            </div>

    <div class="row px-5">
        <div class="col-md-7">
            
        </div>
        
        <div class="price-details">
            <div class="pt-4">
                <h6 style="font-size: larger;"><u>PRICE DETAILS</u></h6>
                <hr>
               
                    
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>$<?php echo $total; ?></h6>
                        <h6 style="font-size: medium;">Delivery Charges</h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6 style="font-size: medium;">Amount Payable</h6>
                        <h6>$<?php
                            echo $total;
                            ?>
                        </h6>
                       
                    </div>
                    
                        
                       
                        <hr>
                      
                    </div>
                </div>
            </div>

        </div>

<section class="container">
	<div class="row">
		<div class="col-md-6">
			<form action="" method="POST">
				<h2>Billing Information</h2>
				<label for="name">Full Name</label>
				<input type="text" name="name" id="name" required>

				<label for="email">Email Address</label>
				<input type="email" name="email" id="email" required>

				<label for="address">Address</label>
				<input type="text" name="address" id="address" required>

				<label for="city">City</label>
				<input type="text" name="city" id="city" required>

				<label for="state">State</label>
				<input type="text" name="state" id="state" required>

				<label for="zip">Zip Code</label>
				<input type="text" name="zip" id="zip" required>

				<h2>Payment Information</h2>
				<label for="cardname">Name on Card</label>
				<input type="text" name="cardname" id="cardname" required>

				<label for="cardnumber">Card Number</label>
				<input type="text" name="cardnumber" id="cardnumber" required>

				<label for="expmonth">Expiration Month</label>
				<input type="text" name="expmonth" id="expmonth" required>

				<label for="expyear">Expiration Year</label>
				<input type="text" name="expyear" id="expyear" required>

				<label for="cvv">CVV</label>
				<input type="text" name="cvv" id="cvv" required>

				<button type="submit" name="checkout">Checkout</button>
			</form>
		</div>
		
    </div>
</div>






<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>