import Swiper from "swiper/bundle";

const swiper = new Swiper(".mySwiper", {
  loop: true,
  slidesPerView: 1,
  spaceBetween: 20,
  // effect: "cube",
  autoplay: {
    delay: 2500,
    disableOnInteraction: true,
  },
  speed: 1000,
  parallax: true,

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
  },
});

