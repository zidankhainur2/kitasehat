<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: admin_login.php");
    exit();
}

$alertMessage = "";
$alertType = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kitasehat_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);
    $category = $conn->real_escape_string($_POST['category']);

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["thumbnail"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $alertMessage = "File is not an image.";
        $alertType = "error";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        $alertMessage = "Sorry, file already exists.";
        $alertType = "error";
        $uploadOk = 0;
    }

    if ($_FILES["thumbnail"]["size"] > 5000000) {
        $alertMessage = "Sorry, your file is too large.";
        $alertType = "error";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $alertMessage = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $alertType = "error";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        if (empty($alertMessage)) {
            $alertMessage = "Sorry, your file was not uploaded.";
            $alertType = "error";
        }
    } else {
        if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
            $thumbnail = "/pbw/uploads/" . basename($_FILES["thumbnail"]["name"]);
            $sql = "INSERT INTO articles (title, thumbnail, content, category) VALUES ('$title', '$thumbnail', '$content', '$category')";
            
            if ($conn->query($sql) === TRUE) {
                $alertMessage = "New article uploaded successfully";
                $alertType = "success";
            } else {
                $alertMessage = "Error: " . $sql . "<br>" . $conn->error;
                $alertType = "error";
            }
        } else {
            $alertMessage = "Sorry, there was an error uploading your file.";
            $alertType = "error";
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/pbw/build/assets/css/output.css" rel="stylesheet">
    <title>Upload Artikel</title>
</head>
<body class="flex">
    <?php include 'sidebar.php'; ?>

    <div class="flex-1 flex flex-col lg:pl-64">
        <header class="bg-gray-100 p-4 flex justify-between items-center lg:hidden">
            <button id="menu-btn" class="text-gray-800 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <h2 class="text-2xl font-bold">Upload Artikel</h2>
        </header>
        <main class="p-10 flex-1">
            <h2 class="text-3xl font-bold mb-4">Upload Artikel</h2>

            <?php if (!empty($alertMessage)): ?>
                <div class="mb-4 p-4 rounded <?php echo ($alertType == 'success') ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                    <?php echo $alertMessage; ?>
                </div>
            <?php endif; ?>

            <form action="upload_artikel.php" method="post" enctype="multipart/form-data">
                <div class="mb-4">
                    <label class="block text-gray-700">Judul Artikel</label>
                    <input type="text" name="title" class="w-full p-2 border border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Thumbnail</label>
                    <input type="file" name="thumbnail" class="w-full p-2 border border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Kategori</label>
                    <select name="category" class="w-full p-2 border border-gray-300 rounded-md" required>
                        <option value="Kehamilan">Kehamilan</option>
                        <option value="Kebugaran">Kebugaran</option>
                        <option value="Pola Tidur">Pola Tidur</option>
                        <option value="Nutrisi">Nutrisi</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Isi Artikel</label>
                    <textarea name="content" class="w-full p-2 border border-gray-300 rounded-md" rows="10" required></textarea>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Upload</button>
            </form>
        </main>
    </div>
</body>
</html>
