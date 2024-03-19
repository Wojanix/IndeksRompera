<!DOCTYPE html>
<html lang="pl" translate="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/add.css">
    <link rel="stylesheet" href="../css/stars.css">

    <script src="../js/star.js" defer></script>
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
        <h2>Pochwal Się Swoją Bestią</h2>
        <br>

        <form action="" method="post" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form">
       <input class="input" name="nazwa" type="text" placeholder="Nazwa" />
      <input class="input" name="marka" type="text" placeholder="Marka" />
      <input class="input" name="cena" type="number" placeholder="Cena" />
     <input class="input" name="ilosc" type="text" placeholder="Ilosc" />
     <input class="input" name="procent" type="number" placeholder="Procent" />
      <input class="input" name="dostepnosc" type="number" placeholder="Dostepnosc /10" />
      <input class="input" name="smak" type="number" placeholder="Smak /10" />
      <input class="input" name="kolor" type="text" placeholder="Kolor" />
      <input class="input" name="rodzaj" type="text" placeholder="Rodzaj" />
      <input class="input" name="typ" type="text" placeholder="Typ" />
      <input id="star-value" name="ranking" class="star_value" type="number" />
  

    </div>
    
    <div class="center"><h3>Ranking</h3></div>
      
    
      
<div class="star-source">
  <svg>
         <linearGradient x1="50%" y1="5.41294643%" x2="87.5527344%" y2="65.4921875%" id="grad">
            <stop stop-color="#e6b400" offset="0%"></stop>
            <stop stop-color="#e6cc00" offset="60%"></stop>
            <stop stop-color="#e6b400" offset="100%"></stop>
        </linearGradient>
    <symbol id="star" viewBox="153 89 106 108">   
      <polygon id="star-shape" stroke="url(#grad)" stroke-width="5" fill="currentColor" points="206 162.5 176.610737 185.45085 189.356511 150.407797 158.447174 129.54915 195.713758 130.842203 206 95 216.286242 130.842203 253.552826 129.54915 222.643489 150.407797 235.389263 185.45085"></polygon>
    </symbol>
</svg>

</div>
<div class="star-container">
  <input type="radio" name="star" id="five" onchange="changeStarValue(5)">
  <label for="five">
    <svg class="star">
      <use xlink:href="#star"/>
    </svg>
  </label>
  <input type="radio" name="star" id="four" onchange="changeStarValue(4)">
  <label for="four">
    <svg class="star">
      <use xlink:href="#star"/>
    </svg>
  </label>
  <input type="radio" name="star" id="three" onchange="changeStarValue(3)">
  <label for="three">
    <svg class="star">
      <use xlink:href="#star"/>
    </svg>
  </label>
  <input type="radio" name="star" id="two" onchange="changeStarValue(2)">
  <label for="two">
    <svg class="star">
      <use xlink:href="#star" />
    </svg>
  </label>
  <input type="radio" name="star" id="one" onchange="changeStarValue(1)" >
  <label for="one">
   <svg class="star">
    <use xlink:href="#star" />
   </svg>
  </label>

</div>
<div class="center">
<button type="submit" name="button" formmethod="post">Dodaj</button>
</div>
</form>




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
}
echo '<script type="text/javascript">',
'connected();',
'</script>';


if(isset($_POST['button'])){ 

  $sql = "INSERT INTO napoj (nazwa, marka, cena, ilosc, procent, wskaznik, ranking, dostepnosc, smak, kolor, rodzaj, typ)
  VALUES ('".$_POST['nazwa']."', '".$_POST['marka']."', '".$_POST['cena']."', '".$_POST['ilosc']."', '".$_POST['procent']."', '".$_POST['procent']*$_POST['ilosc']*0.01/$_POST['cena']."', '".$_POST['ranking']."', '".$_POST['dostepnosc']."', '".$_POST['smak']."', '".$_POST['kolor']."', '".$_POST['rodzaj']."', '".$_POST['typ']."')";
  $result = $conn->query($sql);


  
}    

?>
</div>
<!-- container -->
</body>
</html>