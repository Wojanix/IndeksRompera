<!DOCTYPE html>
<html lang="pl" translate="no">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="nav.css">
   
    
    <title>Indeks Rompera</title>

  </head>
  <body>

    <div class="navbar">
  <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="#"><i class="fa fa-fw fa-search"></i> Search</a>
  <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a>
  <a href="#"><i class="fa fa-fw fa-user"></i> Login</a>
</div>


<div class="notification" id="connect"><img src="./correct.png" alt="correct">Connected successfully</div>

    <div class="container">
        <h2>Oblicz Wskaźnik Readera</h2>
        <br>
      <div><input class="input" id="price" type="number" placeholder="Cena" /></div>
      <div><input class="input" id="amount" type="number" placeholder="Pojemność" /></div>
      <div><input class="input" id="percent" type="number" placeholder="Procent" /></div>
      <button onclick="calculateRomperIndex()">Oblicz</button>
      <div id="index"></div>
    </div>
    <script src="script.js" ></script>
    <?php


// $servername = "serwer2396565.home.pl";
// $username = "37544078_indeksrompera";
// $password = "<Romper123>";
// $database = "37544078_indeksrompera";

$servername = "localhost";
$username = "admin3";
$password = "admin3";
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

die;
?>
  </body>
</html>