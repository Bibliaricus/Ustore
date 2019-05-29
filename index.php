<?php
  //  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
  session_start();

  include ("bd.php");// файл bd.php должен быть в той же папке, что и    все остальные, если это не так, то просто измените путь           
  if    (!empty($_SESSION['login']) and !empty($_SESSION['password'])) {
  //если существует логин и пароль в сессиях, то проверяем их и    извлекаем аватар

  $login    = $_SESSION['login'];
  $password    = $_SESSION['password'];
  $result    = mysqli_query($db, "SELECT id,avatar FROM users WHERE login='$login' AND password='$password'"); 
  $myrow    = mysqli_fetch_array($result);
  $home = 'index.php';  

  //извлекаем нужные данные о пользователе
  }

  include 'global_vars.php';
  include $html_head; // Head with the meta-info and links
?>
<body class="home">  
<?php include $header; ?>
  <div class="main-banner carousel slide carousel-fade" data-ride="carousel" id="mainBannerSlider">
    <ol class="carousel-indicators">
      <li data-target="#mainBannerSlider" data-slide-to="0" class="active"></li>
      <li data-target="#mainBannerSlider" data-slide-to="1"></li>
      <li data-target="#mainBannerSlider" data-slide-to="2"></li>
      <li data-target="#mainBannerSlider" data-slide-to="3"></li>
    </ol>      
    <div class="carousel-inner">
      <div class="main-banner__slide slide1 carousel-item active">
        <div class="banner__category animated fadeInDown">Casual Shirts</div>
        <h3 class="banner__title animated fadeIn">Shirt One Pocket</h3>
        <div class="banner__description animated fadeInUp">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</div>
      </div>
      <div class="main-banner__slide slide2 carousel-item">
        <div class="banner__category animated fadeInRight">Casual Shirts</div>
        <h3 class="banner__title animated fadeInRight">Shirt One Pocket</h3>
        <div class="banner__description animated fadeInRight">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</div>
      </div>
      <div class="main-banner__slide slide3 carousel-item">
        <div class="banner__category animated fadeInUp">Casual Shirts</div>
        <h3 class="banner__title animated fadeInUp">Shirt One Pocket</h3>
        <div class="banner__description animated fadeInUp">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</div>
      </div>
      <div class="main-banner__slide slide4 carousel-item">
        <div class="banner__category animated fadeInLeft">Casual Shirts</div>
        <h3 class="banner__title animated fadeInLeft">Shirt One Pocket</h3>
        <div class="banner__description animated fadeInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</div>
      </div>
    </div>
    <!-- Controls to main banner slider -->
    <div class="main-banner__arrow-wrapper">
      <a class="main-banner-arrow-prev icon-font-angle-pointing-to-left" href="#mainBannerSlider" role="button" data-slide="prev"></a>
      <div class="mousehover">
        <img src="img/mousehover-1.jpg" alt="Product in mousehover">
        <div class="mousehover__links">
          <a href="#" class="item__category">shoes</a>
          <a href="#" class="item__title">Mouse Ballerina</a>
        </div>
      </div>
    </div>
    <div class="main-banner__arrow-wrapper">
      <a class="main-banner-arrow-next icon-font-angle-arrow-pointing-to-right" href="#mainBannerSlider" role="button" data-slide="next"></a>
      <div class="mousehover">
        <img src="img/mousehover-2.jpg" alt="Product in mousehover">
        <div class="mousehover__links">
          <a href="#" class="item__category">shoes</a>
          <a href="#" class="item__title">Mouse Ballerina</a>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="second-banners__list row">
      <div class="second-banners__item col-12 col-md-4">
        <a href="#" class="banner__category">ACCESSORIES</a>
        <a href="#" class="banner__title">Gateway Watch</a>
        <div class="banner__description">Door sit amet, consectetur adipiscing elit, sed do ore magna aliqua.</div>
        <button class="custom-btn">view more</button>
      </div>
      <div class="second-banners__item col-12 col-md-4">
        <a href="#" class="banner__category">Bags</a>
        <a href="#" class="banner__title">Beach bag</a>
        <div class="banner__description">Door sit amet, consectetur adipiscing elit, sed do ore magna aliqua.</div>
        <button class="custom-btn">View more</button>
      </div>
      <div class="second-banners__item col-12 col-md-4">
        <a href="#" class="banner__category">Sunglasses</a>
        <a href="#" class="banner__title">Cat sunglasses</a>
        <div class="banner__description">Door sit amet, consectetur adipiscing elit, sed do ore magna aliqua.</div>
        <button class="custom-btn">View more</button>
      </div>
    </div>
  </div>
  <section class="top-interes container">
    <h2 class="section-title">top interesting</h2>
    <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod lorem solo tempor incididunt ut labore et dolore magna aliqua.</p>
    <div class="top-interes__wrapper">
      <ul class="top-interes__tabs nav" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active slick-call-button" id="new-arrivals-tab" data-toggle="pill" href="#new-arrivals-content" role="tab" aria-controls="new-arrivals-content" aria-selected="true">New arrivals</a>
        </li>
        <li class="nav-item">
          <a class="nav-link slick-call-button" id="featured-tab" data-toggle="pill" href="#featured-content" role="tab" aria-controls="featured-content" aria-selected="false">Featured</a>
        </li>
        <li class="nav-item">
          <a class="nav-link slick-call-button" id="special-tab" data-toggle="pill" href="#special-content" role="tab" aria-controls="special-content" aria-selected="false">Special</a>
        </li>
      </ul>
      <div class="top-interes__content tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active row" id="new-arrivals-content" role="tabpanel" aria-labelledby="new-arrivals-tab">
          <div class="top-interes__item product__item col-3">
            <div class="top-interes__images product__image-container">
              <a href="#"><img src="img/top_interesting-1.jpg" alt="Image of product in top interesting section"></a>
              <div class="hover-buttons__list">
                  <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                  <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                  <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
              </div>
            </div>
            <div class="product__description">
              <a href="#" class="product__category">Coctail Dresses</a>
              <a href="#" class="product__title">Jacquard Duster</a>
              <div class="product__rating">
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-regular"></span>
              </div>
              <div class="product__prices">
                <span class="product__old-price">$350</span>
                <span class="product__new-price">$299,99</span>
              </div>
            </div>
          </div>
          <div class="top-interes__item product__item col-3">
            <div class="top-interes__images product__image-container">
              <a href="#"><img src="img/top_interesting-2.jpg" alt="Image of product in top interesting section"></a>
              <div class="hover-buttons__list">
                  <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                  <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                  <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
              </div>
            </div>
            <div class="product__description">
              <a href="#" class="product__category">Coctail Dresses</a>
              <a href="#" class="product__title">Jacquard Duster</a>
              <div class="product__rating">
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-regular"></span>
              </div>
              <div class="product__prices">
                <span class="product__old-price">$350</span>
                <span class="product__new-price">$299,99</span>
              </div>
            </div>
          </div>
          <div class="top-interes__item product__item product__item--sale col-3">
            <div class="top-interes__images product__image-container">
              <a href="#"><img src="img/top_interesting-3.jpg" alt="Image of product in top interesting section"></a>
              <div class="hover-buttons__list">
                  <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                  <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                  <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
              </div>
            </div>
            <div class="product__description">
              <a href="#" class="product__category">Coctail Dresses</a>
              <a href="#" class="product__title">Jacquard Duster</a>
              <div class="product__rating">
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-regular"></span>
              </div>
              <div class="product__prices">
                <span class="product__old-price">$350</span>
                <span class="product__new-price">$299,99</span>
              </div>
            </div>
          </div>
          <div class="top-interes__item product__item product__item--out col-3">
            <div class="top-interes__images product__image-container">
              <a href="#"><img src="img/top_interesting-4.jpg" alt="Image of product in top interesting section"></a>
              <div class="hover-buttons__list">
                  <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                  <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                  <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
              </div>
            </div>
            <div class="product__description">
              <a href="#" class="product__category">Coctail Dresses</a>
              <a href="#" class="product__title">Jacquard Duster</a>
              <div class="product__rating">
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-regular"></span>
              </div>
              <div class="product__prices">
                <span class="product__old-price">$350</span>
                <span class="product__new-price">$299,99</span>
              </div>
            </div>
          </div>
          <div class="top-interes__item product__item col-3">
            <div class="top-interes__images product__image-container">
              <a href="#"><img src="img/top_interesting-2.jpg" alt="Image of product in top interesting section"></a>
              <div class="hover-buttons__list">
                  <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                  <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                  <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
              </div>
            </div>
            <div class="product__description">
              <a href="#" class="product__category">Coctail Dresses</a>
              <a href="#" class="product__title">Jacquard Duster</a>
              <div class="product__rating">
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-regular"></span>
              </div>
              <div class="product__prices">
                <span class="product__old-price">$350</span>
                <span class="product__new-price">$299,99</span>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade row" id="featured-content" role="tabpanel" aria-labelledby="featured-tab">
          <div class="top-interes__item product__item col-3">
            <div class="top-interes__images product__image-container">
              <a href="#"><img src="img/top_interesting-1.jpg" alt="Image of product in top interesting section"></a>
              <div class="hover-buttons__list">
                  <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                  <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                  <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
              </div>
            </div>
            <div class="product__description">
              <a href="#" class="product__category">Coctail Dresses</a>
              <a href="#" class="product__title">Jacquard Duster</a>
              <div class="product__rating">
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-regular"></span>
              </div>
              <div class="product__prices">
                <span class="product__old-price">$350</span>
                <span class="product__new-price">$299,99</span>
              </div>
            </div>
          </div>
          <div class="top-interes__item product__item col-3">
            <div class="top-interes__images product__image-container">
              <a href="#"><img src="img/top_interesting-2.jpg" alt="Image of product in top interesting section"></a>
              <div class="hover-buttons__list">
                  <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                  <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                  <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
              </div>
            </div>
            <div class="product__description">
              <a href="#" class="product__category">Coctail Dresses</a>
              <a href="#" class="product__title">Jacquard Duster</a>
              <div class="product__rating">
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-regular"></span>
              </div>
              <div class="product__prices">
                <span class="product__old-price">$350</span>
                <span class="product__new-price">$299,99</span>
              </div>
            </div>
          </div>
          <div class="top-interes__item product__item col-3">
            <div class="top-interes__images product__image-container">
              <a href="#"><img src="img/top_interesting-2.jpg" alt="Image of product in top interesting section"></a>
              <div class="hover-buttons__list">
                  <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                  <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                  <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
              </div>
            </div>
            <div class="product__description">
              <a href="#" class="product__category">Coctail Dresses</a>
              <a href="#" class="product__title">Jacquard Duster</a>
              <div class="product__rating">
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-regular"></span>
              </div>
              <div class="product__prices">
                <span class="product__old-price">$350</span>
                <span class="product__new-price">$299,99</span>
              </div>
            </div>
          </div>
          <div class="top-interes__item product__item col-3">
            <div class="top-interes__images product__image-container">
              <a href="#"><img src="img/top_interesting-2.jpg" alt="Image of product in top interesting section"></a>
              <div class="hover-buttons__list">
                  <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                  <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                  <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
              </div>
            </div>
            <div class="product__description">
              <a href="#" class="product__category">Coctail Dresses</a>
              <a href="#" class="product__title">Jacquard Duster</a>
              <div class="product__rating">
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-regular"></span>
              </div>
              <div class="product__prices">
                <span class="product__old-price">$350</span>
                <span class="product__new-price">$299,99</span>
              </div>
            </div>
          </div>
          <div class="top-interes__item product__item col-3">
            <div class="top-interes__images product__image-container">
              <a href="#"><img src="img/top_interesting-4.jpg" alt="Image of product in top interesting section"></a>
              <div class="hover-buttons__list">
                  <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                  <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                  <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
              </div>
            </div>
            <div class="product__description">
              <a href="#" class="product__category">Coctail Dresses</a>
              <a href="#" class="product__title">Jacquard Duster</a>
              <div class="product__rating">
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-regular"></span>
              </div>
              <div class="product__prices">
                <span class="product__old-price">$350</span>
                <span class="product__new-price">$299,99</span>
              </div>
            </div>
          </div>
          <div class="top-interes__item product__item col-3">
            <div class="top-interes__images product__image-container">
              <a href="#"><img src="img/top_interesting-3.jpg" alt="Image of product in top interesting section"></a>
              <div class="hover-buttons__list">
                  <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                  <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                  <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
              </div>
            </div>
            <div class="product__description">
              <a href="#" class="product__category">Coctail Dresses</a>
              <a href="#" class="product__title">Jacquard Duster</a>
              <div class="product__rating">
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-regular"></span>
              </div>
              <div class="product__prices">
                <span class="product__old-price">$350</span>
                <span class="product__new-price">$299,99</span>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade row" id="special-content" role="tabpanel" aria-labelledby="special-tab">
          <div class="top-interes__item product__item product__item--sale col-3">
            <div class="top-interes__images product__image-container">
              <a href="#"><img src="img/top_interesting-2.jpg" alt="Image of product in top interesting section"></a>
              <div class="hover-buttons__list">
                  <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                  <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                  <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
              </div>
            </div>
            <div class="product__description">
              <a href="#" class="product__category">Coctail Dresses</a>
              <a href="#" class="product__title">Jacquard Duster</a>
              <div class="product__rating">
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-regular"></span>
              </div>
              <div class="product__prices">
                <span class="product__old-price">$350</span>
                <span class="product__new-price">$299,99</span>
              </div>
            </div>
          </div>
          <div class="top-interes__item product__item product__item--sale col-3">
            <div class="top-interes__images product__image-container">
              <a href="#"><img src="img/top_interesting-2.jpg" alt="Image of product in top interesting section"></a>
              <div class="hover-buttons__list">
                  <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                  <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                  <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
              </div>
            </div>
            <div class="product__description">
              <a href="#" class="product__category">Coctail Dresses</a>
              <a href="#" class="product__title">Jacquard Duster</a>
              <div class="product__rating">
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-regular"></span>
              </div>
              <div class="product__prices">
                <span class="product__old-price">$350</span>
                <span class="product__new-price">$299,99</span>
              </div>
            </div>
          </div>
          <div class="top-interes__item product__item product__item--sale col-3">
            <div class="top-interes__images product__image-container">
              <a href="#"><img src="img/top_interesting-2.jpg" alt="Image of product in top interesting section"></a>
              <div class="hover-buttons__list">
                  <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                  <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                  <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
              </div>
            </div>
            <div class="product__description">
              <a href="#" class="product__category">Coctail Dresses</a>
              <a href="#" class="product__title">Jacquard Duster</a>
              <div class="product__rating">
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-regular"></span>
              </div>
              <div class="product__prices">
                <span class="product__old-price">$350</span>
                <span class="product__new-price">$299,99</span>
              </div>
            </div>
          </div>
          <div class="top-interes__item product__item product__item--sale col-3">
            <div class="top-interes__images product__image-container">
              <a href="#"><img src="img/top_interesting-2.jpg" alt="Image of product in top interesting section"></a>
              <div class="hover-buttons__list">
                  <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                  <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                  <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
              </div>
            </div>
            <div class="product__description">
              <a href="#" class="product__category">Coctail Dresses</a>
              <a href="#" class="product__title">Jacquard Duster</a>
              <div class="product__rating">
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-regular"></span>
              </div>
              <div class="product__prices">
                <span class="product__old-price">$350</span>
                <span class="product__new-price">$299,99</span>
              </div>
            </div>
          </div>
          <div class="top-interes__item product__item product__item--sale col-3">
            <div class="top-interes__images product__image-container">
              <a href="#"><img src="img/top_interesting-4.jpg" alt="Image of product in top interesting section"></a>
              <div class="hover-buttons__list">
                  <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                  <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                  <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
              </div>
            </div>
            <div class="product__description">
              <a href="#" class="product__category">Coctail Dresses</a>
              <a href="#" class="product__title">Jacquard Duster</a>
              <div class="product__rating">
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-regular"></span>
              </div>
              <div class="product__prices">
                <span class="product__old-price">$350</span>
                <span class="product__new-price">$299,99</span>
              </div>
            </div>
          </div>
          <div class="top-interes__item product__item product__item--sale col-3">
            <div class="top-interes__images product__image-container">
              <a href="#"><img src="img/top_interesting-1.jpg" alt="Image of product in top interesting section"></a>
              <div class="hover-buttons__list">
                  <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                  <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                  <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
              </div>
            </div>
            <div class="product__description">
              <a href="#" class="product__category">Coctail Dresses</a>
              <a href="#" class="product__title">Jacquard Duster</a>
              <div class="product__rating">
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-solid"></span>
                <span class="icon-font-star-regular"></span>
              </div>
              <div class="product__prices">
                <span class="product__old-price">$350</span>
                <span class="product__new-price">$299,99</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="insta-line container-fluid">
    <div class="insta-line__title">
      <h2>FOLLOW @ INSTAGRAM</h2>
    </div>
    <div class="insta-line__list">
      <iframe src='/inwidget/index.php?inline=6&view=6toolbar=true&adaptive=true&width=600' name="inWidget" data-inwidget style='border:none;width:100%;height:800px;overflow:hidden;display:block;'></iframe>
    </div>       
  </section >  
  <section class="product-categories container">
    <h2 class="section-title">Product categories</h2>
    <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod lorem solo tempor incididunt ut labore et dolore magna aliqua.</p>
    <div class="product-categories__list row">
      <a href="#" class="product-categories__item col-6 col-md-3">
        <div class="product-categories__img-wrapper">
          <img src="img/product_categories-1.jpg" alt="Dresses category">
        </div>
        <div class="product-categories__text">
          <span class="item__category">Category</span>
          <span class="item__title">Dresses</span>
          <span class="prod-count">(25 products)</span>
        </div>
      </a>
      <a href="#" class="product-categories__item col-6 col-md-3">
        <div class="product-categories__img-wrapper">
          <img src="img/product_categories-2.jpg" alt="Dresses category">
        </div>
        <div class="product-categories__text">
          <span class="item__category">Category</span>
          <span class="item__title">Watches</span>
          <span class="prod-count">(25 products)</span>
        </div>
      </a>
      <a href="#" class="product-categories__item col-6 col-md-3">
        <div class="product-categories__img-wrapper">
          <img src="img/product_categories-3.jpg" alt="Dresses category">
        </div>
        <div class="product-categories__text">
          <span class="item__category">Category</span>
          <span class="item__title">Trousers</span>
          <span class="prod-count">(25 products)</span>
        </div>
      </a>
      <a href="#" class="product-categories__item col-6 col-md-3">
        <div class="product-categories__img-wrapper">
          <img src="img/product_categories-4.jpg" alt="Dresses category">
        </div>
        <div class="product-categories__text">
          <span class="item__category">Category</span>
          <span class="item__title">Perfumes</span>
          <span class="prod-count">(25 products)</span>
        </div>
      </a>
    </div>
  </section>
  <section class="complete-look container">
    <span class="section-label">women collection</span>
    <h2 class="section-title">Complete the look</h2>
    <p class="section-description">Dolor sit amet, consectetur adipiscing elit, sed do eiusmo dadipiscing elit, adipiscing elit, sed do eiusmod sed do eiusmod lorem ipsun dolore magna aliqua.</p>
    <div class="complete-look__content row">
      <div class="complete-look__carousel col-12 col-md-5 col-lg-4">
        <div class="complete-look__slide product__item">
          <div class="top-interes__images product__image-container">
            <a href="#"><img src="img/bottom_side_banner.jpg" alt="Image of product in top interesting section"></a>
            <div class="hover-buttons__list">
                <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
            </div>
          </div>
          <div class="product__description">
            <a href="#" class="product__category">Coctail Dresses</a>
            <a href="#" class="product__title">Jacquard Duster</a>
            <div class="product__rating">
              <span class="icon-font-star-solid"></span>
              <span class="icon-font-star-solid"></span>
              <span class="icon-font-star-solid"></span>
              <span class="icon-font-star-solid"></span>
              <span class="icon-font-star-regular"></span>
            </div>
            <div class="product__prices">
              <span class="product__old-price">$350</span>
              <span class="product__new-price">$299,99</span>
            </div>
          </div>
        </div>
        <div class="complete-look__slide product__item">
          <div class="top-interes__images product__image-container">
            <a href="#"><img src="img/bottom_side_banner.jpg" alt="Image of product in top interesting section"></a>
            <div class="hover-buttons__list">
                <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
            </div>
          </div>
          <div class="product__description">
            <a href="#" class="product__category">Coctail Dresses</a>
            <a href="#" class="product__title">Jacquard Duster</a>
            <div class="product__rating">
              <span class="icon-font-star-solid"></span>
              <span class="icon-font-star-solid"></span>
              <span class="icon-font-star-solid"></span>
              <span class="icon-font-star-solid"></span>
              <span class="icon-font-star-regular"></span>
            </div>
            <div class="product__prices">
              <span class="product__old-price">$350</span>
              <span class="product__new-price">$299,99</span>
            </div>
          </div>
        </div>
        <div class="complete-look__slide product__item">
          <div class="top-interes__images product__image-container">
            <a href="#"><img src="img/bottom_side_banner.jpg" alt="Image of product in top interesting section"></a>
            <div class="hover-buttons__list">
                <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
            </div>
          </div>
          <div class="product__description">
            <a href="#" class="product__category">Coctail Dresses</a>
            <a href="#" class="product__title">Jacquard Duster</a>
            <div class="product__rating">
              <span class="icon-font-star-solid"></span>
              <span class="icon-font-star-solid"></span>
              <span class="icon-font-star-solid"></span>
              <span class="icon-font-star-solid"></span>
              <span class="icon-font-star-regular"></span>
            </div>
            <div class="product__prices">
              <span class="product__old-price">$350</span>
              <span class="product__new-price">$299,99</span>
            </div>
          </div>
        </div>
        <div class="complete-look__slide product__item">
          <div class="top-interes__images product__image-container">
            <a href="#"><img src="img/bottom_side_banner.jpg" alt="Image of product in top interesting section"></a>
            <div class="hover-buttons__list">
                <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
            </div>
          </div>
          <div class="product__description">
            <a href="#" class="product__category">Coctail Dresses</a>
            <a href="#" class="product__title">Jacquard Duster</a>
            <div class="product__rating">
              <span class="icon-font-star-solid"></span>
              <span class="icon-font-star-solid"></span>
              <span class="icon-font-star-solid"></span>
              <span class="icon-font-star-solid"></span>
              <span class="icon-font-star-regular"></span>
            </div>
            <div class="product__prices">
              <span class="product__old-price">$350</span>
              <span class="product__new-price">$299,99</span>
            </div>
          </div>
        </div>
      </div>
      <div class="complete-look__products col-12 col-md-7 col-lg-8 row">
        <div class="complete-look__prod-item product__item col-6">
          <div class="top-interes__images product__image-container">
            <a href="#"><img src="img/complate_look-1n.jpg" alt="Image of product in top interesting section"></a>
            <div class="hover-buttons__list">
                <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
            </div>
          </div>
          <div class="product__description">
            <a href="#" class="product__category">Coctail Dresses</a>
            <a href="#" class="product__title">Jacquard Duster</a>            
            <div class="product__prices">
              <span class="product__old-price">$350</span>
              <span class="product__new-price">$299,99</span>
            </div>
          </div>
        </div>
        <div class="complete-look__prod-item product__item col-6">
          <div class="top-interes__images product__image-container">
            <a href="#"><img src="img/complate_look-2n.jpg" alt="Image of product in top interesting section"></a>
            <div class="hover-buttons__list">
                <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
            </div>
          </div>
          <div class="product__description">
            <a href="#" class="product__category">Coctail Dresses</a>
            <a href="#" class="product__title">Jacquard Duster</a>            
            <div class="product__prices">
              <span class="product__old-price">$350</span>
              <span class="product__new-price">$299,99</span>
            </div>
          </div>
        </div>
        <div class="complete-look__prod-item product__item col-6">
          <div class="top-interes__images product__image-container">
            <a href="#"><img src="img/complate_look-3n.jpg" alt="Image of product in top interesting section"></a>
            <div class="hover-buttons__list">
                <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
            </div>
          </div>
          <div class="product__description">
            <a href="#" class="product__category">Coctail Dresses</a>
            <a href="#" class="product__title">Jacquard Duster</a>            
            <div class="product__prices">
              <span class="product__old-price">$350</span>
              <span class="product__new-price">$299,99</span>
            </div>
          </div>
        </div>
        <div class="complete-look__prod-item product__item col-6">
          <div class="top-interes__images product__image-container">
            <a href="#"><img src="img/complate_look-4n.jpg" alt="Image of product in top interesting section"></a>
            <div class="hover-buttons__list">
                <button type="button" class="hover-buttons__item wishlist__add-btn icon-font-heart-regular" title="Add to wishlist"></button>
                <button type="button" class="hover-buttons__item shopping-cart__add-btn icon-font-cart" title="Add to shopping cart"></button>
                <button type="button" class="hover-buttons__item quick-view__btn icon-font-eye" data-toggle="modal" data-target="#q-view-popup-new" title="Open quick view"></button>
            </div>
          </div>
          <div class="product__description">
            <a href="#" class="product__category">Coctail Dresses</a>
            <a href="#" class="product__title">Jacquard Duster</a>            
            <div class="product__prices">
              <span class="product__old-price">$350</span>
              <span class="product__new-price">$299,99</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="pre-footer">
    <div class="container">
      <div class="row">
        <div class="pre-footer__featured-products col-sm-6 col-md-4 col-xl-3">
          <h3 class="featured-products__column-title">Featured Products</h3>
          <ul class="featured-products__list">
            <li class="featured-products__item">
              <a href="#">  
                <img src="img/feature_products-1-1.jpg" alt="Product in feature products">
              </a>
              <div class="featured-products__text">
                <a href="#" class="featured-products__prod-title">Lemon Jacquard Duster</a>
                <div class="product__prices">
                  <span class="product__old-price">$350</span>
                  <span class="product__new-price">$299,99</span>
                </div>
              </div>
            </li>
            <li class="featured-products__item">
              <a href="#">  
                <img src="img/feature_products-1-2.jpg" alt="Product in feature products">
              </a>
              <div class="featured-products__text">
                <a href="#" class="featured-products__prod-title">Lemon Jacquard Duster</a>
                <div class="product__prices">
                  <span class="product__old-price">$350</span>
                  <span class="product__new-price">$299,99</span>
                </div>
              </div>
            </li>
            <li class="featured-products__item">
              <a href="#">  
                <img src="img/feature_products-1-3.jpg" alt="Product in feature products">
              </a>
              <div class="featured-products__text">
                <a href="#" class="featured-products__prod-title">Lemon Jacquard Duster</a>
                <div class="product__prices">
                  <span class="product__old-price">$350</span>
                  <span class="product__new-price">$299,99</span>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="pre-footer__featured-products col-sm-6 col-md-4 col-xl-3">
          <h3 class="featured-products__column-title">Featured Products</h3>
          <ul class="featured-products__list">
            <li class="featured-products__item">
              <a href="#">  
                <img src="img/feature_products-2-1.jpg" alt="Product in feature products">
              </a>
              <div class="featured-products__text">
                <a href="#" class="featured-products__prod-title">Lemon Jacquard Duster</a>
                <div class="product__prices">
                  <span class="product__old-price">$350</span>
                  <span class="product__new-price">$299,99</span>
                </div>
              </div>
            </li>
            <li class="featured-products__item">
              <a href="#">  
                <img src="img/feature_products-2-2.jpg" alt="Product in feature products">
              </a>
              <div class="featured-products__text">
                <a href="#" class="featured-products__prod-title">Lemon Jacquard Duster</a>
                <div class="product__prices">
                  <span class="product__old-price">$350</span>
                  <span class="product__new-price">$299,99</span>
                </div>
              </div>
            </li>
            <li class="featured-products__item">
              <a href="#">  
                <img src="img/feature_products-2-3.jpg" alt="Product in feature products">
              </a>
              <div class="featured-products__text">
                <a href="#" class="featured-products__prod-title">Lemon Jacquard Duster</a>
                <div class="product__prices">
                  <span class="product__old-price">$350</span>
                  <span class="product__new-price">$299,99</span>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="pre-footer__featured-products col-sm-6 col-md-4 col-xl-3 mx-auto mx-md-0 my-sm-3 my-md-0">
          <h3 class="featured-products__column-title">Featured Products</h3>
          <ul class="featured-products__list">
            <li class="featured-products__item">
              <a href="#">  
                <img src="img/feature_products-3-1.jpg" alt="Product in feature products">
              </a>
              <div class="featured-products__text">
                <a href="#" class="featured-products__prod-title">Lemon Jacquard Duster</a>
                <div class="product__prices">
                  <span class="product__old-price">$350</span>
                  <span class="product__new-price">$299,99</span>
                </div>
              </div>
            </li>
            <li class="featured-products__item">
              <a href="#">  
                <img src="img/feature_products-3-2.jpg" alt="Product in feature products">
              </a>
              <div class="featured-products__text">
                <a href="#" class="featured-products__prod-title">Lemon Jacquard Duster</a>
                <div class="product__prices">
                  <span class="product__old-price">$350</span>
                  <span class="product__new-price">$299,99</span>
                </div>
              </div>
            </li>
            <li class="featured-products__item">
              <a href="#">  
                <img src="img/feature_products-3-3.jpg" alt="Product in feature products">
              </a>
              <div class="featured-products__text">
                <a href="#" class="featured-products__prod-title">Lemon Jacquard Duster</a>
                <div class="product__prices">
                  <span class="product__old-price">$350</span>
                  <span class="product__new-price">$299,99</span>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="pre-footer__subscribe col-lg-12 col-xl-3">
          <h4 class="subscribe__title">Join Xstore newsletter</h4>
          <p class="subscribe__description">You can be always up to date with our company news!</p>
          <form action="#">
            <input type="email" placeholder="Email address..." required>
            <button class="icon-font-add"></button>
          </form>
          <p>*Don’t worry, we won’t spam our customers mailboxes</p>
        </div>
      </div>
    </div>
  </div>
  <?php
    include $footer;
  ?>

  <!-- Modals -->
  <?php
    include $quick_view_popup;
   // include $subscribe_modal;
  ?>
  <!-- ## Modals -->

  <?php include $functions; ?>

</html>