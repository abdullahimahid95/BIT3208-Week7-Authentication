<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "employee_portal";

$conn = mysqli_connect($host, $user, $password, $database);

if(!$conn){
    die("<p style='color:red;'>Connection Failed: " . mysqli_connect_error() . "</p>");
}
?>