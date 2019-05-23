<?php
include("connect.php");
$strsql = "DELETE FROM user WHERE u_id = '".$_POST['uid']."'";
$query = $conn->query($strsql);
if($query){
  echo "<meta http-equiv='refresh' content='0;url=manageuser.php'>";
}else{
  echo "<meta http-equiv='refresh' content='0;url=manageuser.php?error=1'";
}
 ?>
