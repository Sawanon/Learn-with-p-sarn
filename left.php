
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['name']; ?></p>
          <i class="fa fa-fw fa-cog"></i> <?php echo $permit; ?>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>ระบบจองรถ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            <span class="pull-right-container">
              <?php
              if($list_suc!=0){
                echo "<small class='label pull-right bg-green'>".$list_suc."</small>";
              }
              if ($list_app!=0) {
                echo "<small class='label pull-right bg-yellow'>".$list_app."</small>";
              }
              if($list_req!=0){
                echo "<small class='label pull-right bg-red'>".$list_req."</small>";
              }
              ?>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="m1"><a href="index.php"><i class="fa fa-circle-o"></i>หน้าแรก</a></li>
            <li id="m2"><a href="booking.php"><i class="fa fa-circle-o"></i>ทำรายการจอง</a></li>
            <?php if($_SESSION['permit']==4){ ?>
              <li id="m3"><a href="manageuser.php"><i class="fa fa-circle-o"></i>จัดการผู้ใช้</a></li>
            <?php } ?>
            <li id="m4"><a href="request.php"><i class="fa fa-circle-o"></i>รายการขออนุมัติ</a></li>
          </ul>
        </li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
