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

   $strSQL = "SELECT username, email FROM users WHERE id = '".$_SESSION['id']."'";

   $rs = mysqli_query($myConnection, $strSQL);
   while($row = mysqli_fetch_array($rs)) {

    
    echo $row['username'] . "<br />";
    echo $row['email'] . "<br />";
  }
  mysqli_close($myConnection);

  }
 ?>
