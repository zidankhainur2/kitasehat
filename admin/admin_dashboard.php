<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login_admin.html");
    exit();
}
?>

<?php
include 'config.php';

// Query untuk mengambil jumlah user yang sudah mendaftar
$sql_user = "SELECT COUNT(*) AS total_user FROM users";
$result_user = $conn->query($sql_user);
$row_user = $result_user->fetch_assoc();
$total_user = $row_user['total_user'];

// Query untuk mengambil jumlah admin yang sudah terdaftar
$sql_admin = "SELECT COUNT(*) AS total_admin FROM admins";
$result_admin = $conn->query($sql_admin);
$row_admin = $result_admin->fetch_assoc();
$total_admin = $row_admin['total_admin'];

// Query untuk mengambil jumlah artikel untuk setiap kategori
$sql_article = "SELECT Category, COUNT(*) AS total_article FROM articles GROUP BY Category";
$result_article = $conn->query($sql_article);

// Menyiapkan array untuk menyimpan jumlah artikel berdasarkan kategori
$article_data = array();
while ($row_article = $result_article->fetch_assoc()) {
    $article_data[$row_article['Category']] = $row_article['total_article'];
}

// Tutup koneksi database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/pbw/build/assets/css/output.css" rel="stylesheet">
    <title>Admin Dashboard</title>
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
            <h2 class="text-2xl font-bold">Admin Dashboard</h2>
        </header>
        <main class="p-10 flex-1">
            <h2 class="text-3xl font-bold mb-4">Informasi Admin</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Total User</h3>
                        <p class="text-gray-700"><?php echo $total_user; ?></p>
                    </div>
                </div>
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Total Admin</h3>
                        <p class="text-gray-700"><?php echo $total_admin; ?></p>
                    </div>
                </div>
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Total Artikel</h3>
                        <ul>
                            <?php foreach ($article_data as $category => $total) : ?>
                                <li><?php echo $category . ": " . $total; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
