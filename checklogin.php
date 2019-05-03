<?php
include("connect.php");
session_start();
$strsql = "SELECT * FROM user WHERE username = '".$_POST['username']."' AND password = '".md5($_POST['password'])."'";
$query = $conn->query($strsql);
while ($result = $query->fetch_array()) {
  $_SESSION['check'] = $result['u_id'];
  $result['username'];
  $result['password'];
  $_SESSION['name'] = ucfirst($result['firstname']);
  $_SESSION['name'] .= " ".ucfirst($result['lastname']);
  $result['u_permit'];
  $check = $result['u_id'];
}
if($_POST['listcookie']==1){
  $cookie_name = "cook";
  $cookie_value = 1;
  setcookie($cookie_name,$cookie_value,time()+(86400),"/");
  echo "Yes";
}else{
  echo "No";
}
if(isset($check)){
  echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}else{
  echo "<meta http-equiv='refresh' content='0;url=login.php?s=0'>";
}
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
