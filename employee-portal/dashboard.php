<?php
session_start();

if(!isset($_SESSION['employee'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Portal - Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="welcome-container">
        <h2>Employee Portal</h2>
        <h3 style="color:#27AE60;">✓ Welcome, <?php echo $_SESSION['employee']; ?>!</h3>
        <p style="color:#2C3E50;">Department: <strong><?php echo $_SESSION['department']; ?></strong></p>
        <p>You are successfully logged in to the Employee Portal.</p>
        <p>Session ID: <strong><?php echo session_id(); ?></strong></p>
        <br>
        <a href="logout.php"><button class="logout-btn">Logout</button></a>
    </div>
</body>
</html>