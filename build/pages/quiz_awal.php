<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cek Tingkat Stres</title>
    <link rel="stylesheet" href="/pbw/build/assets/css/output.css" />
    <link rel="stylesheet" href="/pbw/build/assets/css/navbar.css" />
  </head>
  <body class="bg-gradient-to-r bg-white min-h-screen flex flex-col">
    <!-- Navbar Start -->
    <header
      class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10"
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

    <header class="py-32 bg-rose-300 text-white text-center">
      <div class="container mx-auto flex items-center justify-center">
        <img
          src="/pbw/build/assets/img/tingkat-stress.png"
          alt="Stress Image"
          class="w-64 h-64 mr-6"
        />
        <div>
          <h1 class="text-5xl font-bold py-5">Cek Tingkat Stres</h1>
          <button
            class="mt-4 px-6 py-2 bg-red-500 hover:bg-red-600 transition-colors duration-200 font-semibold rounded-full"
            onclick="showLoadingScreen()"
          >
            Mulai
          </button>
        </div>
      </div>
    </header>

    <section
      class="flex-1 flex items-center justify-center py-10 font-extralight"
    >
      <div class="bg-white rounded-lg p-8 max-w-2xl mx-auto">
        <div class="">
          <ul class="text-left text-gray-700">
            <li class="mb-2 flex items-start">
              <span class="material-icons text-blue-500 mr-2"
                >check_circle</span
              >
              Mendeteksi kemungkinan Anda berada pada kondisi
            </li>
            <li class="mb-2 flex items-start">
              <span class="material-icons text-blue-500 mr-2"
                >check_circle</span
              >
              Jawablah sesuai dengan perasaan Anda saat ini
            </li>
            <li class="mb-2 flex items-start">
              <span class="material-icons text-blue-500 mr-2"
                >check_circle</span
              >
              Kami akan menjaga kerahasiaan informasi Anda
            </li>
            <li class="mb-2 flex items-start">
              <span class="material-icons text-blue-500 mr-2"
                >check_circle</span
              >
              Tes dengan alat ini hanya akan berjalan beberapa menit saja
            </li>
          </ul>
        </div>
        <div class="mt-6 border-t py-10">
          <h3 class="text-lg font-semibold text-gray-800 py-5">Disclaimer</h3>
          <p class="text-gray-600">
            Hasil pengecekan tingkat stres ini bukan pengganti tes diagnostik.
            Segera kunjungi tenaga medis terdekat untuk mendapatkan hasil akurat
            dan perawatan.
          </p>
        </div>
      </div>
    </section>

    <!-- Footer Start -->
    <footer class="bg-dark pt-24 pb-10 mt-20">
      <div class="container">
        <div class="flex flex-wrap">
          <div class="w-full px-4 mb-12 text-slate-300 font-lg md:w-1/3">
            <a href="#home" class="font-bold text-lg text-primary block"
              >KitaSehat</a
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
                  href="/pbw/build/pages/kehamilan.html"
                  class="inline-block text-base mb-3 hover:text-primary"
                  >Kehamilan</a
                >
              </li>
              <li>
                <a
                  href="/pbw/build/pages/nutrisi.html"
                  class="inline-block text-base mb-3 hover:text-primary"
                  >Nutrisi</a
                >
              </li>
              <li>
                <a
                  href="/pbw/build/pages/kebugaran.html"
                  class="inline-block text-base mb-3 hover:text-primary"
                  >Kebugaran</a
                >
              </li>
              <li>
                <a
                  href="/pbw/build/pages/pola-tidur.html"
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
            <!-- Social Media Icons -->
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
    <!-- Footer End -->

    <!-- loading screen start -->
    <div
      id="loading-screen"
      class="fixed inset-0 bg-white flex flex-col items-center justify-center z-50 hidden"
    >
      <div
        class="loader ease-linear rounded-full border-8 border-t-8 border-gray-200 mb-4"
      ></div>
      <p class="text-gray-700 text-lg animate-pulse">Loading...</p>
    </div>

    <!-- loading screen end -->

    <!-- Material Icons -->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />

    <div
      id="loading-screen"
      class="fixed inset-0 bg-white flex flex-col items-center justify-center z-50 hidden"
    >
      <div
        class="loader ease-linear rounded-full border-8 border-t-8 border-gray-200 mb-4"
      ></div>
      <p class="text-gray-700 text-lg animate-pulse">Loading...</p>
    </div>

    <script src="/pbw/build/assets/js/quiz_awal.js"></script>
    <script src="/pbw/build/assets/js/script.js"></script>
  </body>
</html>
