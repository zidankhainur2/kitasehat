<?php
$autoload_path = '../../../vendor/autoload.php';
if (!file_exists($autoload_path)) {
    die("File autoload.php tidak ditemukan di path: $autoload_path");
}
require_once $autoload_path;

$client = new Google_Client(['client_id' => '181800930093-d8ouudl7ngrnt8no42bbn0f1onkfvcs9.apps.googleusercontent.com']);
$id_token = $_POST['credential'];

// Debugging: Cek apakah token diterima
if (!$id_token) {
    echo 'No ID token received';
    exit();
}

$payload = $client->verifyIdToken($id_token);

// Debugging: Cek apakah token valid
if (!$payload) {
    echo 'Invalid ID token';
    exit();
}

$userid = $payload['sub'];
$email = $payload['email'];
$fullname = $payload['name'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kitasehat_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User exists, start session
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['fullname'] = $fullname;
    $_SESSION['email'] = $email;
} else {
    // User does not exist, insert into database and start session
    $sql = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '')";
    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['fullname'] = $fullname;
        $_SESSION['email'] = $email;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit();
    }
}

$conn->close();

// Redirect to index.php
header('Location: /pbw/build/index.php');
exit();
?>