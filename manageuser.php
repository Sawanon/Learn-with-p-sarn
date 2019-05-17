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
          <table id="table" class="table table-bordered table-hover">
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
            <?php
            $strsql = "SELECT u.u_id,u.u_prefix,u.u_fname,u.u_lname,u.u_tel,u.u_email,u.u_address,u.u_permit,u.u_signature
            FROM user u";
            $query = $conn->query($strsql);
            while ($result = $query->fetch_array()) {
              echo "<tr>";
              echo "<td>".$result['u_id']."</td>";
              echo "<td>".$result['u_prefix']."</td>";
              echo "<td>".$result['u_fname']."</td>";
              echo "<td>".$result['u_lname']."</td>";
              echo "<td>".$result['u_tel']."</td>";
              echo "<td>".$result['u_email']."</td>";
              echo "<td>".$result['u_address']."</td>";
              echo "<td>".$result['u_permit']."</td>";
              echo "<td>".$result['u_signature']."</td>";
              echo "<td><button class='btn btn-success'><i class='fa fa-edit'></i></button>
              <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#modal-danger'><i class='fa fa-remove'></i></button></td>";
              echo "</tr>";
            }
             ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!------------------------------>
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
            <button type="button" class="btn btn-outline">ตกลง</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  </section>
</div>

<?php
include("footer.php");
 ?>
 <script>
   $(function () {
     $('#example1').DataTable()
     $('table').DataTable({
       'paging'      : true,
       'lengthChange': false,
       'searching'   : false,
       'ordering'    : true,
       'info'        : true,
       'autoWidth'   : false
     })
   })
 </script>
