<?php
include("connect.php");
$strsql = "SELECT *
FROM booking
WHERE b_id = '".$_GET['a']."'";
$query = $conn->query($strsql);
while ($result = $query->fetch_array()) {
  $b_id = $result['b_id'];
  $start = $result['b_startdatetime'];
  $end = $result['b_enddatetime'];
  $detail = $result['b_detail'];

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
          <img src="img/car/1.jpg" width="100%">
        </div>
      </div>
      <div class="col-sm-8">
        Mazda RX-8
      </div>
    </div>
    <table id="table" class="table table-bordered table-hover">
      <tr>
        <td class="header">เลขที่ใบจอง</td><td colspan="3">154</td>
      </tr>
      <tr>
        <td class="header">วันเวลาที่เริ่มใช้</td><td>2019-05-14 15:30</td><td class="header">วันเวลาที่นำมาคืน</td><td>2019-05-15 16:00</td>
      </tr>
      <tr>
        <td class="header">รายละเอียด</td><td colspan="3"> ระยอง </td>
      </tr>
      <tr>
        <td class="header">ใช้สำหรับแผนก</td><td>ฝ่ายบริหารทั่วไป</td><td class="header">พนักงานขับรถ</td><td>นาย ขอขับ แปป</td>
      </tr>
      <tr>
        <td class="header">ผู้ขอใช้รถ</td><td>นาย ขอยืม หน่อย</td><td class="header">โทรศัพท์</td><td>0864564555</td>
      </tr>
    </table>
  </body>
</html>
