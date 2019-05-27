<?php ob_start(); ?>
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

  <title>Registration</title>

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="css/slick.css">
  <link rel="stylesheet" href="css/style.min.css">

</head>
<body>
  <h2>Регистрация</h2>
  <form action="save_user.php" method="post" enctype="multipart/form-data">
    <p>
      <label>Ваш логин *:<br></label>
      <input name="sign-up-login" type="text" size="15" maxlength="15" required>
      <small>Max 15 symbols</small>
    </p>
    <p>
      <label>Ваш пароль *:<br></label>
      <input name="sign-up-password" type="password" size="15" maxlength="15" required>
      <small>Max 15 symbols</small>
    </p>
    <p>
      <label for="avatar">Select your avatar *: </label>
      <input type="file" name="sign-up-avatar" id="avatar">
      <small>Image format: jpg, gif or png. Max weight: 2 MB.
        <small>Not required.</small>
      </small>
    </p>
    <p>
      <label for="email">Ваш E-mail *:<br></label>
      <input id="email" name="sign-up-email" type="email" size="15" maxlength="100" required>
    </p>    
      <input type="submit" name="submit" value="Зарегистрироваться">
    </p>
  </form>
</body>
</html>
<?php ob_end_flush(); ?>