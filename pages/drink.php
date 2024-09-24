<!DOCTYPE html>
<html lang="pl" translate="no">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css">
    <script src="../script.js" ></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drink <?php
echo $_GET["id"];
?></title>
</head>
<body>
<?php include '../components/header.php';?>

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


$sql = "SELECT * FROM drink WHERE id like ".$_GET["id"]." LIMIT 1"; 
$result = mysqli_query($conn, $sql);

$record = mysqli_fetch_assoc($result);
?>


<div class="avatar">
        <?php echo  "<img src='".$record["image"]."' alt='name'/>"?>
    </div>
<section class="drinkProfile">
    
    <div class="leftTop"> <a href="ranking.php">| Cofnij</a> </div>
    <div class="rightTop"><a onclick="displayComments()">Komentarz +</a></div>

    <div class="bigT"><?php echo  $record["name"];?></div>
    <p class="shortT smallT">Napój typu <?php echo  $record["type"];?></p>
    <br>
    <p class="midT"> <?php echo "VERY GOOD ALCOHOL JEST Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor molestiae assumenda" ;?>
    </p>
    <div class="drinkInfo">
        <div><span class="numberDrinkInfo"><?php echo  $record["price"];?></span><span class="titleDrinkInfo">Price</span></div>
        <div><span class="numberDrinkInfo"><?php echo  $record["ir"];?></span><span class="titleDrinkInfo">IR</span></div>
        <div><span class="numberDrinkInfo"><?php echo  $record["rating"];?></span><span class="titleDrinkInfo">Rating</span></div>
   
</div>

        <button onclick="displayComments()">Show More</button>
        <section id="commentContainer" style="display: none;">
            <br>
        <?php
$sql = "SELECT * FROM comment where drink_id like ".$record["id"]; 
$records = mysqli_query($conn, $sql);


echo "<div class='addComment'>
        <textarea rows='4' cols='50' placeholder='Write your comment'></textarea>
        <div>
            <button class='smallbutton'>Submit</button>
        </div>
    </div>";

if(mysqli_num_rows($records) === 0){
    echo "
        <div class='comment'>
            <div class='commentContent'>
                No comments yet!
            </div>
        </div>";
} else{
    foreach($records as $record){
        echo "
        <div class='comment'>
            <div class='commentUser'>".
                $record["user_id"].
            "</div>
            <div class='commentContent'>".
                $record["content"]."
            </div>
            <div class='likes'>
                <span class='like'>&#128077;".$record["likes"]."</span>
                <span class='like'>&#x1F44E;".$record["dislikes"]."</span>
            </div>
        </div>";
    } 
}



?>

        </section>
    </section>
   
</body>
</html>