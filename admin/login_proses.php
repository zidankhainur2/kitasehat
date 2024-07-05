<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check the user credentials
    $sql = "SELECT * FROM admins WHERE username = '$username' AND password = MD5('$password')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Set session variables
        $_SESSION['username'] = $username;
        header("Location: admin_dashboard.php"); // Redirect to admin dashboard
    } else {
        echo "Invalid username or password";
    }
}
?>
