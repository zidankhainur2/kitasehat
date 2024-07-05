<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Mengenkripsi password dengan MD5

    // Query SQL untuk memeriksa apakah username sudah ada
    $check_username_sql = "SELECT * FROM admins WHERE username = '$username'";
    $check_username_result = $conn->query($check_username_sql);

    // Cek apakah username sudah ada dalam database
    if ($check_username_result->num_rows > 0) {
        $message = "Username sudah digunakan. Silakan gunakan username lain.";
    } else {
        // Query SQL untuk menyimpan data admin baru ke dalam tabel admins
        $insert_admin_sql = "INSERT INTO admins (username, password) VALUES ('$username', '$password')";

        if ($conn->query($insert_admin_sql) === TRUE) {
            $message = "Admin baru berhasil ditambahkan.";
        } else {
            $message = "Error: " . $insert_admin_sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/pbw/build/assets/css/output.css" rel="stylesheet">
    <title>Register Admin</title>
</head>
<body class="flex">
    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>

    <!-- Main content -->
    <div class="flex-1 flex flex-col lg:pl-64">
        <header class="bg-gray-100 p-4 flex justify-between items-center lg:hidden">
            <button id="menu-btn" class="text-gray-800 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <h2 class="text-2xl font-bold">Register Admin</h2>
        </header>
        <main class="p-10 flex-1">
            <h2 class="text-3xl font-bold mb-4">Tambah Admin Baru</h2>
            <!-- Form register admin -->
            <form action="register.php" method="post">
                <div class="mb-4">
                    <label class="block text-gray-700">Username</label>
                    <input type="text" name="username" class="w-full p-2 border border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Password</label>
                    <input type="password" name="password" class="w-full p-2 border border-gray-300 rounded-md" required>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Register</button>
            </form>
            <!-- End form register admin -->
            <!-- Display success or error message -->
            <?php if (isset($message)) : ?>
                <div class="mt-4 p-4 rounded <?php echo ($message == "Admin baru berhasil ditambahkan.") ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <!-- End message -->
        </main>
    </div>
</body>
</html>
