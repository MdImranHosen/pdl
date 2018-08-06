  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../upload/logo/private_detective_logo.png" class="img-circle" alt="Private Detective Logo">
        </div>
        <div class="pull-left info">
          <p><?php echo Session::get('name'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Admin</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">WWW.pdl007.com</li>
        <li class="active">
          <a href="index.php">
            <i class="fa fa-list-ol"></i> <span>Job CV List</span>
          </a>
        </li>
        <?php if (Session::get('level') == '0') { ?>
        <li>
          <a href="mailbox.php">
            <i class="fa fa-envelope-o"></i> <span>User Message </span>
          </a>
        </li>
        <li>
          <a href="pdluser.php">
            <i class="glyphicon glyphicon-user"></i> <span>User</span>
          </a>
        </li>
        <li>
          <a href="reports.php">
            <i class="fa fa-telegram" aria-hidden="true"></i> <span>User Report</span>
          </a>
        </li>
        <li>
          <a href="regfacility.php">
            <i class="fa fa-registered"></i> <span>Registration Facility</span>
          </a>
        </li>
        <li>
          <a href="notice.php">
            <i class="fa fa-bell"></i> <span>Notice </span>
          </a>
        </li>
        <li>
          <a href="reportdata.php">
            <i class="fa fa-registered"></i> <span>User Report From Data</span>
          </a>
        </li>
        <li>
          <a href="cvdownloadok.php">
            <i class="fa fa-list-ol"></i> <span>CV Download List </span>
          </a>
        </li>
        <li>
          <a href="services.php">
            <i class="fa fa-wrench fa-lg"></i> <span>সেবাসমূহ</span>
          </a>
        </li>
        <li>
          <a href="registration.php">
            <i class="glyphicon glyphicon-user"></i> <span>Admin</span>
          </a>
        </li>
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>