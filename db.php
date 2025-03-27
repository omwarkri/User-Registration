<?php
$servername = "localhost";
$username = "root"; // Change for live server
$password = "";
$database = "user_auth";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
