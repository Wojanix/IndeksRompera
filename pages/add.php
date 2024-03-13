<!DOCTYPE html>
<html lang="pl" translate="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/add.css">
</head>
<body>
<div class="navbar">
  <a href="../index.php"><i class="fa fa-fw fa-home"></i> Oblicz</a>
  <a href="ranking.php"><i class="fa fa-fw fa-envelope"></i> Ranking</a>
  <a href="map.php"><i class="fa fa-fw fa-envelope"></i> Mapa</a>
  <a class="active" href="add.php"><i class="fa fa-fw fa-user"></i> Dodaj</a>
  <a href="contact.php"><i class="fa fa-fw fa-user"></i> Kontakt</a>
</div>

<div class="notification" id="connect"><img src=".././css/images/correct.png" alt="correct">Connected successfully</div>

    <div class="container">
        <!-- <h2>Pochwal Się Swoją Bestią</h2> -->
        <br>
        <span class="form">
       <input class="input" id="price" type="number" placeholder="Cena" />
      <input class="input" id="amount" type="number" placeholder="Pojemność" />
      <input class="input" id="percent" type="number" placeholder="Procent" />
     <input class="input" id="price" type="number" placeholder="Cena" />
     <input class="input" id="amount" type="number" placeholder="Pojemność" />
     <input class="input" id="percent" type="number" placeholder="Procent" />
      <input class="input" id="price" type="number" placeholder="Cena" />
      <input class="input" id="amount" type="number" placeholder="Pojemność" />
      <input class="input" id="percent" type="number" placeholder="Procent" />
      <input class="input" id="price" type="number" placeholder="Cena" />
      <input class="input" id="amount" type="number" placeholder="Pojemność" />
      <input class="input" id="percent" type="number" placeholder="Procent" />
      </span>
      <button onclick="calculateRomperIndex()">Oblicz</button>
      <div id="index"></div>
    </div>
    <script src="../script.js" ></script>
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