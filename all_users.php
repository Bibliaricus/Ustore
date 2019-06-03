<?php
session_start();
include "bd.php";
if (!empty($_SESSION['login']) and !empty($_SESSION['password'])) {
    include "error-page.php";
    $login = $_SESSION['login'];
    $password = $_SESSION['password'];
    $result2 = mysqli_query($db, "SELECT id,avatar FROM users WHERE login='$login' AND password='$password'");
    $user = mysqli_fetch_array($result2);
    if (empty($user['id'])) {
        echo $errorPageContent_Start;
        ?>
        <p>Login to this page is allowed only to registered users!</p>
        <?php
        echo $errorPageContent_End;
    exit(footerInErrorPage());
    }
} else {
    include "error-page.php";
    echo $errorPageContent_Start;
        ?>
        <p>Login to this page is allowed only to registered users!</p>
        <?php
        echo $errorPageContent_End;
  exit(footerInErrorPage());}
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
$result = mysqli_query($db, "SELECT login,id,avatar FROM users ORDER BY login");
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
  
