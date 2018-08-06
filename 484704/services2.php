<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') {
  header("Location:index.php");
} ?>
<?php
 include '../classes/Services.php';
 $ser = new Services();
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['services_add'])) {
   $services_addc  = $ser->servicesAddCategory($_POST);
 }


 if (isset($_GET['servicesTrash']) && $_GET['servicesTrash']) {
    $id = preg_replace('/\D/', '', $_GET['servicesTrash']);
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['servicesTrash']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
    $getMsg = $ser->getServicesCatDelete($id);
 }
?>
<style type="text/css">
.scrollheight{
  height: 200px !important; overflow: scroll;
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
        All Services
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#" onclick="history.go(-1);"><img src="upload/back.png" width="12px" height="12px"></a></li>
        <li class="active">Services</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
       <section class="col-lg-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3>Services Category</h3>
            <?php
                 if (isset($services_addc)) {
                   echo $services_addc;
                   echo '<script>
                    setTimeout( function(){
                     window.location.href="services.php";
                    }, 2000);
                   </script>';
                 }
            ?>
            <?php
                if (isset($getMsg)) {
                  echo $getMsg;
                   echo '<script>
                    setTimeout( function(){
                     window.location.href="services.php";
                    }, 2000);
                   </script>';
                }
            ?>
          </div>
          <div class="box-body">
            <table class="table table-hover">
              <tbody>
                <?php
                    $services_cat = $ser->services_categoryResult();
                    if ($services_cat) {
                      while ($row = $services_cat->fetch_assoc()) {
                ?>
                <tr>
                  <td><?php echo $row['s_category']; ?></td>
                  <td style="color: #3c8dbc;"><a onclick="return confirm('Are you Sure to Delete.');" href="?servicesTrash=<?php echo $row['s_cId']; ?>"><i class="fa fa-trash"></i></a></td> 
                </tr>
                <?php } }else{
                  echo '<tr style="color:red;">
                        <td>Category Field is Empty!</td>
                        </tr>';
                } ?>
              </tbody>
            </table>
          </div>
         <div class="box-footer">
              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="input-group">
                  <input type="text" name="services_category" placeholder="Services Category Add.." class="form-control">
                      <span class="input-group-btn">
                        <button type="submit" name="services_add" class="btn btn-primary btn-flat">Add</button>
                      </span>
                </div>
              </form>
            </div>
          </div>
       </section>
       <section class="col-lg-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-list-ul"></i>
               <h3 class="box-title">Services List</h3>
               
               <button type="button" class="btn btn-success pull-right" title="Add Services" onclick="add_services();"><i class="fa fa-plus-square"></i> Add Services </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Bootstrap accordion Start -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->

                <?php 
                     $getSResult = $ser->services_categoryResult();
                     if ($getSResult) {
                       while ($getResult = $getSResult->fetch_assoc()) {
                ?>
                <div class="panel box box-primary">
                  <div class="box-header with-border text-center">
                    <h4 class="box-title">
                      <a class="haveone" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        <?php echo $getResult['s_category']; ?>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="box-body scrollheight">
                      <table class="table table-hover">
                        <tbody>
                           <?php
                              $s_id = $getResult['s_cId'];
                              $getAllSResult = $ser->getAllServicesResult($s_id);
                              if ($getAllSResult) {
                               while ($getAllSerResult = $getAllSResult->fetch_assoc()) {
                           ?>
                          <tr>
                           <td><i class="fa fa-chevron-right"></i> <a href="#"><?php echo $getAllSerResult['pdl_s_title']; ?></a></td>
                           <td style="color: #3c8dbc;"><a onclick="return confirm('Are you Sure to Delete.');" href="?serviceTrash=<?php ?>"><i class="fa fa-trash"></i></a></td>
                           </tr>
                          <?php } } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
               <?php } }else{

                echo "Services is Empty!";
               } ?>
                

                </div>
              </div>
            </div>
            <!-- /.box-body -->
              <!-- Bootstrap Accordion End -->
            </div>
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
