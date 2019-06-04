<?php
  session_start();
  include "bd.php"; 
  if    (!empty($_SESSION['login']) and !empty($_SESSION['password'])) {
    $login    = $_SESSION['login'];
    $password    = $_SESSION['password'];
    $result    = mysqli_query($db, "SELECT id,avatar FROM users WHERE login='$login' AND password='$password'"); 
    $user    = mysqli_fetch_array($result);
  }
  include "error-page.php";
  $result4 = mysqli_query($db, "SELECT avatar FROM users WHERE activation='0' AND UNIX_TIMESTAMP() - UNIX_TIMESTAMP(date) > 3600"); 
  if (mysqli_num_rows($result4) > 0) {
      $myrow4 = mysqli_fetch_array($result4);
      do {
        if ($myrow4['avatar'] == "avatars/no_photo.jpg") {$a = "Ничего не делать";} else {
            unlink($myrow4['avatar']); 
        }
      } while ($myrow4 = mysqli_fetch_array($result4));
  }
  mysqli_query($db, "DELETE FROM users WHERE activation='0' AND UNIX_TIMESTAMP() - UNIX_TIMESTAMP(date) > 3600"); 

  if (isset($_GET['code'])) {
    $code = $_GET['code']; 
  } else {
    echo $errorPageContent_Start;
?>
    <p>You have visited the page without a verification code!</p>
<?php
errorPageContent_End();
    
    exit(footerInErrorPage());
  }
  if (isset($_GET['login'])) {
    $login = $_GET['login'];  
  } else {
    echo $errorPageContent_Start;
    ?>
    <p>You have visited the page without a login!</p>
    <?php
    errorPageContent_End();
    exit(footerInErrorPage());
  }
  $result = mysqli_query($db, "SELECT id FROM users WHERE login='$login'"); 
  $myrow = mysqli_fetch_array($result);
  $activation = md5($myrow['id']) . md5($login); 
  if ($activation == $code) { 
      mysqli_query($db, "UPDATE    users SET activation='1' WHERE login='$login'"); 
      echo $successPageContent_Start;
      ?>
      <p>Your email is confirmed! Now you can enter the site under your login!</p>
      <?php
      errorPageContent_End();
  } else {
    echo $errorPageContent_Start
    ?>
    <p>Mistake! Your email is not confirmed!</p>
    <?php
    errorPageContent_End();
  }
  footerInErrorPage();
?>