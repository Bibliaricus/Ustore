<?php
//    вся процедура работает на сессиях. Именно в ней хранятся данные пользователя,    пока он находится на сайте. Очень важно запустить их в самом начале    странички!!!
session_start();
include "bd.php"; // файл bd.php должен быть в той же папке, что и все    остальные, если это не так, то просто измените путь
if (!empty($_SESSION['login']) and !empty($_SESSION['password'])) {
    //если    существует логин и пароль в сессиях, то проверяем, действительны ли они

    $login = $_SESSION['login'];
    $password = $_SESSION['password'];
    $result2 = mysqli_query($db, "SELECT id,avatar FROM users WHERE login='$login' AND password='$password'");
    $user = mysqli_fetch_array($result2);
    if (empty($user['id'])) {
        //если данные    пользователя не верны
        exit("Вход на эту страницу разрешен только зарегистрированным пользователям! <a href=\"reg.php\">Зарегистрироваться.</a>");
    }
} else {
    //Проверяем,    зарегистрирован ли вошедший
    exit("Вход на эту страницу разрешен только зарегистрированным пользователям! <a href=\"reg.php\">Зарегистрироваться.</a>");}
?>

<?php 
  include "global_vars.php";
  include $html_head;
?>

<body class="all-users user-page">

<?php 
  include $header;
?>  
<div class="container-fluid">  
  <h1 class="page-title">List of all users</h1>
  <div class="row user-page-row">
    <nav class="user-navigation col-4 col-md-3 col-lg-2">
      <ul class="desktop-nav navbar-nav flex-grow-1 flex-wrap justify-content-center">
        <li class="nav-item mr-4"><a href="index.php" class="nav-link">Home page</a></li>
        <li class="nav-item mr-4"><a href="user-page.php?id=<?php echo $user['id'] ?>" class="nav-link">My page</a></li>
        <li class="nav-item mr-4"><a href="all_users.php" class="nav-link">All users</a></li>
        <li class="nav-item mr-4"><a href="exit.php" class="nav-link">Log out</a></li>
      </ul>
    </nav>
    <div class="user-main-content col-8 col-md-9 col-lg-10">
      <ul class="user-list">
 <?php
$result = mysqli_query($db, "SELECT login,id,avatar FROM users ORDER BY login"); //извлекаем логин и идентификатор пользователей
$myrow = mysqli_fetch_array($result);
do {
  ?>
  
    <li class="user-list__item">
      <a href="user-page.php?id=<?php echo $myrow['id']; ?>">
        <img src="<?php echo $myrow['avatar']; ?>" alt="Avatar of user" class="user-list__avatar user-avatar">
      </a>
      <span class="user-list__link"><?php echo $myrow['login']; ?></span>
      <a href="user-page.php?id=<?php echo $myrow['id']; ?>" class="custom-btn">Write message</a>
    </li>
  
    <!-- //выводим их в цикле
    printf("<a href='user-page.php?id=%s'>%s</a><br>", $myrow['id'], $myrow['login']); -->
  <?php
} while ($myrow = mysqli_fetch_array($result));
?>
      </ul>
    </div>
  </div>
</div>
<?php
include $footer;
include $functions;
?>
  
