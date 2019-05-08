<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
  <?php
  if($_GET){
    if($_GET['s']=="c"){
      ?>
      <div class="container">
        <section class="content" style="min-height: 0px;">
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> สำเร็จ!</h4>
            ลงทะเบียนเรียบร้อย ! <a href="login.php">เข้าสู่ระบบ</a>
          </div>
        </section>
      </div>
      <?php
    }else{
      ?>
      <div class="container">
        <section class="content" style="min-height: 0px;">
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> ผิดพลาด!</h4>
            ลงทะเบียนไม่สำเร็จ !
          </div>
        </section>
      </div>
      <?php
    }
  }
  ?>
<div class="register-box" style="margin: 0% auto;">
  <div class="register-logo">
    <a href="login.php"><b>RWI</b> - Book car</a>
  </div>
  <div class="register-box-body">
    <p class="login-box-msg">ลงทะเบียนเข้าใช้ระบบจัดการการจองรถ</p>

    <form action="adduser.php" method="post">
      <div class="radio">
        <label>
          <input type="radio" name="prefix" value="นาย"> นาย
        </label>
        <label>
          <input type="radio" name="prefix" value="นาง"> นาง
        </label>
        <label>
          <input type="radio" name="prefix" value="นางสาว"> นางสาว
        </label>
      </div>
      <div class="form-group has-feedback">
        <input name="firstname" type="text" class="form-control" placeholder="ชื่อ" required>
      </div>
      <div class="form-group has-feedback">
        <input name="lastname" type="text" class="form-control" placeholder="นามสกุล" required>
      </div>
      <div class="form-group has-feedback">
        <input name="tel" type="text" class="form-control" placeholder="เบอร์โทรศัพท์" required>
        <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="email" type="email" class="form-control" placeholder="อีเมล" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="username" type="text" class="form-control" placeholder="Username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="repassword" type="password" class="form-control" placeholder="ยืนยัน password" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="radio">
        <label>
        <input type="radio" name="permit" value="1"> ผู้อนุมัติ
        </label>
      </div>
      <div class="radio">
        <label>
        <input type="radio" name="permit" value="2" checked> ผู้ขอใช้รถ
        </label>
      </div>
      <div class="radio">
        <label>
        <input type="radio" name="permit" value="3"> พนักงานขับรถ
        </label>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>

            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">ลงทะเบียน</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="login.php" class="text-center">เป็นสมาชิกอยู่แล้ว คลิ๊กเพื่อเข้าสู่ระบบ</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
