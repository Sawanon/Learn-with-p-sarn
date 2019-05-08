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
    VALUES('','".$_POST['prefix']."','".$_POST['firstname']."'
    ,'".$_POST['lastname']."','".$_POST['tel']."','".$_POST['email']."','','".md5($_POST['username'])."','".md5($_POST['password'])."','".$_POST['permit']."','')";
    $query = $conn->query($strsql);
    if(!$query) {
      echo "<meta http-equiv='refresh' content='0;url=register.php?s=f'>";
    }else{
      echo "<meta http-equiv='refresh' content='0;url=register.php?s=c'>";
    }
     ?>
  </body>
</html>
