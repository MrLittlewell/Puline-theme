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

  let classUnderCategory = $('.under-category span');
  const handleCheckListItem = (parent) => {
    parent.siblings('.checked').removeClass('checked')
    parent.toggleClass('checked');
  }

  classUnderCategory.click(function () {

    handleCheckListItem($(this))
    underCategory = $(this).attr('data-slug');

    return $.ajax({
      type: 'POST',
      url: ajax.ajaxurl,
      data: {
        action: 'searchСategory',
        underCategory: underCategory,
        parent: $('h1').attr('data-slug'),
      },
      beforeSend: function() {
        $('.search-category').html(`<?xml version="1.0" encoding="utf-8"?>
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="104px" height="104px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
        <circle cx="50" cy="50" r="18" stroke-width="3" stroke="#53585a" stroke-dasharray="28.274333882308138 28.274333882308138" fill="none" stroke-linecap="round">
          <animateTransform attributeName="transform" type="rotate" dur="1s" repeatCount="indefinite" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
        </circle>
        <circle cx="50" cy="50" r="14" stroke-width="3" stroke="#adbcbf" stroke-dasharray="21.991148575128552 21.991148575128552" stroke-dashoffset="21.991148575128552" fill="none" stroke-linecap="round">
          <animateTransform attributeName="transform" type="rotate" dur="1s" repeatCount="indefinite" keyTimes="0;1" values="0 50 50;-360 50 50"></animateTransform>
        </circle>
        </svg>`);
      },
      success: function (res) {
        setTimeout(() => {
          $('.search-category').html(res);
        }, 400)
      }
    })
  });

});




