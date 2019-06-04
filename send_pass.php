<?php
if (isset($_POST['forgot-pass-login'])) {$login = $_POST['forgot-pass-login'];if ($login == '') {unset($login);}} //заносим введенный пользователем логин в переменную $login, если он пустой,    то уничтожаем переменную
if (isset($_POST['forgot-pass-email'])) {$email = $_POST['forgot-pass-email'];if ($email == '') {unset($email);}} //заносим введенный пользователем e-mail, если он    пустой, то уничтожаем переменную
if (isset($login) and isset($email)) { //если существуют необходимые переменные

    include "bd.php"; // файл    bd.php должен быть в той же папке, что и все остальные, если это не так, то    просто измените путь

    $result = mysqli_query($db, "SELECT id FROM users WHERE login='$login' AND    email='$email' AND activation='1'"); //такой ли у пользователя е-мейл
    $myrow = mysqli_fetch_array($result);
    if (empty($myrow['id']) or $myrow['id'] == '') {
        //если активированного пользователя с таким логином и е-mail    адресом нет
        include "error-page.php";
        echo $errorPageContent_Start;
        ?>
        <p>No user with this email address was found.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        echo $errorPageContent_End;
        exit(footerInErrorPage());
    }
    //если пользователь с таким логином и е-мейлом найден,    то необходимо сгенерировать для него случайный пароль, обновить его в базе и    отправить на е-мейл
    $datenow = date('YmdHis'); //извлекаем    дату
    $new_password = md5($datenow); // шифруем    дату
    $new_password = substr($new_password, 2, 6); //извлекаем из шифра 6 символов начиная    со второго. Это и будет наш случайный пароль. Далее запишем его в базу,    зашифровав точно так же, как и обычно.

    $new_password_sh = md5($new_password); //шифруем пароль
    $new_password_sh = strrev($new_password_sh); // для надежности добавим реверс
    $new_password_sh = "b1p55f" . $new_password_sh . "b1p55f";

    mysqli_query($db, "UPDATE users SET    password='$new_password_sh' WHERE login='$login'"); // обновили в базе

    //формируем сообщение

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
} else { //если    данные еще не введены # from url ↑ http-equiv='Refresh' content='5;
  // ---

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
