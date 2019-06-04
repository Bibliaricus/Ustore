<?php
session_start();
include "bd.php"; // файл bd.php должен быть в той же папке, что и все    остальные, если это не так, то измените путь
if (!empty($_SESSION['login']) and !empty($_SESSION['password'])) {
    //если    существует логин и пароль в сессиях, то проверяем, действительны ли они
    $login = $_SESSION['login'];
    $password = $_SESSION['password'];
    $result2 = mysqli_query($db, "SELECT id FROM users WHERE login='$login' AND password='$password'");
    $myrow2 = mysqli_fetch_array($result2);
    if (empty($myrow2['id'])) {
        //Если не    действительны, то закрываем доступ
        include "error-page.php";
        echo $errorPageContent_Start;
        ?>
        <p>Login to this page is allowed only to registered users!<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        echo $errorPageContent_End;
        exit(footerInErrorPage());
    }
} else {
    //Проверяем,    зарегистрирован ли вошедший
    include "error-page.php";
    echo $errorPageContent_Start;
    ?>
    <p>Login to this page is allowed only to registered users!<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
    <?php
    echo $errorPageContent_End;
    exit(footerInErrorPage());
}
$old_login = $_SESSION['login']; //Старый логин нам    пригодиться
$id = $_SESSION['id']; //идентификатор пользователя тоже нужен
$ava = "avatars/no_photo.jpg"; //стандартное    изображение будет кстати
////////////////////////
////////ИЗМЕНЕНИЕ    ЛОГИНА
////////////////////////

$logi  = $_SESSION['login'];
$password = $_SESSION['password'];
$result = mysqli_query($db, "SELECT id,avatar FROM users WHERE login='$login' AND password='$password'"); 
$user = mysqli_fetch_array($result);

include "error-page.php";

if (isset($_POST['update-user-login'])) //Если существует логин
{
    $login = $_POST['update-user-login'];
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $login = trim($login); //удаляем все лишнее
    if ($login == '') {
        echo $errorPageContent_Start;
        ?>
        <p>You have not entered a login.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        echo $errorPageContent_End;
        exit(footerInErrorPage());
        // exit("Вы не ввели логин. <a href='user-page.php?id=" . $_SESSION['id'] . "'>Назад.</a>");
    } //Если    логин пустой, то останавливаем
    if (strlen($login) < 3 or strlen($login) > 15) { //проверяем    длину
        echo $errorPageContent_Start;
        ?>
        <p>Login must consist of at least 3 characters and at most 15.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        echo $errorPageContent_End;
        exit(footerInErrorPage());
    }
//    проверка на существование пользователя с таким же логином
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
    $result4 = mysqli_query($db, "UPDATE users SET login='$login' WHERE login='$old_login'"); //обновляем в базе логин пользователя

    if ($result4 == 'TRUE') { //если выполнено верно, то обновляем все сообщения,    которые отправлены ему
        mysqli_query($db, "UPDATE messages SET    author='$login' WHERE author='$old_login'");
        $_SESSION['login'] = $login; //Обновляем логин в сессии
        echo $successPageContent_Start;
        ?>
        <p>Your login has been changed!<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        echo $errorPageContent_End;
        footerInErrorPage();
    }
        // echo "<html><head><meta    http-equiv='Refresh' content='5;    URL='user-page.php?id=" . $_SESSION['id'] . "'></head><body>Ваш логин изменен! Вы будете перемещены через 5 сек. Если не хотите ждать, то <a href='user-page.php?id=" . $_SESSION['id'] . "'>нажмите    сюда.</a></body></html>";} //отправляем    пользователя назад
}
////////////////////////
////////ИЗМЕНЕНИЕ    ПАРОЛЯ
////////////////////////  (можливо, тут не потрібно ставити else if. Замість того, можна просто впихнути if для того, щоб можна було змінювати і логін і пароль одночасно. Але спочатку треба перевірити чи можна їх змінювати одночасно зараз)
else if (isset($_POST['update-user-password'])) //Если существует    пароль
{
    $password = $_POST['update-user-password'];
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $password = trim($password); //удаляем все лишнее
    if ($password == '') {
        echo $errorPageContent_Start;
        ?>
        <p>You have not entered a password.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        echo $errorPageContent_End;
        exit(footerInErrorPage());
    }
    if (strlen($password) < 3 or strlen($password) > 15) { //проверка на    количество символов
        echo $errorPageContent_Start;
        ?>
        <p>The password must consist of at least 3 characters and at most 15.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        echo $errorPageContent_End;
        exit(footerInErrorPage());
    }
    $password = md5($password); //шифруем пароль
    $password = strrev($password); // для надежности добавим реверс
    $password = "b1p55f" . $password . "b1p55f";
    //можно    добавить несколько своих символов по вкусу, например, вписав    "b3p6f". Если этот пароль будут взламывать методом подбора у себя    на сервере этой же md5,то явно ничего хорошего не выйдет. Но советую ставить    другие символы, можно в начале строки или в середине.
    //При    этом необходимо увеличить длину поля password в базе. Зашифрованный пароль    может получится гораздо большего размера.

    $result4 = mysqli_query($db, "UPDATE users SET password='$password' WHERE login='$old_login'"); //обновляем пароль

    if ($result4 == 'TRUE') { //если верно, то обновляем его в сессии
        $_SESSION['password'] = $password;
        echo $successPageContent_Start;
        ?>
        <p>Your password has been changed!<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
        <?php
        echo $errorPageContent_End;
        footerInErrorPage();
    }
        // echo "<html><head><meta http-equiv='Refresh' content='5; URL='user-page.php?id=" . $_SESSION['id'] . "'></head><body>Ваш пароль изменен! Вы будете перемещены через 5 сек. Если не хотите ждать, то <a href='user-page.php?id=" . $_SESSION['id'] . "'>нажмите    сюда.</a></body></html>";} //отправляем    пользователя назад
}
////////////////////////
////////ИЗМЕНЕНИЕ    АВАТАРЫ
//////////////////////// (Тут також перевірити, чи можна змінювати всі поля одночасно. Якщо ні, то видалити else.)
else if (isset($_FILES['update-user-avatar']['name'])) //отправлялась    ли переменная
{
    if (empty($_FILES['update-user-avatar']['name'])) {
        //если    переменная пустая (пользователь не отправил изображение),то присваиваем ему    заранее приготовленную картинку с надписью "нет аватара"
        $avatar = "avatars/no_photo.jpg"; //можете    нарисовать net-avatara.jpg или взять в исходниках
        $result7 = mysqli_query($db, "SELECT avatar FROM users WHERE login='$old_login'"); //извлекаем текущий аватар
        $myrow7 = mysqli_fetch_array($result7);
        if ($myrow7['avatar'] == $ava) { //если аватар был стандартный, то не удаляем    его, ведь у на одна картинка на всех.
            $ava = 1;
        } else {unlink($myrow7['avatar']);} //если аватар был свой, то    удаляем его, затем поставим стандарт
    } else {
        //иначе    - загружаем изображение пользователя для обновления
        $path_to_90_directory = 'avatars/'; //папка, куда будет загружаться    начальная картинка и ее сжатая копия

        if (preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)|(gif)|(GIF)|(png)|(PNG)$/', $_FILES['update-user-avatar']['name'])) //проверка формата исходного изображения

        {

            $filename = $_FILES['update-user-avatar']['name'];
            $source = $_FILES['update-user-avatar']['tmp_name'];
            $target = $path_to_90_directory . $filename;
            move_uploaded_file($source, $target); //загрузка оригинала в папку $path_to_90_directory
            if (preg_match('/[.](GIF)|(gif)$/', $filename)) {
                $im = imagecreatefromgif($path_to_90_directory . $filename); //если оригинал был в формате gif, то создаем    изображение в этом же формате. Необходимо для последующего сжатия
            }
            if (preg_match('/[.](PNG)|(png)$/', $filename)) {

                $im = imagecreatefrompng($path_to_90_directory . $filename); //если    оригинал был в формате png, то создаем изображение в этом же формате.    Необходимо для последующего сжатия
            }

            if (preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)$/', $filename)) {
                $im = imagecreatefromjpeg($path_to_90_directory . $filename); //если оригинал был в формате jpg, то создаем изображение в этом же    формате. Необходимо для последующего сжатия
            }

            //СОЗДАНИЕ    КВАДРАТНОГО ИЗОБРАЖЕНИЯ И ЕГО ПОСЛЕДУЮЩЕЕ СЖАТИЕ ВЗЯТО С САЙТА www.codenet.ru
            //    Создание квадрата 90x90
            //    dest - результирующее изображение
            //    w - ширина изображения
            //    ratio - коэффициент пропорциональности
            $w = 90; // квадратная    90x90. Можно поставить и другой размер.
            //    создаём исходное изображение на основе
            //    исходного файла и определяем его размеры
            $w_src = imagesx($im); //вычисляем ширину
            $h_src = imagesy($im); //вычисляем высоту изображения
            //    создаём пустую квадратную картинку
            // важно именно truecolor!, иначе    будем иметь 8-битный результат
            $dest = imagecreatetruecolor($w, $w);
            //    вырезаем квадратную серединку по x, если фото горизонтальное
            if ($w_src > $h_src) {
                imagecopyresampled($dest, $im, 0, 0,
                    round((max($w_src, $h_src) - min($w_src, $h_src)) / 2),
                    0, $w, $w, min($w_src, $h_src), min($w_src, $h_src));
            }

            // вырезаем квадратную верхушку по    y,
            // если фото вертикальное (хотя    можно тоже серединку)
            if ($w_src < $h_src) {
                imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w,
                    min($w_src, $h_src), min($w_src, $h_src));
            }

            //    квадратная картинка масштабируется без вырезок
            if ($w_src == $h_src) {
                imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w, $w_src, $w_src);
            }

            $date = time(); //вычисляем время в настоящий момент.
            imagejpeg($dest, $path_to_90_directory . $date . ".jpg"); //сохраняем изображение формата jpg в нужную папку,    именем будет текущее время. Сделано, чтобы у аватаров не было одинаковых    имен.
            //почему    именно jpg? Он занимает очень мало места + уничтожается анимирование gif    изображения, которое отвлекает пользователя. Не очень приятно читать его    комментарий, когда краем глаза замечаешь какое-то движение.
            $avatar = $path_to_90_directory . $date . ".jpg"; //заносим в переменную путь до аватара.
            $delfull = $path_to_90_directory . $filename;
            unlink($delfull); //удаляем оригинал загруженного изображения, он нам    больше не нужен. Задачей было - получить миниатюру.
            $result7 = mysqli_query($db, "SELECT avatar FROM users WHERE    login='$old_login'"); //извлекаем текущий аватар пользователя

            $myrow7 = mysqli_fetch_array($result7);
            if ($myrow7['avatar'] == $ava) { //если он стандартный, то не удаляем его, ведь у    нас одна картинка на всех.
                $ava = 1;
            } else {unlink($myrow7['avatar']);} //если аватар был свой, то    удаляем его

        } else {
            //в    случае несоответствия формата, выдаем соответствующее сообщение
            include "error-page.php";
            echo $errorPageContent_Start;
            ?>
            <p>The avatar must be in the format <strong> JPG, GIF or PNG </strong>.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
            <?php
            echo $errorPageContent_End;
            exit(footerInErrorPage());
            // exit("Аватар должен быть в формате <strong>JPG,GIF или PNG</strong>. <a href='user-page.php?id=" . $_SESSION['id'] . "'>Назад.</a>");

        }
    }
    $result4 = mysqli_query($db, "UPDATE users SET    avatar='$avatar' WHERE login='$old_login'"); //обновляем аватар в базе    
    if ($result4 == 'TRUE') { //если верно, то отправляем на личную страничку
        echo '<html><head><meta http-equiv="refresh" content="0;URL=user-page.php?id=' . $_SESSION['id'] . '"></head><body></body></html>';}
}
?>
