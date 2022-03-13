//loader
$(function() {
  $('.loader-container').fadeOut();
})

// mobile menu toggle

$(document).on('click', '.mobile_menu_toggler', function() {
 $('.mobile_menu').slideToggle();
});

// scroll top button
$(function () {

  var scrollButton = $('.go-top');

  $(window).scroll(function () {

    if($(window).scrollTop() >= 500) {
      scrollButton.show();
    }else {
      scrollButton.hide();
    }

  });

  scrollButton.click(function () {
    $('html, body').animate({scrollTop: 0});
  })
});


// gallery imgs

$(function() {
  var gallery = $('.lightbox').simpleLightbox({

  });
});


// main slider

$(function(){
  
  var is_rtl = $("html[lang='ar']").length > 0;
    
  $('.one_main_slider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
    rtl: is_rtl,
    dots: true,
    arrows: true,
    loop: true,
    autoplay: true,
    autoplaySpeed: 5000,

  });
});



$(document).on('focus', '.contact__form .form-control', function() {
  $(this).prev('.form__icon').css('opacity', '1');
 });

 $(document).on('blur', '.contact__form .form-control', function() {
  $(this).prev('.form__icon').css('opacity', '0.5');
 });


