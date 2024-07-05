// Navbar-Fixed
window.onscroll = function () {
  const header = document.querySelector("header");
  const navLinks = document.querySelectorAll("#nav-menu a");
  const fixedNav = header.offsetTop;
  const isSmallScreen = window.matchMedia("(max-width: 1024px)").matches;

  if (window.pageYOffset > fixedNav) {
    header.classList.add("navbar-fixed");

    navLinks.forEach((link) => {
      if (!isSmallScreen) {
        link.classList.remove("text-white");
        link.classList.add("text-black");
      }
    });
  } else {
    header.classList.remove("navbar-fixed");

    navLinks.forEach((link) => {
      if (!isSmallScreen) {
        link.classList.remove("text-black");
        link.classList.add("text-white");
      }
    });
  }
};

window.onresize = function () {
  const header = document.querySelector("header");
  const navLinks = document.querySelectorAll("#nav-menu a");
  const isSmallScreen = window.matchMedia("(max-width: 1024px)").matches;

  navLinks.forEach((link) => {
    if (isSmallScreen) {
      link.classList.remove("text-white");
      link.classList.add("text-black");
    } else {
      if (!header.classList.contains("navbar-fixed")) {
        link.classList.remove("text-black");
        link.classList.add("text-white");
      }
    }
  });
};

// Initial check to set the correct text color based on screen size
window.onresize();

// klik diluar hamburger
window.addEventListener("click", function (e) {
  const hamburger = document.querySelector("#hamburger");
  const navMenu = document.querySelector("#nav-menu");
  if (
    e.target !== hamburger &&
    e.target !== navMenu &&
    !navMenu.contains(e.target) &&
    !hamburger.contains(e.target)
  ) {
    hamburger.classList.remove("hamburger-active");
    navMenu.classList.add("hidden");
  }
});

// hamburger
const hamburger = document.querySelector("#hamburger");
const navMenu = document.querySelector("#nav-menu");

hamburger.addEventListener("click", function () {
  hamburger.classList.toggle("hamburger-active");
  navMenu.classList.toggle("hidden");
});

// animation
const sr = ScrollReveal({
  origin: "bottom",
  distance: "60px",
  duration: 1000,
  delay: 600,
});

sr.reveal(".hero__text", { origin: "top" });
