<?php
session_start();
session_destroy();
setcookie("cook", "", time() - 3600, "/");
unset($_COOKIE['cook']);
header("location: login.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>
