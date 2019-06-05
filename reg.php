<?php ob_start();
  include 'global_vars.php';
  include $html_head;
  ?>
  <body class="register">
  
  <?php include $header; ?>
  
  <h1 class="page-title">Create your account</h1>
  <form action="save_user.php" method="post" enctype="multipart/form-data" class="user-input-form">
    <fieldset>
      <legend>Sign-in information</legend>
      <p>
      <label>Your login *:<br></label>
      <input name="sign-up-login" type="text" size="15" maxlength="15" required>
      <small>Max 15 symbols</small>
    </p>
    <p>
      <label>Your password *:<br></label>
      <input name="sign-up-password" type="password" size="15" maxlength="15" required>
      <small>Max 15 symbols</small>
    </p>
    </fieldset>
    <fieldset>
      <legend>Input your email and upload avatar</legend>
      <p>
        <label for="email">Ваш E-mail *:<br></label>
        <input id="email" name="sign-up-email" type="email" size="15" maxlength="100" required>
      </p>
      <p>
        <label for="avatar">Select your avatar: </label>
        <input type="hidden" name="MAX_FILE_SIZE" value="30000000">
        <input type="file" name="sign-up-avatar" id="avatar">
        <small>Image format: jpg, gif or png. Max weight: 2 MB.</small>
        <small>Not required.</small>
      </p>
    </fieldset>
    <div class="register_button">
      <button class="custom-btn" name="submit">Create your account</button>
      <a class="custom-btn" href="<?php echo $_SERVER['HTTP_REFERER']?>">Back</a>
    </div>
  </form>  

<?php 
include $footer;
include $functions;
ob_end_flush(); ?>