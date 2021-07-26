// Preloader
$(window).on("load", (function () {
  $("#preloader").fadeOut("slow", (function () {
    $(this).remove()
  }))
}));

// Dropdown on Hover
$(window).resize(function () {
  if ($(window).width() >= 980) {

    // when you hover a toggle show its dropdown menu
    $(".navbar .dropdown-toggle, .dropdown-menu").hover(function () {
      $(this).parent().toggleClass("show");
      $(this).parent().find(".dropdown-menu").toggleClass("show");
    });

    // hide the menu when the mouse leaves the dropdown
    $(".navbar .dropdown-menu").mouseleave(function () {
      $(this).removeClass("show");
    });

    // do something here
  }
});

//Header Shrink on Scroll
$(window).scroll(function () {
  if ($(document).scrollTop() > 50) {
    $('nav').addClass('shrink');
    $('nav').addClass('shadow');
  } else {
    $('nav').removeClass('shrink');
    $('nav').removeClass('shadow');
  }
});

//Scroll to Top
$(window).scroll(function () {
  if ($(this).scrollTop() >= 50) { // If page is scrolled more than 50px
    $('.scroll-top').animate({
      "opacity": 1
    }, 2);
  } else {
    $('.scroll-top').animate({
      "opacity": 0
    }, 2); // Else fade out the arrow
  }
});
$('.scroll-top').click(function () { // When arrow is clicked
  $('body,html').animate({
    scrollTop: 0 // Scroll to top of body
  }, 500);
});

// fixed Footer
$(window).height();
if ($(window).height() > $('body').height()) {
  $('footer').addClass('fixed-bottom')
} else {
  $('footer').removeClass('fixed-bottom');
}

// Search Box
$('#searchOpen').click(function (e) {
e.preventDefault();
  $('.search-container').fadeIn();
});

$('#searchClose').click(function () {
  $('.search-container').fadeOut(500);
});

// Select2 Initialization
$('.select-2').select2();

// Slides
var swiper = new Swiper('.swiper-container', {
  slidesPerView: 3,
  spaceBetween: 30,
  navigation: {
    nextEl: '.btn-next',
    prevEl: '.btn-prev',
  },
  breakpoints: {
    310: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 50,
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 50,
    },
  }
});

var swiper = new Swiper('.featured .swiper-container', {
  slidesPerView: 5,
  spaceBetween: 30,
  loop: true,
  navigation: {
    nextEl: '.btn-next',
    prevEl: '.btn-prev',
  },
  breakpoints: {
    310: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 30,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
    1200: {
      slidesPerView: 4,
      spaceBetween: 40,
    },
    1400: {
      slidesPerView: 5,
      spaceBetween: 50,
    },
  }
});

// Favourate
$('.fav').click(function(){
  var check = $(this).children('[type="checkbox"]');
  var heart = $(this).children('i');
  if(check.is(':checked')){
    check.attr("checked", false);
    heart.removeClass('fas text-primary');
    heart.addClass('far');
  }
  else{
    check.attr("checked", true);
    heart.addClass('fas text-primary');
    heart.removeClass('far');
  }
});

// Tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

