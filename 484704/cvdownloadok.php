<?php include "inc/header.php"; ?>
<?php
  # Shop List Delete Action Get....
 if (isset($_GET['deleteJobApplicatonCv']) && $_GET['deleteJobApplicatonCv']) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['deleteJobApplicatonCv']);
    $id = (int)$id;
    $getMsg = $app_from->getJobApplicatonCvDelete($id);
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
        Already View CV List
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#" onclick="history.go(-1);"><img src="upload/back.png" width="12px" height="12px"></a></li>
        <li class="active">Already View CV List</li>
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
              <h3 class="box-title">Already View CV List</h3>
            </div>
            </div>
            <div class="col-xs-6">
             <div class="box-header">
              <i class="fa fa-drivers-license-o"></i> Already View CV
                  <h3 class="box-title"><span class="label label-warning">
                    <?php 
                         $getTdcv = $app_from->getOldCVDownload();
                         if ($getTdcv) {
                           $countOcv = mysqli_num_rows($getTdcv);
                           echo "( ".$countOcv." )";
                         }else{ echo "(0)"; }
                    ?>
                  </span> </h3>
                </div>
            </div>
          </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- id="example1" -->
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
                      /* $page = $_GET['page'];*/
                       $page = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['page']);
                       $page = mysqli_real_escape_string($db->link,$page);
                       $page = (int)$page;
                     }else{
                      $page = 1;
                     }
                     if ($page == 0) {
                       echo '<script>
                          window.location.href="cvdownloadok.php";
                       </script>';
                     }else{
                     $start_form = ($page-1) * $per_page;
                     
                     $getShopList = $app_from->getJobApplicatonCvListDownOk($start_form,$per_page);

                     $i = 0;
                     if ($getShopList) {
                       while ($result = $getShopList->fetch_assoc()) {
                        $i++
                ?>
                
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><a href="viewcv.php?viewJobApplicatonCv=<?php echo $result['id']; ?>"><?php
                   echo $result['name1'];
                    ?></a></td>
                  <td><?php echo $result['p_district23']; ?></td>
                  <td><?php echo $result['p_thana24']; ?></td>
                  <td><a href="downloadCvpdf.php?pdfCvDownload=<?php echo $result['id']; ?>"><i class="fa fa-download"></i>PDF</a>
                  </td>
                  <td><?php echo $result['email2']; ?></td>
                  <td>+88<?php echo $result['phone4']; ?></td>
                  <td><a href="viewcv.php?viewJobApplicatonCv=<?php echo $result['id']; ?>"><img src="../<?php echo $result['image5']; ?>" width="60px" height="60px"/></a></td>
                  <td align="center" class="actionStyle">
                    <span><a href="viewcv.php?viewJobApplicatonCv=<?php echo $result['id']; ?>"><i class="glyphicon glyphicon-eye-open"></i></a></span>
                    <span><a onclick="return confirm('Are you Sure to Delete!')" href="?deleteJobApplicatonCv=<?php echo $result['id']; ?>"><i class="glyphicon glyphicon-trash"></i></a></span> 
                  </td>
                </tr>
                 <?php } }else{ ?>
                    <h3 align="center"><span style='color:green;font-size:18px;'>View CV Are not Available !</span></h3>
                    <?php  } ?>
                </tbody>
              </table>
              <?php 
               $getPagination = $app_from->getDownloadPaginationCvList();
               if ($getPagination) {
                 $total_rows = mysqli_num_rows($getPagination);
                 if ($total_rows > 0) {
                 $total_Pages = ceil($total_rows/$per_page);
                 
              ?>
              <!-- <span aria-hidden='true'>&laquo;</span> <span aria-hidden='true'>&raquo;</span> -->
            <ul class="pagination pagination-lg pull-right">
             <?php
             echo "<li><a href='?page=1' aria-label='Previous'>".'First'."</a></li>";
             
               # code...
             
            $c="active";
            for ($i=1; $i <=$total_Pages; $i++) { 

              if ($page==$i) {
                $c="active";
              }else{$c="";}

              echo "<li class=\"$c\"><a href=\"?page=$i\">$i</a></li>";

            /* echo "<li class='active style_pagination'><a href='cvdownloadok.php?page=".$i."'>".$i."</a></li>";*/
            }

            
             echo "<li><a href='?page=$total_Pages' aria-label='Next'>".'Last'."</a></li>";
            ?>

           </ul>
           <?php } } } ?>
              

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
