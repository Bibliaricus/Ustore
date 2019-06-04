<?php
session_start(); //запускаем сессию. Обязательно в начале страницы
include "bd.php"; // соединяемся с базой, укажите свой путь, если у вас    уже есть соединение
if (!empty($_SESSION['login']) and !empty($_SESSION['password'])) {
    //если    существует логин и пароль в сессиях, то проверяем, действительны ли они
    $login = $_SESSION['login'];
    $password = $_SESSION['password'];
    $result2 = mysqli_query($db, "SELECT id,avatar FROM users WHERE login='$login' AND password='$password'");
    $user = mysqli_fetch_array($result2);
    if (empty($user['id'])) {
        //если логин    или пароль не действителен
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
if (isset($_POST['id'])) {$id = $_POST['id'];} //получаем идентификатор страницы    получателя
if (isset($_POST['message-to-user'])) {$text = $_POST['message-to-user'];} //получаем текст сообщения
if (isset($_POST['recipient'])) {$poluchatel = $_POST['recipient'];} //логин получателя
$author = $_SESSION['login']; //логин автора
// echo $text;
$date = date("Y-m-d"); //дата добавления
if (empty($author) or empty($text) or empty($poluchatel) or empty($date)) { //есть ли все необходимые    данные? Если нет, то останавливаем
    include "error-page.php";
    echo $errorPageContent_Start;
    ?>
    <p>You have not entered all the information, go back and fill in all the fields.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
    <?php
    errorPageContent_End();  
    exit(footerInErrorPage());}    
$text = stripslashes($text); //удаляем обратные слеши
$text = htmlspecialchars($text); //преобразование    спецсимволов в их HTML эквиваленты

$result2 = mysqli_query($db, "INSERT INTO    messages (author, recipient, date, message) VALUES    ('$author','$poluchatel','$date','$text')"); //заносим в базу сообщение
include "error-page.php";
echo $successPageContent_Start;
?>
<p>Your message has been sent!<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
<?php
errorPageContent_End();
echo footerInErrorPage();