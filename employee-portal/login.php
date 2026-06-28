<?php
session_start();

if(isset($_SESSION['employee'])){
    header("Location: dashboard.php");
    exit();
}

include 'includes/db.php';

$error = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM employees WHERE email='$email'");
    $employee = mysqli_fetch_assoc($result);

    if($employee && password_verify($password, $employee['password'])){
        $_SESSION['employee'] = $employee['fullname'];
        $_SESSION['employee_id'] = $employee['id'];
        $_SESSION['department'] = $employee['department'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Portal - Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <h2>Employee Portal</h2>
        <h3>Login to Your Account</h3>

        <?php if($error != ""): ?>
            <p class="error">✗ <?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn-submit">Login</button>
        </form>
        <br>
        <p style="text-align:center;">Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>