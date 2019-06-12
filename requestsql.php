<?php
include("connect.php");
if($_POST['cancel']=="cancel"){
  $strsql = "UPDATE booking SET b_status = 'C' WHERE b_id = '".$_POST['b_id']."'";
}else{
  $strsql = "UPDATE booking SET b_status = 'B' WHERE b_id = '".$_POST['b_id']."'";
}
$query = $conn->query($strsql);
if($query){
  echo "<meta http-equiv='refresh' content='0;url=request.php'>";
}else{
  echo "<meta http-equiv='refresh' content='0;url=request.php?error=1'>";
}
 ?>
