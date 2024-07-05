<?php
// Lakukan koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kitasehat_db";

$conn = new mysqli($servername, $username, $password, $dbname);

?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KitaSehat</title>
    <!-- output css -->
    <link rel="stylesheet" href="/pbw/build/assets/css/output.css">
    <link rel="stylesheet" href="/pbw/build/assets/css/navbar.css">
    <!-- Icon -->
    <link rel="icon" href="/pbw/build/assets/img/logo.png">
    <!-- SWIPER CSS -->
    <link rel="stylesheet" href="/pbw/src/swiper-bundle.min.css">
</head>
<body class="bg-rose-300">
     <!-- Navbar Start -->
     <header
      class="bg-transparent absolute top-0 left-0 w-full flex items-center z-20"
    >
      <div class="container">
        <div class="flex items-center justify-between relative">
          <div class="px-4">
            <a
              href="/pbw/build/index.php"
              class="font-bold text-lg text-primary block py-6"
              >KitaSehat</a
            >
          </div>
          <div class="flex items-center px-4">
            <button
              id="hamburger"
              name="hamburger"
              type="button"
              class="block absolute right-4 lg:hidden"
            >
              <span
                class="hamburger-line transition duration-300 ease-in-out origin-top-left"
              ></span>
              <span
                class="hamburger-line transition duration-300 ease-in-out"
              ></span>
              <span
                class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"
              ></span>
            </button>

            <!-- Nav -->
            <nav
              id="nav-menu"
              class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none"
            >
              <ul class="block lg:flex">
                <li class="group">
                  <a
                    href="/pbw/build/index.php#Kategori"
                    class="text-base text-white py-2 mx-8 flex group-hover:text-primary"
                    >Kategori</a
                  >
                </li>
                <li class="group">
                  <a
                    href="/pbw/build/index.php#cek-kesehatan"
                    class="text-base text-white py-2 mx-8 flex group-hover:text-primary"
                    >Cek Kesehatan</a
                  >
                </li>
                <li class="group">
                  <a
                    href="/pbw/build/index.php#about"
                    class="text-base text-white py-2 mx-8 flex group-hover:text-primary"
                    >Tentang</a
                  >
                </li>
                <li class="group" id="profile-button">
                  <a
                    href="/pbw/build/pages/profile.php"
                    class="text-base text-white py-2 mx-8 flex group-hover:text-primary"
                    >Profil</a
                  >
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!-- Navbar End -->

   <!-- Container Artikel -->
   <div class="max-w-4xl mx-auto mt-10 px-4 py-6 bg-white shadow-lg rounded-lg">
        <?php
        if (isset($_GET['id'])) {
            // Ambil id artikel dari URL
            $article_id = $_GET['id'];
            
            // Query untuk mengambil artikel dari database berdasarkan id
            $sql = "SELECT * FROM articles WHERE id = $article_id";
            $result = $conn->query($sql);

            // Periksa apakah artikel ditemukan
            if ($result->num_rows > 0) {
                // Ambil data artikel dari hasil query
                $article = $result->fetch_assoc();

                // Tampilkan isi lengkap artikel
                ?>
                <h2 class="text-3xl font-bold mb-4"><?= $article['title'] ?></h2>
                <img src="<?= $article['thumbnail'] ?>" alt="<?= $article['title'] ?>" class="w-full h-auto rounded-lg mb-4">
                <p class="text-lg leading-relaxed"><?= $article['content'] ?></p>
                <?php
            } else {
                echo "<p>Artikel tidak ditemukan.</p>";
            }
        } else {
            echo "<p>ID artikel tidak ditemukan.</p>";
        }
        ?>
    </div>
    <!-- Container Artikel End -->

    <!-- Script -->
    <script src="/pbw/build/assets/js/script.js"></script>
</body>
</html>


<?php
// Tutup koneksi database
$conn->close();
?>
