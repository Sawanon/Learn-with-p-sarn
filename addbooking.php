<?php
include("connect.php");
$strsql = "INSERT INTO booking VALUES
('',".$_POST['u_id'].",".$_POST['tc_id'].",NULL,'".$_POST['startdate']."','".$_POST['enddate']."','".$_POST['detail']."',NULL,NULL,'A')";
$query = $conn->query($strsql);
if(!$query){
  echo "<meta http-equiv='refresh' content='0; url=index.php?error=1'>";
}else{
  echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
 ?>
