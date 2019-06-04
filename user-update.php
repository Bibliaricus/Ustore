<?php
session_start();
include "bd.php";
if (!empty($_SESSION['login']) and !empty($_SESSION['password'])) {
    $login = $_SESSION['login'];
    $password = $_SESSION['password'];
    $result2 = mysqli_query($db, "SELECT id FROM users WHERE login='$login' AND password='$password'");
    $myrow2 = mysqli_fetch_array($result2);
    if (empty($myrow2['id'])) {
        include "error-page.php";
        echo $errorPageContent_Start;
        ?>
        <p>Login to this page is allowed only to registered users!<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        echo $errorPageContent_End;
        exit(footerInErrorPage());
    }
} else {
    include "error-page.php";
    echo $errorPageContent_Start;
    ?>
    <p>Login to this page is allowed only to registered users!<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
    <?php
    echo $errorPageContent_End;
    exit(footerInErrorPage());
}
$old_login = $_SESSION['login'];
$id = $_SESSION['id'];
$ava = "avatars/no_photo.jpg";

// Changing of login

$logi  = $_SESSION['login'];
$password = $_SESSION['password'];
$result = mysqli_query($db, "SELECT id,avatar FROM users WHERE login='$login' AND password='$password'"); 
$user = mysqli_fetch_array($result);

include "error-page.php";

if (isset($_POST['update-user-login']))
{
    $login = $_POST['update-user-login'];
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $login = trim($login);
    if ($login == '') {
        echo $errorPageContent_Start;
        ?>
        <p>You have not entered a login.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        echo $errorPageContent_End;
        exit(footerInErrorPage());
    }
    if (strlen($login) < 3 or strlen($login) > 15) {
        echo $errorPageContent_Start;
        ?>
        <p>Login must consist of at least 3 characters and at most 15.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        echo $errorPageContent_End;
        exit(footerInErrorPage());
    }
    $result = mysqli_query($db, "SELECT id FROM users WHERE login='$login'");
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])) {
        echo $errorPageContent_Start;
        ?>
        <p>Sorry, the login you entered is already registered. Enter another login.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        echo $errorPageContent_End;
        exit(footerInErrorPage());
    }
    $result4 = mysqli_query($db, "UPDATE users SET login='$login' WHERE login='$old_login'");

    if ($result4 == 'TRUE') {
        mysqli_query($db, "UPDATE messages SET    author='$login' WHERE author='$old_login'");
        $_SESSION['login'] = $login;
        echo $successPageContent_Start;
        ?>
        <p>Your login has been changed!<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        echo $errorPageContent_End;
        footerInErrorPage();
    }
}

// Changing of password

else if (isset($_POST['update-user-password']))
{
    $password = $_POST['update-user-password'];
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $password = trim($password);
    if ($password == '') {
        echo $errorPageContent_Start;
        ?>
        <p>You have not entered a password.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        echo $errorPageContent_End;
        exit(footerInErrorPage());
    }
    if (strlen($password) < 3 or strlen($password) > 15) {
        echo $errorPageContent_Start;
        ?>
        <p>The password must consist of at least 3 characters and at most 15.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        echo $errorPageContent_End;
        exit(footerInErrorPage());
    }
    $password = md5($password);
    $password = strrev($password);
    $password = "b1p55f" . $password . "b1p55f";

    $result4 = mysqli_query($db, "UPDATE users SET password='$password' WHERE login='$old_login'");

    if ($result4 == 'TRUE') {
        $_SESSION['password'] = $password;
        echo $successPageContent_Start;
        ?>
        <p>Your password has been changed!<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        echo $errorPageContent_End;
        footerInErrorPage();
    }
}

// Changing of avatar

else if (isset($_FILES['update-user-avatar']['name']))
{
    if (empty($_FILES['update-user-avatar']['name'])) {
        $avatar = "avatars/no_photo.jpg";
        $result7 = mysqli_query($db, "SELECT avatar FROM users WHERE login='$old_login'");
        $myrow7 = mysqli_fetch_array($result7);
        if ($myrow7['avatar'] == $ava) {
            $ava = 1;
        } else {unlink($myrow7['avatar']);}
    } else {
        $path_to_90_directory = 'avatars/';

        if (preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)|(gif)|(GIF)|(png)|(PNG)$/', $_FILES['update-user-avatar']['name']))

        {

            $filename = $_FILES['update-user-avatar']['name'];
            $source = $_FILES['update-user-avatar']['tmp_name'];
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
            $result7 = mysqli_query($db, "SELECT avatar FROM users WHERE    login='$old_login'");

            $myrow7 = mysqli_fetch_array($result7);
            if ($myrow7['avatar'] == $ava) {
                $ava = 1;
            } else {unlink($myrow7['avatar']);}

        } else {
            include "error-page.php";
            echo $errorPageContent_Start;
            ?>
            <p>The avatar must be in the format <strong> JPG, GIF or PNG </strong>.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
            <?php
            echo $errorPageContent_End;
            exit(footerInErrorPage());
        }
    }
    $result4 = mysqli_query($db, "UPDATE users SET    avatar='$avatar' WHERE login='$old_login'");
    if ($result4 == 'TRUE') {
        echo '<html><head><meta http-equiv="refresh" content="0;URL=user-page.php?id=' . $_SESSION['id'] . '"></head><body></body></html>';}
}
?>
