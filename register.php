k<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Initialize connection
$conn = mysqli_init();

// Disable SSL (required for Docker MySQL 8+)
mysqli_ssl_set($conn, null, null, null, null, null);
mysqli_options($conn, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, false);

// Connect to Docker MySQL
$conn->real_connect(
    "db",               // MySQL container hostname
    "php-user",         // MySQL user from docker-compose
    "StrongPass@123",   // Password from docker-compose
    "user_register",    // Database name from docker-compose
    3306
);

// Optional: set charset
$conn->set_charset("utf8mb4");

