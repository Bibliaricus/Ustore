<?php
if (isset($_POST['sign-in-login'])) {$login = $_POST['sign-in-login'];if ($login == '') {unset($login);}} //заносим введенный пользователем логин в переменную $login, если он пустой,    то уничтожаем переменную
if (isset($_POST['sign-in-password'])) {$email = $_POST['sign-in-password'];if ($email == '') {unset($email);}} //заносим введенный пользователем e-mail, если он    пустой, то уничтожаем переменную
if (isset($login) and isset($email)) { //если существуют необходимые переменные

    include "bd.php"; // файл    bd.php должен быть в той же папке, что и все остальные, если это не так, то    просто измените путь

    $result = mysqli_query($db, "SELECT id FROM users WHERE login='$login' AND    email='$email' AND activation='1'"); //такой ли у пользователя е-мейл
    $myrow = mysqli_fetch_array($result);
    if (empty($myrow['id']) or $myrow['id'] == '') {
        //если активированного пользователя с таким логином и е-mail    адресом нет
        exit("Пользователя с    таким e-mail адресом не обнаружено ни в одной базе ЦРУ :) <a    href='index.php'>Главная страница</a>");
    }
    //если пользователь с таким логином и е-мейлом найден,    то необходимо сгенерировать для него случайный пароль, обновить его в базе и    отправить на е-мейл
    $datenow = date('YmdHis'); //извлекаем    дату
    $new_password = md5($datenow); // шифруем    дату
    $new_password = substr($new_password, 2, 6); //извлекаем из шифра 6 символов начиная    со второго. Это и будет наш случайный пароль. Далее запишем его в базу,    зашифровав точно так же, как и обычно.

    $new_password_sh = strrev(md5($new_password)) . "b3p6f"; //зашифровали
    mysqli_query($db, "UPDATE users SET    password='$new_password_sh' WHERE login='$login'"); // обновили в базе

    //формируем сообщение

    $message = "Здравствуйте, " . $login . "! Мы сгененриоровали для Вас пароль, теперь Вы сможете    войти на сайт us, используя его. После входа желательно его сменить.    Пароль:\n" . $new_password; //текст сообщения
    mail($email, "Восстановление пароля", $message); //отправляем сообщение

    echo "<html><head><meta http-equiv='Refresh' content='5;    URL=index.php'></head><body>На Ваш e-mail отправлено письмо с паролем. Вы    будете перемещены через 5 сек. Если не хотите ждать, то <a    href='index.php'>нажмите сюда.</a></body></html>"; //перенаправляем    пользователя
} else { //если    данные еще не введены
    echo '
        <html>
          <head>
            <title>Забыли пароль?</title>
          </head>
          <body>
            <h2>Забыли пароль?</h2>
            <form action="#" method="post">
              <label for="">Enter you login:</label>
              <input type="text" name="forgot-pass-login">
              <label for="">Enter you e-mail:</label>
              <input type="text" name="forgot-pass-email">
              <input type="submit" name="submit" value="Send new password">
            </form>
          </body>
        </html>';
}