<?php
    session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
if (isset($_POST['user-login'])) { $login = $_POST['user-login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['user-password'])) { $password = $_POST['user-password']; if ($password == '') { unset($password);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) && empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля! <a href='index.php'>Главная страница</a>");
    }
    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
//удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
// подключаемся к базе
include ("bd.php");// файл bd.php должен быть в той    же папке, что и все остальные, если это не так, то просто измените путь          

    $result = mysqli_query($db, "SELECT * FROM    users WHERE login='$login' AND    password='$password'"); //извлекаем из базы все данные о пользователе с    введенным логином и паролем
    $myrow    = mysqli_fetch_array($result);
  if (empty($myrow['id']))
  
  else {          
  //если пароли    совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
    $_SESSION['password']=$myrow['password'];
    $_SESSION['login']=$myrow['login']; 
    $_SESSION['id']=$myrow['id'];//эти    данные очень часто используются, вот их и будет "носить с собой"    вошедший пользователь
    echo 'Succces?';
    // echo "<html><head><meta    http-equiv='Refresh' content='0;    URL=index.php'></head></html>";//перенаправляем пользователя на главную страничку, там    ему и сообщим об удачном входе
  //Далее мы запоминаем данные в куки, для последующего входа.
  //ВНИМАНИЕ!!! ДЕЛАЙТЕ ЭТО НА ВАШЕ УСМОТРЕНИЕ, ТАК КАК ДАННЫЕ ХРАНЯТСЯ    В КУКАХ БЕЗ ШИФРОВКИ

  if ($_POST['remember-me'] == 1) {
  //Если пользователь хочет, чтобы его данные сохранились для    последующего входа, то сохраняем в куках его браузера
  setcookie("login",    $_POST["user-login"], time()+9999999);
  setcookie("password",    $_POST["user-password"], time()+9999999);
  }}                  
  echo "<html><head><meta    http-equiv='Refresh' content='0;    URL=index.php'></head></html>";//перенаправляем пользователя на главную страничку, там    ему и сообщим об удачном входе
    ?>
