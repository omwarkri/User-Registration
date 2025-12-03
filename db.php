mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = mysqli_init();
mysqli_ssl_set($conn, null, null, null, null, null);
mysqli_options($conn, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, false);

$conn->real_connect(
    "db",
    "php-user",
    "StrongPass@123",
    "user_register",
    3306
);
