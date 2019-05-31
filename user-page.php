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
$inputUserAvatar = $myrow['avatar'];
function ifUserHaveHisAvatar($inputUserAvatar) {
  if (!empty($inputUserAvatar)) {
    return $inputUserAvatar;
  } else {
    return $defaultAvatar = "avatars/no_photo.jpg";
  }
}

include 'global_vars.php';
include $html_head;
?>

  <body class="user-page">
<?php include $header; ?>
<div class="container-fluid">
  <h1 class="page-title">Welcome, <?php echo $myrow['login']; ?></h2>
      <div class="row user-page-row">

  <nav class="user-navigation col-4 col-md-3 col-lg-2">
    <ul class="desktop-nav navbar-nav flex-grow-1 flex-wrap justify-content-center">
      <li class="nav-item mr-4"><a href="index.php" class="nav-link">Home page</a></li>
      <li class="nav-item mr-4"><a href="user-page.php?id=<?php echo $myrow2['id'] ?>" class="nav-link">My page</a></li>
      <li class="nav-item mr-4"><a href="exit.php" class="nav-link">Log out</a></li>
    </ul>
  </nav>
  <div class="user-main-content col-8 col-md-9 col-lg-10">
<?php
if ($myrow['login'] == $login) {
?>
 
  <form class="user-input-form" action='user-update.php' method='post'>
    <p>Your login: <strong><?php echo $myrow['login'] ?></strong>.</p> 
    <label for="up-user-login">Input your new login:</label>
    <input name='update-user-login' type='text' id="up-user-login">
    <button class="custom-btn" name='submit'>Change login</button>
  </form>    
  <form class="user-input-form" action='user-update.php' method='post'>
    <label for="up-user-password">Input your new password:</label>
    <input name='update-user-password' type='password' id="up-user-password">
    <button class="custom-btn" name='submit'>Change password</button>
  </form>
  <form class="user-input-form" action='user-update.php' method='post' enctype='multipart/form-data'>
    <div class="user-avatar-field">
      <div class="user-current-ava">
        <p>Your old avatar:</p>
        <img class="user-avatar" alt="Avatar of user" src="<?php echo ifUserHaveHisAvatar($inputUserAvatar); ?>">
        <label class="custom-btn" for="up-user-avatar">Select your new avatar</label>
        <input type="FILE"    name="update-user-avatar" id="up-user-avatar" onchange="getFileParam();">
        <small>Image format: jpg, gif or png. Max weight: 2 MB.</small>
      </div>
      <div class="input-file__group" id="new-avatar">
        <p>Your new avatar:</p>
        <div id="input-file_prev"></div>
        <div id="input-file__name"></div>
        <div id="input-file__size"></div>
      </div>
    </div>
    <button class="custom-btn" name='submit'>Change avatar</button>
  </form>

  <h2>Личные    сообщения:</h2>

<?php
  $tmp = mysqli_query($db, "SELECT * FROM messages WHERE recipient='$login' ORDER BY id DESC");
  $messages = mysqli_fetch_array($tmp); //извлекаем сообщения    пользователя, сортируем по идентификатору в обратном порядке, т.е. самые    новые сообщения будут вверху
  if (!empty($messages['id'])) {
    do//выводим    все сообщения в цикле
    {
      $author = $messages['author'];
      $result4 = mysqli_query($db, "SELECT avatar,id FROM users WHERE login='$author'"); //извлекаем аватар автора
      $myrow4 = mysqli_fetch_array($result4);
      $avatar = $myrow4['avatar'];
      $defaultAvatar = 'avatars/no_photo.jpg';
      if (!empty($myrow4['avatar'])) { //если такового нет, то выводим стандартный (может этого пользователя уже давно удалили)
        $authorAvatar = $avatar;
      } else { $authorAvatar = $defaultAvatar;}
      
      printf("
        <table>
        <tr>

        <td><a href='user-page.php?id=%s'><img alt='аватар' src='%s'></a></td>

        <td>Автор:    <a href='user-page.php?id=%s'>%s</a><br>
        Дата:    %s<br>
        Сообщение:<br>

        %s<br>
        <a href='drop_post.php?id=%s'>Удалить</a>


        </td>
        </tr>
        </table><br>
        ", $myrow4['id'], $authorAvatar, $myrow4['id'], $author, $messages['date'], $messages['message'], $messages['id']);
      //выводим само сообщение
    } while ($messages = mysqli_fetch_array($tmp));
  } else {
      //если сообщений не найдено
      echo "Сообщений нет";
  } 
  ?>
        </div>
      </div>
    </div>
  <?php
} else {
  //если    страничка чужая, то выводим только некторые данные и форму для отправки    личных сообщений
  echo '<img alt="Avatar of user" src="' . ifUserHaveHisAvatar($inputUserAvatar) . '"><br>';
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
include $footer;
include $functions;
?>