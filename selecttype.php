<?php
include("connect.php");
include("header.php");
include("left.php");
if($_POST){
$_SESSION['date'] = $_POST['date'];
}
$strsql = "SELECT t.tc_id,t.tc_name FROM type_car t";
$query = $conn->query($strsql);
 ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>เลือกประเภทรถที่ต้องการ</h1>
  </section>
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3>ประเภทรถ</h3>
      </div>
      <div class="box-body">
        <?php
        while ($result = $query->fetch_array()) {
          echo $result['tc_id'];
          echo "<br>";
          echo $result['tc_name'];
          echo "<br>";
        }
         ?>
         <?php
         echo $_SESSION['date']; 
         ?>
         <input type="text" name="" value="">
      </div>
    </div>
  </section>
</div>
 <?php
 include("footer.php");
  ?>
