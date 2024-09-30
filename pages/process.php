<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $thumb = $_POST['thumb'];
    $amount = $_POST['amount'];
    $id = $_POSR["id"];

    $newAmount = $amount;
    if($thumb=="up"){
        $newAmount++;
    } else if($thumb=="down"){
        $newAmount--;
    }


    // Example of how to connect to your database (using MySQLi or PDO)
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

    // Insert data into the database
    $sql = "UPDATE `comment` SET `likes` =".$newAmount." WHERE `comment`.`id` = ".$id.";";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
