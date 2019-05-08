<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    include("connect.php");
    session_start();
    $strsql = "SELECT * FROM user WHERE username = '".md5($_POST['username'])."' AND password = '".md5($_POST['password'])."'";
    $query = $conn->query($strsql);
    while ($result = $query->fetch_array()) {
      $_SESSION['check'] = $result['u_id'];
      $result['username'];
      $result['password'];
      $_SESSION['name'] = $result['u_fname'];
      $_SESSION['name'] .= " ".$result['u_lname'];
      $_SESSION['permit'] = $result['u_permit'];
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

  </body>
</html>
