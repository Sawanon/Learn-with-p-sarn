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
     <div class="row">
       <div class="col-xs-12">
         <a href="selecttype.php">
           <button type="button" name="button" class="btn btn-app">
             <span class="glyphicon glyphicon-arrow-left"></span>
             Back
           </button>
         </a>
       </div>
       <?php
       echo $_POST['tc_id'];
       echo "<br>";
       echo $_SESSION['date'];
       ?>
     </div>
   </section>
 </div>
<?php
include("footer.php");
 ?>
