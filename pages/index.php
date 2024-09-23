<!DOCTYPE html>
<html lang="pl" translate="no">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/main.css">
   
    <script src="../script.js"></script>
    <title>Indeks Rompera</title>

  </head>
  <body>
  <?php include '../components/header.php';?>
    


  <div class="notification" id="connect"><img src=".././css/images/correct.png" alt="correct" />Connected successfully</div>

<!-- Menu -->
    
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
$ir = 0;
if(floatval($_GET["price"])>0 &&floatval($_GET["percent"])>0 &&floatval($_GET["quantity"])>0 ){$ir= bcdiv(floatval($_GET["quantity"])*floatval($_GET["percent"])*0.01/floatval($_GET["price"]),1,2);} 
$beforeRecord = mysqli_query($conn, "SELECT * from drinks where ir>=".$ir." order by ir asc limit 1");
$aferRecord = mysqli_query($conn, "SELECT * from drinks where ir<".$ir." order by ir desc limit 1");
?>



<div class="container">
        <h2>Oblicz Wskaźnik Rompera</h2>
        <br>
        <form action="">
      <div><input required class="input" name="price" type="float" placeholder="Cena" /></div>
      <div><input required class="input" name="quantity" type="number" placeholder="Pojemność ml" /></div>
      <div><input required class="input" name="percent" type="number" placeholder="Procent" /></div>
      <button type="submit">Submit!</button>
      </form>
      <div id="index"><?php if($ir>0) echo $ir;?></div>
     
    </div>

  </body>
</html>