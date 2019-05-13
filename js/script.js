"use strict";
// Off-canvas menu for vish-list and shoping cart popup
  // Opening and closing
  /* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
  function openNav() {
    document.getElementById("vish-list-off-canvas").classList.add("off-canvas-open");
  }

  function openNav2() {
  document.getElementById("shoping-cart-off-canvas").classList.add("off-canvas-open");
  }

  /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
  function closeNav() {
    document.getElementById("vish-list-off-canvas").classList.remove("off-canvas-open");
  }

  function closeNav2() {
    document.getElementById("shoping-cart-off-canvas").classList.remove("off-canvas-open");
  }

  // Closing off-canvas on click outside popups
  $(document).mouseup(function (e){ // событие клика по веб-документу
    var div = $(".off-canvas-open"); // тут указываем ID элемента
    if (!div.is(e.target) // если клик был не по нашему блоку
        && div.has(e.target).length === 0) { // и не по его дочерним элементам
      div.removeClass('off-canvas-open'); // скрываем его
    }    
  });
  // Closing off-canvas on pressing "Esc"
  $(document).on('keydown', function (e) {
    var div = $(".off-canvas-open");
    if (e.keyCode === 27) {
      div.removeClass('off-canvas-open');
    } 
  });

  // Opening and closing search tooltip (native)
  $( ".search-field__area" ).click(function(e) {
    e.preventDefault();
    $(".search-field__toolip").addClass('form-retention');
  }) 
  $(document).mouseup(function (e){ // событие клика по веб-документу
		var div = $(".search-field__toolip"); // тут указываем ID элемента
		if (!div.is(e.target) // если клик был не по нашему блоку
		    && div.has(e.target).length === 0) { // и не по его дочерним элементам
			div.removeClass('form-retention'); // скрываем его
    }    
  });
  $(document).on('keydown', function (e) {
    var div = $(".search-field__toolip");
    if (e.keyCode === 27) {
      div.removeClass('form-retention');
    } 
  });

  // Quantity of products in quick view popup
  (function quantityProducts() {
    var $quantityArrowMinus = $(".quantity__minus");
    var $quantityArrowPlus = $(".quantity__plus");
    var $quantityNum = $(".quantity__number-input");
 
    $quantityArrowMinus.click(quantityMinus);
    $quantityArrowPlus.click(quantityPlus);
 
    function quantityMinus() {
      if ($quantityNum.val() > 1) {
        $quantityNum.val(+$quantityNum.val() - 1);
      }
    }
 
    function quantityPlus() {
      $quantityNum.val(+$quantityNum.val() + 1);
    }
  })();

$(document).ready(function() {
  // Slick slider in top interesting  
    $('.top-interes .tab-pane.active').slick({
      infinite: true,
      slidesToShow: 4,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 850,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 401,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }      
      ]
    });  
  
  // Slick slider in Bootstrap-4 tabs. 

  $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
    var targteta = $(this).attr('href');
    $(targteta).slick({
      infinite: true,
      slidesToShow: 4,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 850,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 401,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }      
      ]
    });    
  });

  // Getting likes and comments count from Instagram API (use with inWidget)
  jQuery(function($){
    $.ajax({
      url: 'https://api.instagram.com/v1/users/self/', // если ваше приложение прошло аппрув, вместо self можете указать ID пользователя
      dataType: 'jsonp',
      type: 'GET',
      data: {access_token: '13047723273.8a93252.5249d0b065464a25b51d4b87c388babe'},
      success: function(response){
         $('.new-insta-line').text(response.data.counts.followed_by); // количество подписчиков
      }
    });
  }); 

  // Slider in complete look (Slick)
  $('.complete-look__carousel').slick({
    dots: true
  });

  // Fixed header and correct position of sidenav and search field
  $(window).scroll(function() {
    var fixedScroll = $(window).scrollTop();
    var elementHeight = $(".fixed-header").outerHeight();
    if (fixedScroll < 100) {
      $(".fixed-header").removeClass('fixed-enable');
      $(".sidenav").css("top", "0");
      $(".search-field__toolip").css("top", "0");
    } else {
      $(".fixed-header").addClass('fixed-enable');
      $(".sidenav").css("top", elementHeight);
      $(".search-field__toolip").css("top", elementHeight);
    }
  });

  // Close button for mobile-header-menu
  $('.closebtn').on('click', function() {
    var parent = $(this).parent();
    $(parent).removeClass('show');
  });
});

// Subscribe modal

$('#subscribe-popup').modal();