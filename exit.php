<?php
session_start();
if (empty($_SESSION['login']) or empty($_SESSION['password'])) {
    include "error-page.php";
    echo $errorPageContent_Start;
    ?>
    <p>Access to this page is allowed only to registered users. If you are registered, log in to the site with your username and password</p>
    <?php
    echo $errorPageContent_End;
    exit(footerInErrorPage());
}
include "bd.php";
$nowTimestamp = time();
$login = $_SESSION['login'];

$test = mysqli_query($db, "UPDATE users SET exit_time='$nowTimestamp' WHERE login='$login'");

unset($_SESSION['password']);
unset($_SESSION['login']);
unset($_SESSION['id']);
exit("<html><head><meta    http-equiv='Refresh' content='2;    URL=index.php'></head></html>");