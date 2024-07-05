<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KitaSehat</title>
    <link rel="icon" href="./pbw/build/assets/img/logo.png" />
    <!-- output css -->
    <link rel="stylesheet" href="./" />
    <!-- Icon -->
    <!-- SWIPER CSS -->
    <link rel="stylesheet" href="/pbw/src/swiper-bundle.min.css" />
  </head>
  <body>
    <!-- Header Start -->
    <section id="home"></section>
    <header
      class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10"
    >
      <div class="container">
        <div class="flex items-center justify-between relative">
          <div class="px-4">
            <a href="#home" class="font-bold text-lg text-primary block py-6"
              >KitaSehat¿</a
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
            <?php session_start(); ?>

            <nav
              id="nav-menu"
              class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none"
            >
              <ul class="block lg:flex">
                <li class="group">
                  <a
                    href="#Kategori"
                    class="text-base text-white py-2 mx-8 flex group-hover:text-primary"
                    >Kategori</a
                  >
                </li>
                <li class="group">
                  <a
                    href="#cek-kesehatan"
                    class="text-base text-white py-2 mx-8 flex group-hover:text-primary"
                    >Cek Kesehatan</a
                  >
                </li>
                <li class="group">
                  <a
                    href="#about"
                    class="text-base text-white py-2 mx-8 flex group-hover:text-primary"
                    >Tentang</a
                  >
                </li>
                <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']):
                ?>
                <li class="group" id="profile-button">
                  <a
                    href="/pbw/build/pages/profile.php"
                    class="text-base text-white py-2 mx-8 flex group-hover:text-primary"
                    >Profil</a
                  >
                </li>
                <?php else: ?>
                <li class="group" id="login-button">
                  <button
                    class="mt-2 lg:mt-0 mx-8 flex bg-primary hover:bg-primary-hover text-white font-bold py-2 px-4 rounded"
                  >
                    <a href="/pbw/build/pages/login.html">Login / Sign Up</a>
                  </button>
                </li>
                <?php endif; ?>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!-- Header End -->

    <!-- Hero Start -->
    <section
      class="h-[640px] xl:h-[840px] bg-center lg:bg-cover bg-no-repeat bg-fixed xl:rounded-bl-[290px] z-20"
      style="background-image: url('/pbw/build/assets/img/bg2.jpg')"
    >
      <div
        class="absolute inset-0 bg-black opacity-20 z-0 h-[640px] xl:h-[840px] bg-center lg:bg-cover bg-no-repeat bg-fixed xl:rounded-bl-[290px]"
      ></div>
      <div
        class="container mx-auto h-full flex items-center justify-center xl:justify-start"
      >
        <div
          class="hero__text w-[567px] flex flex-col items-center text-center xl:text-left lg:items-start"
        >
          <h1 class="trending-topic text-white mb-8 drop-shadow-lg">
            Wujudkan Indonesia Sehat
          </h1>
          <p class="mb-8 text-white font-semibold backdrop:blur-md">
            Bersama, kita bisa menciptakan masyarakat yang lebih sehat dan
            sejahtera melalui edukasi kesehatan, pola hidup aktif, dan akses
            layanan medis yang berkualitas. Mari berkomitmen untuk masa depan
            Indonesia yang lebih baik dengan menjaga kesehatan diri dan
            lingkungan.
          </p>
          <a href="/pbw/build/pages/baca-selengkapnya.html"
            ><button class="btn-hero mx-auto xl:mx-0">
              Baca Selengkapnya
            </button></a
          >
        </div>
      </div>
    </section>
    <!-- Hero End -->
    <!-- Kategori Section Start -->
    <section id="Kategori" class="pt-32 pb-16 bg-slate-100">
      <div class="container">
        <div class="w-full px-4">
          <div class="max-w-xl mx-auto text-center mb-16">
            <h4 class="font-semibold text-lg text-primary mb-2">Kategori</h4>
            <h2 class="font-bold text-dark text-3xl mb-4">Masalah Kesehatan</h2>
            <p class="font-medium text-md text-slate-500 mb-2">
              Beberapa artikel mengenai masalah kesehatan
            </p>
            <form id="searchForm" class="relative">
              <input
                id="searchInput"
                type="text"
                placeholder="Cari Kategori..."
                class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
              />
              <svg
                class="absolute left-3 top-2.5 w-5 h-5 text-gray-500"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M21 21l-4.35-4.35m1.48-5.65A7.5 7.5 0 1115 4.35a7.5 7.5 0 010 10.3z"
                />
              </svg>
            </form>
          </div>
        </div>
        <div
          id="categoryList"
          class="w-full px-4 flex flex-wrap justify-center"
        >
          <div class="category-item mb-12 p-4">
            <div
              class="rounded-md shadow-md overflow-hidden hover:shadow-sm hover:shadow-primary"
            >
              <a href="/pbw/build/pages/kehamilan.php">
                <img
                  src="/pbw/build/assets/img/kehamilan.webp"
                  alt=""
                  width="300px"
                  class="bg-rose-100 drop-shadow-md"
                />
              </a>
            </div>
            <h3 class="font-semibold text-xl text-dark mt-5 mb-3 text-center">
              KEHAMILAN
            </h3>
          </div>
          <div class="category-item mb-12 p-4">
            <div
              class="rounded-md shadow-md overflow-hidden hover:shadow-sm hover:shadow-primary"
            >
              <a href="/pbw/build/pages/nutrisi.php">
                <img
                  src="/pbw/build/assets/img/nutrisi.webp"
                  alt=""
                  width="300px"
                  class="bg-rose-100 drop-shadow-md"
                />
              </a>
            </div>
            <h3 class="font-semibold text-xl text-dark mt-5 mb-3 text-center">
              NUTRISI
            </h3>
          </div>
          <div class="category-item mb-12 p-4">
            <div
              class="rounded-md shadow-md overflow-hidden hover:shadow-sm hover:shadow-primary"
            >
              <a href="/pbw/build/pages/kebugaran.php">
                <img
                  src="/pbw/build/assets/img/kebugaran.webp"
                  alt=""
                  width="300px"
                  class="bg-rose-100 drop-shadow-md"
                />
              </a>
            </div>
            <h3 class="font-semibold text-xl text-dark mt-5 mb-3 text-center">
              KEBUGARAN
            </h3>
          </div>
          <div class="category-item mb-12 p-4">
            <div
              class="rounded-md shadow-md overflow-hidden hover:shadow-sm hover:shadow-primary"
            >
              <a href="/pbw/build/pages/pola-tidur.php">
                <img
                  src="/pbw/build/assets/img/pola-tidur.webp"
                  alt=""
                  width="300px"
                  class="bg-rose-100 drop-shadow-md"
                />
              </a>
            </div>
            <h3 class="font-semibold text-xl text-dark mt-5 mb-3 text-center">
              POLA TIDUR
            </h3>
          </div>
        </div>
      </div>
    </section>
    <!-- Kategori Section End -->
    <!-- Kategori Section Start -->
    <section id="cek-kesehatan" class="pt-24 pb-16 bg-rose-100">
      <div class="container">
        <div class="w-full px-4">
          <div class="max-w-xl mx-auto text-center mb-16">
            <h4 class="font-semibold text-lg text-primary mb-2">
              Cek Kesehatan
            </h4>
            <h2 class="font-bold text-dark text-3xl mb-4">Masalah Kesehatan</h2>
            <p class="font-medium text-md text-slate-500 mb-2">
              Beberapa Tools mengenai kesehatan
            </p>
          </div>
        </div>
        <div
          id="categoryList"
          class="w-full px-4 flex flex-wrap justify-center"
        >
          <div class="category-item mb-12 p-4">
            <div
              class="rounded-md shadow-md overflow-hidden hover:shadow-sm hover:shadow-primary"
            >
              <a href="/pbw/build/pages/bmi.php">
                <img
                  src="/pbw/build/assets/img/bmi.webp"
                  alt=""
                  width="200px"
                  class="bg-slate-100 drop-shadow-md"
                />
              </a>
            </div>
            <h3 class="font-semibold text-xl text-dark mt-5 mb-3 text-center">
              KALKULATOR BMI
            </h3>
          </div>
          <div class="category-item mb-12 p-4">
            <div
              class="rounded-md shadow-md overflow-hidden hover:shadow-sm hover:shadow-primary"
            >
              <a href="/pbw/build/pages/quiz_awal.php">
                <img
                  src="/pbw/build/assets/img/stres.webp"
                  alt=""
                  width="200px"
                  class="bg-slate-100 drop-shadow-md"
                />
              </a>
            </div>
            <h3 class="font-semibold text-xl text-dark mt-5 mb-3 text-center">
              TINGKAT STRESS
            </h3>
          </div>
        </div>
      </div>
    </section>
    <!-- Kategori Section End -->
    <!-- About Start -->
    <section id="about" class="pt-24 pb-16 bg-slate-100">
      <div class="container mx-auto px-4">
        <div class="w-full px-4">
          <div class="max-w-xl mx-auto text-center mb-16">
            <h2 class="font-bold text-dark text-3xl mb-4">
              <span class="text-primary">KitaSehat¿</span> Memberikan Anda
              Informasi yang Dibutuhkan
            </h2>
          </div>
        </div>
        <!-- Carousel Container -->
        <div class="swiper-container relative">
          <div class="swiper-wrapper">
            <!-- Informasi Sumber Berbasis Riset -->
            <div class="swiper-slide">
              <div class="category-item mb-12 p-4 flex flex-col items-center">
                <div
                  class="rounded-md shadow-md overflow-hidden hover:shadow-sm hover:shadow-primary"
                >
                    <img
                      src="/pbw/build/assets/img/riset.webp"
                      alt="Sumber Berbasis Riset"
                      class="w-full max-w-xs bg-rose-100 drop-shadow-md"
                    />
                </div>
                <h3
                  class="font-semibold text-xl text-dark mt-5 mb-3 text-center"
                >
                  SUMBER BERBASIS RISET
                </h3>
                <p class="text-center text-gray-700 max-w-lg lg:max-w-md">
                  Semua artikel di Hello Sehat telah melalui proses riset dan
                  ditulis berdasarkan studi terbaru serta ditinjau oleh pakar
                  terkemuka dari berbagai institusi medis.
                </p>
              </div>
            </div>
            <!-- Informasi Nutrisi -->
            <div class="swiper-slide">
              <div class="category-item mb-12 p-4 flex flex-col items-center">
                <div
                  class="rounded-md shadow-md overflow-hidden hover:shadow-sm hover:shadow-primary"
                >
                    <img
                      src="/pbw/build/assets/img/pakar.webp"
                      alt="Ditinjau Pakar"
                      class="w-full max-w-xs bg-rose-100 drop-shadow-md"
                    />
                </div>
                <h3
                  class="font-semibold text-xl text-dark mt-5 mb-3 text-center"
                >
                  DITINJAU PAKAR
                </h3>
                <p class="text-center text-gray-700 max-w-lg lg:max-w-md">
                  Tim editor medis kami adalah dokter dan pakar yang datang dari
                  berbagai latar belakang keilmuan medis. Mereka meninjau setiap
                  konten kami secara profesional.
                </p>
              </div>
            </div>
            <!-- Informasi Kebugaran -->
            <div class="swiper-slide">
              <div class="category-item mb-12 p-4 flex flex-col items-center">
                <div
                  class="rounded-md shadow-md overflow-hidden hover:shadow-sm hover:shadow-primary"
                >
                    <img
                      src="/pbw/build/assets/img/update.webp"
                      alt="Diperbarui Secara Berkala"
                      class="w-full max-w-xs bg-rose-100 drop-shadow-md"
                    />
                </div>
                <h3
                  class="font-semibold text-xl text-dark mt-5 mb-3 text-center"
                >
                  DIPERBARUI SECARA BERKALA
                </h3>
                <p class="text-center text-gray-700 max-w-lg lg:max-w-md">
                  Bersama para editor medis dan pakar profesional, kami selalu
                  memantau artikel kami secara berkala guna memastikan tingkat
                  akurasi dan relevansi dengan pembaca.
                </p>
              </div>
            </div>
            <!-- Informasi Pola Tidur -->
            <div class="swiper-slide">
              <div class="category-item mb-12 p-4 flex flex-col items-center">
                <div
                  class="rounded-md shadow-md overflow-hidden hover:shadow-sm hover:shadow-primary"
                >
                    <img
                      src="/pbw/build/assets/img/terpercaya.webp"
                      alt="Terpercaya"
                      class="w-full max-w-xs bg-rose-100 drop-shadow-md"
                    />
                </div>
                <h3
                  class="font-semibold text-xl text-dark mt-5 mb-3 text-center"
                >
                  TERPERCAYA
                </h3>
                <p class="text-center text-gray-700 max-w-lg lg:max-w-md">
                  Hello Sehat, sebagai platform kesehatan terdepan di Indonesia
                  berkomitmen untuk menulis artikel yang akurat, relevan dan
                  terbaru untuk membantu Anda para pembaca dalam membuat
                  keputusan penting terkait kesehatan.
                </p>
              </div>
            </div>
            <!-- Tambahkan informasi-informasi lainnya sesuai kebutuhan -->
          </div>
          <!-- Add Pagination -->
          <div class="swiper-pagination"></div>
          <!-- Add Navigation Buttons -->
          <div
            class="swiper-button-prev absolute left-4 top-1/2 transform -translate-y-1/2"
          ></div>
          <div
            class="swiper-button-next absolute right-4 top-1/2 transform -translate-y-1/2"
          ></div>
        </div>
      </div>
    </section>
    <!-- About End -->

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

    <!-- animate js -->
    <script src="/pbw/build/assets/js/scrollreveal.min.js"></script>
    <!-- swiper -->
    <script src="/pbw/build/assets/js/swiper-bundle.min.js"></script>
    <!-- script js -->
    <script src="/pbw/build/assets/js/script.js"></script>
    <script src="/pbw/build/assets/js/search.js"></script>
    <script src="/pbw/build/assets/js/swiper.js"></script>
  </body>
</html>
