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
        <div class="row">
          <div class="col-xs-12">
            <a href="booking.php">
              <button type="button" name="button" class="btn btn-app">
                <span class="glyphicon glyphicon-arrow-left"></span>
                Back
              </button>
            </a>
          </div>
        </div>
        <h3>ประเภทรถ</h3>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box-body">
            <form action="detail.php" method="post">
              <!-- radio -->
              <div class="form-group">
                <?php
                while ($result = $query->fetch_array()) {
                  ?>
                  <label>
                    <input type="radio" name="tc_id" class="minimal" value="<?php echo $result["tc_id"]; ?>" required>
                    <?php
                    echo $result["tc_name"];
                    ?>
                  </label>
                  <br>
                <?php } ?>
              </div>
              <input type="text" name="" value="<?php echo $_SESSION['date']; ?>">
              <input type="submit" name="submit" value="ยืนยัน">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
 <?php
 include("footer.php");
  ?>
<script>
  $(function () {
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
  })
</script>
