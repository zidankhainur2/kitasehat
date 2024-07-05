var mySwiper = new Swiper(".swiper-container", {
  // Optional parameters
  loop: true,
  slidesPerView: 1,
  spaceBetween: 10,
  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  // Autoplay
  autoplay: {
    delay: 2000, // Autoplay delay in milliseconds
    disableOnInteraction: false, // Autoplay continues even when user interacts with the slider
  },
  // Enable pagination
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
