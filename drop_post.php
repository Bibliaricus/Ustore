<?php
session_start();
include "bd.php";
if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
$login = $_SESSION['login'];
$password = $_SESSION['password'];
$result    = mysqli_query($db, "SELECT id,avatar FROM users WHERE login='$login' AND password='$password'"); 
$user    = mysqli_fetch_array($result);
}
include "error-page.php";

if (!empty($_SESSION['login']) and !empty($_SESSION['password'])) {
    $result2 = mysqli_query($db, "SELECT id,avatar FROM users WHERE login='$login' AND password='$password'");
    $myrow2 = mysqli_fetch_array($result2);    
    if (empty($myrow2['id'])) {
        echo $errorPageContent_Start;
        ?>
        <p>Login to this page is allowed only to registered users!</p>
        <?php
        errorPageContent_End();
        exit(footerInErrorPage());
    }
} else {
    echo $errorPageContent_Start;
        ?>
        <p>Login to this page is allowed only to registered users!</p>
        <?php
        errorPageContent_End();
        exit(footerInErrorPage());}
$id2 = $_SESSION['id'];

if (isset($_GET['id'])) {$id = $_GET['id'];} else {$id = 0;}
$result = mysqli_query($db, "SELECT recipient FROM messages WHERE id='$id'");
$myrow = mysqli_fetch_array($result);
if ($login == $myrow['recipient']) {
    $result = mysqli_query($db, "DELETE FROM messages WHERE id = '$id' LIMIT 1");
    if ($result == 'true') {
        echo "<html><head><meta    http-equiv='Refresh' content='0;    URL=user-page.php?id=" . $id2 . "'></head><body></body></html>";
    } else {
        echo $errorPageContent_Start;
        ?>
        <p>Mistake! Your message has not been deleted. <a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Try again!</a></p>
        <?php 
        errorPageContent_End();
    }
} else {
    echo $errorPageContent_Start;
    ?>
    <p>You are trying to delete a message not sent to you!<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>    
    <?php 
    errorPageContent_End();
    exit(footerInErrorPage());
}
