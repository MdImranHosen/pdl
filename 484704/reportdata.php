<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') {
  header("Location:index.php");
} ?>
<?php
 include '../classes/Registrationfacility.php';
 $reportdata = new Registrationfacility();

 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_report_from_data'])) {
   $reportdata_add  = $reportdata->reportDataAdd($_POST);
 }

if (isset($_GET['reportDataDelete']) && $_GET['reportDataDelete']) {
    $id = preg_replace('/\D/', '', $_GET['reportDataDelete']);
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['reportDataDelete']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
    $getMsg = $reportdata->getReportDeleteId($id);
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
        User Report From Data
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#" onclick="history.go(-1);"><img src="upload/back.png" width="12px" height="12px"></a></li>
        <li class="active">User Report From Data</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
       <section class="col-lg-4">

         <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> Add Report Data From</h3>

          <!--   <button type="button" class="btn btn-success pull-right" title="View Services List" onclick="view_services();"><i class="fa fa-eye"></i> View Notices List </button> -->

            <?php
            if (isset($reportdata_add)) {
              echo $reportdata_add;
              echo '<script>
                setTimeout(function(){
                  window.location.href="reportdata.php";
                }, 2000);
              </script>';
            }

            ?>
          </div>

        <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
         <div class="box-body">
           <div class="form-group">
            <label for="report_data_title">Title:</label>
            <input type="text" class="form-control" name="report_data_title" id="report_data_title" placeholder="Report Data Title">
          </div>
          <div class="form-group">
            <label for="report_data_details">Details:</label>
            <input type="text" class="form-control" name="report_data_details" id="report_data_details" placeholder="Report Data Details">
          </div>
          <input type="hidden" name="date_time" value="<?php echo date("l jS \of F Y") ?>">
         </div>
         <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" name="add_report_from_data" class="btn btn-primary pull-right">Add</button>
          </div>
        </form>
       </div>
      <!-- /.box -->
       </section>
       <section class="col-lg-8">
        <div class="box box-success">
         <table class="table table-hover table-border">
           <tbody>
            <?php
                 $i = 0;
                 $report_show = $reportdata->showAllReprotData();
                 if ($report_show) {
                   while ($show_result = $report_show->fetch_assoc()) {
                    $i++;
            ?>
             <tr>
               <th><?php echo $show_result['report_title']; ?></th>
               <td><?php echo $show_result['report_details']; ?></td>
               <td style="color: #3C8DBC;text-align: center;"><a href="?reportDataDelete=<?php echo $show_result['report_id']; ?>"><i class="fa fa-trash"></i></a></td>
             </tr>
            <?php } }else{ ?>
             <tr>
               <td width="50%">Report Data Field is Empty!</td>
               <td><?php echo date("l jS \of F Y") ?></td>
             </tr>
           <?php } ?>
           </tbody>
         </table>
         </div>
       </section>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footerUp.php"; ?>
<?php include "inc/footer.php"; ?>
