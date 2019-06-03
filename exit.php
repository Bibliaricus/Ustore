<?php
session_start();
if (empty($_SESSION['login']) or empty($_SESSION['password'])) {
    //если не существует сессии с логином и паролем, значит на    этот файл попал невошедший пользователь. Ему тут не место. Выдаем сообщение    об ошибке, останавливаем скрипт
    exit("Доступ на эту    страницу разрешен только зарегистрированным пользователям. Если вы    зарегистрированы, то войдите на сайт под своим логином и паролем<br><a    href='index.php'>Главная    страница</a>");
}
include "bd.php";
$nowTimestamp = time();
$login = $_SESSION['login'];

$test = mysqli_query($db, "UPDATE users SET exit_time='$nowTimestamp' WHERE login='$login'");
var_dump($test);


// setcookie("last-entrance", time(), time() + 9999999);
unset($_SESSION['password']);
unset($_SESSION['login']);
unset($_SESSION['id']); //    уничтожаем переменные в сессиях
exit("<html><head><meta    http-equiv='Refresh' content='2;    URL=index.php'></head></html>");
// отправляем пользователя на главную страницу.
