<?php
$servername = "localhost";
$username = "root"; // Change for live server
<<<<<<< HEAD
$password = "Radhakrushn1234";
$database = "registration-db"; // Change for live server    
=======
$password = "Radhakrushn@1234";
$database = "user_auth";
>>>>>>> 184ab10acb6fe9d1bc6901c94061ce4e9f549efb

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
