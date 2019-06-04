<?php
session_start();
include "bd.php";
if (!empty($_SESSION['login']) and !empty($_SESSION['password'])) {
    $login = $_SESSION['login'];
    $password = $_SESSION['password'];
    $result2 = mysqli_query($db, "SELECT id,avatar FROM users WHERE login='$login' AND password='$password'");
    $user = mysqli_fetch_array($result2);
    if (empty($user['id'])) {
        include "error-page.php";
        echo $errorPageContent_Start;
        ?>
        <p>Login to this page is allowed only to registered users!</p>
        <?php
        echo $errorPageContent_End;
        exit(footerInErrorPage());
    }
} else {
    include "error-page.php";
    echo $errorPageContent_Start;
    ?>
    <p>Login to this page is allowed only to registered users!</p>
    <?php
    echo $errorPageContent_End;
    exit(footerInErrorPage());}
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['message-to-user'])) {$text = $_POST['message-to-user'];}
if (isset($_POST['recipient'])) {$poluchatel = $_POST['recipient'];}
$author = $_SESSION['login'];
$date = date("Y-m-d");
if (empty($author) or empty($text) or empty($poluchatel) or empty($date)) {
    include "error-page.php";
    echo $errorPageContent_Start;
    ?>
    <p>You have not entered all the information, go back and fill in all the fields.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
    <?php
    errorPageContent_End();  
    exit(footerInErrorPage());}    
$text = stripslashes($text);
$text = htmlspecialchars($text);

$result2 = mysqli_query($db, "INSERT INTO    messages (author, recipient, date, message) VALUES    ('$author','$poluchatel','$date','$text')");
include "error-page.php";
echo $successPageContent_Start;
?>
<p>Your message has been sent!<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
<?php
errorPageContent_End();
echo footerInErrorPage();