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

/*function Updatesql($table,$set,$where){
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
