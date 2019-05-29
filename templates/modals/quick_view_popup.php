<?php ?>
<div class="modal fade" id="q-view-popup-new" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="q-view-popup-new modal-content row">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>        
        <div class="q-view-popup-new__image-slider carousel slide col-sm-12 col-md-6" id="q-view-slider" data-ride="carousel">          
          <div class="carousel-inner">
            <div class="q-view-popup-new carousel-item active">
              <img src="img/quick_view_poppup.jpg" alt="Name or description of product in popup">
            </div>
            <div class="q-view-popup-new carousel-item">
              <img src="img/quick_view_poppup.jpg" alt="Name of description of product in popup">
            </div>
          </div>
          <a class="carousel-control-prev main-banner__arrow-side" href="#q-view-slider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon q-view__arrow" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next main-banner__arrow-side" href="#q-view-slider" role="button" data-slide="next">
            <span class="carousel-control-next-icon q-view__arrow" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="q-view-popup-new__information col-sm-12 col-md-6">
          <h3 class="q-view-popup-new__title"><a href="#">Fashion demo new</a></h3>
          <p class="q-view-popup-new__description">Dress by SOAKED IN LUXURY. Long sleeves and rounded neckline. Mesh at neckline and on sleeves. Bodycon fit. Concealed zipper and button fastening to reverse. Thin lining.</p>
          <span class="q-view-popup-new__input-label">Size:</span>
          <select name="prod-size" id="prod-size">
            <option value="extra-small">Extra Small</option>
            <option value="small">Extra</option>
            <option value="medium">Medium</option>
            <option value="large">Large</option>
            <option value="extra-large">Extra Large</option>
          </select>
          <span class="q-view-popup-new__input-label">Color:</span>
          <select name="prod-color" id="prod-color">
            <option value="black">Black</option>
            <option value="green">Green</option>
            <option value="yellow">Yellow</option>
            <option value="blood">BLOODY!!!</option>
          </select>
          <span class="q-view-popup-new__input-label">Quality:</span>
          <div class="q-view-popup-new__quantity">
            <span class="quantity__minus">-</span>
            <input type="number" class="quantity__number-input" min="1" step="1" value="1">
            <span class="quantity__plus">+</span>
          </div>
          <button class="q-view-popup-new__btn">Add to cart</button>
          <hr>
          <div class="q-view-popup-new__socails">
            <span>Share social</span>
            <div class="q-view-popup-new__social-list">
              <a href="#" class="icon-font-google-plus-logo"></a>
              <a href="#" class="icon-font-twitter-brands"></a>
              <a href="#" class="icon-font-facebook-f-brands"></a>
              <a href="#" class="icon-font-linkedin2"></a>
              <a href="#" class="icon-font-envelope-of-white-paper"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php ?>