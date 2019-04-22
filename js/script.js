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