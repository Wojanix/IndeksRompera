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
<div class="mc-menu">
  <!-- Button -->
  <button class="mc-button full">
    <span class="title">Singleplayer</span>
  </button>
  <button class="mc-button full">
    <span class="title">Multiplayer</span>
  </button>
  <button class="mc-button full">
    <span class="title">Minecraft Realms</span>
  </button>

  <!-- Double button -->
  <div class="double">
    <button class="mc-button full">
      <span class="title">Options</span>
    </button>
    <button class="mc-button full">
      <span class="title">Quit Game</span>
    </button>
  </div>

  <!-- Lang button -->
  <button class="mc-button full lang">
    <span class="title">
      <img src="https://i.ibb.co/99187Lk/lang.png" alt="Lang">
    </span>
  </button>
</div>

    <div class="container">
        <h2>Oblicz Wskaźnik Rompera</h2>
        <br>
      <div><input class="input" id="price" type="number" placeholder="Cena" /></div>
      <div><input class="input" id="amount" type="number" placeholder="Pojemność ml" /></div>
      <div><input class="input" id="percent" type="number" placeholder="Procent" /></div>
      <button onclick="calculateRomperIndex()">Oblicz</button>
      <div id="index"></div>
    </div>

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

?>
  </body>
</html>