<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') {
  header("Location:index.php");
} ?>
<?php
 include '../classes/Registrationfacility.php';
 $regfac = new Registrationfacility();

 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reg_facility'])) {
   $regfac_add  = $regfac->registrationFacilityAdd($_POST);
 }


 if (isset($_GET['regfacDelete']) && $_GET['regfacDelete']) {
    $id = preg_replace('/\D/', '', $_GET['regfacDelete']);
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['regfacDelete']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
    $getMsg = $regfac->getRegFacilityDelete($id);
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
        Registration Facility
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#" onclick="history.go(-1);"><img src="upload/back.png" width="12px" height="12px"></a></li>
        <li class="active">Registration Facility</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- <section class="col-lg-12">
           <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-list-ul"></i>
               <h3 class="box-title">Services List</h3>
               <button type="button" class="btn btn-success pull-right" title="Add Services" onclick="add_services();"><i class="fa fa-plus-square"></i> Add Services </button>
             </div>
          </div>
        </section> -->
       <section class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3>Registration Facility Add</h3>
            <?php
                 if (isset($regfac_add)) {
                   echo $regfac_add;
                   echo '<script>
                    setTimeout( function(){
                     window.location.href="regfacility.php";
                    }, 2000);
                   </script>';
                 }
            ?>
            <?php
                if (isset($getMsg)) {
                  echo $getMsg;
                   echo '<script>
                    setTimeout( function(){
                     window.location.href="regfacility.php";
                    }, 2000);
                   </script>';
                }
            ?>
          </div>
         <div class="box-footer">
              <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                       <div class="form-group">
                        <div class="col-sm-12">
                          <textarea class="form-control" name="user_reg_fac"></textarea>
                       </div>
                      </div>
                      <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-12">
                      <button type="submit" name="reg_facility" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
              </form>
            </div>
          </div>
       </section>

        <section class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Registration Facility</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
               <?php
                  $getAllSResult = $regfac->regfacilityShow();
                  $i = 0;
                  if ($getAllSResult) {
                   while ($getAllSerResult = $getAllSResult->fetch_assoc()) {
                    $i++
                 ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $getAllSerResult['reg_facility']; ?></td>
                <td align="center">
                  <a onclick="return confirm('Are you sure to Delete!');" href="?regfacDelete=<?php echo $getAllSerResult['reg_fac_id']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
              </tr>
              <?php } }else{ ?>
              <td>00.0</td>
               <td><span style="color:red;">Registration Facility is Empty!</span></td>
               <td></td>
              <?php } ?>
            </tbody>
          </table>
        </section>
       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footerUp.php"; ?>
<?php include "inc/footer.php"; ?>
