<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') {
  header("Location:index.php");
} ?>
<?php
  # Shop List Delete Action Get....
 if (isset($_GET['deleteJobApplicatonCv']) && $_GET['deleteJobApplicatonCv']) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['deleteJobApplicatonCv']);
    $id = (int)$id;
    $getMsg = $app_from->getJobApplicatonCvDelete($id);
 }

?>

<?php 
 if (isset($_GET['search'])) {
   $search = $_GET['search'];
   $search = $app_from->getSearchKeyword($search);
 }


   if (isset($_GET['cvthispageNotview']) && $_GET['cvthispageNotview']) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['cvthispageNotview']);
    $id = (int)$id;
    $getMessg = $app_from->getJobCvdownloadOk($id);
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
        Search Result
        <small>CV LIST</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> CV List</a></li>
        <li class="active">Job</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="row">
             <div class="col-xs-6">
            <div class="box-header">
              <h3 class="box-title">Searching CV List</h3>
            </div>
            </div>
          </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">No</th>
                  <th width="15%">Name</th>
                  <th width="10%">District</th>
                  <th width="10%">Upazila</th>
                  <th width="10%">PDF</th>
                  <th width="15%">Email</th>
                  <th width="15%">Phone</th>
                  <th width="10%">Image</th>
                  <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $getSearchCatch = $app_from->getSearchCatchTable($search);
                 #$query = "SELECT * FROM tbl_registration WHERE name1 LIKE '%$search%' ";
                 #$getSearchCatch = $db->select($query);
                $i = 0;
               if($getSearchCatch){
               
                while($result = $getSearchCatch->fetch_assoc()){    
                  $i++
               ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><a href="viewcv.php?viewJobApplicatonCv=<?php echo $result['id']; ?>"><?php echo $result['name1']; ?></a></td>
                  <td><?php echo $result['p_district23']; ?></td>
                  <td><?php echo $result['p_thana24']; ?></td>
                  <td><a href="downloadCvpdf.php?pdfCvDownload=<?php echo $result['id']; ?>"><i class="fa fa-download"></i>PDF</a>
                    <?php
                    if ($result['c_id'] == '0') {
                    ?>
                    |  <a href="?cvthispageNotview=<?php echo $result['id']; ?>">OK</a> 
                      <?php } ?>
                  </td>
                  <td><?php echo $result['email2']; ?></td>
                  <td>+88<?php echo $result['phone4']; ?></td>
                  <td><a href="viewcv.php?viewJobApplicatonCv=<?php echo $result['id']; ?>"><img src="../<?php echo $result['image5']; ?>" width="60px" height="60px"/></a></td>
                  <td align="center" class="actionStyle">
                    <span><a href="viewcv.php?viewJobApplicatonCv=<?php echo $result['id']; ?>"><i class="glyphicon glyphicon-eye-open"></i></a></span>
                    <span><a onclick="return confirm('Are you Sure to Delete!')" href="?deleteJobApplicatonCv=<?php echo $result['id']; ?>"><i class="glyphicon glyphicon-trash"></i></a></span> 
                  </td>
                </tr>
                <?php } }else{
               echo "<span style='color:green;font-size:18px;'>Are not Available !</span>";
                } ?>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footerUp.php"; ?>
<?php include "inc/footer.php"; ?>
