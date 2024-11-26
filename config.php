<?php
// Define database connection parameters
// require __DIR__ . '/vendor/autoload.php';
// use ircmaxell\passwordLib\PasswordHash;

$servername = "localhost";
$username = "root";
$password = "Achal@27";
$dbname = "expense"; 

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    // Optionally, you can echo a message to confirm successful connection
    echo "Connected successfully";
}

// Return the connection object to be used in other files
return $con;
?>
