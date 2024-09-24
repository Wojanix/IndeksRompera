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
if(isset($_GET["price"])){
  if(floatval($_GET["price"])>0 &&floatval($_GET["percent"])>0 &&floatval($_GET["quantity"])>0 ){
    $ir= bcdiv(floatval($_GET["quantity"])*floatval($_GET["percent"])*0.01/floatval($_GET["price"]),1,2);
  } 
  if($ir>0){
    $beforeRecord = mysqli_query($conn, "SELECT * from drink where ir>=".$ir." order by ir asc limit 1");
    $afterRecord = mysqli_query($conn, "SELECT * from drink where ir<".$ir." order by ir desc limit 1");
    $afterRecord = mysqli_fetch_row($afterRecord);
    $beforeRecord = mysqli_fetch_row($beforeRecord);
  }
}


?>



<div class="container">
        <h2>Oblicz Wskaźnik Rompera</h2>
        <br>
        <form action="" class='centerCol gap10'>
      <div><input required class="input" name="price" type="float" placeholder="Cena" /></div>
      <div><input required class="input" name="quantity" type="number" placeholder="Pojemność ml" /></div>
      <div><input required class="input" name="percent" type="number" placeholder="Procent" /></div>
      <button type="submit">Submit!</button>
      </form>
      <br>
      <div id="index"><?php if($ir>0) echo "Indeks Rompera dla twojej bestii to ".$ir;?></div>
      <div id="index"><?php if($ir>0) echo "Jest tuż przed ".$afterRecord["1"]." a za ".$beforeRecord["1"];  ?></div>
     
    </div>

  </body>
</html>