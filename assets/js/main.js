$(document).ready(function () {

  wow = new WOW({
    boxClass: 'animate__animated', // default
    animateClass: 'animate__animated', // default
    offset: 0, // default
    mobile: true, // default
    live: true // default
  })
  wow.init();
  
  $(".single_product__gallery").lightGallery({
    speed: 500,
    mode: 'fade',
  });

  $('#active-search').click(function() {
    $('body').addClass('show-search');
  })

  $('#close-search').click(function() {
    $('body').removeClass('show-search');
    $('.search-form input').val('')
  })
  $('.product-order-button').click(function () {
    const prodName = $('.single_product_title').text();
    const prodSize = $('.product-size span:nth-child(2)').text();
    const prodArt = $('.product_article span:nth-child(2)').text();
    const prodComp = $('.nice-select .current').text();
    const prodPrice = $('.selected-price.current').text();

    $('.table-name').html(prodName);
    $('.table-size').html(prodSize);
    $('.table-article').html(prodArt);
    $('.table-compl').html(prodComp);
    $('.table-price').html(prodPrice);

    $('input[name="prodName"]').val(prodName.trim())
    $('input[name="prodSize"]').val(prodSize.trim())
    $('input[name="prodArticle"]').val(prodArt.trim())
    $('input[name="prodType"]').val(prodComp.trim())
    $('input[name="prodPrice"]').val(prodPrice.trim())
    
    $(this).modal({
      fadeDuration: 400,
    });
  });

  $('input[name="f-name"]').change(function(e) {
    $('input[name="userName"]').val(e.target.value)
  })
  $('input[name="f-email"]').change(function(e) {
    $('input[name="userEmail"]').val(e.target.value)
  })
  $('input[name="f-phone"]').change(function(e) {
    $('input[name="userPhone"]').val(e.target.value)
  })
  $('.set-form').click(function() {
    $('input[value="Submit"]').click();

    setTimeout(() => {
      const response = $('.wpcf7-response-output').text();
      $('.response-message').html(response);
    },300)
  })


  $('select').niceSelect();

  $('.variables-select-wrapper select').change(function () {
    const findValue = $('.nice-select .option.selected').attr('idx');
    $('.selected-price').hide().removeClass('current');
    $(`.selected-price[idx=${findValue}]`).show().addClass('current')
  })

  $('.flyout-trigger').click(function () {
    $('#header').toggleClass('flyout-shown')
  });

  const swiper = new Swiper(".front-slider", {
    slidesPerView: 1,
    speed: 800,
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      550: {
      
      },
      890: {

      },
      1100: {
        slidesPerView: 'auto',
      }
    }
  });

  new Swiper(".recommended", {
    slidesPerView: "1",
    loop: true,
    speed: 800,
    spaceBetween: 10,
    navigation: {
      nextEl: ".recommended-container .swiper-button-next",
      prevEl: ".recommended-container .swiper-button-prev",
    },    breakpoints: {
      700: {
        slidesPerView: '1',
      },
      890: {
        slidesPerView: '2',
      },
      1100: {
        slidesPerView: '3',
      }
    }
  });

  $('.favorite__icon').click(function () {
    const stuffId = this.dataset.id;
    const hasFavorites = localStorage.getItem('favorites');
    if (hasFavorites !== null) {
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
    parent.siblings('.active').removeClass('active')
    parent.addClass('active');
  }

  classUnderCategory.click(function () {

    handleCheckListItem($(this).parent('li'))
    underCategory = $(this).attr('data-slug');

    return $.ajax({
      type: 'POST',
      url: ajax.ajaxurl,
      data: {
        action: 'searchСategory',
        underCategory: underCategory,
        parent: $('h1').attr('data-slug'),
      },
      beforeSend: function () {
        $('.search-category').html(`
        <svg style="margin: auto; background: none; display: block; shape-rendering: auto;" width="104px" height="104px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
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


  function checkFormControl() {
    $(".form-control").each(function () {
      var thisa = $(this);
      if (thisa.val().length) {
        thisa.parents(".field-wrapper").addClass("focus");
        thisa.parents(".field-wrapper").addClass("validate");
      }
    });
  }
  checkFormControl();
  var $formField = $(".field-wrapper");
  $formField.on("focus", ".form-control", function () {
    $(this).parents(".field-wrapper").addClass("focus");
    $(this).parents(".field-wrapper .form-control").addClass("validate");
  });

  $formField.on("focusout", ".form-control", function () {
    if (!$(this).val().length) {
      $(this).parents(".field-wrapper").removeClass("focus");
    } else {
    }
  });
});




