<?php

  include "global_vars.php";
  include $html_head;
?>

<body class="error-page">

<?php 
  include $header;
  
$successPageContent_Start = <<<HERE0
<div class="error-page__message">
  <h1 class="page-title">Congratulations!</h1>
  <?php 
  ?>
HERE0;
$errorPageContent_Start = <<<HERE
<div class="error-page__message">
  <h1 class="page-title">Houston, we’ve had a problem!</h1>
  <?php 
  ?>
HERE;
$errorPageContent_End = <<<HERE2
<div class="error-page__buttons">
    <a class="custom-btn" href="index.php">To the home page</a>    
    <a class="custom-btn" href="reg.php">Sign up</a>
  </div>
</div>
HERE2;
?>

<?php 
function footerInErrorPage() {
  include "global_vars.php";
  include $footer;
  include $functions;
}
?>