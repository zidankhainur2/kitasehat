<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "kitasehat_db"; // Ganti dengan nama database Anda

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitasi input
    $fullname = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['fullname']));
    $email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['email']));
    $password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['password']));
    $confirm_password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['confirm_password']));

    // Periksa apakah password dan konfirmasi password cocok
    if ($password != $confirm_password) {
        die("Passwords do not match!");
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data ke database
    $sql = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: /pbw/build/pages/login.html');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
