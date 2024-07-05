<?php
include 'config.php';

$sql = "SELECT id, fullname, email FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/pbw/build/assets/css/output.css" rel="stylesheet">
    <title>Akun</title>
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
            <h2 class="text-2xl font-bold">Akun</h2>
        </header>
        <main class="p-10 flex-1">
            <h2 class="text-3xl font-bold mb-4">Daftar Akun</h2>
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr>
                        <th class="border-b p-4">ID</th>
                        <th class="border-b p-4">Nama Lengkap</th>
                        <th class="border-b p-4">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='border-b p-4'>" . $row["id"] . "</td>";
                            echo "<td class='border-b p-4'>" . $row["fullname"] . "</td>";
                            echo "<td class='border-b p-4'>" . $row["email"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3' class='border-b p-4 text-center'>No users found</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>
