<?php
ini_set("display",1);
error_reporting(E_ALL);
//เก็บ logfile
ini_set("log_error",1);
ini_set("error_log",dirname("img")."/error_log.txt");
include("connect.php");
$u_id = $_POST['u_id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$address = $_POST['address'];
$checkimg = $_POST['checkimg']; //ตัวแปรเอาไว้เช็คว่ามีไฟล์ ลายเซ็นต์ อยู่แล้วหรือยัง
//upload images
if($checkimg!="" && $_FILES['signature']['name']==""){
  //มีไฟล์อยู่แล้ว input hidden มีค่าของรูปอยู่แล้ว ไม่อัพโหลดใหม่
  $newname = $checkimg;
}else if($_FILES['signature']['name']!=""){
  //input ไม่มีค่าอยู่ และเป็นการอัปโหลดครั้งแรก หรือ อัพโหลดอีกครั้งเพื่อเปลี่ยนลายเซ็นต์
  $typefile = pathinfo(basename($_FILES['signature']['name']), PATHINFO_EXTENSION);
  if($typefile!="png"){
    echo "<meta http-equiv='refresh' content='0;url=profile.php?error=1'>";
    exit;
  }else{
    //rename file
    $newname = 's_'.$u_id.".".$typefile;
    $images_path = "img/signature/";
    $upload_path = $images_path.$newname;
    $signature = move_uploaded_file($_FILES['signature']['tmp_name'], $upload_path);
    if($signature==false){
      echo "Nooo";
    }
  }
}
$strsql = "UPDATE user SET u_fname='".$fname."',u_lname='".$lname."',
u_tel='".$tel."',u_email='".$email."',u_address='".$address."',u_signature='".$newname."'
WHERE u_id='".$u_id."'";
$query = $conn->query($strsql);
if($query){
  echo "<meta http-equiv='refresh' content='0;url=profile.php'>";
}else{
  $error = mysqli_error($conn);
  $unique = strrpos($error,"u_email");
  if($unique){
    echo "<meta http-equiv='refresh' content='0;url=profile.php?error=2&email=".$email."'>";
  }else{
    echo $error;
  }
}
//edited
 ?>
