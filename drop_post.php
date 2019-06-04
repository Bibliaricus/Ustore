<?php
session_start(); //запускаем сессии
include "bd.php"; //подключаемся к базе
if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
$login = $_SESSION['login'];
$password = $_SESSION['password'];
$result    = mysqli_query($db, "SELECT id,avatar FROM users WHERE login='$login' AND password='$password'"); 
$user    = mysqli_fetch_array($result);
}
include "error-page.php";

if (!empty($_SESSION['login']) and !empty($_SESSION['password'])) {
    //если    существует логин и пароль в сессиях, то проверяем, действительны ли они    
    $result2 = mysqli_query($db, "SELECT id,avatar FROM users WHERE login='$login' AND password='$password'");
    $myrow2 = mysqli_fetch_array($result2);    
    if (empty($myrow2['id'])) {
        //данные    пользователя неверны.
        echo $errorPageContent_Start;
        ?>
        <p>Login to this page is allowed only to registered users!</p>
        <?php
        echo $errorPageContent_End;
        exit(footerInErrorPage());
    }
} else {
    //Проверяем,    зарегистрирован ли вошедший
    echo $errorPageContent_Start;
        ?>
        <p>Login to this page is allowed only to registered users!</p>
        <?php
        echo $errorPageContent_End;
        exit(footerInErrorPage());}
$id2 = $_SESSION['id']; //получаем идентификатор своей страницы

if (isset($_GET['id'])) {$id = $_GET['id'];} else {$id = 0;}//получаем через GET запрос    идентификатор сообщения, которое нужно удалить
$result = mysqli_query($db, "SELECT recipient FROM messages WHERE id='$id'");
$myrow = mysqli_fetch_array($result); //нужно уточнить,    кому сообщение отправлено
//ведь    через GET запрос пользователь может ввести любой идентификатор и как    следствие удалить сообщения, которые отправляли не ему.
if ($login == $myrow['recipient']) { //если сообщение    отправляли данному пользователю, то разрешаем его удалить    
    $result = mysqli_query($db, "DELETE FROM messages WHERE id = '$id' LIMIT 1"); //удаляем сообщение
    if ($result == 'true') { //если удалено - перенаправляем на страничку    пользователя
        echo "<html><head><meta    http-equiv='Refresh' content='0;    URL=user-page.php?id=" . $id2 . "'></head><body></body></html>";
    } else { //если    не удалено, то перенаправляем, но выдаем сообщение о неудаче
        echo $errorPageContent_Start;
        ?>
        <p>Mistake! Your message has not been deleted. <a class="error-page__link" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Try again!</a></p>
        <?php 
        echo $errorPageContent_End;
    }
} else {
    echo $errorPageContent_Start;
    ?>
    <p>You are trying to delete a message not sent to you!<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>    
    <?php 
    echo $errorPageContent_End;
    exit(footerInErrorPage());
} //если    сообщение отправлено не этому пользователю. Значит, он попытался удалить его,    введя в адресной строке какой-то другой идентификатор
