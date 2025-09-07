<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Database connection
$servername = "localhost";
$username = "root"; // Change for production
$password = "Radhakrushn1234";
$database = "registration-db";

try {
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Redirect to register page
    header("Location: register.php");
    exit();

} catch (Exception $e) {
    $_SESSION['message'] = $e->getMessage();
    $_SESSION['message_type'] = "error";
    // If database connection fails, show error page instead of redirecting
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Error</title>
        <style>
            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
            
            body {
                background-color: #f5f5f5;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                padding: 20px;
                text-align: center;
            }
            
            .error-container {
                background-color: white;
                border-radius: 10px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                padding: 40px;
                width: 100%;
                max-width: 600px;
            }
            
            h1 {
                color: #c62828;
                margin-bottom: 20px;
            }
            
            p {
                margin-bottom: 30px;
                color: #555;
                font-size: 18px;
            }
            
            a {
                color: #4a90e2;
                text-decoration: none;
                font-weight: 600;
            }
            
            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="error-container">
            <h1>Database Connection Error</h1>
            <p><?php echo htmlspecialchars($e->getMessage()); ?></p>
            <p>Please try again later or contact support if the problem persists.</p>
            <p><a href="register.php">Try to proceed anyway</a></p>
        </div>
    </body>
    </html>
    <?php
}
?>