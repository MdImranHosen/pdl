<?php include "inc/header.php"; ?>
<?php
  # Shop List Delete Action Get....
 if (isset($_GET['deleteJobApplicatonCv']) && $_GET['deleteJobApplicatonCv']) {
    $id = preg_replace('/\D/', '', $_GET['deleteJobApplicatonCv']);
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['deleteJobApplicatonCv']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
    $getMsg = $app_from->getJobApplicatonCvDelete($id);
 }

  if (isset($_GET['cvthispageNotview']) && $_GET['cvthispageNotview']) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['cvthispageNotview']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
    $getMsg = $app_from->getJobCvdownloadOk($id);
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
        CV LIST
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#" onclick="history.go(-1);"><img src="upload/back.png" width="12px" height="12px"></a></li>
        <li class="active">CV LIST</li>
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
              <i class="fa fa-list-ul"></i>
              <h3 class="box-title">New CV List</h3>
            </div>
            </div>
            <div class="col-xs-6">
              <div class="box-header">
               <i class="fa fa-drivers-license-o"></i>
               <h3 class="box-title"> New CV 
                  <span class="label label-success"><?php 
                        $getCvnum = $app_from->getNewCvNumber();
                        if ($getCvnum) {
                          $countcv = mysqli_num_rows($getCvnum);
                          echo "( ".$countcv." )";
                        }else{ echo "0"; }  
                     ?></span> </h3>
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
                     $per_page = 2;
                     if (isset($_GET['page'])) {
                       $page = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['page']);
                       $page = mysqli_real_escape_string($db->link,$page);
                       $page = (int)$page;
                     }else{
                      $page = 1;
                     }
                     if ($page == 0) {
                       echo '<script>
                          window.location.href="index.php";
                       </script>';
                     }else{
                     $start_form = ($page-1) * $per_page;

                     $getShopList = $app_from->getJobApplicatonCvList($start_form,$per_page);

                     $i = 0;
                     if ($getShopList) {
                       while ($result = $getShopList->fetch_assoc()) {
                        $i++
                ?>
                
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><a href="viewcv.php?viewJobApplicatonCv=<?php echo $result['id']; ?>"><?php
                   echo $result['name1']; ?></a></td>
                  <td><?php echo $result['p_district23']; ?></td>
                  <td><?php echo $result['p_thana24']; ?></td>
                  <td><a href="downloadCvpdf.php?pdfCvDownload=<?php echo $result['id']; ?>"><i class="fa fa-download"></i>PDF</a> | 
                      <a href="?cvthispageNotview=<?php echo $result['id']; ?>">OK</a> 
                  </td>
                  <td><?php echo $result['email2']; ?></td>
                  <td>+88<?php echo $result['phone4']; ?></td>
                  <td><a href="viewcv.php?viewJobApplicatonCv=<?php echo $result['id']; ?>"><img src="../<?php echo $result['image5']; ?>" width="60px" height="60px"/></a></td>
                  <td align="center" class="actionStyle">
                    <span><a href="viewcv.php?viewJobApplicatonCv=<?php echo $result['id']; ?>"><i class="glyphicon glyphicon-eye-open"></i></a></span>
                    <span><a onclick="return confirm('Are you Sure to Delete!')" href="?deleteJobApplicatonCv=<?php echo $result['id']; ?>"><i class="glyphicon glyphicon-trash"></i></a></span> 
                  </td>
                </tr>
                 <?php } } else{ ?>
                  <h3 align="center"><span style='color:green;font-size:18px;'>Are not Available New CV!</span></h3>
                 <?php    } ?>
                </tbody>
              </table>
              <?php 
               $getPagination = $app_from->getPaginationCvList();
               if ($getPagination) {
                 $total_rows = mysqli_num_rows($getPagination);
                 if ($total_rows > 0) {
                   
                 
                 $total_Pages = ceil($total_rows/$per_page);
                 if ($total_Pages < $page) {
                   echo '<script>window.location.href="index.php";</script>';
                 }
                 
              ?>
              <!-- <span aria-hidden='true'>&laquo;</span> <span aria-hidden='true'>&raquo;</span> -->
            <ul class="pagination pagination-lg pull-right">
             <?php
             if ($page > 1) {
               echo "<li><a href='?page=1' aria-label='Previous'>".'First'."</a></li>";
             }
             
            $c="active";
            for ($i=1; $i <=$total_Pages; $i++) { 

              if ($page==$i) {
                $c="active";
              }else{$c="";}

              echo "<li class=\"$c\"><a href=\"?page=$i\">$i</a></li>";

            /* echo "<li class='active style_pagination'><a href='cvdownloadok.php?page=".$i."'>".$i."</a></li>";*/
            }
             if ($page < $total_Pages) {
               echo "<li><a href='?page=$total_Pages' aria-label='Next'>".'Last'."</a></li>";
             }
            ?>

           </ul>
           <?php } } }  ?>
               
          </div>
          </div>
            <!-- /.box-body -->
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
