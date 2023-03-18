<?php
include("database.php");
session_start();
$db= $conn;
$tableName="testing";
$columns= ['ItemID', 'Name','Price','Category', 'Link','image'];
global $sorting; 
$sorting= "Price DESC";
global $filter;
$filter="All";
$find = result($db, $tableName, $columns, $sorting,$filter);

if (isset($_POST['id'])){
    $id= $_POST['id'];
    if(isset($_SESSION['cart'])){
        $exists = false;
        foreach ($_SESSION['cart'] as $item) {
            if ($item['product_id'] == $id) {
              $exists = true;
              break;
            }
        }
        if (!$exists) {
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $id,
                'quantity' => 1  
            );
            $_SESSION['cart'][$count] = $item_array;
            $count = count($_SESSION['cart']);
            echo $count;
        }
       
        
    }else{
        $item_array = array(
                'product_id' => $id,
                'quantity' => 1
        );
        
        $_SESSION['cart'][0] = $item_array;
        $count = count($_SESSION['cart']);
            echo $count;
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'sorting') {
    $sort= $_GET['sortOrder'];
    $sorting=$sort;
    
    $find = result($db, $tableName, $columns, $sorting,$filter);
    sorting($db, $sorting,$find);
    
   
}

function sorting($db, $sort,$find){
    $products='';
    
    $products = generateProductHTML($db, 'testing', ['ItemID','Name', 'Price', 'image'], $find);
    echo $products;
    
}
if (isset($_GET['action']) && $_GET['action'] == 'filtering') {
   $filter= $_GET['filter'];
   $sorting=$_GET['sortOrder'];
   $columnName = implode(", ", $columns);
   filtering($db,$columnName,$filter,$tableName,$find,$sorting);
}

function filtering($db,$columnName,$filter,$tableName,$find,$sorting){
   
  
   if($filter == "All"){
      $query = "SELECT ".$columnName." FROM $tableName WHERE Category = 'Headset' "." ORDER BY ".$sorting;
   }else {
    $query = "SELECT ".$columnName." FROM $tableName WHERE (Category = 'Headset' AND connectivity = '".$filter."') ORDER BY ".$sorting;}
   
   $result = $db->query($query);
   $find=$result;
   $products='';

   $products = generateProductHTML($db, 'testing', ['ItemID','Name', 'Price', 'image'], $find);
   echo $products;
   
}
function generateProductHTML($db, $tableName, $columns, $find) {
    
    $html = '';
    
    while ($row = mysqli_fetch_assoc($find)) {
        $html .= '<div class="products-container">';
        $html .= '<div class="product">';
        $html .= '<div class="product-content">';
        $html .= '<div class="product-img">';
        $html .= '<img src="data:image/jpeg;base64, ' . base64_encode($row['image'] ?? '') . '" height="200px" width="200px" alt="product Image">';
        $html .= '</div>';
        $html .= '<div class="product-btns">';
        $productid = ($row['ItemID'] ?? '');
        $html .= '<button type="button" class="btn-cart" name="add" value="add">add to cart<span></span></button>';
        $html .= '  <input type="hidden" name="product_id" value='. $productid .'>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="product-info">';
        $html .= '<a href="#" class="product-name">Name : ' . ($row['Name'] ?? '') . '</a>';
        $html .= '<p class="product-price">Price : Rs ' . ($row['Price'] ?? '') . '</p>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        
    }
   
    return $html;
}
function result($db, $tableName, $columns,$sorting,$filter){
    $columnName = implode(", ", $columns);
    global $filter;
    if($filter == "All"){
        $query = "SELECT ".$columnName." FROM $tableName WHERE Category = 'Headset' "." ORDER BY ".$sorting;
   }else {
    $query = "SELECT ".$columnName." FROM $tableName WHERE (Category = 'Headset' AND connectivity = '".$filter."') ORDER BY ".$sorting;}
   
    $result = $db->query($query);
    return $result;
}

?>