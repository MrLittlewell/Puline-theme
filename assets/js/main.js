  $('.flyout-trigger').click(function() {
    $('#header').toggleClass('flyout-shown')
  });


const swiper = new Swiper(".front-slider", {
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
  },
});