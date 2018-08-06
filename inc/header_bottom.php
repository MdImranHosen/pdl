<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>DL</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>প্রাইভেট </b> ডিটেকটিভ</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

          <li class="dropdown messages-menu">
             <a id="music" class="play audio_pdl"><i class="fa fa-play fa-2x" aria-hidden="true"></i></a>
          </li>
         
         <!--  Contact Client top bar Start. -->
           <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"  style="font-size:1.2em; color:#fff">
              <i class="fa fa-phone"></i>
              <span class="hidden-xs"><strong>০১৭১৩৫৫৪০০৭</strong></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header" style="text-align: center;font-size: 17px;">Do you have a Question? <br>
              <span style="color: orange;">Yes! </span> We have all the Answers!</li>
              <li style="font-size: 16px;">
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-mobile fa-lg"></i> ০১৭১৩-৫৫৪০০০
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-mobile fa-lg"></i> ০১৭১৩-৫৫৩৮০০
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-mobile text-yellow"></i> ০১৭১৩-৫৫৩৯০০
                    </a>
                  </li>
                  <li>
                    <a href="contact.php">
                      <i class="fa fa-user text-red"></i> Contact Us
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!--Contact Client End -->
          <!-- User Account: style can be found in dropdown.less -->
          <?php
           $signin_client = SignSession::get('signin');
           if ($signin_client == true) { ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo SignSession::get('client_name'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo SignSession::get('client_name'); ?>
                  <small><?php echo SignSession::get('join_date'); ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="?signinAction=clientLogOut" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!--control Slidebar Toggle Sign in Button Start -->
        <?php }else{ ?>
         <?php include 'signin.php'; ?>
        
        <?php } ?>
          <!-- End Sign Button -->
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>