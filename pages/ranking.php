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
 <section class="filters">

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






</section>

<!-- Table -->
<table>
<tr>
    <th>
        <?php echo "<a href='ranking.php?sort=rank&desc=".ifDesc("rank")."'>Rank</a>"; ?>
    </th>
    <th>
        <?php echo "<a href='ranking.php?sort=image&desc=".ifDesc("image")."'>Image</a>"; ?>
    </th>
    <th>
        <?php echo "<a href='ranking.php?sort=name&desc=".ifDesc("name")."'>Name</a>"; ?>
    </th>
    <th>
        <?php echo "<a href='ranking.php?sort=price&desc=".ifDesc("price")."'>Price</a>"; ?>
    </th>
    <th>
        <?php echo "<a href='ranking.php?sort=rating&desc=".ifDesc("rating")."'>Rating</a>"; ?>
    </th>
    <th>
        <?php echo "<a href='ranking.php?sort=quantity&desc=".ifDesc("quantity")."'>Quantity</a>"; ?>
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

$records = [
    ['rank' => 1, 'image' => 'https://example.com/whiskey1.jpg', 'name' => 'Highland Reserve', 'price' => 59.99, 'rating' => 4.8, 'quantity' => 75, 'brand' => 'Highland Spirits', 'region' => 'Scotland', 'country' => 'United Kingdom'],
    ['rank' => 2, 'image' => 'https://example.com/vodka1.jpg', 'name' => 'Crystal Clear Vodka', 'price' => 29.99, 'rating' => 4.5, 'quantity' => 150, 'brand' => 'Crystal Distillers', 'region' => 'Moscow', 'country' => 'Russia'],
    ['rank' => 3, 'image' => 'https://example.com/gin1.jpg', 'name' => 'London Dry Gin', 'price' => 34.99, 'rating' => 4.6, 'quantity' => 100, 'brand' => 'London Spirits', 'region' => 'London', 'country' => 'United Kingdom'],
    ['rank' => 4, 'image' => 'https://example.com/rum1.jpg', 'name' => 'Caribbean Gold Rum', 'price' => 39.99, 'rating' => 4.4, 'quantity' => 80, 'brand' => 'Island Liquors', 'region' => 'Caribbean', 'country' => 'Barbados'],
    ['rank' => 5, 'image' => 'https://example.com/tequila1.jpg', 'name' => 'Aztec Tequila', 'price' => 44.99, 'rating' => 4.7, 'quantity' => 90, 'brand' => 'Aztec Spirits', 'region' => 'Jalisco', 'country' => 'Mexico'],
    ['rank' => 6, 'image' => 'https://example.com/brandy1.jpg', 'name' => 'Fine French Brandy', 'price' => 54.99, 'rating' => 4.8, 'quantity' => 60, 'brand' => 'French Elegance', 'region' => 'Cognac', 'country' => 'France'],
    ['rank' => 7, 'image' => 'https://example.com/liqueur1.jpg', 'name' => 'Berry Liqueur', 'price' => 24.99, 'rating' => 4.3, 'quantity' => 200, 'brand' => 'Berry Delight', 'region' => 'Alsace', 'country' => 'France'],
    ['rank' => 8, 'image' => 'https://example.com/champagne1.jpg', 'name' => 'Vintage Champagne', 'price' => 89.99, 'rating' => 4.9, 'quantity' => 30, 'brand' => 'Champagne Royale', 'region' => 'Champagne', 'country' => 'France'],
    // ['rank' => 9, 'image' => 'https://example.com/whiskey2.jpg', 'name' => 'Smooth Bourbon', 'price' => 49.99, 'rating' => 4.6, 'quantity' => 70, 'brand' => 'Bourbon Masters', 'region' => 'Kentucky', 'country' => 'United States'],
    // ['rank' => 10, 'image' => 'https://example.com/vodka2.jpg', 'name' => 'Silver Label Vodka', 'price' => 32.99, 'rating' => 4.4, 'quantity' => 130, 'brand' => 'Silver Distillers', 'region' => 'St. Petersburg', 'country' => 'Russia'],
    // ['rank' => 11, 'image' => 'https://example.com/gin2.jpg', 'name' => 'Botanical Gin', 'price' => 37.99, 'rating' => 4.5, 'quantity' => 85, 'brand' => 'Botanical Blends', 'region' => 'Amsterdam', 'country' => 'Netherlands'],
    // ['rank' => 12, 'image' => 'https://example.com/rum2.jpg', 'name' => 'Aged Rum', 'price' => 42.99, 'rating' => 4.6, 'quantity' => 95, 'brand' => 'Aged Spirits', 'region' => 'Jamaica', 'country' => 'Jamaica'],
    // ['rank' => 13, 'image' => 'https://example.com/tequila2.jpg', 'name' => 'Silver Tequila', 'price' => 39.99, 'rating' => 4.4, 'quantity' => 110, 'brand' => 'Silver Agave', 'region' => 'Jalisco', 'country' => 'Mexico']
];

if(isset($_GET["sort"])) { sortRecords($records, htmlspecialchars($_GET["sort"]));}
if(isset($_GET["desc"])){$records = htmlspecialchars($_GET["desc"])==1 ? array_reverse($records):$records;}

foreach($records as $record){
    echo "<tr>
    <td>".$record["rank"]."</td>
    <td><img src='".$record["image"]."' alt='".$record["name"]."' style='width:50px;height:auto;'></td>
    <td>".$record["name"]."</td>
    <td>".$record["price"]."</td>
    <td>".$record["rating"]."</td>
    <td>".$record["quantity"]."</td>
    <td>".$record["brand"]."</td>
    <td>".$record["region"]."</td>
    <td>".$record["country"]."</td>
</tr>";
}
?>
</table>



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
?>

</body>
</html>