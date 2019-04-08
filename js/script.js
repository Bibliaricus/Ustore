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