<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['fullname']) || !isset($_SESSION['email'])) {
    // Redirect pengguna ke halaman login jika belum login
    header("Location: login.html");
    exit();
}

// Tentukan foto profil default
$defaultProfilePicture = "/pbw/build/assets/img/profile-logo.svg";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
    <!-- Tambahkan link ke file CSS yang diperlukan -->
    <link rel="stylesheet" href="/pbw/build/assets/css/output.css" />
    <!-- Font Awesome untuk ikon -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <!-- Tailwind CSS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css"
    />
    <style>
      /* CSS untuk styling foto profil */
      .profile-picture {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
      }
    </style>
  </head>
  <body class="bg-gray-100 flex">
   <!-- Sidebar -->
<aside class="bg-white w-64 h-screen shadow-lg">
  <div class="p-4">
    <a href="/pbw/build/index.php" class="text-xl font-bold text-primary">KitaSehat</a>
  </div>
  <nav class="mt-8">
    <ul>
      <li class="px-4 py-2 dropdown">
        <button
          class="text-gray-600 hover:text-primary transition duration-300 flex items-center w-full focus:outline-none"
          onclick="toggleDropdown('kategoriDropdown')"
        >
          <i class="fas fa-th-large mr-2"></i> Kategori <i class="fas fa-chevron-down ml-auto"></i>
        </button>
        <ul id="kategoriDropdown" class="submenu hidden">
          <!-- Konten menu kategori dari index.php akan dimuat disini -->
          <li><a href="/pbw/build/pages/kehamilan.php" class="block px-4 py-2 text-gray-600 hover:text-primary transition duration-300">Kehamilan</a></li>
          <li><a href="/pbw/build/pages/kebugaran.php" class="block px-4 py-2 text-gray-600 hover:text-primary transition duration-300">Kebugaran</a></li>
          <li><a href="/pbw/build/pages/nutrisi.php" class="block px-4 py-2 text-gray-600 hover:text-primary transition duration-300">Nutrisi</a></li>
          <li><a href="/pbw/build/pages/pola-tidur.php" class="block px-4 py-2 text-gray-600 hover:text-primary transition duration-300">Pola Tidur</a></li>
        </ul>
      </li>
      <li class="px-4 py-2 dropdown">
        <button
          class="text-gray-600 hover:text-primary transition duration-300 flex items-center w-full focus:outline-none"
          onclick="toggleDropdown('cekKesehatanDropdown')"
        >
          <i class="fas fa-heartbeat mr-2"></i> Cek Kesehatan <i class="fas fa-chevron-down ml-auto"></i>
        </button>
        <ul id="cekKesehatanDropdown" class="submenu hidden">
          <!-- Konten menu cek kesehatan dari index.php akan dimuat disini -->
          <li><a href="/pbw/build/pages/bmi.html" class="block px-4 py-2 text-gray-600 hover:text-primary transition duration-300">Cek BMI</a></li>
          <li><a href="/pbw/build/index.php#kategori2" class="block px-4 py-2 text-gray-600 hover:text-primary transition duration-300">Cek Tingkat Stress</a></li>
        </ul>
      </li>
      <li class="px-4 py-2">
        <a href="/pbw/build/assets/php/logout.php" class="text-gray-600 hover:text-primary transition duration-300 flex items-center">
          <i class="fas fa-sign-out-alt mr-2"></i> Logout
        </a>
      </li>
    </ul>
  </nav>
</aside>


    <!-- Konten Profile -->
    <main class="flex-1 p-8">
      <div
        class="bg-white p-8 rounded-lg shadow-md flex items-center justify-center flex-col md:flex-row space-y-4 md:space-x-8"
      >
        <!-- Foto Profil -->
        <div class="relative">
          <img
            src="<?php echo $defaultProfilePicture; ?>"
            alt="Profile Picture"
            class="profile-picture"
          />
          <!-- Tambahkan ikon untuk mengganti foto profil -->
          <button class="absolute bottom-0 right-0 bg-white rounded-full p-2">
            <i class="fas fa-camera"></i>
          </button>
        </div>
        <div>
          <!-- Fullname Pengguna -->
          <h1 class="text-3xl font-bold text-primary mb-2">
            <?php echo $_SESSION['fullname']; ?>
          </h1>
          <!-- Email Pengguna -->
          <p class="text-gray-700">Email: <?php echo $_SESSION['email']; ?></p>
        </div>
      </div>
    </main>
    <script>
  function toggleDropdown(id) {
    var dropdown = document.getElementById(id);
    dropdown.classList.toggle('hidden');
  }
</script>

  </body>
</html>
