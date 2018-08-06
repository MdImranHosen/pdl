<?php 
include "inc/header.php"; 
include "classes/Signin.php";
include 'classes/Registrationfacility.php';
include 'classes/Report.php';
$rdata = new Registrationfacility();
$sign = new Signin();
$report = new Report();
/* This code is define for client login or not */
SignSession::signcheckSession();
/*User Profile Update */
if (isset($_POST['user_profile_update']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
   $user_profile = $sign->getUserProfileUpdate($_POST);
}
 /* User Report send ....*/
if (isset($_POST['report_send']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_report = $report->getUserReport($_POST,$_FILES);
}

?>

<style>
p.body-text-style{
  font-size: 20px;
}
</style>
<body class="hold-transition skin-blue sidebar-mini" >
<div class="wrapper">
  <?php include "inc/header_bottom.php"; ?>
<!--SideBar Start-->
  <?php include "inc/sidebar.php"; ?>
<!--SideBar End-->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content connectedSortable">
       <div class="row private_detective_jobs_body">
        <!-- User Profile -->
        <?php 
           $signId = SignSession::get('client_id');
           $signResult = $sign->getSignInClientDataShow($signId);
           if ($signResult) {
             while ($signInResult = $signResult->fetch_assoc()) {
         ?>
        <div class="col-lg-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="dist/img/user-pic.png" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $signInResult['client_name']; ?></h3>

              <p class="text-muted text-center"> 
               <?php
                  if ($signInResult['client_des'] != '') {
                    echo $signInResult['client_des'];
                  }else{
                    echo 'Crime Reporter';
                  }
               ?>
               </p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-envelope" aria-hidden="true"></i> E-mail</strong>

              <p class="text-muted">
                <?php echo $signInResult['client_email']; ?>
              </p>

              <hr>
              <strong><i class="fa fa-phone" aria-hidden="true"></i> Phone</strong>

              <p class="text-muted">
                <?php echo $signInResult['client_phone']; ?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?php echo $signInResult['client_address']; ?></p>

              <hr>

              <strong><i class="fa fa-calendar"></i> Join Date</strong>

              <p class="text-muted"><?php echo $signInResult['client_reg_date']; ?></p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Private Detective LTD</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-lg-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#report_from" data-toggle="tab">Report From</a></li>
              <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="report_from">
                <h3><span style="color:red;">Crime</span> <span style="color:#622A24;">Report</span> <span style="color:#00A65A;">Send</span> <span style="color:#0000FF;">From</span> and <span style="color: #C6AB49;">Sending</span> <span style="color: #AE2472;">Way</span>!</h3>
                 <table class="table table-hover table-bordered">
                  <tbody>
                    <?php
                     $getreport = $rdata->showAllReprotData();
                     if ($getreport) {
                       while ($getrresult = $getreport->fetch_assoc()) {
                    ?>
                    <tr>
                      <td style="text-align: right;"><?php echo $getrresult['report_title']; ?> - </td>
                      <td><?php echo $getrresult['report_details']; ?></td>
                    </tr>
                  <?php }}else{ ?>
                  <tr>
                      <td><span style="color:red;">Empty - </span> </td>
                      <td><span style="color:red;">Report From Data Field is Empty!</span></td>
                    </tr>
                 <?php } ?>
                  </tbody>
                </table>
                <hr>
                <!-- Post -->
                <?php
                  if (isset($user_report)) {
                    echo $user_report;
                  }
                ?>
                <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">

                 <input type="hidden" name="reporter_id" id="reporter_id" value="<?php echo $signInResult['client_id']; ?>">

                 <input type="hidden" name="reporter_name" id="reporter_name" value="<?php echo $signInResult['client_name']; ?>">

                 <input type="hidden" name="reporter_email" id="reporter_email" value="<?php echo $signInResult['client_email']; ?>">

                 <input type="hidden" name="reporter_phone" id="reporter_phone" value="<?php echo $signInResult['client_phone']; ?>">

                 <div class="form-group">
                    <label for="report_what" class="col-sm-2 control-label">What <span style="color:red;">*</span></label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" title="This Field must not be Empty!" id="report_what" name="report_what" autofocus>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="report_where" class="col-sm-2 control-label">Where <span style="color:red;">*</span></label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" title="This Field must not be Empty!" id="report_where" name="report_where">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="report_when" class="col-sm-2 control-label">When <span style="color:red;">*</span></label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" title="This Field must not be Empty!" id="report_when" name="report_when">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="report_who" class="col-sm-2 control-label">Who <span style="color:red;">*</span></label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" title="This Field must not be Empty!" id="report_who" name="report_who">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="report_why" class="col-sm-2 control-label">Why <span style="color:red;">*</span></label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" title="This Field must not be Empty!" id="report_why" name="report_why">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="report_how" class="col-sm-2 control-label">How <span style="color:red;">*</span></label>

                    <div class="col-sm-10">
                      <textarea class="form-control" title="This Field must not be Empty!" id="report_how" name="report_how"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="report_image" class="col-sm-2 control-label">Image</label>

                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="report_image" name="report_image" accept="image/x-png,image/gif,image/jpeg">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="report_file" class="col-sm-2 control-label">File/Doc</label>

                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="report_file" name="report_file" accept="application/pdf,application/vnd.ms-excel, .doc, .docx">
                    </div>
                  </div>

                  <input type="hidden" name="rdate_time" value="<?php echo date("l jS \of F Y") ?>">
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="report_send" class="btn btn-danger">Send</button>
                    </div>
                  </div>
                </form>
               
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2018
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2018
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> <?php
                      date_default_timezone_set('Asia/Dhaka');
                       echo date_default_timezone_get();
                       echo '  '.date("h:i:s");
                        ?> </span>

                      <h3 class="timeline-header"><a href="#">Imran Hosen</a> Post of Private Detective Community any crime thought</h3>

                      <div class="timeline-body">
                      <form class="form-horizontal">
                        <div class="form-group">
                        <label for="user_post_image" class="col-sm-2 control-label">Image</label>

                        <div class="col-sm-10">
                          <input type="file" name="user_post_image" id="user_post_image">
                       </div>
                      </div>
                       <div class="form-group">
                        <label for="user_post_text" class="col-sm-2 control-label">Text</label>

                        <div class="col-sm-10">
                          <textarea class="form-control" id="user_post_text" name="user_post_text" ></textarea>
                       </div>
                      </div>
                      <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="user_post" class="btn btn-danger">Post</button>
                    </div>
                  </div>
                    </form>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" >
                  <input type="hidden" name="user_profile_id" value="<?php echo $signInResult['client_id']; ?>">
                  <div class="form-group">
                    <label for="user_name_edit" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="user_name_edit" name="user_name_edit" value="<?php echo $signInResult['client_name']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="user_desig_edit" class="col-sm-2 control-label">Designation</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="user_desig_edit" name="user_desig_edit" value="<?php echo $signInResult['client_des']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="user_email_edit" class="col-sm-2 control-label">Email Add.</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="user_email_edit" value="<?php echo $signInResult['client_email']; ?>" disabled>
                    </div>
                  </div>                 
                  <div class="form-group">
                    <label for="user_phone_edit" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="user_phone_edit" name="user_phone_edit" value="<?php echo $signInResult['client_phone']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="user_address_edit" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="user_address_edit" name="user_address_edit" ><?php echo $signInResult['client_address']; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="user_joindate_edit" class="col-sm-2 control-label">Join Date</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="user_joindate_edit" value="<?php echo $signInResult['client_reg_date']; ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="user_profile_update" class="btn btn-danger">Update</button>
                    </div>
                  </div>
                </form>
                <hr>
                <h3>Change Password</h3>
                <span id="chengenotify"></span>
                <form class="form-horizontal">
                  <input type="hidden" name="user_pass_change_id" id="user_pass_change_id" value="<?php echo $signInResult['client_id']; ?>">
                 <div class="form-group">
                    <label for="user_old_pass" class="col-sm-4 control-label">Old Password</label>

                    <div class="col-sm-8">
                      <input type="password" class="form-control" id="user_old_pass" name="user_old_pass" placeholder="Enter Old Password" maxlength="22" minlength="8" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="user_new_pass" class="col-sm-4 control-label">New Password</label>

                    <div class="col-sm-8">
                      <small style="color:#000;font-size: 14px;">Minimum 8 and maximum 22 characters, at least one uppercase letter, one lowercase letter and one number. <strong>Exe: aA1#hhhh5</strong></small>
                      <input type="password" class="form-control" id="user_new_pass" name="user_new_pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" maxlength="22" minlength="8" placeholder="Enter New Password" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="user_nconfirm_pass" class="col-sm-4 control-label">Confirm Password</label>

                    <div class="col-sm-8">
                      <input type="password" class="form-control" id="user_nconfirm_pass" name="user_nconfirm_pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter Confirm Password" maxlength="22" minlength="8" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                      <button type="submit" name="user_change_pass" id="user_change_pass" class="btn btn-info">Change</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      <?php } }else{ echo "Session is Destory"; } ?>
        <!--User Profile End-->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footer.php"; ?>
