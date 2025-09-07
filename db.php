<?php
$servername = "localhost";
$username = "root"; // Change for live server
$password = "Radhakrushn1234";
$database = "registration-db"; // Change for live server    

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
