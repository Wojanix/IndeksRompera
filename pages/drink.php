<!DOCTYPE html>
<html lang="pl" translate="no">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/ranking.css">
    <link rel="stylesheet" href="../css/drink.css">
    <script src="../script.js" ></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drink <?php
echo $_GET["id"];
?></title>
</head>
<body>
<?php include '../components/header.php';?>


<div class="avatar">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTKGEd8VVkp-l7AI52LMRpYVROpRTL3kVcm2w&s" alt="photo">
    </div>
<section class="drinkProfile">
    
    <div class="leftTop"> | Back </div>
    <div class="rightTop">| Change</div>

    <h2>Amarena</h2>
    <p class="shortT smallT">Napój winny typu jabol</p>
    <br>
    <p class="midT"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, vero aliquam? Omnis culpa dolor 
    </p>
    <div class="drinkInfo">
        <div><span class="numberDrinkInfo">5.99</span><span class="titleDrinkInfo">Price</span></div>
        <div><span class="numberDrinkInfo">9</span><span class="titleDrinkInfo">Availability</span></div>
        <div><span class="numberDrinkInfo">10/10</span><span class="titleDrinkInfo">Rating</span></div>
   
</div>

        <button>Show More</button>
    </section>
   <br><br><br>
   <p>sd</p>
   
</body>
</html>