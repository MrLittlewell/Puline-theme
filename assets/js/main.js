$(document).ready(function() {
  $(".single_product__gallery").lightGallery({
    speed: 500,
    mode: 'fade',
  }); 

  $('.flyout-trigger').click(function() {
    $('#header').toggleClass('flyout-shown')
  });

  const swiper = new Swiper(".front-slider", {
    slidesPerView: "auto",
    speed: 800,
    effect: 'coverflow',
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
});




