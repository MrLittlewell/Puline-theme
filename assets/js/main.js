$(document).ready(function() {
  $(".single_product__gallery").lightGallery({
    speed: 500,
    mode: 'fade',
  }); 

  $('select').niceSelect();

  $('.variables-select-wrapper select').change(function() {
    const findValue = $('.nice-select .option.selected').attr('idx');
    $('.selected-price').hide();
    $(`.selected-price[idx=${findValue}]`).show()
  })

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

  $('.favorite__icon').click(function() {
    const stuffId = this.dataset.id;
    const hasFavorites = localStorage.getItem('favorites');
    if(hasFavorites !== null) {
      let arr = JSON.parse(hasFavorites)
      const combine = [...arr, stuffId];
      let uniqueItems = [...new Set(combine)];
      const update = JSON.stringify(uniqueItems);
      localStorage.setItem('favorites', update);
    } else {
      const init = JSON.stringify([stuffId]);
      localStorage.setItem('favorites', init);
    }
  })
});




