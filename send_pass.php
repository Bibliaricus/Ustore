<?php
if (isset($_POST['forgot-pass-login'])) {$login = $_POST['forgot-pass-login'];if ($login == '') {unset($login);}}
if (isset($_POST['forgot-pass-email'])) {$email = $_POST['forgot-pass-email'];if ($email == '') {unset($email);}}
if (isset($login) and isset($email)) {

    include "bd.php";

    $result = mysqli_query($db, "SELECT id FROM users WHERE login='$login' AND    email='$email' AND activation='1'");
    $myrow = mysqli_fetch_array($result);
    if (empty($myrow['id']) or $myrow['id'] == '') {
        include "error-page.php";
        echo $errorPageContent_Start;
        ?>
        <p>No user with this email address was found.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        echo $errorPageContent_End;
        exit(footerInErrorPage());
    }
    $datenow = date('YmdHis');
    $new_password = md5($datenow);
    $new_password = substr($new_password, 2, 6);

    $new_password_sh = md5($new_password);
    $new_password_sh = strrev($new_password_sh);
    $new_password_sh = "b1p55f" . $new_password_sh . "b1p55f";

    mysqli_query($db, "UPDATE users SET    password='$new_password_sh' WHERE login='$login'");

    $message = <<<HERE
    <html>
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Your new password</title>
      </head>
      <body>
        <h1>Hello, $login</h1>
        <p>We have generated a password for you, now you can enter in the cite using it. After entering it is desirable to change it. Password:</p> \n<span>$new_password</span>        
        <br>
        <p>Administration of Ustore.com</p>
      </body>
    </html>
HERE;
    include "error-page.php";
        echo $successPageContent_Start;
        ?>
        <p>A password has been sent to your e-mail.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        echo $errorPageContent_End;
        footerInErrorPage();
} else {

  include 'global_vars.php';
  include $html_head;?>

  <body class="register forgot-pass">

<?php include $header; ?>
<h1 class="page-title">Forgot your password?</h1>
<p>Please enter your email address below to receive a password reset link.</p>
<form action="#" method="POST" class="user-input-form">
  <label for="forgot-login">Enter you login:</label>
  <input type="text" name="forgot-pass-login" id="forgot-login" required>
  <label for="forgot-email">Enter you e-mail:</label>
  <input type="email" name="forgot-pass-email" id="forgot-email" required>
  <div class="register_button">
    <button class="custom-btn" name="submit">Send my password</button>
    <a class="custom-btn" href="<?php echo $_SERVER['HTTP_REFERER']?>">Back</a>
  </div>
</form>
<?php 
  include $footer;
  include $functions;  
}
