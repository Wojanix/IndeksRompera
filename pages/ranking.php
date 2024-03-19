<!DOCTYPE html>
<html lang="pl" translate="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/ranking.css">
    <title>Ranking</title>
</head>
<body>
<div class="navbar">
  <a  href="../index.php"><i class="fa fa-fw fa-home"></i> Oblicz</a>
  <a class="active" href="ranking.php"><i class="fa fa-fw fa-envelope"></i> Ranking</a>
  <a href="map.php"><i class="fa fa-fw fa-envelope"></i> Mapa</a>
  <a href="add.php"><i class="fa fa-fw fa-user"></i> Dodaj</a>
  <a href="contact.php"><i class="fa fa-fw fa-user"></i> Kontakt</a>
</div>
<div class="container">

<table>
  <tr>
    <th>Miejsce</th>
    <th>Etykieta</th>
    <th>Nazwa</th>
    <th>Wskaźnik</th>
    <th>Punkty</th>
  </tr>
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



  $sql = "SELECT * from napoj";
  $result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["Id"]."  </td> <td>zdjecie</td><td>".$row["nazwa"]."</td><td>".$row["wskaznik"]."</td><td>". $row["ranking"]."/10</td>";
    echo "</tr>";
  }
} else {
  echo "0 results";
}


?>
</table>

</div>
</body>
</html>