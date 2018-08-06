<?php include "inc/header.php"; ?>
<?php

 include 'classes/Services.php';
 $ser = new Services();
 ?>
<style>
.background_color_red {
  background-color: #000 !important;
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select:none; 
  user-select:none;
  -o-user-select:none;
  opacity: 0.8;
}
p.body-text-style{
  font-size: 20px;
}
table {background-color: #000; opacity: 0.8;color: #fff;}
table tr th{
  font-size: 20px;
  color: #e9d667;
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select:none; 
  user-select:none;
  -o-user-select:none;
}
table tr td{
  font-weight: bold;
  font-size: 16px;
  display: block; 
  color: #fff !important;
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select:none; 
  user-select:none;
  -o-user-select:none;
}
table tr td a{color: #fff !important;}
.services_page_background_image{
  background-image: url('upload/background/p_d_s.jpg');
}
table tr td a:hover{color: #600a0a;}
table tr td:hover {
  background-color: #848484;
  color: #600a0a;
  font-weight: bold;
}
</style>
<body data-spy="scroll" class="hold-transition skin-blue sidebar-mini" >
<div class="wrapper">
  <?php include "inc/header_bottom.php"; ?>
<!--SideBar Start-->
  <?php include "inc/sidebar.php"; ?>
<!--SideBar End-->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content connectedSortable services_page_background_image">
       <div class="row private_detective_jobs_body">
        <section class="col-lg-12 private_body_padding">
          <div class="callout text-center private_detective_jobs_text background_color_red font-weight-normal">
            <h2>আমাদের সেবাসমূহ</h2>
          </div>
        </section>
      </div>
      <!-- Services Start ======================================== -->
        <div class="row">
      <?php 
         $getSResult = $ser->services_categoryResult();
         if ($getSResult) {
           while ($getResult = $getSResult->fetch_assoc()) {
        ?>
           <!-- /.col -->
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th><i class="fa fa-star fa-lg"></i>
                 <?php echo $getResult['s_category']; ?></th>
              </tr>
            </thead>
            <tbody>
            <?php
                $s_id = $getResult['s_cId'];
                $getAllSResult = $ser->getAllServicesResult($s_id);
                if ($getAllSResult) {
                 while ($getAllSerResult = $getAllSResult->fetch_assoc()) {
               ?>
              <tr>
                <td><i class="fa fa-chevron-right"></i> <a href="service.php?details=<?php echo $getAllSerResult['id']; ?>"><?php echo $getAllSerResult['pdl_s_title']; ?></a></td>
              </tr>
              <?php } } ?>
            </tbody>
          </table>
        </div>
        <?php } }else{

          echo "Services is Empty!";
         } ?>
         <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- Services End =============================================== -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footer.php"; ?>
