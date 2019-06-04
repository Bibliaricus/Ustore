<?php
//    вся процедура работает на сессиях. Именно в ней хранятся данные пользователя,    пока он находится на сайте. Очень важно запустить их в самом начале    странички!!!
session_start();
include "bd.php"; // файл bd.php должен быть в той же папке, что и все    остальные, если это не так, то просто измените путь
if (isset($_GET['id'])) {$id = $_GET['id'];} //id "хозяина" странички
  else {
    include "error-page.php";
    echo $errorPageContent_Start;
    ?>
    <p>You are not logged in. Please log-in.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
    <?php
    echo $errorPageContent_End;
    exit(footerInErrorPage());
  }
if (!preg_match("|^[\d]+$|", $id)) {
  include "error-page.php";
  echo $errorPageContent_Start;
  ?>
  <p>Invalid request format! Check URL<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
  <?php
  echo $errorPageContent_End;
  exit(footerInErrorPage());
}
if (!empty($_SESSION['login']) and !empty($_SESSION['password'])) {
  //если    существует логин и пароль в сессиях, то проверяем, действительны ли они
  $login = $_SESSION['login'];
  $password = $_SESSION['password'];
  $result2 = mysqli_query($db, "SELECT id,avatar  FROM users WHERE login='$login' AND password='$password'");
  $user = mysqli_fetch_array($result2);
  if (empty($user['id'])) 
  {
    include "error-page.php";
    echo $errorPageContent_Start;
    ?>
    <p>Login to this page is allowed only to registered users!<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
    <?php
    echo $errorPageContent_End;
    exit(footerInErrorPage());
  }
} else {
    //Проверяем, зарегистрирован ли вошедший
    include "error-page.php";
    echo $errorPageContent_Start;
    ?>
    <p>Login to this page is allowed only to registered users!<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
    <?php
    echo $errorPageContent_End;
    exit(footerInErrorPage());
}
$result = mysqli_query($db, "SELECT * FROM users WHERE id='$id'");
$userAnother = mysqli_fetch_array($result); //Извлекаем все данные    пользователя с данным id
if (empty($userAnother['login'])) {
  include "error-page.php";
  echo $errorPageContent_Start;
  ?>
  <p>User does not exist! It may have been deleted.<a class="error-page__link" href="<?php if(empty($_SERVER['HTTP_REFERER'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Go back</a></p>
  <?php
  echo $errorPageContent_End;
  exit(footerInErrorPage());
} //если такого не существует
?>

<?php 

// Function for checking does the user have an avatar
$inputUserAvatar = $userAnother['avatar'];
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
  <?php if ($userAnother['login'] == $login) { ?>
  <h1 class="page-title">Welcome, <?php echo $userAnother['login']; ?></h2>
  <?php }?>
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
<?php
if ($userAnother['login'] == $login) {
?>
 
  <form class="user-input-form" action='user-update.php' method='post'>
    <p>Your login: <strong><?php echo $userAnother['login'] ?></strong>.</p> 
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
  </div>
  <section class="message-section">
  <h2 class="page-title">Your message:</h2>

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
      ?>
    <article class="user-message__item">
      <header class="user-message__header">
        <a class="user-message__img" href="user-page.php?id=<?php echo $myrow4['id']; ?>">
          <img class="user-avatar" src="<?php echo $authorAvatar; ?>" alt="Avatar of user">
        </a>
        <div class="user-message__meta">
          <span>Author: <a href="user-page.php?id=<?php echo $myrow4['id']; ?>"><?php echo $author ?></a></span>
          <span>Date: <?php echo $messages['date'] ?></span>
        </div>
      </header>
      <div class="user-message__body"><?php echo $messages['message'] ?></div>
      <a href="drop_post.php?id=<?php echo $messages['id'] ?>" class="user-message__del-btn custom-btn">Delete message</a>
    </article>
    
      <?php
    } while ($messages = mysqli_fetch_array($tmp));
    ?>
      </section>
    <?php
  } else {
    ?>
      <span>There are no message</span>
    <?php
  } 
  ?>
      </div>
    </div>
  <?php
} else {
  //если    страничка чужая, то выводим только некторые данные и форму для отправки    личных сообщений

  $exitTimeQuery = mysqli_query($db, "SELECT exit_time FROM users WHERE id='$id'");
  $userExitTime = mysqli_fetch_array($exitTimeQuery);

  $userLastEntrance = time() - $userExitTime['exit_time'];
  $secondsInMinute = 60;
  $secondsInHour = 3600;
  $secondsInDay = $secondsInHour * 24;
  $secondsInMonth = $secondsInDay * 30;
  $secondsInYear = $secondsInDay * 365;
  
  ?>
    <div class="another-user user-message__header">
      <img class="user-avatar" alt="Avatar of user" src="<?php echo ifUserHaveHisAvatar($inputUserAvatar); ?> ">
      <div class="another-user__info user-message__meta">
        <span class="another-user__name"><?php echo $userAnother['login']; ?></span>
        <span title="Last entry: <?php echo date('d F Y (H:i)', $userExitTime['exit_time']); ?>" class="another-user__last-entr"><?php 
          if ($userLastEntrance > $secondsInYear) {
            echo 'The user logged in last ' .  floor($userLastEntrance / $secondsInYear) . ' years ago.';
          } elseif ($userLastEntrance > $secondsInMonth) {
            echo 'The user logged in last ' .  floor($userLastEntrance / $secondsInMonth) . ' months ago.';
          } elseif ($userLastEntrance > $secondsInDay) {
            echo 'The user logged in last ' .  floor($userLastEntrance / $secondsInDay) . ' days ago.';
          } elseif ($userLastEntrance > $secondsInHour) {
            echo 'The user logged in last ' . floor($userLastEntrance / $secondsInHour) . ' hours ago.';
          } elseif ($userLastEntrance > $secondsInMinute) {
            echo 'The user logged in last ' .  floor($userLastEntrance / $secondsInMinute) . ' minutes ago.';
          }else {
            echo 'The user logged in last ' .  $userLastEntrance . ' seconds ago.';
          } 
        ?></span>
      </div>
    </div>
    <h2 class="message-field-title">Send your message:</h2>
    <form action='post.php' method='post' class="another-user-textarea">
      <textarea class="user-message-textarea" name='message-to-user'></textarea><br>
      <input type='hidden' name='recipient'    value='<?php echo $userAnother['login']; ?>'>
      <input type='hidden' name='id'    value='<?php echo $userAnother['id']; ?>'>
      <button class="custom-btn" name="submit">Send your message</button>
    </form>
  </div>
</div>
</div>
<?php    
}
include $footer;
include $functions;
?>