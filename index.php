<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Favicons -->
  <link rel="icon" href="favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="icon" href="favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
  <link rel="icon" href="android-chrome-192x192.png" sizes="192x192" type="image/png">
  <link rel="manifest" href="site.webmanifest">

  <title>Ustore - pretty smart shop.</title>

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="css/slick.css">
  <link rel="stylesheet" href="css/style.min.css">
</head>
<body> 
  <!-- Modals -->
    
  <!-- ## Modals -->
  <div class="test"></div>
  <header class="container-fluid page-header">
    <div class="fixed-header">
      <a href="#fixed-mobile-header-menu" class="mobile-menu-humburger" data-toggle="collapse">
        <span class="mobile-menu-humburger__part"></span>
        <span class="mobile-menu-humburger__part"></span>
        <span class="mobile-menu-humburger__part"></span>
      </a> 
      <nav class="header-top__navbar navbar navbar-expand-lg navbar-light col-lg-10">        
        <div class="fixed-header-menu collapse navbar-collapse" id="fixed-header-menu">          
          <ul class="navbar-nav flex-grow-1 flex-wrap justify-content-center">
            <li class="nav-item mr-2 active">
              <a class="nav-link" href="#">Home Page</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="#">Ecommerce</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="#">Blog</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="#">Contact Us</a>
            </li>
          </ul>
        </div>
        <div class="fixed-mobile-header-menu collapse" id="fixed-mobile-header-menu">
          <span class="closebtn">&times;</span>
          <ul class="navbar-nav flex-grow-1 flex-wrap justify-content-center">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home Page</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Ecommerce</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
            </li>
          </ul>            
        </div>
      </nav>
      <div class="fixed-header__icons">
        <button class="header-bottom__icon-item icon-font-heart-regular mx-3" onclick="openNav()" title="Open vish list"></button>
        <button class="header-bottom__icon-item user-buttons__item search-field__button icon-font-search mx-3"></button>
        <form class="search-field__toolip" action="http://saney.ru/calculator/px-rem-calculator.php" method="GET">
          <input class="search-field__area" type="text" placeholder="Search for product..." aria-label="Search" list="search-list">
          <datalist id="search-list">
            <option value="Telephones"></option>
            <option value="Mobiles"></option>
            <option value="And many other things..."></option>       
          </datalist>          
          <button class="search-field__popup-button icon-font-search" type="submit"></button>
        </form>
        <button class="header-bottom__icon-item icon-font-bag shoping-cart-composite-icon mx-3" onclick="openNav2()" title="Open shopping cart" data-count="5"></button>
      </div>
    </div>
    <div class="header-top row">
      <div class="header-top__left col-6 d-flex align-items-center">
        <div class="dropdown header-top__language-list">
          <button class="dropdown-toggle header-top__language-button header-top__language-link lang-en pr-2" id="language-dropdown-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Choose your language">English</button>
          <div class="dropdown-menu" aria-labelledby="language-dropdown-button">
            <a href="#" class="dropdown-item header-top__language-link lang-en">English</a>
            <a href="#" class="dropdown-item header-top__language-link lang-fr">French</a>
            <a href="#" class="dropdown-item header-top__language-link lang-ger">German</a>
            <a href="#" class="dropdown-item header-top__language-link lang-it">Italian</a>
            <a href="#" class="dropdown-item header-top__language-link lang-ua">Ukrain</a>
          </div>
        </div>
        <div class="dropdown header-top__currency-list">
          <button class="dropdown-toggle header-top__currency-button pl-3 mr-2" id="currency-dropdown-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Choose desired currency">Eur / €</button>
          <div class="dropdown-menu" aria-labelledby="currency-dropdown-button">
            <a href="#" class="dropdown-item header-top__currency-link">Eur / €</a>
            <a href="#" class="dropdown-item header-top__currency-link">Gbp / £</a>
            <a href="#" class="dropdown-item header-top__currency-link">Chf / ₣</a>
            <a href="#" class="dropdown-item header-top__currency-link">Jpy / ¥</a>
          </div>
        </div>
        <div class="header-top__number-line ml-1">Order online or call us <a href="tel:+1800008808">(+1800) 000 8808</a></div>
      </div>      
      <div class="header-top__right col-6">
        <a href="#" class="header-top__login">Sign in or create an account</a>
        <form action="#" method="POST" class="login-popup">
          <label for="login">Username or email address<span class="required">*</span></label>
          <input type="text" name="login-email" id="login" class="login-popup__text-input">
          <label for="password">Password<span class="required">*</span></label>
          <input type="password" name="password-field" id="password" class="login-popup__text-input">
          <div class="checkbox-field">  
            <input type="checkbox" name="remember-me" id="remember-input">
            <label for="remember-input">Remember Me</label>
            <a href="#" class="login-popup__link">Lost password?</a>
          </div>  
          <button class="login-popup__button">Log in</button>
          <span>New client?
            <a href="#" class="login-popup__link">Register now!</a>
          </span>
        </form>     
        <ul class="header-top__social">
          <li><a href="#" class="icon-font-facebook-f-brands"></a></li>
          <li><a href="#" class="icon-font-twitter-brands"></a></li>
          <li><a href="#" class="icon-font-google-plus-logo"></a></li>
          <li><a href="#" class="icon-font-linkedin2"></a></li>
          <li><a href="#" class="icon-font-instagram"></a></li>
        </ul>
      </div>      
    </div>
    <div class="header-bottom row justify-content-between align-items-center px-4">
      <a href="#" class="header-bottom__logo navbar-brand col-md-auto col-lg-6 col-xl-2" tabindex="-1">        
        <img src="img/header-logo2.png" alt="Header logo">
      </a>
      <nav class="header-top__navbar navbar navbar-expand-lg navbar-light col-md-4 col-lg-12 col-xl-8 order-first order-lg-1 order-xl-0">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile-header-menu" aria-controls="mobile-header-menu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="header-responsive-menu">
          <ul class="desktop-nav navbar-nav flex-grow-1 flex-wrap justify-content-center">
            <li class="nav-item mr-4 active">
              <a class="nav-link" href="#">Home Page</a>
            </li>
            <li class="nav-item mx-4">
              <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item mx-4">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item mx-4">
              <a class="nav-link" href="#">Ecommerce</a>
            </li>
            <li class="nav-item mx-4">
              <a class="nav-link" href="#">Blog</a>
            </li>
            <li class="nav-item mx-4">
              <a class="nav-link" href="#">Contact Us</a>
            </li>
          </ul>
        </div>
        <div class="mobile-header-menu collapse" id="mobile-header-menu">
          <span href="#" class="closebtn">&times;</span>
          <ul class="mobile-nav navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home Page</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Ecommerce</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Sign in or create an account</a>
            </li>
          </ul>
          <ul class="mobile-top__social">
            <li><a href="#" class="icon-font-facebook-f-brands"></a></li>
            <li><a href="#" class="icon-font-twitter-brands"></a></li>
            <li><a href="#" class="icon-font-google-plus-logo"></a></li>
            <li><a href="#" class="icon-font-linkedin2"></a></li>
            <li><a href="#" class="icon-font-instagram"></a></li>
          </ul>
          <div class="header-top__number-line text-center">Order online or call us <a href="tel:+1800008808">(+1800) 000 8808</a></div>
        </div>
      </nav>
      <div class="header-bottom__icons-list d-flex justify-content-end align-items-center col-md-4 col-lg-6 col-xl-2">                
        <a href="#" class="header-bottom__icon-item icon-font-heart-regular mx-3" onclick="openNav()" title="Open vish list"></a>
        <div class="vish-list sidenav" id="vish-list-off-canvas">
          <div class="vish-list__header">
            <span class="vish-list__title">Wishlist</span>
          </div>
          <div class="vish-list__item-list">
            <div class="vish-list__item">
              <img src="img/feature_products-1-1.jpg" alt="Description of product" class="vish-list__item-image" width="50" height="50">
              <div class="vish-list__item-description">
                <a href="#" class="vish-list__item-name">Pure cosmetic</a>
                <span class="vish-list__item-delete-btn">x</span>
              </div>
            </div>  
            <div class="vish-list__item">
              <img src="img/feature_products-1-1.jpg" alt="Description of product" class="vish-list__item-image" width="50" height="50">
              <div class="vish-list__item-description">
                <a href="#" class="vish-list__item-name">Pure cosmetic</a>
                <span class="vish-list__item-delete-btn">x</span>
              </div>
            </div>             
          </div>
          <div class="vish-list__footer">              
            <a href="#" class="vish-list__vish-list-button vish-list__btn">Viev wishlist</a>
          </div>
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        </div>
        <span class="header-bottom__icon-item user-buttons__item search-field__button icon-font-search mx-lg-2 mx-xl-3" tabindex="0"></span>        
        <form class="search-field__toolip" action="http://saney.ru/calculator/px-rem-calculator.php" method="GET">
          <input class="search-field__area" type="text" placeholder="Search for product..." aria-label="Search" list="search-list">
          <datalist id="search-list">
            <option value="Telephones"></option>
            <option value="Mobiles"></option>
            <option value="And many other things..."></option>       
          </datalist>          
          <button class="search-field__popup-button icon-font-search" type="submit"></button>
        </form>
        <a href="#" class="header-bottom__icon-item icon-font-bag shoping-cart-composite-icon ml-3" onclick="openNav2()" title="Open shopping cart" data-count="5"></a>
        <div class="shoping-cart sidenav" id="shoping-cart-off-canvas">          
          <div class="shopping-cart__item-list">
            <div class="shopping-cart__item">
              <img src="img/feature_products-1-1.jpg" alt="Description of product" class="shopping-cart__item-image" width="50" height="50">
              <div class="shopping-cart__item-description">
                <a href="#" class="shopping-cart__item-name">Pure cosmetic</a>
                <span class="shopping-cart__item-quantity">1</span>
                <span class="shopping-cart__item-price">$199.00</span>
                <span class="shopping-cart__item-delete-btn">x</span>
              </div>
            </div>
            <div class="shopping-cart__item">
              <img src="img/feature_products-1-2.jpg" alt="Description of product" class="shopping-cart__item-image" width="50" height="50">
              <div class="shopping-cart__item-description">
                <a href="#" class="shopping-cart__item-name">Pure cosmetic</a>
                <span class="shopping-cart__item-quantity">1</span>
                <span class="shopping-cart__item-price">$199.00</span>
                <span class="shopping-cart__item-delete-btn">x</span>
              </div>
            </div>
            <div class="shopping-cart__item">
              <img src="img/feature_products-1-3.jpg" alt="Description of product" class="shopping-cart__item-image" width="50" height="50">
              <div class="shopping-cart__item-description">
                <a href="#" class="shopping-cart__item-name">Pure cosmetic</a>
                <span class="shopping-cart__item-quantity">1</span>
                <span class="shopping-cart__item-price">$199.00</span>
                <span class="shopping-cart__item-delete-btn">x</span>
              </div>
            </div>
          </div>
          <div class="shopping-cart__footer">
            <div class="shopping-cart__total-price">
              <span class="shopping-cart__total-quantity">Shoping cart (<span class="shopping-cart__total-quantity-number">3</span>)</span>
              <span class="shopping-cart__subtotal-price">Subtotal: £<span class="shopping-cart__subtotal-price-number">523.00</span></span>
            </div>
            <a href="#" class="shopping-cart__checkout-button shopping-cart__btn">Checkout</a>
          </div>
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
        </div>
        <span class="header-bottom__total-price ml-2" title="Total price">$259.99</span>
      </div>
    </div>
  </header>
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
      <div class="second-banners__item col-4">
        <a href="#" class="banner__category">ACCESSORIES</a>
        <a href="#" class="banner__title">Gateway Watch</a>
        <div class="banner__description">Door sit amet, consectetur adipiscing elit, sed do ore magna aliqua.</div>
        <button class="custom-btn">view more</button>
      </div>
      <div class="second-banners__item col-4">
        <a href="#" class="banner__category">Bags</a>
        <a href="#" class="banner__title">Beach bag</a>
        <div class="banner__description">Door sit amet, consectetur adipiscing elit, sed do ore magna aliqua.</div>
        <button class="custom-btn">View more</button>
      </div>
      <div class="second-banners__item col-4">
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
      <iframe src='/inwidget/index.php?inline=6&view=6toolbar=true&adaptive=true&width=600' name="inWidget" data-inwidget scrolling='no' frameborder='no' style='border:none;width:100%;height:800px;overflow:hidden;display:block;'></iframe>
    </div>       
  </section >  
  <section class="product-categories container">
    <h2 class="section-title">Product categories</h2>
    <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod lorem solo tempor incididunt ut labore et dolore magna aliqua.</p>
    <div class="product-categories__list row">
      <a href="#" class="product-categories__item col-3">
        <div class="product-categories__img-wrapper">
          <img src="img/product_categories-1.jpg" alt="Dresses category">
        </div>
        <div class="product-categories__text">
          <span href="#" class="item__category">Category</span>
          <span href="#" class="item__title">Dresses</span>
          <span href="#" class="prod-count">(25 products)</span>
        </div>
      </a>
      <a href="#" class="product-categories__item col-3">
        <div class="product-categories__img-wrapper">
          <img src="img/product_categories-2.jpg" alt="Dresses category">
        </div>
        <div class="product-categories__text">
          <span href="#" class="item__category">Category</span>
          <span href="#" class="item__title">Watches</span>
          <span href="#" class="prod-count">(25 products)</span>
        </div>
      </a>
      <a href="#" class="product-categories__item col-3">
        <div class="product-categories__img-wrapper">
          <img src="img/product_categories-3.jpg" alt="Dresses category">
        </div>
        <div class="product-categories__text">
          <span href="#" class="item__category">Category</span>
          <span href="#" class="item__title">Trousers</span>
          <span href="#" class="prod-count">(25 products)</span>
        </div>
      </a>
      <a href="#" class="product-categories__item col-3">
        <div class="product-categories__img-wrapper">
          <img src="img/product_categories-4.jpg" alt="Dresses category">
        </div>
        <div class="product-categories__text">
          <span href="#" class="item__category">Category</span>
          <span href="#" class="item__title">Perfumes</span>
          <span href="#" class="prod-count">(25 products)</span>
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
        <div class="complete-look__prod-item product__item col-sm-6">
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
        <div class="complete-look__prod-item product__item col-sm-6">
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
        <div class="complete-look__prod-item product__item col-sm-6">
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
        <div class="complete-look__prod-item product__item col-sm-6">
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
        <div class="pre-footer__featured-products col-md-4 col-xl-3">
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
        <div class="pre-footer__featured-products col-md-4 col-xl-3">
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
        <div class="pre-footer__featured-products col-md-4 col-xl-3">
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
  <footer>
    <div class="container">
      <div class="row">
        <div class="footer__contacts col-md-6 col-lg-3">
          <img src="img/footer-logo.png" alt="Footer logo" class="footer__logo">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod lorem.</p>
          <span>48 Park Avenue,</span>
          <span>East 21st Street, Apt. 304</span>
          <span>New York NY 10016</span>
          <span>Email: <a href="mailto:youremail@site.com" class="contact-link">youremail@site.com</a></span>
          <span>Phone: <a href="tel:+14089961010" class="contact-link">+1 408 996 1010</a></span></span>
        </div>
        <div class="footer__links col-md-6 col-lg-3 order-md-1 order-lg-0">
          <h4>Useful Links</h4>
          <div class="footer__links-cont">
            <ul>
              <li><a href="#">Home Page</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Delivery Info</a></li>
              <li><a href="#">Conditions</a></li>
              <li><a href="#">Order Tracking</a></li>
              <li><a href="#">My Account</a></li>
              <li><a href="#">My Wishlist</a></li>
            </ul>
            <ul>
              <li><a href="#">London</a></li>
              <li><a href="#">San Fransisco</a></li>
              <li><a href="#">New Orlean</a></li>
              <li><a href="#">Seatle</a></li>
              <li><a href="#">Portland</a></li>
              <li><a href="#">Stockholm</a></li>
              <li><a href="#">Hoffenheim</a></li>
            </ul>
          </div>
        </div>
        <div class="footer__posts col-md-6 col-lg-3">
          <h4>Latest posts</h4>
          <ul>
            <li>
              <img src="img/latest_news-1.jpg" alt="Image to latest posts">
              <div class="posts__text">
                <a href="#" class="posts__title">Down The Road</a>
                <time class="icon-font-baseline-today-24px">November 24, 2013</time>
                <span class="icon-font-bubble">5 Comments</span>
              </div>
            </li>
            <li>
              <img src="img/latest_news-2.jpg" alt="Image to latest posts">
              <div class="posts__text">
                <a href="#" class="posts__title">Down The Road</a>
                <time class="icon-font-baseline-today-24px">November 24, 2013</time>
                <span class="icon-font-bubble">5 Comments</span>
              </div>
            </li>
            <li>
              <img src="img/latest_news-3.jpg" alt="Image to latest posts">
              <div class="posts__text">
                <a href="#" class="posts__title">Down The Road</a>
                <time class="icon-font-baseline-today-24px">November 24, 2013</time>
                <span class="icon-font-bubble">5 Comments</span>
              </div>
            </li>
          </ul>
        </div>
        <div class="footer__tags col-md-6 col-lg-3 order-md-1 order-lg-0">
          <h4>Product tags</h4>
          <a href="#">Illegal</a>
          <a href="#">Accesories</a>
          <a href="#">Sale</a>
          <a href="#">Jeans</a>
          <a href="#">Fashion</a>
          <a href="#">Illegal</a>
          <a href="#">Accesories</a>
          <a href="#">Sale</a>
          <a href="#">Jeans</a>
          <a href="#">Fashion</a>
          <a href="#">Accesories</a>
        </div>
      </div>
    </div>
    <div class="copyright">
      <div class="container">
        <div class="row">
          <div class="copyright__authur col-6">
            &copy; Created by Web-lem. 
          </div>
          <div class="copyright__payments col-6">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Modals -->

  <!-- Quick view popup (new) -->
  <div class="modal fade" id="q-view-popup-new" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="q-view-popup-new modal-content row">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>        
        <div class="q-view-popup-new__image-slider carousel slide col-sm-6" id="q-view-slider" data-ride="carousel">          
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
        <div class="q-view-popup-new__information col-sm-6">
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
  <!-- ## Quick view popup (new) -->
  
  <!-- Subscribe modal popup -->
  <div class="modal fade subscribe-popup" id="subscribe-popup" tabindex="-1" role="dialog" aria-labelledby="subscribe-popup-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="subsribe-popup-wrap">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="subscribe-popup__title" id="subscribe-popup-title">Join our newsletter</h5>
          <p>Powerful, sleek template that is easy to cinfigure and 
              focused on presenting all your product in best way.</p>
          <form action="#" method="GET">
            <input type="email" placeholder="Email address...">
            <button>Sign In</button>
          </form>
          <span>*Don’t worry, we won’t spam our customers mailboxes</span>
        </div>
      </div>
    </div>
  </div>
  <!-- ## Subscribe modal popup -->
  <!-- ## Modals -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/slick.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>