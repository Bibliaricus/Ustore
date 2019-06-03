<?php
  include "error-page.php";
  include "bd.php"; // файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто    измените путь
  $result4 = mysqli_query($db, "SELECT avatar FROM users WHERE activation='0' AND UNIX_TIMESTAMP() - UNIX_TIMESTAMP(date) > 3600"); //извлекаем аватарки тех пользователей, которые в    течении часа не активировали свой аккаунт. Следовательно их надо удалить из    базы, а так же и файлы их аватарок
  if (mysqli_num_rows($result4) > 0) {
      $myrow4 = mysqli_fetch_array($result4);
      do {
        //удаляем    аватары в цикле, если они не стандартные
        if ($myrow4['avatar'] == "avatars/no_photo.jpg") {$a = "Ничего не делать";} else {
            unlink($myrow4['avatar']); //удаляем    файл
        }
      } while ($myrow4 = mysqli_fetch_array($result4));
  }
  mysqli_query($db, "DELETE FROM users WHERE activation='0' AND UNIX_TIMESTAMP() - UNIX_TIMESTAMP(date) > 3600"); //удаляем пользователей из базы

  if (isset($_GET['code'])) {
    $code = $_GET['code']; //код подтверждения
  } else {
    echo $errorPageContent_Start;
?>
      <p>You have visited the page without a verification code!</p>
<?php
echo $errorPageContent_End;
    
    exit(footerInErrorPage());  //если не указали code,    то выдаем ошибку
  }
  if (isset($_GET['login'])) {
    $login = $_GET['login'];  //логин,который    нужно активировать
  } else {
    echo $errorPageContent_Start;
    ?>
    <p>You have visited the page without a login!</p>
    <?php
    echo $errorPageContent_End;
    exit(footerInErrorPage());
  }
  $result = mysqli_query($db, "SELECT id FROM users WHERE login='$login'"); //извлекаем    идентификатор пользователя с данным логином
  $myrow = mysqli_fetch_array($result);
  $activation = md5($myrow['id']) . md5($login); //создаем    такой же код подтверждения
  if ($activation == $code) { //сравниваем полученный из url и сгенерированный код
      mysqli_query($db, "UPDATE    users SET activation='1' WHERE login='$login'"); //если равны, то активируем пользователя
      echo $successPageContent_Start;
      ?>
      <p>Your email is confirmed! Now you can enter the site under your login!</p>
      <?php
      echo $errorPageContent_End;
  } else {
    echo $errorPageContent_Start
    ?>
    <p>Mistake! Your email is not confirmed!</p>
    <?php
    echo $errorPageContent_End;
  }
  footerInErrorPage();
?>