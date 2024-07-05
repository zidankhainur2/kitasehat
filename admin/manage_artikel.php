<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: admin_login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kitasehat_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM articles WHERE id = $delete_id";
    if ($conn->query($sql) === TRUE) {
        $alertMessage = "Artikel berhasil dihapus.";
        $alertType = "success";
    } else {
        $alertMessage = "Error: " . $conn->error;
        $alertType = "error";
    }
}

$category = isset($_GET['category']) ? $conn->real_escape_string($_GET['category']) : '';

$sql = "SELECT * FROM articles";
if (!empty($category)) {
    $sql .= " WHERE category = '$category'";
}
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/pbw/build/assets/css/output.css" rel="stylesheet">
    <title>Manage Artikel</title>
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
            <h2 class="text-2xl font-bold">Manage Artikel</h2>
        </header>
        <main class="p-10 flex-1">
            <h2 class="text-3xl font-bold mb-4">Manage Artikel</h2>

            <?php if (!empty($alertMessage)): ?>
                <div class="mb-4 p-4 rounded <?php echo ($alertType == 'success') ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                    <?php echo $alertMessage; ?>
                </div>
            <?php endif; ?>

            <div class="mb-4">
                <label class="block text-gray-700">Filter berdasarkan Kategori</label>
                <select onchange="location = this.value;" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="manage_artikel.php">Semua Kategori</option>
                    <option value="manage_artikel.php?category=Kehamilan" <?php echo ($category == 'Kehamilan') ? 'selected' : ''; ?>>Kehamilan</option>
                    <option value="manage_artikel.php?category=Kebugaran" <?php echo ($category == 'Kebugaran') ? 'selected' : ''; ?>>Kebugaran</option>
                    <option value="manage_artikel.php?category=Pola+Tidur" <?php echo ($category == 'Pola Tidur') ? 'selected' : ''; ?>>Pola Tidur</option>
                    <option value="manage_artikel.php?category=Nutrisi" <?php echo ($category == 'Nutrisi') ? 'selected' : ''; ?>>Nutrisi</option>
                </select>
            </div>

            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-300">Judul</th>
                        <th class="py-2 px-4 border-b border-gray-300">Thumbnail</th>
                        <th class="py-2 px-4 border-b border-gray-300">Kategori</th>
                        <th class="py-2 px-4 border-b border-gray-300">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-300"><?php echo $row['title']; ?></td>
                            <td class="py-2 px-4 border-b border-gray-300"><img src="<?php echo $row['thumbnail']; ?>" alt="Thumbnail" class="h-16"></td>
                            <td class="py-2 px-4 border-b border-gray-300"><?php echo $row['category']; ?></td>
                            <td class="py-2 px-4 border-b border-gray-300">
                                <a href="edit_artikel.php?id=<?php echo $row['id']; ?>" class="text-blue-600 hover:underline">Edit</a> |
                                <a href="manage_artikel.php?delete_id=<?php echo $row['id']; ?>" class="text-red-600 hover:underline" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>

