<?php
$servername = "localhost";
$username   = "phpuser";
$password   = "StrongPass@123";
$database   = "user_register";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
