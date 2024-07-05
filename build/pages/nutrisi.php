<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}
?>


<?php
// Lakukan koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kitasehat_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Buat kueri SQL untuk mengambil data artikel Nutrisi
$sql = "SELECT * FROM articles WHERE category = 'Nutrisi'";

// Lakukan query ke database dengan kueri yang sudah ditetapkan
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KitaSehat</title>
    <!-- output css -->
    <link rel="stylesheet" href="/pbw/build/assets/css/output.css" />
    <link rel="stylesheet" href="/pbw/build/assets/css/navbar.css" />
    <!-- Icon -->
    <link rel="icon" href="/pbw/build/assets/img/logo.png" />
    <!-- SWIPER CSS -->
    <link rel="stylesheet" href="/pbw/src/swiper-bundle.min.css" />
  </head>

  <body>
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

    <!-- Banner Start -->
    <section
      class="bg-cover bg-center h-screen relative"
      style="background-image: url('/pbw/build/assets/img/bg2.jpg')"
    >
      <!-- Overlay -->
      <div class="absolute inset-0 bg-black opacity-50 z-0"></div>

      <!-- Content Container -->
      <div
        class="container h-full flex items-center justify-center relative z-10"
      >
        <div class="text-center text-white max-w-xl">
          <h1 class="text-5xl font-bold mb-4">Informasi Kesehatan</h1>
          <h2 class="text-3xl font-extrabold text-primary mb-4">Kehamilan</h2>
          <p class="text-lg mb-8">
            Banyak mitos seputar kehamilan yang bisa membuat ibu kewalahan.
            Ketahui fakta tentang kehamilan serta tips lengkap dari seputar
            promil, tips setiap trimester, persiapan persalinan, hingga
            perawatan setelah melahirkan di sini.
          </p>
          <a
            href="#konten-nutrisi"
            class="bg-red-600 text-white py-3 px-6 rounded-lg text-lg transition duration-300 hover:bg-red-700 focus:outline-none focus:ring active:bg-red-500"
            >Learn More</a
          >
        </div>
      </div>
    </section>
    <!-- Banner End -->

<!-- Bagian menampilkan artikel -->
<section id="articles" class="py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-8">Artikel</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            // Periksa apakah ada artikel yang ditemukan
            if ($result->num_rows > 0) {
                // Loop melalui setiap baris data artikel
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <img src="<?php echo $row['thumbnail']; ?>" alt="<?php echo $row['title']; ?>" onerror="this.onerror=null; this.src='/path/to/default-image.jpg';" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2"><?php echo $row['title']; ?></h3>
                            <p class="text-gray-700"><?php echo substr($row['content'], 0, 150) . "..."; ?></p>
                            <a href="detail_artikel.php?id=<?php echo $row['id']; ?>" class="block text-center mt-4 bg-primary hover:bg-primary-hover text-white font-bold py-2 px-4 rounded">Baca Artikel</a>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>Tidak ada artikel yang ditemukan.</p>";
            }
            ?>
        </div>
    </div>
</section>

    <!-- Footer Start -->
    <footer class="bg-dark pt-24 pb-12">
      <div class="container">
        <div class="flex flex-warp">
          <div class="w-full px-4 mb-12 text-slate-300 font-lg md:w-1/3">
            <a href="#home" class="font-bold text-lg text-primary block"
              >KitaSehat¿</a
            >
            <h3 class="font-bold text-2xl mb-2">Hubungi Kami</h3>
            <p>kitasehat@gmail.hc.id</p>
            <p>Jl. Veteran No. 16 Jakarta Pusat, Indonesia</p>
            <p>Telp. (021) 3863777, 3503088</p>
            <p>Fax: (021) 3442223</p>
          </div>
          <div class="w-full px-4 mb-12 md:w-1/3">
            <h3 class="font-semibold text-xl text-white mb-5">
              Kategori Masalah Kesehatan
            </h3>
            <ul class="text-slate-300 pt-2">
              <li>
                <a
                  href="kehamilan.html"
                  class="inline-block text-base mb-3 hover:text-primary"
                  >Kehamilan</a
                >
              </li>
              <li>
                <a
                  href="nutrisi.html"
                  class="inline-block text-base mb-3 hover:text-primary"
                  >Nutrisi</a
                >
              </li>
              <li>
                <a
                  href="kebugaran.html"
                  class="inline-block text-base mb-3 hover:text-primary"
                  >Kebugaran</a
                >
              </li>
              <li>
                <a
                  href="polatidur.html"
                  class="inline-block text-base mb-3 hover:text-primary"
                  >Pola Tidur</a
                >
              </li>
            </ul>
          </div>
          <div class="w-full px-4 mb-12 md:w-1/3">
            <h3 class="font-semibold text-xl text-white mb-5">Tautan</h3>
            <ul class="text-slate-300">
              <li>
                <a
                  href="#home"
                  class="inline-block text-base mb-3 hover:text-primary"
                  >Beranda</a
                >
              </li>
              <li>
                <a
                  href="#kategori"
                  class="inline-block text-base mb-3 hover:text-primary"
                  >Kategori</a
                >
              </li>
              <li>
                <a
                  href="#cek-kesehatan"
                  class="inline-block text-base mb-3 hover:text-primary"
                  >Cek Kesehatan</a
                >
              </li>

              <li>
                <a
                  href="#clients"
                  class="inline-block text-base mb-3 hover:text-primary"
                  >Tentang Kami</a
                >
              </li>

              <li>
                <a
                  href="#blog"
                  class="inline-block text-base mb-3 hover:text-primary"
                  >Profil</a
                >
              </li>

              <li>
                <a
                  href="#contact"
                  class="inline-block text-base mb-3 hover:text-primary"
                  >Contact</a
                >
              </li>
            </ul>
          </div>
        </div>

        <div class="w-full pt-10 border-t border-slate-700">
          <div class="flex items-center justify-center mb-5">
            <!-- Youtube -->
            <!-- Instagram -->
            <!-- Tiktok -->
          </div>
          <p class="font-medium text-xs text-slate-500 text-center">
            Dibuat dengan <span class="text-pink-500">❤️</span> oleh
            <a
              href="https://instagram.com/zidankhainur_"
              target="_blank"
              class="font-bold text-primary"
              >Kelompok 3</a
            >, menggunakan
            <a
              href="https://tailwindcss.com"
              target="_blank"
              class="font-bold text-sky-500"
              >Tailwind CSS.</a
            >
          </p>
        </div>
      </div>
    </footer>
    <?php
// Tutup koneksi database
$conn->close();
?>
    <!-- Footer End -->
    <script src="/pbw/build/assets/js/script.js"></script>
  </body>
</html>
