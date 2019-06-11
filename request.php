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
         <h3>รายละเอียดในการจอง</h3>
       </div>
       <div class="box-body">
         <form action="submit.php" method="post">
           <label>กรอกรายละเอียดในการจองของคุณ</label>
           <textarea name="detail" class="form-control" rows="5" cols="80" required></textarea>
           <button class="btn btn-primary" type="submit" name="button">ต่อไป</button>
         </form>
       </div>
     </div>
   </section>
 </div>
<?php
include("footer.php");
 ?>
