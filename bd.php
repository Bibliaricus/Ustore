<?php
  /**
   * "localhost" - your MySQL server
   * "root" - login to this server (writes in admin panel in hostings or default login to phpMyAdmin)
   * "" - password to this server (in hosting admin panel or password to phpMyAdmin)
   * "Ustore" - name of data base
   */

  //  For servers
  // Arguments: 1 - acces poin, 2 - user login of DB, 3 - user password of DB, 4 - name of DB
  // $db = mysqli_connect("localhost", "cs90695_ustore", "24019950dn", "cs90695_ustore");

  // For locals
  $db = mysqli_connect("localhost", "root", "", "Ustore");
?>