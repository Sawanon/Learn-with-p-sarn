<?php
include("connect.php");
echo $strsql = "INSERT INTO booking VALUES
('',".$_POST['u_id'].",".$_POST['tc_id'].",NULL,'".$_POST['startdate']."','".$_POST['enddate']."','".$_POST['detail']."',NULL,NULL,'A')";
$query = $conn->query($strsql);
if(!$query){
  echo "ไม่สามารถเพิ่มข้อมูลได้";
}else{
  echo "เพิ่มข้อมูลสำเร็จ";
}
 ?>
