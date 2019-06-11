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
         <table id="table" class="table table-bordered table-hover"> <!--class="table table-bordered table-hover"-->
           <thead>
           <tr>
             <th>ID</th>
             <th>ผู้ขอใช้รถ</th>
             <th>ชนิดรถ</th>
             <th>วันเวลาที่เริ่มใช้รถ</th>
             <th>วันเวลาที่สิ้นสุดการใช้รถ</th>
             <th>รายละเอียด</th>
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
             while ($result = $query->fetch_array()) {
               echo "<tr>";
               echo "<td>".$result['b_id']."</td>";
               echo "<td>".$result['u_prefix']." ".$result['u_fname']." ".$result['u_lname']."</td>";
               echo "<td>".$result['tc_name']."</td>";
               echo "<td>".Changeformatdate($result['b_startdatetime'],"YtoD")."</td>";
               echo "<td>".Changeformatdate($result['b_enddatetime'],"YtoD")."</td>";
               echo "<td>".$result['b_detail']."</td>";
               echo "</tr>";
             }
              ?>
           </tbody>
         </table>
       </div>
     </div>
   </section>
 </div>
<?php
include("footer.php");
 ?>
