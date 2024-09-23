<!DOCTYPE html>
<html lang="pl" translate="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/add.css">
    <script src="../script.js" ></script>
</head>
<body>
  
<?php include '../components/header.php';?>

<div class="notification" id="connect"><img src=".././css/images/correct.png" alt="correct">Connected successfully</div>

<section class="container">

<form class="centerCol" action="" method="POST">
    <h2>Pochwal Się Swoją Bestią</h2>
  <span class="form">
   <input required class="input" name="name" id="name" type="text" placeholder="Nazwa" />
   <input required class="input" name="rating" id="rating" type="number" placeholder="0/10" />
   <input required class="input" name="image" id="image" type="text" placeholder="link z internetu do zdjecia" />
   <input required class="input" name="price" id="price" type="number" placeholder="Cena" />
   <input required class="input" name="quantity" id="quantity" type="number" placeholder="Ilość w ml" />
   <input required class="input" name="percent" id="percent" type="number" placeholder="Procent %" />
   <input required class="input" name="type" id="type" type="text" placeholder="Typ- jabol,piwo" />
   <input required class="input" name="brand" id="brand" type="text" placeholder="Marka" />
   <input required class="input" name="country" id="country" type="text" placeholder="Kraj" />
   <input required class="input" name="region" id="region" type="text" placeholder="Region np. Mazury" />
  </span>
  <button onclick="calculateAndSend()" type="submit" name="submit" id="submit">Wyślij</button>
  <div id="index"></div>
</form>
    
<?php

 
    
$servername = "localhost";
$username = "root";
$password = "";
$database = "indeksrompera";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
  die;
}
echo '<script type="text/javascript">',
'connected();',
'</script>';

if(isset($_POST["submit"])){
  echo $_POST["name"];
  $query = "INSERT INTO `drinks` (`Name`, `image`, `ir`, `rating`, `price`, `quantity`, `percent`, `type`, `brand`, `country`, `region`) 
            VALUES (
            '".$_POST["name"]."', 
            '".$_POST["image"]."', 
            '".$_POST["percent"]*$_POST["quantity"]*0.01/$_POST["price"]."', 
            '".$_POST["rating"]."', 
            '".$_POST["price"]."', 
            '".$_POST["quantity"]."', 
            '".$_POST["percent"]."', 
            '".$_POST["type"]."', 
            '".$_POST["brand"]."', 
            '".$_POST["country"]."', 
            '".$_POST["region"]."');";
  if(mysqli_query($conn, $query)){
    echo "<h3>data stored in a database successfully." 
        . " Please browse your localhost php my admin" 
        . " to view the updated data</h3>"; 
} else{
    echo "ERROR: Hush! Sorry $query. " 
        . mysqli_error($conn);
}
}

?>
</section>
</body>
</html>