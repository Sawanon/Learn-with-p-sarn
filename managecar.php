<style type="text/css">
.header{
  background-color: #936215;
}
.deep{
  background-color: #d08a1c;
}
</style>
<?php
include("connect.php");
include("function.php");
$strsql = "SELECT *
FROM booking,user,type_car
WHERE b_id = '".$_GET['b_id']."'
AND user.u_id = applicant_id
AND type_car.tc_id = booking.tc_id";
$query = $conn->query($strsql);
echo "<table class='table table-bordered'>";
while ($result = $query->fetch_array()) {
  echo "<tr>";
  echo "<td class='header' colspan='2'>ผู้ขออนุมัติ</td>";
  echo "<td colspan='2' class='deep'>".$result['u_prefix']." ".$result['u_fname']." ".$result['u_lname']."</td>";
  echo "</tr>";
  echo "<td class='header'>วันเวลาที่เริ่มใช้รถ</td><td class='deep'>".Changeformatdate($result['b_startdatetime'],"YtoD")."</td>";
  echo "<td class='header'>วันเวลาที่สิ้นสุดการใช้งาน</td><td class='deep'>".Changeformatdate($result['b_enddatetime'],"YtoD")."</td>";
  echo "<tr>";
  echo "<td class='header' colspan='2'>รายละเอียดในการจอง</td><td class='deep' colspan='2'>".$result['b_detail']."</td>";
  echo "</tr>";
}
echo "</table>";
//$strsql = "SELECT * FROM car WHERE tc_id = '".$_GET['tc_id']."'";
 ?>
