<?php
session_start();

if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}

$e = $_SESSION['email'];   

require_once "database.php";

$sql = "SELECT * FROM users WHERE email = '$e'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $name = $row["full_name"];
    $phone = $row["phone"];
    $address = $row["address"];
  }
} else {
  echo "Sign-in error";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="account.css">

   
</head>
<body>



<div class="container">
    <h1>Account details</h1>
    <p>user ID: <?php echo "$id"?></p>
    <p>Full Name: <?php echo "$name"?></p>
    <p>Email: <?php echo "$e"?></p>
    <p>phone: <?php echo "$phone"?></p>
    <p>address: <?php echo "$address"?></p>
    <a href="logout.php" class="btn btn-warning">Logout</a>
    
</div>


</body>
</html>
