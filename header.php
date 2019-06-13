<!DOCTYPE html>
<html>
<head>
  <?php
  session_start();
  include("connect.php");
  include("function.php");
  if(!isset($_SESSION['u_id']) && $_COOKIE['cook']==""){
    echo "<meta http-equiv='refresh' content='0;url=login.php'>";
  }
   ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RWI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Calendar -->
  <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style media="screen">
    .green{
      background-color: #4eb629;
    }
    .removegreen{
      background-color: #ffffff;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>RWI</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>RWI</b> Book car</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <?php
          $list_req = 0;
          if($_SESSION['permit']==1){
            //แสดงผู้ขอ
            $request = "SELECT *
            FROM booking,user
            WHERE user.u_department = '".$_SESSION['department']."'
            AND b_status ='A'
            AND applicant_id = user.u_id
            ORDER BY b_id DESC";
            //แสดงที่อนุมัติแล้ว
            $approved = "SELECT *
            FROM booking,user
            WHERE user.u_department = '".$_SESSION['department']."'
            AND b_status ='B'
            AND applicant_id = user.u_id
            ORDER BY b_id DESC";
            //แสดงรายการที่ดำการเสร็จสิ้นแล้ว
            $success = "SELECT *
            FROM booking,user
            WHERE user.u_department = '".$_SESSION['department']."'
            AND b_status ='D'
            AND applicant_id = user.u_id
            ORDER BY b_id DESC";
            //แสดงรายการที่ถูกยกเลิก
            $cancel = "SELECT *
            FROM booking,user
            WHERE user.u_department = '".$_SESSION['department']."'
            AND b_status ='C'
            AND applicant_id = user.u_id
            ORDER BY b_id DESC";
          }else if($_SESSION['permit']==2){
            $request = "SELECT *
            FROM booking,user
            WHERE u_id = '".$_SESSION['u_id']."'
            AND user.u_department = '".$_SESSION['department']."'
            AND b_status = 'A'
            AND applicant_id = user.u_id";
            $approved = "SELECT *
            FROM booking,user
            WHERE u_id = '".$_SESSION['u_id']."'
            AND user.u_department = '".$_SESSION['department']."'
            AND b_status = 'B'
            AND applicant_id = user.u_id";
            $success = "SELECT *
            FROM booking,user
            WHERE u_id = '".$_SESSION['u_id']."'
            AND user.u_department = '".$_SESSION['department']."'
            AND b_status = 'D'
            AND applicant_id = user.u_id";
            $cancel = "SELECT *
            FROM booking,user
            WHERE u_id = '".$_SESSION['u_id']."'
            AND user.u_department = '".$_SESSION['department']."'
            AND b_status = 'C'
            AND applicant_id = user.u_id";
          }else if($_SESSION['permit']==3){
            $approved = "SELECT *
            FROM booking,user
            WHERE b_status ='B'
            AND applicant_id = user.u_id
            ORDER BY b_id DESC";
            $success = "SELECT *
            FROM booking,user
            WHERE driver_id = '".$_SESSION['u_id']."'
            AND b_status = 'D'
            AND applicant_id = user.u_id";
          }else if($_SESSION['permit']==4){
            $request = "SELECT *
            FROM booking,user
            WHERE b_status ='A'
            AND applicant_id = user.u_id
            ORDER BY b_id DESC";
            $approved = "SELECT *
            FROM booking,user
            WHERE b_status ='B'
            AND applicant_id = user.u_id
            ORDER BY b_id DESC";
            $success = "SELECT *
            FROM booking,user
            WHERE b_status ='D'
            AND applicant_id = user.u_id
            ORDER BY b_id DESC";
            $cancel = "SELECT *
            FROM booking,user
            WHERE b_status ='C'
            AND applicant_id = user.u_id
            ORDER BY b_id DESC";
          }
          if($_SESSION['permit']!=3){
            $query = $conn->query($request);
            while ($result = $query->fetch_array()) {
              $req_id[] = $result['b_id'];
              $req_applicant[] = $result['u_fname'];
              $req_detail[] = $result['b_detail'];
              $req_department[] = $result['u_department'];
              $list_req++;
            }
            ?>
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-danger"><?php echo $list_req; ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">ขออนุมัติ <?php echo $list_req; ?> รายการ</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li><!-- start message -->
                      <?php for ($i=0; $i < $list_req ; $i++) {
                        echo "<a href='request.php?selected=".$req_id[$i]."'>";
                        echo "<div class='pull-left'>";
                        echo "<span class='glyphicon glyphicon-exclamation-sign' style='font-size: 1.5em; color: #dd4b39;'></span>";
                        echo "</div>";
                        echo "<h4>";
                        echo $req_applicant[$i]." <b>(".$req_department[$i].")</b>";
                        echo "</h4>";
                        echo "<p>".$req_detail[$i]."</p>";
                        echo "</a>";
                      }
                      ?>
                    </li>
                    <!-- end message -->
                  </ul>
                </li>
                <li class="footer"><a href="#">ดูรายการที่ขออนุมัติทั้งหมด</a></li>
              </ul>
            </li>

            <?php
          }
          $query = $conn->query($approved);
          $list_app = 0;
          while ($result = $query->fetch_array()) {
            $app_applicant[] = $result['u_fname'];
            $app_detail[] = $result['b_detail'];
            $app_department[] = $result['u_department'];
            $list_app++;
          }
           ?>

          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-refresh"></i>
              <span class="label label-warning"><?php echo $list_app; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">อนุมัติแล้ว <?php echo $list_app; ?> รายการ</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <?php
                    for ($i=0; $i < $list_app ; $i++) {
                      echo "<a href='#'>";
                      echo "<div class='pull-left'>";
                      echo "<span class='glyphicon glyphicon-exclamation-sign' style='font-size: 1.5em; color: #f39c12;'></span>";
                      echo "</div>";
                      echo "<h4>";
                      echo $app_applicant[$i]." <b>(".$app_department[$i].")</b>";
                      echo "</h4>";
                      echo "<p>".$app_detail[$i]."</p>";
                      echo "</a>";
                    }
                     ?>
                  </li>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="#">ดูรายการที่อนุมัติแล้วทั้งหมด</a></li>
            </ul>
          </li>

          <?php
          $query = $conn->query($success);
          $list_suc = 0;
          while ($result = $query->fetch_array()) {
            $suc_applicant[] = $result['u_fname'];
            $suc_detail[] = $result['b_detail'];
            $suc_department[] = $result['u_department'];
            $list_suc++;
          }
           ?>

          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-check"></i>
              <span class="label label-success"><?php echo $list_suc; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">ดำเนินการเสร็จสิ้นแล้ว <?php echo $list_suc; ?> รายการ</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <?php
                    for ($i=0; $i < $list_suc; $i++) {
                      echo "<a href='#'>";
                      echo "<div class='pull-left'>";
                      echo "<span class='fa fa-check' style='font-size: 1.5em; color: #00a65a;'></span>";
                      echo "</div>";
                      echo "<h4>";
                      echo $suc_applicant[$i]." <b>(".$suc_department[$i].")</b>";
                      echo "</h4>";
                      echo "<p>".$suc_detail[$i]."</p>";
                      echo "</a>";
                    }
                     ?>
                  </li>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="#">ดูรายการที่ดำเนินการเสร็จสิ้นแล้วทั้งหมด</a></li>
            </ul>
          </li>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['name']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p>
                  <?php echo $_SESSION['name']; ?> <br>
                  <?php
                  if($_SESSION['permit']==1){
                    echo $permit = "ผู้อนุมัติ";
                  }else if($_SESSION['permit']==2){
                    echo $permit = "ผู้ขอใช้รถ";
                  }else if($_SESSION['permit']==3){
                    echo $permit = "พนักงานขับรถ";
                  }else if($_SESSION['permit']==4){
                    echo $permit = "Admin";
                  }
                   ?>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>
