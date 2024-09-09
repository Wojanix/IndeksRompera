<!DOCTYPE html>
<html lang="pl" translate="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reels</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/nav.css">
</head>
<body>
  
<?php include '../components/header.php';?>



<?php
// Lorem Picsum API URL for random images
$url = "https://picsum.photos/v2/list?page=1&limit=5";

// Initialize a cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request and get the response
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    // Decode the JSON response
    $data = json_decode($response, true);
    
    // Debug output
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    
    // Check if the response contains data
    if (is_array($data)) {
        // Output the image data
        foreach ($data as $photo) {
            echo "ID: " . $photo['id'] . "<br>";
            echo "Author: " . $photo['author'] . "<br>";
            echo "Image URL: <a href='" . $photo['download_url'] . "'>" . $photo['download_url'] . "</a><br>";
            echo "<img src='" . $photo['download_url'] . "' alt='Image' width='100'><br>";
            echo "<hr>";
        }
    } else {
        echo "No data found in the response.";
    }
}

// Close the cURL session
curl_close($ch);
?>

</body>
</html>