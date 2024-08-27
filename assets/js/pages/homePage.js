import Swiper from 'swiper/bundle';

/* head slider */
export const homeHeadSlider = new Swiper('#home-head-slider', {
  slidesPerView: 1,
  loop: true,
  spaceBetween: 2,
  centeredSlides: true,
  autoHeight: true,
  autoplay: {
    delay: 3250,
    disableOnInteraction: false,
    pauseOnMouseEnter: true
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  }
});


/* product tabs */
jQuery(document).ready(($) => {
  const tabHandler = $("main.main.home section.products-tabs nav.tabs ul li");
  const tabContent = $("main.main.home section.products-tabs div.tabs-content .tab-content");

  if (!tabHandler || !tabContent)
    return;


  $(tabHandler[0]).addClass("active");
  $(tabContent[0]).addClass("active");

  $(tabHandler).on("click", function (e) {
    e.preventDefault();
    const dataTab = $(e.target).attr('data-tab');
    const current = $("section.products-tabs div.tabs-content .tab-content[data-tab='" + dataTab + "']");
    
    if(!current)
      return;

    $(tabHandler).removeClass("active");
    $(tabContent).removeClass("active");

    $(e.target).addClass("active");
    $(current).addClass("active");
  });
});


/* sketch slider */
export const homeSketchSlider = new Swiper('#home-sketch-slider', {
  slidesPerView: 1,
  spaceBetween: 2,
  centeredSlides: true,
  autoHeight: true,
  navigation: {
    nextEl: '.swiper-btn-next',
    prevEl: '.swiper-btn-prev',
  }
});