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

<!-- Filters -->
<div class="notification" id="connect"><img src=".././css/images/correct.png" alt="correct">Connected successfully</div>




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
 <section class="rankingTable">
 <div class="leftTop"> <a href="ranking.php">| Cofnij</a> </div>
    <div class="rightTop"><a href="ranking.php">Edytuj |</a></div>

 <p class="hugeT">Ranking</p>
 <br>
 <div class="dropdown">
    <div class="dropdown-button">Type    v</div>
    <div class="dropdown-content">
    <label><input type="checkbox" value="Beer"> Beer</label>
<label><input type="checkbox" value="Wine"> Wine</label>
<label><input type="checkbox" value="Gin"> Gin</label>
<label><input type="checkbox" value="Rum"> Rum</label>
<label><input type="checkbox" value="Tequila"> Tequila</label>
<label><input type="checkbox" value="Vodka"> Vodka</label>
<label><input type="checkbox" value="Whisky"> Whisky</label>
<label><input type="checkbox" value="Champagne"> Champagne</label>

    </div>
</div>
<table>
<tr>
    <th>
        <?php echo "<a href='ranking.php?sort=id&desc=".ifDesc("id")."'>Number</a>"; ?>
    </th>
    <th>
        <?php echo "<a href='ranking.php?sort=name&desc=".ifDesc("name")."'>Name</a>"; ?>
    </th>
    <th>
        <?php echo "<a href='ranking.php?sort=image&desc=".ifDesc("image")."'>Image</a>"; ?>
    </th>
    <th>
        <?php echo "<a href='ranking.php?sort=ir&desc=".ifDesc("ir")."'>Indeks</a>"; ?>
    </th>
    <th>
        <?php echo "<a href='ranking.php?sort=rating&desc=".ifDesc("rating")."'>Rating</a>"; ?>
    </th>
    <th>
        <?php echo "<a href='ranking.php?sort=price&desc=".ifDesc("price")."'>Price</a>"; ?>
    </th>
    <th>
        <?php echo "<a href='ranking.php?sort=quantity&desc=".ifDesc("quantity")."'>Quantity</a>"; ?>
    </th>
    <th>
        <?php echo "<a href='ranking.php?sort=percent&desc=".ifDesc("percent")."'>Percent</a>"; ?>
    </th>
    <th>
        <?php echo "<a href='ranking.php?sort=type&desc=".ifDesc("type")."'>Type</a>"; ?>
    </th>
    <th>
        <?php echo "<a href='ranking.php?sort=brand&desc=".ifDesc("brand")."'>Brand</a>"; ?>
    </th>
    <th>
        <?php echo "<a href='ranking.php?sort=region&desc=".ifDesc("region")."'>Region</a>"; ?>
    </th>
    <th>
        <?php echo "<a href='ranking.php?sort=country&desc=".ifDesc("country")."'>Country</a>"; ?>
    </th>
</tr>


<?php
$sql = "SELECT * FROM drinks"; 
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
    <td>".$record["id"]."</td>
    <td>".$record["name"]."</td>
    <td><img src='".$record["image"]."' alt='".$record["name"]."' style='width:150px;height:auto;'></td>
    <td>".$record["ir"]."</td>
    <td>".$record["rating"]."</td>
    <td>".$record["price"]."</td>
    <td>".$record["quantity"]."</td>
    <td>".$record["percent"]."</td>
    <td>".$record["type"]."</td>
    <td>".$record["brand"]."</td>
    <td>".$record["region"]."</td>
    <td>".$record["country"]."</td>
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
        if ($sortKey === 'rating') {
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