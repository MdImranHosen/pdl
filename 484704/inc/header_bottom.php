<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>DL</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Panel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only"></span>
      </a>

      <div class="navbar-custom-menu">
        <form action="search.php" class="navbar-form navbar-left" method="get">
        <div class="form-group">
          <input type="text" name="search" required="" class="form-control" placeholder="Search CV ">
        </div>
        <button type="submit" name="ok" class="btn btn-default">Search</button>
      </form>
        <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu">
            <a href="index.php" class="dropdown-toggle">
              <!-- <i class="fa fa-file-pdf"></i> -->
              <i class="fa fa-drivers-license-o"></i>
              <span class="label label-warning"><?php 
              $getCount = $app_from->getCvNumber();
              if ($getCount) {
                $countNum = mysqli_num_rows($getCount);
                echo $countNum;
              }else{ echo "0"; }  
            ?></span>
            </a>
          </li>

          <li class="dropdown messages-menu">
            <a href="mailbox.php" class="dropdown-toggle">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"><?php 
              $getInbox = $con_us->getInboxMessageSer();
              if ($getInbox) {
                $count = mysqli_num_rows($getInbox);
                echo $count;
              }else{ echo "0"; }  
            ?></span>
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo Session::get('name'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo Session::get('admin_email'); ?>
                  <small><?php
                     date_default_timezone_set('Asia/Dhaka');
                     $dt = new DateTime();
                    echo $dt->format('Y-m-d H:i:s'); 
                   ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="registration.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                
                <div class="pull-right">
                  <a href="?action=logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>