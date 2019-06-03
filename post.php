<?php
session_start(); //запускаем сессию. Обязательно в начале страницы
include "bd.php"; // соединяемся с базой, укажите свой путь, если у вас    уже есть соединение
if (!empty($_SESSION['login']) and !empty($_SESSION['password'])) {
    //если    существует логин и пароль в сессиях, то проверяем, действительны ли они
    $login = $_SESSION['login'];
    $password = $_SESSION['password'];
    $result2 = mysqli_query($db, "SELECT id FROM users WHERE login='$login' AND password='$password'");
    $myrow2 = mysqli_fetch_array($result2);
    if (empty($myrow2['id'])) {
        //если логин    или пароль не действителен
        exit("Вход на эту страницу разрешен только зарегистрированным пользователям! <a href=\"reg.php\">Зарегистрироваться.</a>");
    }
} else {

    //Проверяем,    зарегистрирован ли вошедший
    exit("Вход на эту страницу разрешен только зарегистрированным пользователям! <a href=\"reg.php\">Зарегистрироваться.</a>");}
if (isset($_POST['id'])) {$id = $_POST['id'];} //получаем идентификатор страницы    получателя
if (isset($_POST['message-to-user'])) {$text = $_POST['message-to-user'];} //получаем текст сообщения
if (isset($_POST['recipient'])) {$poluchatel = $_POST['recipient'];} //логин получателя
$author = $_SESSION['login']; //логин автора
// echo $text;
$date = date("Y-m-d"); //дата добавления
if (empty($author) or empty($text) or empty($poluchatel) or empty($date)) { //есть ли все необходимые    данные? Если нет, то останавливаем
    exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля. <a href=" . $_SERVER['HTTP_REFERER'] . ".>Назад.</a>");}
$text = stripslashes($text); //удаляем обратные слеши
$text = htmlspecialchars($text); //преобразование    спецсимволов в их HTML эквиваленты

$result2 = mysqli_query($db, "INSERT INTO    messages (author, recipient, date, message) VALUES    ('$author','$poluchatel','$date','$text')"); //заносим в базу сообщение
echo "<html><head><meta    http-equiv='Refresh' content='5;    URL=user-page.php?id=" . $id . "'></head><body>Ваше сообщение передано! Вы    будете перемещены через 5 сек. Если не хотите ждать, то <a    href='user-page.php?id=" . $id . "'>нажмите    сюда.</a></body></html>"; //перенаправляем    пользователя
