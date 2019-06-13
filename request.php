<?php
include("header.php");
include("left.php");
$_SESSION['menu'] = 4;
 ?>
 <div class="content-wrapper">
   <section class="content-header">
   </section>
   <section class="content">
     <div class="box box-primary">
       <div class="box-header with-border">
         <h3>รายการขออนุมัติ</h3>
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
             AND b_status = 'A'";
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
               echo "<td><button value='".$result['b_id']."' id='d".$result['b_id']."' type='button' class='btn btn-success' data-toggle='modal' data-target='#modal-success'><i class='fa fa-check'></i></button> ";
               echo "<button value='".$result['b_id']."' id='dcancel".$result['b_id']."' type='button' class='btn btn-danger' data-toggle='modal' data-target='#modal-danger'><i class='fa fa-remove'></i></button></td>";
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
 </div>
 <!--modal approve-->
<form action="requestsql.php" method="post">
  <div class="modal modal-success fade" id="modal-success">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">อนุมัติ</h3>
          </div>
          <div class="modal-body">
            <p style='font-size: 18px;'>คุณต้องการอนุมัติรายการนี้หรือไม่</p>
            <input type="hidden" name="b_id" id="testval" value="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal"><span style='font-size: 18px;'>ยกเลิก</span></button>
            <button type="submit" class="btn btn-outline"><span style='font-size: 18px;'>อนุมัติ</span></button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
</form>
 <!-- /.modal -->

<!--modal cancel-->
 <form action="requestsql.php" method="post">
   <div class="modal modal-danger fade" id="modal-danger">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span></button>
             <h3 class="modal-title">ไม่อนุมัติ</h3>
           </div>
           <div class="modal-body">
             <p style='font-size: 18px;'>คุณต้องการปฏิเสธรายการนี้หรือไม่</p>
             <input type="hidden" name="b_id" id="testvalcancel" value="">
             <input type="hidden" name="cancel" value="cancel">
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-outline pull-left" data-dismiss="modal"><span style='font-size: 18px;'>ยกเลิก</span></button>
             <button type="submit" class="btn btn-outline"><span style='font-size: 18px;'>ไม่อนุมัติ</span></button>
           </div>
         </div>
         <!-- /.modal-content -->
       </div>
       <!-- /.modal-dialog -->
     </div>
 </form>
  <!-- /.modal -->
<?php
include("footer.php");
 ?>
<script>
$("#row<?php echo $_GET['selected']; ?>").addClass("green");
$("#row<?php echo $_GET['selected']; ?>").switchClass("green","removegreen",2000);
</script>
