<?php
include("header.php");
include("left.php");
if($_POST){
$_SESSION['tc_id'] = $_POST['tc_id'];
}
 ?>
 <div class="content-wrapper">
   <section class="content-header">
     <h1>รายละเอียดในการจอง</h1>
   </section>
   <section class="content">
     <div class="box box-primary">
       <div class="box-header with-border">
         <div class="row">
           <div class="col-xs-12">
             <a href="selecttype.php">
               <button type="button" name="button" class="btn btn-app">
                 <span class="glyphicon glyphicon-arrow-left"></span>
                 ย้อนกลับ
               </button>
             </a>
           </div>
         </div>
         <h3>รายละเอียดในการจอง</h3>
       </div>
       <div class="box-body">
         <label>กรอกรายละเอียดในการจองของคุณ</label>
         <textarea name="name" class="form-control" rows="5" cols="80"></textarea>
         <?php
         echo $_POST['tc_id'];
         echo "<br>";
         echo $_SESSION['date'];
         ?>
         <button class="btn btn-primary" type="submit" name="button">ต่อไป</button>
       </div>
     </div>
   </section>
 </div>
<?php
include("footer.php");
 ?>
