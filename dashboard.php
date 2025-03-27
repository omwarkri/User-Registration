<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        header {
            background-color: #4a90e2;
            color: white;
            padding: 20px 40px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 24px;
            font-weight: 600;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .logout-btn {
            background-color: white;
            color: #4a90e2;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 14px;
        }
        
        .logout-btn:hover {
            background-color: #e6f0ff;
            transform: translateY(-1px);
        }
        
        main {
            flex: 1;
            padding: 40px;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }
        
        .welcome-section {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }
        
        h1 {
            color: #333;
            margin-bottom: 10px;
            font-size: 28px;
        }
        
        .welcome-text {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
        }
        
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }
        
        .card {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        
        .card h3 {
            color: #4a90e2;
            margin-bottom: 15px;
            font-size: 18px;
        }
        
        .card p {
            color: #666;
            font-size: 14px;
            line-height: 1.5;
        }
        
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 14px;
        }
        
        @media (max-width: 768px) {
            header {
                padding: 15px 20px;
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            main {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">MyApp</div>
        <div class="user-info">
            <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </header>
    
    <main>
        <section class="welcome-section">
            <h1>Dashboard Overview</h1>
            <p class="welcome-text">Welcome back to your personalized dashboard. Here's what's happening today.</p>
        </section>
        
        <div class="dashboard-grid">
            <div class="card">
                <h3>Recent Activity</h3>
                <p>You have 3 new notifications. Check your activity feed for more details.</p>
            </div>
            
            <div class="card">
                <h3>Your Profile</h3>
                <p>Complete your profile setup to unlock all features of our platform.</p>
            </div>
            
            <div class="card">
                <h3>Statistics</h3>
                <p>View your usage statistics and performance metrics for this month.</p>
            </div>
            
            <div class="card">
                <a href="http://localhost/todolist/">MyToDo</a>
                <p>Access frequently used features and shortcuts from this panel.</p>
            </div>
        </div>
    </main>
    
    <footer>
        &copy; <?php echo date('Y'); ?> MyApp. All rights reserved.
    </footer>
</body>
</html>