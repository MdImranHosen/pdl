<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') {
  header("Location:index.php");
} ?>
<?php
 include '../classes/Services.php';
 $ser = new Services();
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_services'])) {
   $services_addc  = $ser->servicesAdd($_POST,$_FILES);
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
        Add Services
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#" onclick="history.go(-1);"><img src="upload/back.png" width="12px" height="12px"></a></li>
        <li class="active">Add Services</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
       <section class="col-lg-8 col-lg-offset-2">
         <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Services Add</h3>

            <button type="button" class="btn btn-success pull-right" title="View Services List" onclick="view_services();"><i class="fa fa-eye"></i> View Services List </button>
            <?php
            if (isset($services_addc)) {
              echo $services_addc;
              echo '<script>
                setTimeout(function(){
                  window.location.href="add_services.php";
                }, 2000);
              </script>';
            }

            ?>
          </div>

        <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
         <div class="box-body">
           <div class="form-group">
            <label for="services_title">Services Title:</label>
            <input type="text" class="form-control" name="services_title" id="services_title" placeholder="Enter Services Title ...">
          </div>
          <div class="form-group">
                  <select class="form-control selectedStyle" name="services_cId">
                    <option value="" style="display: none" selected hidden>Select Services Category</option>
                    <?php
                       $catResult = $ser->services_categoryResult();
                       if ($catResult) {
                        while ($result = $catResult->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $result['s_cId'] ?>"><?php echo $result['s_category']; ?></option>
                    <?php } } ?>
                 </select>
            </div>
          <div class="form-group">
            <label for="fimg">Top Image:</label>
            <input type="file" name="fimg" id="fimg" accept="image/x-png,image/gif,image/jpeg">
          </div> 
          <div class="form-group">
            <label for="editor1">First Text:</label>
            <textarea class="form-control" id="editor1" rows="5" name="ftext" placeholder="Enter Services Second Text..."></textarea>
          </div>
          <div class="form-group">
            <label for="simg">Middel Image:</label>
            <input type="file" name="simg" id="simg" accept="image/x-png,image/gif,image/jpeg">
          </div>
          <div class="form-group">
            <label for="stext">Second Text:</label>
            <textarea class="textarea" placeholder="Enter Services Second Text..." name="stext" id="stext" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
          </div>
         </div>
         <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" name="add_services" class="btn btn-primary pull-right">Add Services</button>
          </div>
        </form>
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
