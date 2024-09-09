<!DOCTYPE html>
<html lang="pl" translate="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/nav.css">
    <title>Ranking</title>
</head>
<body>
  
<?php include '../components/header.php';

$sort = "";
if(isset($_GET["sort"])){
    $sort = htmlspecialchars($_GET["sort"]);
}

?>



<!-- Table -->
<table>
<tr>
    <th>
        <?php echo "<a href='ranking.php?sort=name&again=".$sort."'>Name</a>"; ?>
    </th>
    <th>
    <?php echo "<a href='ranking.php?sort=rating&again=".$sort."'>IR</a>"; ?>
    </th>
    <th>
    <?php echo "<a href='ranking.php?sort=author&again=".$sort."'>Author</a>"; ?>
    </th>
</tr>

<?php

$records = [
    ["name" => "Jameson", "rating" => 8, "author" => "Ireland"],
    ["name" => "Belvedere", "rating" => 8, "author" => "Poland"],
    ["name" => "Bacardi", "rating" => 8, "author" => "Cuba"],
    ["name" => "Budweiser", "rating" => 6, "author" => "USA"],
    ["name" => "Glenfiddich", "rating" => 8, "author" => "Scotland"],
    ["name" => "Sapporo", "rating" => 6, "author" => "Japan"],
    ["name" => "Patrón", "rating" => 9, "author" => "Mexico"],
    ["name" => "Heineken", "rating" => 7, "author" => "Netherlands"],
    ["name" => "Moët & Chandon", "rating" => 9, "author" => "France"],
    ["name" => "Laphroaig", "rating" => 9, "author" => "Scotland"],
    ["name" => "Jack Daniel's", "rating" => 8, "author" => "USA"],
    ["name" => "Tanqueray", "rating" => 7, "author" => "England"],
    ["name" => "Ciroc", "rating" => 7, "author" => "France"],
    ["name" => "Smirnoff", "rating" => 6, "author" => "Russia"],
    ["name" => "Chivas Regal", "rating" => 9, "author" => "Scotland"],
    ["name" => "Bombay Sapphire", "rating" => 8, "author" => "England"],
    ["name" => "Guinness", "rating" => 7, "author" => "Ireland"],
    ["name" => "Miller Lite", "rating" => 6, "author" => "USA"],
    ["name" => "Absolute Vodka", "rating" => 7, "author" => "Sweden"],
    ["name" => "Bulleit Bourbon", "rating" => 7, "author" => "USA"],
    ["name" => "X-Rated Fusion", "rating" => 5, "author" => "France"],
    ["name" => "Aberlour", "rating" => 8, "author" => "Scotland"]
];

if(isset($_GET["sort"])) { sortRecords($records, htmlspecialchars($_GET["sort"]));}
if(isset($_GET["again"])){$records = htmlspecialchars($_GET["sort"])===htmlspecialchars($_GET["again"]) ? array_reverse($records):$records;}

foreach($records as $record){
    echo "<tr><th>".$record["name"]."</th><th>".$record["rating"]."</th><th>".$record["author"]."</th></tr>";
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