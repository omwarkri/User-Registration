<?php
// Enable exceptions for mysqli
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Initialize connection
$conn = mysqli_init();

// Disable SSL checks (needed for Docker MySQL/MariaDB)
mysqli_ssl_set($conn, null, null, null, null, null);
mysqli_options($conn, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, false);

// Connect to MySQL container
$conn->real_connect(
    "db",               // Docker service name (from docker-compose.yml)
    "php-user",         // MySQL username
    "StrongPass@123",   // MySQL password
    "user_register",    // Database name
    3306                // MySQL port inside container
);

// Set charset
$conn->set_charset("utf8mb4");

// Optional: test connection (can comment out after working)
// if ($conn->connect_errno) {
//     die("Failed to connect to MySQL: " . $conn->connect_error);
// }
