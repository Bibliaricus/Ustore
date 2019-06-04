<?php ob_start();
  include 'global_vars.php';
  include $html_head;
  ?>
  <body class="register sign-in">
  
  <?php include $header; ?>
  
  <h1 class="page-title">Sign in</h1>
  <form action="testreg.php" method="post" class="user-input-form">
    <fieldset>
      <legend>Input your login and password for log-in</legend>
      <p>
      <label>Your login *:<br></label>
      <input name="sign-in-login" id="login-page" type="text" size="15" maxlength="15" value="<?php if (isset($_COOKIE['login'])) { echo $_COOKIE['login']; } ?>" required>
      <small>Max 15 symbols</small>
    </p>
    <p>
      <label>Your password *:<br></label>
      <input name="sign-in-password" id="password-page" type="password" size="15" maxlength="15" required>
      <small>Max 15 symbols</small>
    </p>
    <div class="checkbox-field">  
      <input type="checkbox" name="sign-in-user-remember" id="remember-input-page" checked>
      <label for="remember-input">Remember Me</label>
      <a href="send_pass.php" class="login-popup__link">Lost password?</a>
    </div>
    </fieldset>    
    <div class="register_button">
      <button class="custom-btn" name="submit">Log in</button>
      <a class="custom-btn" href="<?php echo $_SERVER['HTTP_REFERER']?>">Back</a>
    </div>
  </form>  

<?php 
include $footer;
include $functions;
ob_end_flush(); ?>