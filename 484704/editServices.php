<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') {
  header("Location:index.php");
} ?>
<?php
 include '../classes/Services.php';
 $ser = new Services();

  if (isset($_GET['editServices']) && $_GET['editServices']) {
    $id = preg_replace('/\D/', '', $_GET['editServices']);
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['editServices']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;

 }

 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_services'])) {
   $services_editmsg  = $ser->servicesUpdate($_POST, $_FILES, $id);
 }


?>
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
        Update Services
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#" onclick="history.go(-1);"><img src="upload/back.png" width="12px" height="12px"></a></li>
        <li class="active">Update Services</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
       <section class="col-lg-8 col-lg-offset-2">
         <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Services Edit</h3>

            <button type="button" class="btn btn-success pull-right" title="View Services List" onclick="view_services();"><i class="fa fa-eye"></i> View Services List </button>
            <?php
            if (isset($services_editmsg)) {
              echo $services_editmsg;
            }

            ?>
          </div>
          <?php
               $getSEdit = $ser->getServicesEdit($id);
               if ($getSEdit) {
                 while ($getSEResult = $getSEdit->fetch_assoc()) {
          ?>

        <form role="form" action="" method="post" enctype="multipart/form-data">
         <div class="box-body">
           <div class="form-group">
            <label for="services_title">Services Title:</label>
            <input type="text" class="form-control" name="services_title" id="services_title" value="<?php echo $getSEResult['pdl_s_title'] ?>">
          </div>
          <div class="form-group">
            <label>Services Category:</label>
                  <select class="form-control selectedStyle" name="services_cId">
                    <option value="" style="display: none" selected hidden>Select Services Category</option>
                    <?php
                       $catResult = $ser->services_categoryResult();
                       if ($catResult) {
                        while ($result = $catResult->fetch_assoc()) {
                    ?>
                   <option <?php if ($getSEResult['s_cId'] == $result['s_cId']) { ?> selected="selected" <?php } ?> value="<?php echo $result['s_cId']; ?>"><?php echo $result['s_category']; ?></option>
                    <?php } } ?>
                 </select>
            </div>
          <div class="form-group">
            <?php 
             if (file_exists('../'.$getSEResult['pdl_s_img'])) {
           ?>
            <img src="../<?php echo $getSEResult['pdl_s_img']; ?>" alt="First Image" width='220px' height='180px'>
            <?php }else{ 
              echo "There are no Pictures";
             } ?> 
            <br><br/>
            <label for="fimg">Top Image:</label>
            <input type="file" name="fimg" id="fimg">
          </div> 
          <div class="form-group">
            <label for="editor1">First Text:</label>
            <textarea class="form-control" id="editor1" rows="5" name="ftext">
              <?php echo $getSEResult['pdl_s_ftext']; ?>
            </textarea>
          </div>
          <div class="form-group">
           <?php 
             if (file_exists('../'.$getSEResult['pdl_s_simg'])) {
           ?>
            <img src="../<?php echo $getSEResult['pdl_s_simg']; ?>" alt="Secent Image" width='220px' height='180px'>
              
            <?php }else{ 
              echo "There are no Pictures";
             } ?>
            <br><br/>

            <label for="simg">Middel Image:</label>
            <input type="file" name="simg" id="simg">
          </div>
          <div class="form-group">
            <label for="stext">Second Text:</label>
            <textarea class="textarea" name="stext" id="stext" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
              <?php echo $getSEResult['pdl_s_stext']; ?>
            </textarea>
          </div>
         </div>
         <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" name="update_services" class="btn btn-primary pull-right">Update Services</button>
          </div>
        </form>
        <?php } } ?>
       </div>
      <!-- /.box -->
       </section>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footerUp.php"; ?>
<?php include "inc/footer.php"; ?>
