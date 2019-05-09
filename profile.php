<?php
include("connect.php");
include("header.php");
include("left.php");
$u_id = $_SESSION['u_id'];
$strsql = "SELECT u.u_prefix,u.u_fname,u.u_lname,u.u_tel,u.u_email,u.u_address,u.u_signature
FROM user u
WHERE u.u_id = '".$u_id."'";
$query = $conn->query($strsql);
 ?>
 <div class="content-wrapper">
   <section class="content-header">
     <h1>โปรไฟล์ของคุณ</h1>
   </section>
   <section class="content">
     <div class="box box-primary">
       <div class="box-header with-border">
         <h2 class="box-title">รายละเอียดผู้ใช้</h2>
       </div>
       <?php
       while ($result = $query->fetch_array()) {
        ?>
       <form class="" action="edituser.php" method="post" role="form" enctype="multipart/form-data">
         <input type="hidden" name="u_id" value="<?php echo $u_id; ?>">
         <div class="box-body">
           <div class="form-group">
             <label>ชื่อ - นามสกุล</label>
             <!--<div class="input-group">-->
             <div class="input-group">
               <span class="input-group-addon"><?php echo $result['u_prefix']; ?></span>
               <input class="form-control" type="text" name="fname" value="<?php echo $result['u_fname']; ?>" placeholder="ชื่อ" style="display: unset; width: 49%; margin: 1px;" required>
               <input class="form-control" type="text" name="lname" value="<?php echo $result['u_lname']; ?>" placeholder="นามสกุล" style="display: unset; width: 49%; margin: 1px;" required>
             </div>
             <!--<span class="input-group-addon"><a href="#">ต่อยอดแก้ไข</a></span>-->
             <!--</div>-->
           </div>
           <div class="form-group">
             <label>เบอร์โทรศัพท์</label>
             <input class="form-control" type="text" name="tel" value="<?php echo $result['u_tel']; ?>" placeholder="เบอร์โทรศัพท์">
           </div>
           <div class="form-group">
             <label>อีเมล์</label>
             <input class="form-control" type="email" name="email" value="<?php echo $result['u_email']; ?>" placeholder="อีเมล์">
           </div>
           <div class="form-group">
             <label>ที่อยู่</label>
             <textarea class="form-control" name="address" rows="3" cols="80" placeholder="ที่อยู่..."><?php echo $result['u_address']; ?></textarea>
           </div>
           <div class="form-group">
             <label>ลายเซ็นต์</label>
               <div>
                 <?php
                 if($result['u_signature']==""){
                   echo "<h5>คุณยังไม่ได้อัพโหลดลายเซ็นต์ กรุณาสแกนแล้วอัพโหลด</h5>";
                 }else{
                  ?>
                 <a href="img/signature/<?php echo $result['u_signature']; ?>" target="_blank"><img src="img/signature/<?php echo $result['u_signature']; ?>" height="200px"></a>
                 <input type="hidden" name="checkimg" value="<?php echo $result['u_signature']; ?>">
                 <?php
                }
                if(isset($_GET['error'])){
                  echo "<h4 style='color: #f62a2a;'>กรุณาอัพโหลดไฟล์ .png</h4>";
                }
                  ?>
               </div>
               <input type="file" name="signature" value="" style="display: block;">
           </div>
         </div>
         <div class="box-footer">
           <button class="btn btn-primary" type="submit" name="button">ยืนยัน</button>
         </div>
       </form>
       <?php
     }
        ?>
     </div>
   </section>
 </div>
<?php
include("footer.php");
//edited
 ?>
