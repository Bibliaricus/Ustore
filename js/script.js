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
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 450,
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
    console.log(targteta);
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
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 450,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }      
      ]
    });    
  });
});

// Суть проблеми: є таби, які зроблені з допомогою бутстрапа. Активний перший таб має певне відображення,
// а всі інші мають display: none; Я думаю, що проблема в тому, що слайдер завантажується на сторінку першим
// і через те, що його ініціалізація вказана відразу для всіх табів, починає розраховувати ширину слайдів. 
// А так як приховані слайди не мають ніякої ширини, то він їх і не може порахувати. 
// (Підтвердження цього є те, що при перемиканні на другий таб, slick-traсk до того, як його драгнути матиме  
// нульову ширину. Після того, як він буде драгнутий, то відразу ж розраховує ширину для цього діва.
// Таку ж нульову ширину матимуть самі слайди. Вони отримують ширину від скріпта після того, як
// slick-track буде драгнутим.) Тому з'явилась ідея. Ініціалізувати скріпт тільки для активного таба. 
// Для цього можна прив'язати ініціалізацію до класу, який буде додаватись до активного таба. 
// При переключенні табів, якимсь чином призупинити виконання сліковського скріпта, щоб спочатку додався активний клас,
// а через деякий час для цього ж активного класу розпочалась ініціалізація слайдеру. Щоб на її початок у слайдів 
// уже була реальна ширина. 

// Друге рішення, яке може бути простішим: замінити механізм перемикання табів. Тобто змінити display: none; 
// на щось інше. Наприклад на overflow: hidden; чи щось типу того. Звичайно ж, після того пофіксивши і підпилявши 
// верстку, яка обов'язково похериться. 

// Третє рішення: ініціалізувати або переініціалізувати слайдер уже після кліку на таб. 

// Короче, треба зробити так, щоб на момент ініціалізації слайди мали реальну ширину і не були прихоаними. 
// Для цього можна спробувати і четвертий спосіб: спочатку ініціалізувати слайдер із реальними ширинами слайдів, 
// а потім ці слайди приховати. 