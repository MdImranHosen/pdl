<?php 
include "inc/header.php";

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['code']) && !empty($_GET['code'])){
  $email = mysqli_real_escape_string($db->link, $_GET['email']);
  $code = mysqli_real_escape_string($db->link, $_GET['code']);
  $getCode = $client->getCodeVerify($email,$code);
}

?>
 <style type="text/css">
.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}
.private_detective_jobs_body {
    border: 2px solid #ddd;
    padding: 5px 0px;
    margin: 5px;
    background-image: url("upload/background/bo.png");
  }

.content-wrapper {
  min-height: 100%;
   background-image: url("upload/background/bo.png");
  z-index: 800;
}

</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include "inc/header_bottom.php"; ?>
<!--SideBar Start-->
  <?php include "inc/sidebar.php"; ?>
<!--SideBar End-->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <!-- Main content -->
    <section class="content connectedSortable">
       <div class="row private_detective_jobs_body">
        <div class="box">
        <section class="col-lg-8 col-lg-offset-2">
          
          <div class="box-header with-border">
            <h3>User Registration</h3>

          </div>
          <div class="box-body">
            <?php
              if (isset($getCode)) {
                echo $getCode;
              }else{
                echo "Private Detective LTD";
              }
            ?>
          </div>
         <!-- </div> -->
        </section>
        </div>
        <!--service category end -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include "inc/footer.php"; ?>
