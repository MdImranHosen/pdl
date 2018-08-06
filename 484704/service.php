<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') {
  header("Location:index.php");
} ?>
<?php
 include '../classes/Services.php';
 $ser = new Services();

 if (isset($_GET['servicesDetails']) && $_GET['servicesDetails']) {
    $id = preg_replace('/\D/', '', $_GET['servicesDetails']);
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['servicesDetails']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
 }

  if (isset($_GET['servicesDetailsTrash']) && $_GET['servicesDetailsTrash']) {
    $id = preg_replace('/\D/', '', $_GET['servicesDetailsTrash']);
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['servicesDetailsTrash']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
    $getservicesIdMsg = $ser->getServicesIdDelete($id);
 }
?>
<style type="text/css">
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
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include "inc/header_bottom.php"; ?>
  <!-- Left side column. contains the logo and sidebar -->
<!--SideBar Start-->
  <?php include "inc/sidebar.php"; ?>
<!--SideBar End-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Services View
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#" onclick="history.go(-1);"><img src="upload/back.png" width="12px" height="12px"></a></li>
        <li class="active">Services View</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
       <?php 
           if (isset($getservicesIdMsg)) {
             echo $getservicesIdMsg;
             echo '<script>
                  setTimeout(function(){
                    window.location.href="services.php";
                  });
                 </script>';
           }
        ?>
      <div class="row">
        <?php
            $getServicesView = $ser->getServicesDetailsView($id);
            if ($getServicesView) {
              while ($getServicesViewResult = $getServicesView->fetch_assoc()) {
        ?>
       <section class="col-lg-8">
            <div class="service_details_style">
              <h2><?php echo $getServicesViewResult['pdl_s_title']; ?></h2>
              <?php 
                 if (file_exists('../'.$getServicesViewResult['pdl_s_img'])) {
              ?>
              <strong>
                <img src="../<?php echo $getServicesViewResult['pdl_s_img']; ?>" style="border: dashed #333333 1px; padding:2px; margin:6px;" width="176" height="122" align="left">
              </strong>
              <?php } ?>
              <?php echo $getServicesViewResult['pdl_s_ftext']; ?>
              <?php 
                 if (file_exists('../'.$getServicesViewResult['pdl_s_simg'])) {
              ?>
              <img src="../<?php echo $getServicesViewResult['pdl_s_simg']; ?>" style="border: dashed #333333 1px; padding:0px; margin:4px;" width="151" height="112" align="right">
              <?php } ?>
              <?php echo $getServicesViewResult['pdl_s_stext']; ?>
           </div>
           <div>

                   <em class="pull-left alert alert-success"><a onclick="return confirm('Are you Sure to Delete.');" href="?servicesDetailsTrash=<?php echo $getServicesViewResult['id']; ?>"><i class="fa fa-trash"></i> Delete</a></em>

                   <em class="pull-right alert alert-success"><a href="editServices.php?editServices=<?php echo $getServicesViewResult['id']; ?>"><i class="fa fa-edit"></i> Update</a></em>

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
                <td><img src="../upload/background/spyder.png"> <a href="service.php?servicesDetails=<?php echo $relatedResult['id']; ?>"><?php echo $relatedResult['pdl_s_title']; ?></a></td>
               </tr>
               <?php } } ?>
              </tbody>
            </table>
          </section>
          <?php } }else{ echo "Services Category is not Available!"; } ?>
        <?php } }else{ echo "This Services is not Available!"; } ?>
        <!--service category end -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footerUp.php"; ?>
<?php include "inc/footer.php"; ?>
