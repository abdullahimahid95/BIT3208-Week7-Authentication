<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal - Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="welcome-container">
        <h2>Student Portal</h2>
        <h3 style="color:#27AE60;">✓ Welcome, <?php echo $_SESSION['user']; ?>!</h3>
        <p style="color:#2C3E50;">You are successfully logged in to the Student Portal.</p>
        <p>Session ID: <strong><?php echo session_id(); ?></strong></p>
        <br>
        <a href="logout.php"><button class="logout-btn">Logout</button></a>
    </div>
</body>
</html>