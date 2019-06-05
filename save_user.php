<?php
    if (isset($_POST['sign-up-login'])) { $login = $_POST['sign-up-login']; if ($login == '') { unset($login);} }
    if (isset($_POST['sign-up-password'])) { $password=$_POST['sign-up-password']; if ($password =='') { unset($password);} }
    if (isset($_POST['sign-up-email'])) {$email = $_POST['sign-up-email'];if ($email == '') {unset($email);}}
    // if (isset($_POST['sign-up-avatar'])) {$fupload = $_POST['sign-up-avatar']; echo "First fupload is: \n"; var_dump($fupload); if ($fupload == '') {unset($fupload);}}
    include "error-page.php";   
    if (empty($login) or empty($password) or empty($email))
    {
        echo $errorPageContent_Start;
        ?>
        <p>You have not entered all the information, go back and fill in all the fields!<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        errorPageContent_End();
        exit (footerInErrorPage());
    }

    if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $email))
        {
            echo $errorPageContent_Start;
            ?>
            <p>Invalid email!<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
            <?php
            errorPageContent_End();
            exit (footerInErrorPage());
        }
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);

  if    (strlen($login) < 3 or strlen($login) > 15) {
    echo $errorPageContent_Start;
    ?>
    <p>Login must consist of at least 3 characters and at most 15.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
    <?php
    errorPageContent_End();
    exit (footerInErrorPage());
    }
    if    (strlen($password) < 3 or strlen($password) > 15) {
        echo $errorPageContent_Start;
        ?>
        <p>Password must consist of at least 3 characters and at most 15.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        errorPageContent_End();
        exit (footerInErrorPage());
    }          
    
  if (!empty($_FILES['sign-up-avatar']))
  {
      $fupload = $_FILES['sign-up-avatar'];
    //   $fupload = trim($fupload);
      if ($fupload == '' or empty($fupload)) {
          unset($fupload);
      }
  }
  if (!isset($fupload) or empty($fupload) or $fupload == '') {
      $avatar = "avatars/no_photo.jpg";
  } else {
      $path_to_90_directory = 'avatars/';

      if (preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)|(gif)|(GIF)|(png)|(PNG)$/', $_FILES['sign-up-avatar']['name']))
      {
          $filename = $_FILES['sign-up-avatar']['name'];
          $source = $_FILES['sign-up-avatar']['tmp_name'];
          $target = $path_to_90_directory . $filename;
          move_uploaded_file($source, $target);
          if (preg_match('/[.](GIF)|(gif)$/', $filename)) {
              $im = imagecreatefromgif($path_to_90_directory . $filename);
          }
          if (preg_match('/[.](PNG)|(png)$/', $filename)) {
              $im = imagecreatefrompng($path_to_90_directory . $filename);
          }
          if (preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)$/', $filename)) {
              $im = imagecreatefromjpeg($path_to_90_directory . $filename);
          }
          $w = 90;
          $w_src = imagesx($im);
          $h_src = imagesy($im);
          $dest = imagecreatetruecolor($w, $w);
          if ($w_src > $h_src) {
              imagecopyresampled($dest, $im, 0, 0,
                  round((max($w_src, $h_src) - min($w_src, $h_src)) / 2),
                  0, $w, $w, min($w_src, $h_src), min($w_src, $h_src));
          }
          if ($w_src < $h_src) {
              imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w,
                  min($w_src, $h_src), min($w_src, $h_src));
          }
          if ($w_src == $h_src) {
              imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w, $w_src, $w_src);
          }

          $date = time();
          imagejpeg($dest, $path_to_90_directory . $date . ".jpg");
          $avatar = $path_to_90_directory . $date . ".jpg";

          $delfull = $path_to_90_directory . $filename;
          unlink($delfull);
      } else {
          echo $errorPageContent_Start;
            ?>
            <p>Avatar must be in the format <strong> JPG, GIF or PNG</strong>.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
            <?php
            errorPageContent_End();
            exit (footerInErrorPage());
      }
  }
  $password = md5($password);
  $password = strrev($password);
  $password = "b1p55f" . $password . "b1p55f";
    include ("bd.php");
    $result = mysqli_query($db, "SELECT id FROM users WHERE login='$login'");
    $myrow = mysqli_fetch_array($result);    
    if (!empty($myrow['id'])) {
        echo $errorPageContent_Start;
        ?>
        <p>Sorry, the login you entered is already registered. Enter another login.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        errorPageContent_End();
        exit (footerInErrorPage());
    }
$result2 = mysqli_query($db, "INSERT INTO users (login,password,avatar,email,date)    VALUES('$login','$password','$avatar','$email',NOW())");
    if ($result2 == 'TRUE') {
        $result3 = mysqli_query($db, "SELECT id FROM users WHERE login='$login'");
        $myrow3 = mysqli_fetch_array($result3);
        $activation = md5($myrow3['id']) . md5($login);
        $subject = "Confirmation of registration";
        $message = <<<HERE
        <html>
          <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Super title</title>
          </head>
          <body>
            <h1>Welcome to Ustore, $login</h1>
            <p>Go to this link for activation your account:</p>
            <a href="http://ustore/activation.php?login=$login&code=$activation">$activation</a>
            <br>
            <p>Administration of Ustore.com</p>
          </body>
        </html>
HERE;
        mail($email, $subject, $message);
        echo $successPageContent_Start;
        ?>
        <p>An e-mail with a reference has been sent to confirm the registration.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        errorPageContent_End();
        footerInErrorPage();
    }
    else {
        echo $errorPageContent_Start;
        ?>
        <p>Mistake! You are not registred.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        errorPageContent_End();
        footerInErrorPage();
    }
    ?>