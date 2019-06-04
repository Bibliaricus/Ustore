<?php
    session_start();
if (isset($_POST['sign-in-login'])) { $login = $_POST['sign-in-login']; if ($login == '') { unset($login);} }
    if (isset($_POST['sign-in-password'])) { $password = $_POST['sign-in-password']; if ($password == '') { unset($password);} }
if (empty($login) && empty($password))
    {
        include "error-page.php";
        echo $errorPageContent_Start;
        ?>
        <p>You have not entered all the information, go back and fill in all the fields!<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        echo $errorPageContent_End;
        exit(footerInErrorPage());
    }
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);
include "bd.php";

$password = md5($password);
$password = strrev($password);
$password = "b1p55f" . $password . "b1p55f";
// Adds checking of password to buffer (for correct sending of cookies)
ob_start();

$result = mysqli_query($db, "SELECT * FROM users WHERE login='$login' AND password='$password' AND activation='1'"); //извлекаем из базы все данные о пользователе с    введенным логином и паролем
$myrow = mysqli_fetch_array($result);

    if ($myrow['password']==$password) {
    $_SESSION['password'] = $myrow['password'];
    $_SESSION['login'] = $myrow['login'];

    $_SESSION['id'] = $myrow['id'];
    echo '<html><head><meta http-equiv="refresh" content="0;URL=index.php"></head><body></body></html>';
    }
    else {
        include "error-page.php";
        echo $errorPageContent_Start;
        ?>
        <p>Sorry, the login or password you entered is incorrect.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        echo $errorPageContent_End;
        exit(footerInErrorPage());
   }
    if (isset($_POST['sign-in-user-remember'])) {
        setcookie("login", $_POST["sign-in-login"], time() + 9999999);
    }

// Flush the output buffer
ob_end_flush();