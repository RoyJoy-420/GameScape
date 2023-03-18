<?php

session_start();
require ("CreateDb.php");


$db = new CreateDb("localhost", "root");

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
  
}
if (isset($_GET['action']) && $_GET['action'] == 'recalculate') {
    $product_id = $_SESSION['cart'];
    $result = $db->getData();
    $total=recalculate($product_id,$result);
    echo $total;
}
if (isset($_POST['id'])&&isset($_POST['quantity'])){
    $id= $_POST['id'];
    $quantity= $_POST['quantity'];
    if($quantity <= 0)
    {
        foreach ($_SESSION['cart'] as $key => $value){
            if($value["product_id"] == $id ){
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been Removed...!')</script>";
                echo "<script>window.location = 'cart.php'</script>";
                header('Location: cart.php');
                exit();
            }
        }

    }
    else{
        foreach ($_SESSION['cart'] as &$item) {
        if ($item['product_id'] == $id) {
            $item['quantity'] = $quantity;
            echo $item['quantity'];
          break;
        }
    }
    }
    
    
    
}




function cartElement($productimg, $productname, $productprice, $productid,$quantity){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class =\"remove\">
                     <button type=\"submit\" class=\"removebtn\" name=\"remove\"><i class=\"fa-solid fa-trash\"></i></button>
                    </div>
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"product\">
                            <img src=\"data:image/jpeg;base64," . base64_encode($productimg) . "\" height=\"150px\" width=\"250px\" alt=\"product Image\">
                            </div>
                            <div class=\"product-details\">
                                <h4 class=\"pt-1\">$productname</h5>
                                <h5 class=\"pt-2\">Rs: $productprice</h5>
                               
                            </div>
                            <div class=\"quantity-holder\">
                                <div class=\"quantity\">
                                    <button type=\"button\" class=\"minusbtn\"><i class=\"fa-solid fa-minus\"></i></button>
                                    <input type=\"text\"name=\"quan\" value=$quantity class=\"form-control\">
                                    <input type=\"hidden\"name=\"id\" value=$productid class=\"form-control\">
                                    <button type=\"button\" class=\"addbtn\"><i class=\"fa-solid fa-plus\"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;

}
function displaycheckout($productimg, $productname, $productprice,$quantity){
    $element = "
    <div class=\"border rounded\">
                        <div class=\"row\">
                            <div class=\"product\">
                            <img src=\"data:image/jpeg;base64," . base64_encode($productimg) ."\" height=\"150px\" width=\"250px\" alt=\"product Image\">
                            </div>
                            <div class=\"product-details\">
                                <h4 class=\"name\">$productname</h5>
                                <h5 class=\"price\">Rs: $productprice</h5>
                                <h5> Quantity : $quantity<h5>
                            </div>
                            
                        </div>
                    </div>";
    echo  $element;

}



function recalculate($cart,$result){
    $total=0;                  
    while ($row = mysqli_fetch_assoc($result)){
        foreach ($cart as $item) {
            $id=$item['product_id'];
            if ( $row['ItemID']==$id ) {
                $quantity=$item['quantity'];
                $total = $total + ((int)$row['Price'] * (int)$quantity);
            }
        }
    }
    return $total;
}

?>















