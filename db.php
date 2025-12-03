<?php
// db.php
$servername = "localhost";
$username   = "root";       // your MySQL username
$password   = "";           // your MySQL password
$database   = "user_register";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
