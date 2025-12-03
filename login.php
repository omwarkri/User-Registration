<?php
session_start(); // Must be first line
include 'db.php'; // Make sure db.php contains $conn with mysqli_init() + SSL disabled

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Prepare statement
    $sql = "SELECT id, username, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            $_SESSION['message'] = "Invalid password!";
            $_SESSION['message_type'] = "error";
        }
    } else {
        $_SESSION['message'] = "No user found with that email!";
        $_SESSION['message_type'] = "error";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<style>
*{box-sizing:border-box;margin:0;padding:0;font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;}
body{background-color:#f5f5f5;display:flex;justify-content:center;align-items:center;min-height:100vh;padding:20px;}
.login-container{background-color:white;border-radius:10px;box-shadow:0 4px 12px rgba(0,0,0,0.1);padding:40px;width:100%;max-width:400px;}
h2{color:#333;text-align:center;margin-bottom:30px;font-size:24px;}
.form-group{margin-bottom:20px;}
input{width:100%;padding:12px 15px;border:1px solid #ddd;border-radius:5px;font-size:16px;transition:border-color 0.3s;}
input:focus{border-color:#4a90e2;outline:none;}
button{width:100%;padding:12px;background-color:#4a90e2;color:white;border:none;border-radius:5px;font-size:16px;font-weight:600;cursor:pointer;transition:background-color 0.3s;}
button:hover{background-color:#3a7bc8;}
.message{padding:12px;margin-bottom:20px;border-radius:5px;text-align:center;font-size:14px;}
.error{background-color:#ffebee;color:#c62828;border:1px solid #ef9a9a;}
.success{background-color:#e8f5e9;color:#2e7d32;border:1px solid #a5d6a7;}
.forgot-password{text-align:center;margin-top:15px;}
.forgot-password a{color:#4a90e2;text-decoration:none;font-size:14px;}
.forgot-password a:hover{text-decoration:underline;}
</style>
</head>
<body>
<div class="login-container">
<h2>Login to Your Account</h2>

<?php if(isset($_SESSION['message'])): ?>
<div class="message <?php echo isset($_SESSION['message_type']) ? $_SESSION['message_type'] : ''; ?>">
<?php 
    echo $_SESSION['message']; 
    unset($_SESSION['message']); 
    unset($_SESSION['message_type']);
?>
</div>
<?php endif; ?>

<form method="POST">
<div class="form-group">
<input type="email" name="email" placeholder="Email Address" required>
</div>

<div class="form-group">
<input type="password" name="password" placeholder="Password" required>
</div>

<button type="submit">Login</button>

<div class="forgot-password">
<a href="forgot-password.php">Forgot your password?</a>
</div>
</form>
</div>
</body>
</html>
