<?php
//    вся процедура работает на сессиях. Именно в ней хранятся данные пользователя,    пока он находится на сайте. Очень важно запустить их в самом начале    странички!!!
session_start();
include "bd.php"; // файл bd.php должен быть в той же папке, что и все    остальные, если это не так, то просто измените путь
if (isset($_GET['id'])) {$id = $_GET['id'];} //id "хозяина" странички
  else {exit("Вы не вошли на сайт. Залогиньтесь, мать вашу! <a href='index.php'>Главная страница</a>");} //если не    указали id, то выдаем ошибку
if (!preg_match("|^[\d]+$|", $id)) {
  exit("<p>Неверный    формат запроса! Проверьте URL</p> <a href='index.php'>Главная страница</a>"); //если id не число, то выдаем    ошибку
}
if (!empty($_SESSION['login']) and !empty($_SESSION['password'])) {
  //если    существует логин и пароль в сессиях, то проверяем, действительны ли они
  $login = $_SESSION['login'];
  $password = $_SESSION['password'];
  $result2 = mysqli_query($db, "SELECT id FROM users WHERE login='$login' AND password='$password'");
  $myrow2 = mysqli_fetch_array($result2);
  if (empty($myrow2['id'])) 
  {
    //Если не действительны (может мы удалили этого пользователя из базы за плохое поведение)

    exit("Вход на эту страницу разрешен только зарегистрированным пользователям! <a href=\"reg.php\">Зарегистрироваться.</a>");
  }
} else {
    //Проверяем, зарегистрирован ли вошедший
  exit("Вход на эту страницу разрешен только зарегистрированным пользователям! <a href=\"reg.php\">Зарегистрироваться.</a>");
}
$result = mysqli_query($db, "SELECT * FROM users WHERE id='$id'");
$myrow = mysqli_fetch_array($result); //Извлекаем все данные    пользователя с данным id
if (empty($myrow['login'])) {exit("Пользователя не существует! Возможно он был удален. <a href='index.php'>Главная страница</a>");} //если такого не существует
?>

<?php 

// Function for checking does the user have an avatar
function ifUserHaveHisAvatar() {
  if (!empty($myrow['avatar'])) {
    return $myrow['avatar'];
  } else {
    return $defaultAvatar = "avatars/no_photo.jpg";
  }
}

?>

<html>
  <head>
    <title><?php echo $myrow['login']; ?></title>
  </head>
  <body>
    <h2>Пользователь "<?php echo $myrow['login']; ?>"</h2>

<?php
// Меню
print <<<HERE
  |<a href='user-page.php?id=$myrow2[id]'>Моя страница</a>|<a href='index.php'>Главная страница</a>|<a href='all_users.php'>Список пользователей</a>|<a href='exit.php'>Выход</a><br><br>
HERE;
if ($myrow['login'] == $login) {
  //Если    страничка принадлежит вошедшему, то предлагаем изменить данные и выводим    личные сообщения
  print <<<HERE
  <form action='user-update.php' method='post'>
    Ваш логин    <strong>$myrow[login]</strong>. Изменить логин:<br>
    <input name='update-user-login' type='text'>
    <input type='submit' name='submit' value='изменить'>
  </form>
    <br>
  <form action='user-update.php' method='post'>
    Изменить пароль:<br>
    <input name='update-user-password' type='password'>
    <input type='submit' name='submit' value='изменить'>
  </form>
    <br>
  <form action='user-update.php' method='post' enctype='multipart/form-data'>
    Ваш аватар:<br>
HERE;

    echo '<img alt="Avatar of user" src="' . ifUserHaveHisAvatar() . '">';
    
    print <<<HERE
    Изображение должно быть    формата jpg, gif или png. Изменить аватар:<br>
    <input type="FILE"    name="update-user-avatar">
    <input type='submit' name='submit' value='изменить'>
    </form>
    <br>
  <h2>Личные    сообщения:</h2>
HERE;
  $tmp = mysqli_query($db, "SELECT * FROM    messages WHERE recipient='$login' ORDER BY id DESC");
  $messages = mysqli_fetch_array($tmp); //извлекаем сообщения    пользователя, сортируем по идентификатору в обратном порядке, т.е. самые    новые сообщения будут вверху
  if (!empty($messages['id'])) {
    do//выводим    все сообщения в цикле
    {
      $author = $messages['author'];
      $result4 = mysqli_query($db, "SELECT avatar,id    FROM users WHERE login='$author'"); //извлекаем аватар автора
      $myrow4 = mysqli_fetch_array($result4);
      if (!empty($myrow4['avatar'])) { //если такового нет, то выводим стандартный (может этого пользователя уже давно удалили)
        $avatar = $myrow4['avatar'];
      } else { $defaultAvatar;}
      printf("
        <table>
        <tr>

        <td><a href='page.php?id=%s'><img alt='аватар' src='%s'></a></td>

        <td>Автор:    <a href='page.php?id=%s'>%s</a><br>
        Дата:    %s<br>
        Сообщение:<br>

        %s<br>
        <a href='drop_post.php?id=%s'>Удалить</a>


        </td>
        </tr>
        </table><br>
        ", $myrow4['id'], $avatar, $myrow4['id'], $author, $messages['date'], $messages['text'], $messages['id']);
      //выводим само сообщение
    } while ($messages = mysqli_fetch_array($tmp));
  } else {
      //если сообщений не найдено
      echo "Сообщений нет";
  }

} else {
  //если    страничка чужая, то выводим только некторые данные и форму для отправки    личных сообщений
  echo '<img alt="Avatar of user" src="' . ifUserHaveHisAvatar() . '"><br>';
  print <<<HERE
    <form action='post.php' method='post'>
    <br>
    <h2>Отправить Ваше    сообщение:</h2>
    <textarea cols='43' rows='4'    name='text'></textarea><br>
    <input type='hidden' name='recipient'    value='$myrow[login]'>
    <input type='hidden' name='id'    value='$myrow[id]'>
    <input type='submit' name='submit' value='Отправить'>

    </form>
HERE;
}
?>
  </body>
</html>