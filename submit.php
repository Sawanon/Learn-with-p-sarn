<?php
include("header.php");
include("left.php");
 ?>
 <div class="content-wrapper">
   <section class="content-header">
   </section>
   <section class="content">
     <div class="row">
       <div class="col-xs-12">
         <a href="detail.php">
           <button type="button" name="button" class="btn btn-app">
             <span class="glyphicon glyphicon-arrow-left"></span>
             ย้อนกลับ
           </button>
         </a>
       </div>
     </div> <!--row-->
     <div class="box box-primary">
       <div class="box-header with-border">
         <h3>ตรวจสอบรายละเอียดเพื่อยืนยันการจอง</h3>
       </div>
       <style type="text/css">
       .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
         border: 1px solid #909090;
       }
       .header{
         background-color: #dfdcdc;
       }
         }
       </style>
       <div class="box-body">
         <?php
         $start = substr($_SESSION['date'],6,4)."-".substr($_SESSION['date'],3,2)."-".substr($_SESSION['date'],0,2).substr($_SESSION['date'],10,6);
         $end = substr($_SESSION['date'],25,4)."-".substr($_SESSION['date'],22,2)."-".substr($_SESSION['date'],19,2).substr($_SESSION['date'],29);
          ?>
         <table class="table table-bordered" style="width: 60%;">
           <tr>
             <?php $_SESSION['tc_id']==1 ? $tc = "รถกระบะ" : $tc = "รถเก๋ง" ?>
             <td class="header">ชนิดของรถที่จอง</td><td colspan="3"><?php echo $tc; ?></td>
           </tr>
           <tr>
             <td class="header">วันเวลาที่เริ่มใช้</td><td><?php echo Changeformatdate($start,"YtoD"); ?></td><td class="header">วันเวลาที่นำมาคืน</td><td><?php echo Changeformatdate($end,"YtoD"); ?></td>
           </tr>
           <tr>
             <td class="header">รายละเอียดในการจอง</td><td colspan="3"><?php echo $_POST['detail']; ?></td>
           </tr>
         </table>
         <?php
         /*echo $_SESSION['u_id'];
         echo "<br>";
         echo $_SESSION['tc_id'];
         echo "<br>";
         echo $start;
         echo "<br>";
         echo $end;
         echo "<br>";
         echo $_POST['detail'];
         echo "<br>";*/
          ?>
          <br>
          <form action="addbooking.php" method="post">
            <input type="hidden" name="u_id" value="<?php echo $_SESSION['u_id']; ?>">
            <input type="hidden" name="tc_id" value="<?php echo $_SESSION['tc_id']; ?>">
            <input type="hidden" name="startdate" value="<?php echo $start; ?>">
            <input type="hidden" name="enddate" value="<?php echo $end; ?>">
            <input type="hidden" name="detail" value="<?php echo $_POST['detail']; ?>">
            <button class="btn btn-lg btn-primary" type="submit" name="button">ยืนยันการจอง</button>
          </form>
       </div>
     </div>
   </section>
 </div>
<?php
include("footer.php");
 ?>
