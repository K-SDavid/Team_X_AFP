<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>
<?php
  session_start();
  require(database.php);

   $strSQL = "SELECT username, email FROM users WHERE user_id = '".$_SESSION['user_id']."'";
 ?>
