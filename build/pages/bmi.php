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
    <title>Stress Berat</title>
    <link rel="stylesheet" href="/pbw/build/assets/css/output.css" />
    <link rel="stylesheet" href="/pbw/build/assets/css/navbar.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"
      rel="stylesheet"
    />
    <style>
      @keyframes slideIn {
        from {
          transform: translateX(-100%);
          opacity: 0;
        }

        to {
          transform: translateX(0);
          opacity: 1;
        }
      }

      .slide-in {
        animation: slideIn 0.5s ease-out forwards;
      }

      .loader {
        border-top-color: #3498db;
        animation: spin 1s linear infinite;
        height: 24px;
        width: 24px;
        border-width: 4px;
      }

      @keyframes spin {
        0% {
          transform: rotate(0deg);
        }

        100% {
          transform: rotate(360deg);
        }
      }

      .hidden {
        display: none;
      }

      .fixed {
        position: fixed;
      }

      .inset-0 {
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
      }

      .z-50 {
        z-index: 50;
      }
    </style>
  </head>

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

  <body class="bg-gray-50">
    <section class="text-center">
      <div class="bg-gradient-to-r bg-rose-300 text-dark p-8 pt-16">
        <div class="max-w-4xl mx-auto flex flex-col md:flex-row items-center">
          <div class="flex-1 md:order-1">
            <h1 class="text-4xl font-extrabold mb-4">Kalkulator BMI (IMT)</h1>
            <p class="text-lg">
              Gunakan kalkulator ini untuk memeriksa Indeks Massa Tubuh (IMT)
              dan mengecek apakah berat badan Anda ideal atau tidak. Anda juga
              dapat menggunakannya untuk memeriksa indeks massa tubuh anak.
            </p>
          </div>
          <div
            class="mt-8 md:ml-8 md:order-2 rounded-full shadow-lg bg-blue-50"
          >
            <img
              src="/pbw/build/assets/img/kalku bmi_new.webp"
              alt="Image"
              class="w-32"
            />
          </div>
        </div>
      </div>
    </section>

    <div class="max-w-4xl mx-auto p-6 mt-6 bg-white shadow-lg rounded-lg">
      <form id="bmiForm">
        <div class="mb-6 slide-in">
          <label for="birthdate" class="block text-sm font-medium text-gray-700"
            >Tanggal Lahir Anda</label
          >
          <input
            type="text"
            id="birthdate"
            name="birthdate"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-rose-500 focus:border-rose-500 sm:text-sm flatpickr"
          />
        </div>
        <div class="mb-6 slide-in">
          <label class="block text-sm font-medium text-gray-700"
            >Apa jenis kelamin Anda?</label
          >
          <div class="mt-2 flex">
            <label class="inline-flex items-center mr-4">
              <input
                type="radio"
                name="gender"
                value="male"
                class="form-radio text-rose-600 border-gray-300 focus:border-rose-500 focus:ring focus:ring-offset-0 focus:ring-rose-200 focus:ring-opacity-50"
              />
              <span class="ml-2">Laki-laki</span>
            </label>
            <label class="inline-flex items-center">
              <input
                type="radio"
                name="gender"
                value="female"
                class="form-radio text-rose-600 border-gray-300 focus:border-rose-500 focus:ring focus:ring-offset-0 focus:ring-rose-200 focus:ring-opacity-50"
              />
              <span class="ml-2">Perempuan</span>
            </label>
          </div>
        </div>
        <div class="mb-6 slide-in">
          <label for="height" class="block text-sm font-medium text-gray-700"
            >Berapa tinggi Anda? (cm)</label
          >
          <input
            type="number"
            id="height"
            name="height"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-rose-500 focus:border-rose-500 sm:text-sm"
          />
        </div>
        <div class="mb-6 slide-in">
          <label for="weight" class="block text-sm font-medium text-gray-700"
            >Berapa berat badan Anda? (kg)</label
          >
          <input
            type="number"
            id="weight"
            name="weight"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-rose-500 focus:border-rose-500 sm:text-sm"
          />
        </div>
        <div class="mb-6 slide-in">
          <label for="activity" class="block text-sm font-medium text-gray-700"
            >Pilih tingkat intensitas aktivitas fisik Anda</label
          >
          <select
            id="activity"
            name="activity"
            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-rose-500 focus:border-rose-500 sm:text-sm rounded-md"
          >
            <option>Sedikit atau tanpa olahraga</option>
            <option>Ringan (olahraga 1-3 hari/minggu)</option>
            <option>Sedang (olahraga 3-5 hari/minggu)</option>
            <option>Berat (olahraga 6-7 hari/minggu)</option>
            <option>Sangat berat (olahraga dua kali/hari)</option>
          </select>
        </div>
        <div class="slide-in">
          <button
            type="submit"
            class="w-full bg-gradient-to-r bg-rose-600 text-white py-2 px-4 rounded-md shadow-lg hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500"
          >
            Hitung
          </button>
        </div>
      </form>
    </div>

    <section class="max-w-4xl mx-auto p-6 mt-24 bg-white shadow-lg rounded-lg">
      <div class="slide-in">
        <p class="font-semibold pb-4">Disclaimer</p>
        <p>
          Kalkulator ini bukanlah sebuah alat diagnosis medis ataupun pengganti
          konsultasi dokter spesialis/nutrisionis. Alat ini hanya untuk skrining
          yang bisa Anda lakukan mandiri, sebelum memeriksakan diri ke dokter.
          Setelah melihat hasil ini atau membaca artikel lain di Hello Sehat,
          sebaiknya tetap konsultasi ke dokter agar tahu lebih pasti kondisi
          kesehatan Anda saat ini. Hasil kalkulator BMI ini tidak bisa digunakan
          jika anda memiliki gangguan pola makan.
        </p>
      </div>
    </section>

    <div
      id="loading-screen"
      class="fixed inset-0 bg-white flex flex-col items-center justify-center z-50 hidden"
    >
      <div
        class="loader ease-linear rounded-full border-8 border-t-8 border-gray-200 mb-4"
      ></div>
      <p class="text-gray-700 text-lg animate-pulse">Loading...</p>
    </div>

   <!-- Footer Start -->
   <footer class="bg-dark pt-24 pb-12">
      <div class="container">
        <div class="flex flex-warp">
          <div class="w-full px-4 mb-12 text-slate-300 font-lg md:w-1/3">
            <a href="#home" class="font-bold text-lg text-primary block"
              >KitaSehat¿</a
            >
            <h3 class="font-bold text-2xl mb-2">Hubungi Kami</h3>
            <p>kitasehat@gmail.med.id</p>
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
                  href="/pbw/build/pages/kehamilan.php"
                  class="inline-block text-base mb-3 hover:text-primary"
                  >Kehamilan</a
                >
              </li>
              <li>
                <a
                  href="/pbw/build/pages/nutrisi.php"
                  class="inline-block text-base mb-3 hover:text-primary"
                  >Nutrisi</a
                >
              </li>
              <li>
                <a
                  href="/pbw/build/pages/kebugaran.php"
                  class="inline-block text-base mb-3 hover:text-primary"
                  >Kebugaran</a
                >
              </li>
              <li>
                <a
                  href="/pbw/build/pages/pola-tidur.php"
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
                  href="#Kategori"
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
          </div>
          <p class="font-medium text-xs text-slate-500 text-center">
            Dibuat dengan <span class="text-pink-500">❤️</span> oleh
            <a href="#" target="_blank" class="font-bold text-primary"
              >Kelompok 3</a
            >
          </p>
        </div>
      </div>
    </footer>
    <!-- Footer End -->

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="/pbw/build/assets/js/bmi.js"></script>
    <script src="/pbw/build/assets/js/script.js"></script>
    <script src="/pbw/build/assets/js/result_bmi.js"></script>
  </body>
</html>
