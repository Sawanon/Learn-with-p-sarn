<?php
include("header.php");
include("left.php");
$_SESSION['menu'] = 5;
 ?>
 <style>
   #webmenu{
     width:340px;
   }
 </style>
<div class="content-wrapper">
  <section class="content-header">
  </section>
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3>รายการผ่านการอนุมัติ</h3>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover"> <!--class="table table-bordered table-hover"-->
          <thead>
          <tr>
            <th>ID</th>
            <th>ผู้ขอใช้รถ</th>
            <th>ชนิดรถ</th>
            <th>วันเวลาที่เริ่มใช้รถ</th>
            <th>วันเวลาที่สิ้นสุดการใช้รถ</th>
            <th>รายละเอียด</th>
            <th>อนุมัติ</th>
          </tr>
          </thead>
          <tbody>
            <?php
            $strsql = "SELECT *
            FROM booking,user,type_car
            WHERE applicant_id = user.u_id
            AND booking.tc_id = type_car.tc_id
            AND b_status = 'B'";
            $query = $conn->query($strsql);
            $count = 0;
            while ($result = $query->fetch_array()) {
              echo "<tr id='row".$result['b_id']."'>";
              echo "<td>".$result['b_id']."</td>";
              echo "<td>".$result['u_prefix']." ".$result['u_fname']." ".$result['u_lname']."</td>";
              echo "<td>".$result['tc_name']."</td>";
              echo "<td>".Changeformatdate($result['b_startdatetime'],"YtoD")."</td>";
              echo "<td>".Changeformatdate($result['b_enddatetime'],"YtoD")."</td>";
              echo "<td>".$result['b_detail']."</td>";
              echo "<td><button onclick='Manage(this.value)' value='".$result['b_id']."' id='d".$result['b_id']."' type='button' class='btn btn-warning' data-toggle='modal' data-target='#modal-warning'><i class='fa fa-reply'></i></button></td>";
              //<button value='".$result['u_id']."' id='d".$result['u_id']."' type='button' class='btn btn-danger' data-toggle='modal' data-target='#modal-danger'><i class='fa fa-remove'></i></button></td>";
              echo "</tr>";
              //ตั้งชื่อแบบนี้เพื่อให้สอดคล้องกับฟังชั่นการเปลี่ยนค่า input ในไฟล์ footer.php
              $uid[] = $result['b_id'];
              $count++;
            }
            // มาทำเรื่อง update ต่อเก็บท่าไว้ในปุ่มแล้วเปลี่ยนเมื่อกดปุ่ม เปลี่ยนที่ input ทดลองใน modal
             ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
  <style type="text/css">
    select#gender option[value="male"]   { background-image:url(img/car/1.jpg);   }
    select#gender option[value="female"] { background-image:url(female.png); }
    select#gender option[value="others"] { background-image:url(others.png); }
  </style>
  <select id="gender">
    <option>male</option>
    <option>female</option>
    <option>others</option>
  </select>
</div>

<div class="modal modal-warning fade" id="modal-warning">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title">ดำเนินการ</h3>
        </div>
        <div id="modalBody" class="modal-body">
          <!--Ajax ในไฟล์ managecar.php อยู่ตรงนี้-->
          <input type="text" name="" value="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal"><span style='font-size: 18px;'>ยกเลิก</span></button>
          <button type="submit" class="btn btn-outline"><span style='font-size: 18px;'>ยืนยัน</span></button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

<?php
include("footer.php");
 ?>
<script>
function Manage(str) {
 var xhttp;
 if (str == "") {
   document.getElementById("modalBody").innerHTML = "";
   return;
 }
 xhttp = new XMLHttpRequest();
 xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
     document.getElementById("modalBody").innerHTML = this.responseText;
   }
 };
 xhttp.open("GET", "managecar.php?b_id="+str, true);
 xhttp.send();
}
</script>
