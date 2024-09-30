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

<div style="display:none;" class="notification correct" id="connect"><img src=".././css/images/correct.png" alt="correct">Connected successfully</div>
<div style="display:none;" class="notification correct" id="dataSent"><img src=".././css/images/correct.png" alt="sent">Data sent</div>
<div style="display:none;" class="notification error" id="dataError"><img src=".././css/images/error.png" alt="error">Data error</div>
<script>
     $(document).ready(function() {
    $('.like, .dislike').on('click', function() {
        var drinkID = $(this).data('drink-id');
        var userID = $(this).data('user-id');
        var type = $(this).data('type'); // 'like' or 'dislike'

        console.log(type)
        
        $.ajax({
            url: 'process.php',
            type: 'POST',
            data: {
                drink_id: drinkID,
                user_id: userID,
                action_type: type
            },
            success: function(response) {
                // Update the like or dislike count based on the response
                if (type === 'like') {
                    $('.like-count').text(response.likes);
                } else if (type === 'dislike') {
                    $('.dislike-count').text(response.dislikes);
                }
            },
            error: function() {
                alert('An error occurred. Please try again.');
            }
        });
    });
});

    </script>

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

if(isset($_POST["submit"])){
    $query = "INSERT INTO `comment` (`drink_id`, `user_id`, `content`) VALUES (".$_GET["id"].", '5', '".$_POST["textarea"]."');"; //zmien 5 na user id
    if(mysqli_query($conn, $query)){
        echo '<script type="text/javascript">',
        'dataSent();',
        '</script>';
  } else{echo '<script type="text/javascript">',
    'dataError();',
    '</script>';
  }
  }

$sql = "SELECT * FROM drink WHERE id like ".$_GET["id"]." LIMIT 1"; 
$result = mysqli_query($conn, $sql);

$record = mysqli_fetch_assoc($result);
?>

<!-- start of html code -->
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


$sql = "SELECT * FROM comment where drink_id like ".$_GET["id"]; 
$records = mysqli_query($conn, $sql);




echo "
<form action='' method='POST'><div class='addComment'>
        <textarea rows='4' cols='50' placeholder='Write your comment' required name='textarea'></textarea>
        <div>
            <button class='smallbutton' type='submit' name='submit'>Submit</button>
        </div>
    </div></form>";

if(mysqli_num_rows($records) === 0){
    echo "
        <div class='comment noComment'>
            <div class='commentContent'>
                No comments yet!
            </div>
        </div>";
} else{
    foreach($records as $comment){
        echo "
        <div class='comment'>
            <div class='commentUser'>".
                $comment["user_id"].
            "</div>
            <div class='commentContent'>".
                $comment["content"]."
            </div>
            <div class='likes'>
            <span class='like' data-id='<?=".$comment["id"]."?>' data-user-id='<?=".$comment["user_id"]."?>' data-type='like'>
                &#128077; <span class='like'>".$comment["likes"]."</span>
            </span>
            <span class='dislike' data-id='<?=".$comment["id"]."?>' data-user-id='<?=".$comment["user_id"]."?>' data-type='dislike'>
                &#x1F44E; <span class='like'>".$comment["dislikes"]."</span>
            </span>

            </div>
        </div>";
    } 
}



?>

        </section>
    </section>
   
</body>
</html>