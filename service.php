<?php include "inc/header.php"; ?>
<?php

 include 'classes/Services.php';
 $ser = new Services();


if (isset($_GET['details']) && $_GET['details']) {
    $id = preg_replace('/\D/', '', $_GET['details']);
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['details']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
 }else{
  header("Location:index.php");
 }
 ?>
<style>
.background_color_red {
  background-color: #f1f1f1 !important;
}
.background_color_red h2{color: #000;}
p.body-text-style{
  font-size: 20px;
}
.service_details_style {
  font-size: 17px;
  word-spacing: 5px;
  font-weight: normal;
  text-align: justify;
}
.service_details_style p{text-indent:50px;}
.service_details_style h2{
  text-align: center;
  border-bottom: 2px solid #ddd;
  padding-bottom: 5px;
}
table tr th {
  color: #e1cc60;
  font-size: 20px;
  background-color: #000000;
}


.noselect {
  -webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none; /* Safari */
     -khtml-user-select: none; /* Konqueror HTML */
       -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome and Opera */
}
.services_bottom_padding{margin-bottom: 20px;}
</style>
<body class="hold-transition skin-blue sidebar-mini" >
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
         <?php
            $getServicesView = $ser->getServicesDetailsView($id);
            if ($getServicesView) {
              while ($getServicesViewResult = $getServicesView->fetch_assoc()) {
        ?>
          <section class="col-lg-8">
            <div class="service_details_style noselect">
              <h2><?php echo $getServicesViewResult['pdl_s_title']; ?></h2>

              <?php 
                 if (file_exists($getServicesViewResult['pdl_s_img'])) {
              ?>
              <strong>
                <img src="<?php echo $getServicesViewResult['pdl_s_img']; ?>" style="border: dashed #333333 1px; padding:2px; margin:6px;" width="176" height="122" align="left">
              </strong>
              <?php } ?>
              <?php echo $getServicesViewResult['pdl_s_ftext']; ?>
              <?php 
                 if (file_exists($getServicesViewResult['pdl_s_simg'])) {
              ?>
              <img src="<?php echo $getServicesViewResult['pdl_s_simg']; ?>" style="border: dashed #333333 1px; padding:0px; margin:4px;" width="151" height="112" align="right">
              <?php } ?>
              <?php echo $getServicesViewResult['pdl_s_stext']; ?>
           </div>
          </section>
           <?php
            $getSId = $getServicesViewResult['s_cId'];
            $getSRes = $ser->getServicesViewCategory($getSId);
            if ($getSRes) {
              while ($getSResult = $getSRes->fetch_assoc()) {
           ?>
          <section class="col-lg-4">
            <table class="table table-hover noselect">
              <thead>
                <tr>
                  <th><i class="fa fa-star fa-lg"></i> <?php echo $getSResult['s_category']; ?></th>
                </tr>
              </thead>
              <tbody>
               <?php
                   $c_id = $getSResult['s_cId'];
                   $relatedServices = $ser->getRelatedServices($c_id);
                   if ($relatedServices) {
                    while ($relatedResult = $relatedServices->fetch_assoc()) {
                ?>
                <tr>
                  <td><img src="upload/background/spyder.png"><!-- <i class="fa fa-chevron-right"></i> --> <a href="service.php?details=<?php echo $relatedResult['id']; ?>"> <?php echo $relatedResult['pdl_s_title']; ?></a></td>
                </tr>
                <?php } } ?>
              </tbody>
            </table>
          </section>
            <?php } }else{ echo "Services Category is not Available!"; } ?>
        <?php } }else{ echo "This Services is not Available!"; } ?>
        <!--service category end -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footer.php"; ?>
