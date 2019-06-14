<?php
function Changeformatdate($date,$format){
  if ($format=="YtoD") {
    $day = substr($date,8,2);
    $day .= "-".substr($date,5,2);
    $day .= "-".substr($date,0,4);
    $day .= " ".substr($date,11);
    return $day;
  }else if($format=="DtoY"){
    $year = substr($date,6,4);
    $year .= "-".substr($date,3,2);
    $year .= "-".substr($date,0,2);
    $year .= " ".substr($date,11);
    return $year;
  }
}

/*หน้าจะยังไม่ได้ใช่เพราะว่าพวก sql มันยังไม่สามารถเรียกใช้ผ่านไฟลือื่นได้ ยังมีปัญหาเกี่ยวกับการดึงตัวแปรการ query นอกไฟล์เพราะยังไม่ได้สร้างตัวแปี
function Updatesql($table,$set,$where){
  include("connect.php");
  $sql = "UPDATE ";
  $sql .= $table;
  $sql .= " SET ";
  $sql .= $set;
  $sql .= " WHERE ";
  $sql .= $where.";";
  return $sql;
}*/
 ?>
