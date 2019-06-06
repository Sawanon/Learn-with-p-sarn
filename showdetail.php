<?php
include("connect.php");
$strsql = "SELECT *
FROM booking,user
WHERE b_id = '".$_GET['a']."'
AND applicant_id = user.u_id";
$query = $conn->query($strsql);
while ($result = $query->fetch_array()) {
  $b_id = $result['b_id'];
  $start = $result['b_startdatetime'];
  $end = $result['b_enddatetime'];
  $detail = $result['b_detail'];
  $applicant = $result['u_fname'];
  $applicant .= " ".$result['u_lname'];
  $driver = $result['driver_id'];
  $c_id = $result['c_id'];
  $tc_id = $result['tc_id'];
  $tel = $result['u_tel'];
  $department = $result['u_department'];
  $status = $result['b_status'];
  if ($status=="A") {
    $b_status = "อยู่ระหว่างการรออนุมัติ";
    $color = "#f39c12";
  }else if($status=="B"){
    $b_status = "อนุมัติแล้ว";
    $color = "#0073b7";
  }else if($status=="D"){
    $b_status = "ดำเนินการเสร็จสิ้น";
    $color = "#3b9e1d";
  }else {
    $b_status = "ยกเลิก";
    $color = "#f56954";
  }
}
if($driver == ""){
  $driver = "-";
}else{
  $strsql = "SELECT * FROM user WHERE u_id = '".$driver."'";
  $query = $conn->query($strsql);
  while ($result = $query->fetch_array()) {
    $driver = $result['u_fname'];
    $driver .= " ".$result['u_lname'];
  }
}
if($c_id == ""){
  $strsql = "SELECT * FROM type_car WHERE tc_id = '".$tc_id."'";
  $query = $conn->query($strsql);
  while ($result = $query->fetch_array()) {
    $tc_name = $result['tc_name'];
  }
}else{
  $strsql = "SELECT * FROM car,type_car WHERE c_id = '".$c_id."' AND car.tc_id = type_car.tc_id";
  $query = $conn->query($strsql);
  while ($result = $query->fetch_array()) {
    $c_id = $result['c_id'];
    $c_model = $result['c_model'];
    $c_brand = $result['c_brand'];
    $c_fuel = $result['c_fuel'];
    $c_license = $result['c_licenseplate'];
    $tc_name = $result['tc_name'];
  }
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style type="text/css">
    .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
      border: 1px solid #909090;
    }
    .header{
      background-color: #dfdcdc;
    }
      }
    </style>
  </head>
  <body>
    <div class="row">
      <div class="col-sm-4">
        <div style="margin-bottom: 10px;">
          <?php
          if($driver != "-"){
           ?>
           <img src="img/car/<?php echo $c_id; ?>.jpg" width="100%">
          <?php
          }
          ?>
        </div>
      </div>
      <div class="col-sm-8">
        <?php
        if($c_id == ""){
          echo "ป้านทะเบียน : -";
          echo "<br />";
          echo "ประเภทรถ : ".$tc_name;
          echo "<br>";
          echo "ยี่ห้อ/รุ่น : -";
          echo "<br />";
          echo "น้ำมัน : -";
        }else{
          echo "ป้ายทะเบียน : ".$c_license;
          echo "<br />";
          echo "ประเภทรถ : ".$tc_name;
          echo "<br>";
          echo "ยี่ห้อ/รุ่น : ".$c_brand." ".$c_model;
          echo "<br />";
          echo "น้ำมัน : ".$c_fuel;
        }
        ?>
        <div style="padding: 4px; position: absolute;top: 0%;right: 5%;color: #ffffff; background-color: <?php echo $color; ?>;">
          <?php echo $b_status; ?>
        </div>
      </div>
    </div>
    <table id="table" class="table table-bordered table-hover">
      <tr>
        <td class="header">เลขที่ใบจอง</td><td colspan="3"><?php echo $b_id; ?></td>
      </tr>
      <tr>
        <td class="header">วันเวลาที่เริ่มใช้</td><td><?php echo $start; ?></td><td class="header">วันเวลาที่นำมาคืน</td><td><?php echo $end; ?></td>
      </tr>
      <tr>
        <td class="header">รายละเอียด</td><td colspan="3"><?php echo $detail; ?></td>
      </tr>
      <tr>
        <td class="header">ใช้สำหรับแผนก</td><td><?php echo $department; ?></td><td class="header">พนักงานขับรถ</td><td><?php echo $driver; ?></td>
      </tr>
      <tr>
        <td class="header">ผู้ขอใช้รถ</td><td><?php echo $applicant; ?></td><td class="header">โทรศัพท์</td><td><?php echo $tel; ?></td>
      </tr>
    </table>
  </body>
</html>
