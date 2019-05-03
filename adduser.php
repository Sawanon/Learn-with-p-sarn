<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
    include("connect.php");
     ?>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $strsql = "INSERT INTO user
    VALUES('','".$_POST['username']."','".md5($_POST['password'])."'
    ,'".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['permit']."')";
    $query = $conn->query($strsql);
    if ($query) {
      ?>
      <div class="">

      </div>
      <?php
    }
     ?>
  </body>
</html>
