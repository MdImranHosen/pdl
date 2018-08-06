<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') {
  header("Location:index.php");
} ?>
<?php
 include '../classes/Report.php';
 $report = new Report();

 /* Bellow user Dactive id Active action get and validation */
 if (isset($_GET['reportIdSeen']) && $_GET['reportIdSeen']) {
    $id = preg_replace('/\D/', '', $_GET['reportIdSeen']);
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['reportIdSeen']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
 }

/* Bellow user id Delete action get and validation */
  if (isset($_GET['reportIdDelete']) && $_GET['reportIdDelete']) {
    $id = preg_replace('/\D/', '', $_GET['reportIdDelete']);
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['reportIdDelete']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
    $getReportsMsg = $report->deleteReportid($id);
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
        Report Details
        <small><a href="reports.php">Report List</a></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#" onclick="history.go(-1);"><img src="upload/back.png" width="12px" height="12px"></a></li>
        <li class="active">Report View</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
       <?php 
           if (isset($getReportsMsg)) {
             echo $getReportsMsg;
             echo '<script>
                  setTimeout(function(){
                    window.location.href="reports.php";
                  });
                 </script>';
           }
        ?>
      <div class="row">
        <?php
            $getReports = $report->getReportIdSeen($id);
            if ($getReports) {
              while ($getReportsr = $getReports->fetch_assoc()) {
        ?>
       <section class="col-lg-8">
            <div class="service_details_style">
              <h2><?php echo $getReportsr['r_what']; ?></h2>
              <?php 
               if (!empty($getReportsr['report_img'])) {
              
                 if (file_exists('../'.$getReportsr['report_img'])) {
              ?>
              <strong>
                <img src="../<?php echo $getReportsr['report_img']; ?>" style="border: dashed #333333 1px; padding:2px; margin:6px;" width="40%" height="auto" align="left">
              </strong>
              <?php }  } ?>
              <br>
             <label>What: </label> <?php echo $getReportsr['r_what']; ?>
             <br>
             <label>Where: </label> <?php echo $getReportsr['r_where']; ?>
              <br>
             <label>When: </label> <?php echo $getReportsr['r_when']; ?>
             <br>
             <label>Who: </label> <?php echo $getReportsr['r_who']; ?>
             <br>
             <label>Why: </label> <?php echo $getReportsr['r_why']; ?>
             <br>
             <label>How: </label> <?php echo $getReportsr['r_how']; ?>
             <br>
              <?php 
               if (!empty($getReportsr['report_file'])) {
               
                 if (file_exists('../'.$getReportsr['report_file'])) {
              ?>
              <!-- <img src="../<?php #echo $getReportsr['report_file']; ?>" style="border: dashed #333333 1px; padding:0px; margin:4px;" width="80%" height="auto" align="right"> -->
             <label>File: </label>
              <a href="../<?php echo $getReportsr['report_file']; ?>" download>
                   <strong style="padding: 5px; background-color: #000000;color: #fff;border-radius: 5px;margin: 3px;">Download</strong>
              </a>
              <?php } } ?>
            
           </div>
           <br>
           <div>
             <em class="pull-right alert alert-success"><a onclick="return confirm('Are you Sure to Delete.');" href="?reportIdDelete=<?php echo $getReportsr['report_data_id']; ?>"><i class="fa fa-trash"></i> Delete</a></em>
           </div>
          </section>
          <section class="col-lg-4">
            <table class="table table-hover noselect">
              <thead>
                <tr>
                  <th><i class="fa fa-star fa-lg"></i> <?php echo $getReportsr['client_name']; ?>,s Report</th>
                </tr>
              </thead>
              <tbody>
                <?php
                   $c_id = $getReportsr['client_id'];
                   $oneRepoterpost = $report->getPerRepoterPost($c_id);
                   if ($oneRepoterpost) {
                    while ($relatedReport = $oneRepoterpost->fetch_assoc()) {
                ?>
                <tr>
                <td>
                  <img src="../upload/background/spyder.png"> <a href="report.php?reportIdSeen=<?php echo $relatedReport['report_data_id']; ?>"><?php echo $relatedReport['r_what']; ?></a>
                </td>
               </tr>
               <?php } }else{ echo "Report are not Available!"; } ?>
              </tbody>
            </table>
          </section>
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
