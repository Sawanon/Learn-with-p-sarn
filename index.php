<?php
include("header.php");
include("left.php");
if(!isset($_SESSION['u_id']) && !$_COOKIE['cook']==1){
  echo "<meta http-equiv='refresh' content='0;url=login.php'>";
}
 ?>


  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php
    echo $_COOKIE['cook'];
     ?>
     <section class="content-header">
       <h1>รายการจอง</h1>
     </section>
     <section class="content">
           <div class="col-md-7">
               <div class="box box-primary">
                 <div class="box-body no-padding">
                   <!-- THE CALENDAR -->
                   <div id="calendar"></div>
                 </div>
                 <!-- /.box-body -->
               </div>
              <!-- /. box -->
            </div>
      </section>
  </div>
  <!-- /.content-wrapper -->

<?php
include("footer.php");
 ?>
