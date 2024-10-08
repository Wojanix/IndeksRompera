<!DOCTYPE html>
<html lang="pl" translate="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../css/main.css">
    <script src="../script.js" ></script>
    <title>Ranking</title>
</head>
<body>
  
<?php include '../components/header.php';

$sort = "";
if(isset($_GET["sort"])){
    $sort = htmlspecialchars($_GET["sort"]);
}

function ifDesc($newSort){
    if(isset($_GET["desc"])){
        if($_GET["sort"]==$newSort&&($_GET["desc"]==false)){
            return 1;
        } else return 0;
    } else return 0;
}
?>

<div class="notification" id="connect"><img src=".././css/images/correct.png" alt="correct">Connected successfully</div>
<!-- Filters -->
<section class="rankingTable">
 <div class="leftTop"> <a href="ranking.php">| Cofnij</a> </div>
    <div class="rightTop"><a href="ranking.php">Edytuj |</a></div>

 <p class="hugeT">Ranking</p>
 <br>

 <div class="filters">
 <div class="glass">&#x1F50E;&#xFE0E;</div>
    <input type="text" name="search" id="search" placeholder="     Search...">
 <div class="dropdown">
    <div class="dropdown-button">Price v</div>
    <div class="dropdown-number">
        <input type="number" class="inputMinMax" name="minPrice" id="minPrice" placeholder="min">
        <input type="number" class="inputMinMax" name="maxPrice" id="maxPrice" placeholder="max">
    </div>
</div>
<div class="dropdown">
    <div class="dropdown-button">Indeks v</div>
    <div class="dropdown-number">
        <input type="number" class="inputMinMax" name="minPrice" id="minPrice" placeholder="min">
        <input type="number" class="inputMinMax" name="maxPrice" id="maxPrice" placeholder="max">
    </div>
</div>
<div class="dropdown">
    <div class="dropdown-button">Rating v</div>
    <div class="dropdown-number">
        <input type="number" class="inputMinMax" name="minPrice" id="minPrice" placeholder="min">
        <input type="number" class="inputMinMax" name="maxPrice" id="maxPrice" placeholder="max">
    </div>
</div>
 <div class="dropdown">
    <div class="dropdown-button">Type v</div>
    <div class="dropdown-content">
        <label><input type="checkbox" value="Beer"> Beer</label>
        <label><input type="checkbox" name="type" value="Wine"> Wine</label>
        <label><input type="checkbox" name="type" value="Gin"> Gin</label>
        <label><input type="checkbox" name="type" value="Rum"> Rum</label>
        <label><input type="checkbox" name="type" value="Tequila"> Tequila</label>
        <label><input type="checkbox" name="type" value="Vodka"> Vodka</label>
        <label><input type="checkbox" name="type" value="Whisky"> Whisky</label>
        <label><input type="checkbox" name="type" value="Champagne"> Champagne</label>
    </div>
</div>

<div class="dropdown">
    <div class="dropdown-button">Country v</div>
    <div class="dropdown-content">
    <label><input type="checkbox" value="Beer"> Beer</label>
    <label><input type="checkbox" name="country" value="Wine"> Wine</label>
    <label><input type="checkbox" name="country" value="Gin"> Gin</label>
    <label><input type="checkbox" name="country" value="Rum"> Rum</label>
    <label><input type="checkbox" name="country" value="Tequila"> Tequila</label>
    <label><input type="checkbox" name="country" value="Vodka"> Vodka</label>
    <label><input type="checkbox" name="country" value="Whisky"> Whisky</label>
    <label><input type="checkbox" name="country" value="Champagne"> Champagne</label>
    </div>
</div>

<button type="submit">Submit</button>
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




<!-- Table -->

<table>
<tr>
    <th class='idTd'>
        <?php echo "<a  href='ranking.php?sort=id&desc=".ifDesc("id")."'>Number</a>"; ?>
    </th>
    <th class='nameTd'>
        <?php echo "<a  href='ranking.php?sort=name&desc=".ifDesc("name")."'>Name</a>"; ?>
    </th>
    <th class='imageTd'>
        <?php echo "<a href='ranking.php?sort=image&desc=".ifDesc("image")."'>Image</a>"; ?>
    </th>
    <th class='indeksTd'>
        <?php echo "<a  href='ranking.php?sort=ir&desc=".ifDesc("ir")."'>Indeks</a>"; ?>
    </th>
    <th class='ratingTd'>
        <?php echo "<a  href='ranking.php?sort=rating&desc=".ifDesc("rating")."'>Rating</a>"; ?>
    </th>
    <th  class='priceTd'>
        <?php echo "<a href='ranking.php?sort=price&desc=".ifDesc("price")."'>Price</a>"; ?>
    </th>
    <th class='quantityTd'>
        <?php echo "<a  href='ranking.php?sort=quantity&desc=".ifDesc("quantity")."'>Quantity</a>"; ?>
    </th>
    <th class='percentTd'>
        <?php echo "<a  href='ranking.php?sort=percent&desc=".ifDesc("percent")."'>Percent</a>"; ?>
    </th>
    <th class='typeTd'>
        <?php echo "<a  href='ranking.php?sort=type&desc=".ifDesc("type")."'>Type</a>"; ?>
    </th>
    <th  class='brandTd'>
        <?php echo "<a href='ranking.php?sort=brand&desc=".ifDesc("brand")."'>Brand</a>"; ?>
    </th>
    <th class='regionTd'>
        <?php echo "<a href='ranking.php?sort=region&desc=".ifDesc("region")."'>Region</a>"; ?>
    </th>
    <th class='countryTd'>
        <?php echo "<a  href='ranking.php?sort=country&desc=".ifDesc("country")."'>Country</a>"; ?>
    </th>
</tr>


<?php
$sql = "SELECT * FROM drink"; 
$records = mysqli_query($conn, $sql);


if ($records) {
    $records = convertDatabaseResults($records);
    // print_r($formattedRecords);
} else {
    echo "Error: " . mysqli_error($conn);
}

if(isset($_GET["sort"])) { sortRecords($records, htmlspecialchars($_GET["sort"]));}
if(isset($_GET["desc"])){$records = htmlspecialchars($_GET["desc"])==1 ? array_reverse($records):$records;}

foreach($records as $record){
    echo "
    <tr onclick='window.location = `drink.php?id=`+this.cells[0].textContent'>
    <td class='idTd'>".$record["id"]."</td>
    <td>".$record["name"]."</td>
    <td class='imageTd'><img src='".$record["image"]."' alt='".$record["name"]."' style='width:150px;height:auto;'></td>
    <td class='indeksTd'>".$record["ir"]."</td>
    <td class='ratingTd'>".$record["rating"]."</td>
    <td class='priceTd'>".$record["price"]."</td>
    <td class='quantityTd'>".$record["quantity"]."</td>
    <td class='percentTd'>".$record["percent"]."</td>
    <td class='typeTd'>".$record["type"]."</td>
    <td class='brandTd'>".$record["brand"]."</td>
    <td class='regionTd'>".$record["region"]."</td>
    <td class='countryTd'>".$record["country"]."</td>
</tr>";
}
?>
</table>

</section>
<br><br>
<p>.</p>


<?php
function sortRecords(array &$records, string $sortKey) {
    usort($records, function ($a, $b) use ($sortKey) {
        if (!isset($a[$sortKey]) || !isset($b[$sortKey])) {
            return 0;
        }

        // Compare values based on the key
        if ($a[$sortKey] == $b[$sortKey]) {
            return 0;
        }
        if ($sortKey === 'ir'||$sortKey === 'rating'||$sortKey === 'price'||$sortKey === 'quantity'||$sortKey === 'percent') {
            return $a[$sortKey] <=> $b[$sortKey];
        }
        return strcmp($a[$sortKey], $b[$sortKey]);
    });
}

function convertDatabaseResults($resultArg) {
    // Initialize an empty array to hold the formatted records
    $formattedRecords = [];
    
    // Loop through each row fetched from the SQL result
    while ($row = mysqli_fetch_assoc($resultArg)) {
        // Map the database fields to the required format
        $formattedRecords[] = [
            'id' => $row['id'],     
            'name' => $row['name'],          // Adjust the key names to match your test array structure
            'image' => $row['image'],
            'ir' => $row['ir'],
            'rating' => floatval($row['rating']), // Convert rating to float
            'price' => floatval($row['price']),   // Convert price to float if necessary
            'quantity' => intval($row['quantity']), // Convert quantity to integer
            'percent' => intval($row['percent']), // Convert quantity to integer
            'type' => $row['type'], 
            'brand' => $row['brand'],
            'country' => $row['country'],
            'region' => $row['region']
        ];
    }

    return $formattedRecords;
}
?>

</body>
</html>