<?php
include("header.php");
include("left.php");
$_SESSION['menu'] = 3;
 ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>จัดการผู้ใช้</h1>
  </section>
  <section class="content">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          รายการผู้ใช้
        </div>
        <div class="box-body">
          <table id="table" class="table table-bordered table-hover"> <!--class="table table-bordered table-hover"-->
            <thead>
            <tr>
              <th>ID</th>
              <th>คำนำหน้า</th>
              <th>ชื่อ</th>
              <th>นามสกุล</th>
              <th>เบอร์โทรศัพท์</th>
              <th>อีเมล์</th>
              <th>ที่อยู่</th>
              <th>ประเภทผู้ใช้</th>
              <th>ลายเซ็นต์</th>
              <th>จัดการ</th>
            </tr>
            </thead>
            <tbody>
              <!--<button type="button" name="button" value="2" onclick="deleteUser(this.value)">gogo</button>-->

            <?php
            $strsql = "SELECT u.u_id,u.u_prefix,u.u_fname,u.u_lname,u.u_tel,u.u_email,u.u_address,u.u_permit,u.u_signature
            FROM user u";
            $query = $conn->query($strsql);
            $count = 0;
            while ($result = $query->fetch_array()) {
              echo "<tr>";
              echo "<td>".$result['u_id']."</td>";
              echo "<td>".$result['u_prefix']."</td>";
              echo "<td>".$result['u_fname']."</td>";
              echo "<td>".$result['u_lname']."</td>";
              echo "<td>".$result['u_tel']."</td>";
              echo "<td>".$result['u_email']."</td>";
              echo "<td>".$result['u_address']."</td>";
              if($result['u_permit']==1){$permit = "ผู้อนุมัติ";}
              else if($result['u_permit']==2){$permit = "ผู้ขอใข้รถ";}
              else if($result['u_permit']==3){$permit = "พนักงานขับรถ";}
              else if($result['u_permit']==4){$permit = "Admin";}
              echo "<td>".$permit."</td>";
              echo "<td>".$result['u_signature']."</td>";
              echo "<td><button class='btn btn-success'><i class='fa fa-edit'></i></button>
              <button value='".$result['u_id']."' id='d".$result['u_id']."' type='button' class='btn btn-danger' data-toggle='modal' data-target='#modal-danger'><i class='fa fa-remove'></i></button></td>";
              echo "</tr>";
              $uid[] = $result['u_id'];
              $count++;
            }
             ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!------------------------------>
    <form action="manageusersql.php" method="post">
    <div class="modal modal-danger fade" id="modal-danger">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">ลบรายการดังกล่าว</h4>
          </div>
          <div class="modal-body">
            <p>คุณต้องการลบรายการนี้หรือไม่</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">ยกเลิก</button>
            <input id="testval" type="hidden" name="uid" value="">
            <button type="submit" class="btn btn-outline">ตกลง</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    </form>
    <!-- /.modal -->
  </section>
</div>

<?php
include("footer.php");
 ?>
 <script>

 </script>
