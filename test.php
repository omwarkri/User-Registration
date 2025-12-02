<?php
$conn = new mysqli("localhost", "phpuser", "StrongPass@123", "user_register");

if ($conn->connect_error) {
    die("Failed: " . $conn->connect_error);
}
echo "Connected!";
?>
