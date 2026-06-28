<?php
include 'includes/db.php';

$success = "";
$error = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if($fullname == "" || $email == "" || $department == "" || $_POST['password'] == ""){
        $error = "All fields are required.";
    } else {
        $check = mysqli_query($conn, "SELECT * FROM employees WHERE email='$email'");
        if(mysqli_num_rows($check) > 0){
            $error = "Email already registered.";
        } else {
            $query = "INSERT INTO employees(fullname, email, password, department) VALUES('$fullname', '$email', '$password', '$department')";
            if(mysqli_query($conn, $query)){
                $success = "Registration successful! You can now login.";
            } else {
                $error = "Error registering employee.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Portal - Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <h2>Employee Portal</h2>
        <h3>Create Account</h3>

        <?php if($success != ""): ?>
            <p class="success">✓ <?php echo $success; ?></p>
        <?php endif; ?>

        <?php if($error != ""): ?>
            <p class="error">✗ <?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="text" name="department" placeholder="Department" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn-submit">Register</button>
        </form>
        <br>
        <p style="text-align:center;">Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>