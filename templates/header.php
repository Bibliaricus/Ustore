<?php 
function colsIfUserLogined($col_not_user, $col_user) {
  if (empty($_SESSION['login']) || empty($_SESSION['id']) ) {
    echo 'col-' . $col_not_user;
  } else {
    echo 'col-' . $col_user;
  }
}
?>
  <header class="container-fluid page-header">
    <div class="fixed-header">
      <a href="#fixed-mobile-header-menu" class="mobile-menu-humburger" data-toggle="collapse">
        <span class="mobile-menu-humburger__part"></span>
        <span class="mobile-menu-humburger__part"></span>
        <span class="mobile-menu-humburger__part"></span>
      </a> 
      <nav class="header-top__navbar navbar navbar-expand-lg navbar-light col-lg-10">
      <?php if (!empty($_SESSION['login']) or !empty($_SESSION['id'])) { ?>
      <div class="header-top__user-bar col-xl-3">
        <div class="user-info-panel">
        <?php
          // if (!empty($_SESSION['login']) or !empty($_SESSION['id']))
          // {        
            if (!isset($myrow['avatar']) or $myrow['avatar'] == '') {
              $avatar = "avatars/no_photo.jpg";
              echo '<a class="avatar-link" href="user-page.php?id=' . $myrow['id'] . '"><img class="user-avatar" alt="Avatar of ' . $_SESSION['login'] . '" src="' . $avatar . '"></a>';
            } else {
              echo '<a class="avatar-link" href="user-page.php?id=' . $myrow['id'] . '"><img class="user-avatar" alt="' . $_SESSION['login'] . '" src="' . $myrow['avatar'] . '"></a>';
            }
            echo "<span class=\"user-logged-name\">" . '<a class="user-name" href="user-page.php?id=' . $myrow['id'] . '" title="Enter in my account">' . $_SESSION['login']. '</span>';
            echo '</div>';
            echo '<a class="my-acc-link" href="user-page.php?id=' . $myrow['id'] . '">My account</a>';
            echo '<a class="icon-font-logout user-exit-button" href="exit.php">Logout</a>';
            // }

          // ------------------------------------------------------  New code  ----------------------------------
          if (!isset($myrow['avatar']) or $myrow['avatar'] == '') {

            //проверяем, не извлечены ли данные пользователя из базы. Если    нет, то он не вошел, либо пароль в сессии неверный. Выводим окно для входа.    Но мы не будем его выводить для вошедших, им оно уже не нужно.
    
          } else {
    //при удачном входе пользователю выдается все, что расположено    ниже между звездочками.
          }

          ?>
        <!-- </div> -->
      </div>
      <?php } ?>
        <div class="fixed-header-menu collapse navbar-collapse" id="fixed-header-menu">          
          <ul class="navbar-nav flex-grow-1 flex-wrap justify-content-center">
            <li class="nav-item mr-2 active">
              <a class="nav-link" href="index.php">Home Page</a>
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
              <a class="nav-link" href="index.php">Home Page</a>
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
            <?php if (empty($_SESSION['login']) || empty($_SESSION['id']) ) {?>
            <li class="nav-item">
              <a class="nav-link" href="reg.php">Sign in or create account</a>
            </li>
            <?php } ?>
          </ul>            
        </div>
      </nav>
      <div class="fixed-header__icons">
        <button class="header-bottom__icon-item icon-font-heart-regular mx-3" onclick="openNav()" title="Open vish list"></button>
        <button class="header-bottom__icon-item user-buttons__item search-field__button icon-font-search mx-3"></button>
        <form class="search-field__toolip" action="http://saney.ru/calculator/px-rem-calculator.php" method="GET">
          <input class="search-field__area" type="text" placeholder="Search for product..." aria-label="Search" list="search-list_fixed-header">
          <datalist id="search-list_fixed-header">
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
      <div class="header-top__left <?php colsIfUserLogined(6, 4) ?> d-flex align-items-center">
        <div class="dropdown header-top__language-list">
          <button class="dropdown-toggle header-top__language-button header-top__language-link lang-en pr-2" id="language-dropdown-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Choose your language">English</button>
          <div class="dropdown-menu" aria-labelledby="language-dropdown-button">
            <?php $languages = array(
             'en' => 'English',
             'fr' => 'Franch',
             'ger' => 'Germany',
             'it' => 'Italian',
             'ua' => 'Ukraine',
            ) ?>
            <?php foreach ($languages as $key => $value) {?>
            <a href="#" class="dropdown-item header-top__language-link lang-<?php echo $key; ?>"><?php echo $value; ?></a>
            <?php
          } ?>
          </div>
        </div>
        <div class="dropdown header-top__currency-list">
          <button class="dropdown-toggle header-top__currency-button pl-3 mr-2" id="currency-dropdown-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Choose desired currency">Eur / €</button>
          <div class="dropdown-menu" aria-labelledby="currency-dropdown-button">
            <?php $currency = array('Eur / €', 'Gbp / £', 'Chf / ₣', 'Jpy / ¥'); ?>
            <?php foreach ($currency as $key => $value) {?>
              <a href="#" class="dropdown-item header-top__currency-link"><?php echo $value; ?></a>
              <?php
            } ?>
          </div>
        </div>
        <div class="header-top__number-line ml-1">Order online or call us <a href="tel:+1800008808">(+1800) 000 8808</a></div>
      </div>
      <?php if (!empty($_SESSION['login']) or !empty($_SESSION['id'])) { ?>
      <div class="header-top__user-bar col-5">
        <div class="user-info-panel">
      <?php
          // if (!empty($_SESSION['login']) or !empty($_SESSION['id']))
          // {            
            if (!isset($myrow['avatar']) or $myrow['avatar'] == '') {
              $avatar = "avatars/no_photo.jpg";
              echo '<a class="avatar-link" href="user-page.php?id=' . $myrow['id'] . '"><img class="user-avatar" alt="Avatar of ' . $_SESSION['login'] . '" src="' . $avatar . '"></a>';
            } else {
              echo '<a class="avatar-link" href="user-page.php?id=' . $myrow['id'] . '"><img class="user-avatar" alt="' . $_SESSION['login'] . '" src="' . $myrow['avatar'] . '"></a>';
            }
            echo "<span class=\"user-logged-name\">You are logged in as " . '<a class="user-name" href="user-page.php?id=' . $myrow['id'] . '" title="Enter in my account">' . $_SESSION['login']. '</span>';
            echo '</div>';
            echo '<a class="my-acc-link" href="user-page.php?id=' . $myrow['id'] . '">My account</a>';
            echo '<a class="icon-font-logout user-exit-button" href="exit.php">Logout</a>';
            // }

          // ------------------------------------------------------  New code  ----------------------------------
          if (!isset($myrow['avatar']) or $myrow['avatar'] == '') {

            //проверяем, не извлечены ли данные пользователя из базы. Если    нет, то он не вошел, либо пароль в сессии неверный. Выводим окно для входа.    Но мы не будем его выводить для вошедших, им оно уже не нужно.
    
          } else {
    //при удачном входе пользователю выдается все, что расположено    ниже между звездочками.
          }

          ?>
      </div>
        <?php } ?>
      <div class="header-top__right <?php colsIfUserLogined(6, 3) ?>">
        <?php if (empty($_SESSION['login']) || empty($_SESSION['id']) ) {?>
          <a href="#" class="header-top__login">Sign in or create an account</a>
        <?php } ?>
        <form action="testreg.php" method="POST" class="login-popup">
          <label for="login">Username<span class="required">*</span></label>
          <input type="text" name="sign-in-login" id="login" class="login-popup__text-input" value="<?php 
            if (isset($_COOKIE['login'])) { echo $_COOKIE['login']; }
          ?>" size="15" maxlength="15" required>
          <small>Max 15 symbols</small>
          <label for="password">Password<span class="required">*</span></label>
          <input type="password" name="sign-in-password" id="password" class="login-popup__text-input" size="15" maxlength="15" required>
          <small>Max 15 symbols</small>
          <div class="checkbox-field">  
            <input type="checkbox" name="sign-in-user-remember" id="remember-input" checked>
            <label for="remember-input">Remember Me</label>
            <a href="send_pass.php" class="login-popup__link">Lost password?</a>
          </div>          
          <button class="login-popup__button">Log in</button>
          <span>New client?
            <a href="reg.php" class="login-popup__link">Register now!</a>
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
      <a href="index.php" class="header-bottom__logo navbar-brand col-auto col-lg-6 col-xl-2" tabindex="-1">        
        <img src="img/header-logo2.png" alt="Header logo">
      </a>
      <nav class="header-top__navbar navbar navbar-expand-lg navbar-light col-2 col-lg-12 col-xl-8 order-first order-lg-1 order-xl-0">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile-header-menu" aria-controls="mobile-header-menu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="header-responsive-menu">
          <ul class="desktop-nav navbar-nav flex-grow-1 flex-wrap justify-content-center">
            <li class="nav-item mr-4 active">
              <a class="nav-link" href="index.php">Home Page</a>
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
          <span class="closebtn">&times;</span>
          <ul class="mobile-nav navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home Page</a>
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
            <?php if (empty($_SESSION['login']) || empty($_SESSION['id']) ) {?>
            <li class="nav-item">
              <a class="nav-link" href="reg.php">Sign in or create an account</a>
            </li>
            <?php } ?>
          </ul>
          <ul class="mobile-top__social">
            <li><a href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStBZPWS4NP_8a6dDugIkq98UszVRCvnVI9nhFsSKVrAQHMk43oKn3Bjnw" class="icon-font-facebook-f-brands"></a></li>
            <li><a href="https://www.google.com.ua/search?q=%D0%BA%D0%B0%D0%BC%D0%BE%D0%BD+%D0%B8%D0%BB%D0%B8+%D0%BA%D0%BE%D0%BC%D0%BE%D0%BD&sa=X&ved=2ahUKEwiQxcjekJjiAhXnoosKHZlrBswQ1QIoAHoECAkQAQ" class="icon-font-twitter-brands"></a></li>
            <li><a href="https://www.google.com.ua/search?q=%D0%BA%D0%B0%D0%BC%D0%BE%D0%BD&tbm=isch&source=univ&sa=X&ved=2ahUKEwiQxcjekJjiAhXnoosKHZlrBswQ7Al6BAgHEA0" class="icon-font-google-plus-logo"></a></li>
            <li><a href="https://www.google.com.ua/search?q=%D0%BA%D0%B0%D0%BC%D0%BE%D0%BD+%D0%BF%D0%B5%D1%80%D0%B5%D0%B2%D0%BE%D0%B4+%D1%81+%D0%B0%D0%BD%D0%B3%D0%BB%D0%B8%D0%B9%D1%81%D0%BA%D0%BE%D0%B3%D0%BE+%D0%BD%D0%B0+%D1%80%D1%83%D1%81%D1%81%D0%BA%D0%B8%D0%B9&sa=X&ved=2ahUKEwiQxcjekJjiAhXnoosKHZlrBswQ1QIoBHoECAkQBQ" class="icon-font-linkedin2"></a></li>
            <li><a href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2Dir-kYKMCfDpSpQW5rnunw6xuW46Xm4VAF-y7pKAVH14UeMEXdG6D9UL" class="icon-font-instagram"></a></li>
          </ul>
          <div class="header-top__number-line text-center">Order online or call us <a href="tel:+1800008808">(+1800) 000 8808</a></div>
        </div>
      </nav>
      <div class="header-bottom__icons-list d-flex justify-content-end align-items-center col-4 col-lg-6 col-xl-2">                
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
<?php ?>