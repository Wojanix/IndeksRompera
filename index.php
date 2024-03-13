<!DOCTYPE html>
<html lang="pl" translate="no">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="main.css">
    <script src="script.js" defer></script>
    <title>Indeks Rompera</title>

  </head>
  <body>

    <div class="container">
      <div><input id="price" type="text" placeholder="Cena" /></div>
      <div><input id="amount" type="text" placeholder="Ml" /></div>
      <div><input id="percent" type="text" placeholder="procent" /></div>
      <button onclick="calculateRomperIndex()">Oblicz</button>
      <br />
      <div id="index"></div>
    </div>
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
echo "Connected successfully";

die;
?>
  </body>
</html>