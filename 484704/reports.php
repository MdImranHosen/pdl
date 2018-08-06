<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') {
  header("Location:index.php");
} ?>
<?php
 include '../classes/Report.php';
 $report = new Report();

/* Bellow user id Delete action get and validation */
 if (isset($_GET['reportIdDelete']) && $_GET['reportIdDelete']) {
    $id = preg_replace('/\D/', '', $_GET['reportIdDelete']);
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['reportIdDelete']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
    $getMsg = $report->deleteReportid($id);
 }

?>
<style type="text/css">
table tr th{
  font-size: 20px;
  background-color: #2f2f2f;
  color: #f4e470;
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select:none; 
  user-select:none;
  -o-user-select:none;
}
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
        Report List 
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#" onclick="history.go(-1);"><img src="upload/back.png" width="12px" height="12px"></a></li>
        <li class="active">Report List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
       <?php 
       $per_page_report_list = 3;
        if (isset($_GET['reportlist'])) {
          $reportlist = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['reportlist']);
          $reportlist = mysqli_real_escape_string($db->link, $reportlist);
          $reportlist = (int)$reportlist;
        }else{
          $reportlist = 1;
        }
        if ($reportlist == 0) {
          echo '<script>
          window.location.href="reports.php";
          </script>';
        }else{
          $total_report_list = ($reportlist-1) * $per_page_report_list;
        
       ?>
        <section class="col-lg-12">
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th width="90%">Subject</th>
                <th width="5%">Action</th>
              </tr>
            </thead>
            <tbody>
             <?php 
               $getSResult = $report->reportListShowperp($total_report_list,$per_page_report_list);
               $i = 0;
               if ($getSResult) {
                  while ($getResult = $getSResult->fetch_assoc()) {
                    $i++
               ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><a href="report.php?reportIdSeen=<?php echo $getResult['report_data_id']; ?>"><?php echo $getResult['r_what']; ?></td>
                <td align="center">
                  <a onclick="return confirm('Are you sure to Delete!');" href="?reportIdDelete=<?php echo $getResult['report_data_id']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
              </tr>
               <?php } }else{ ?>
                <tr>
                  <td>00.0</td>
                  <td>Report Data is Empty!</td>
                  <td></td>
                </tr>
               
              <?php } ?>
            </tbody>
          </table>
        </section>
          <?php 
             $reportlistpagination = $report->reportListShow();
             if ($reportlistpagination) {
               $total_rows = mysqli_num_rows($reportlistpagination);
               if ($total_rows > 0) {
                $total_pages = ceil($total_rows/$per_page_report_list);

                if ($total_pages < $reportlist) {
                  echo '<script>window.location.href="reports.php";</script>';
                }
          ?>
        <section class="col-lg-6 col-lg-offset-5">
          <nav aria-label="Page navigation example">
            <ul class="pagination">

             <?php
             if ($reportlist > 1) {
              echo "<li><a href='?reportlist=1' aria-label='first'>".'First'."</a></li>";
             }
             
             
            $c="active";
            for ($i=1; $i <=$total_pages; $i++) {

              if ($reportlist==$i) {
                $c="active";
              }else{$c="";}

              echo "<li class=\"$c\"><a href=\"?reportlist=$i\">$i</a></li>";

            
            }

            if ($reportlist < $total_pages) {
             echo "<li><a href='?reportlist=$total_pages' aria-label='last'>".'Last'."</a></li>";
            }
             
            ?>

            </ul>
            
          </nav>
        </section>
       
      <?php } } } ?>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footerUp.php"; ?>
<?php include "inc/footer.php"; ?>
