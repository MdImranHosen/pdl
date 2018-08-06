<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') {
  header("Location:index.php");
} ?>
<?php
 include '../classes/Signin.php';
 $signin = new Signin();

/* Bellow user id Delete action get and validation */
 if (isset($_GET['userIdDelete']) && $_GET['userIdDelete']) {
    $id = preg_replace('/\D/', '', $_GET['userIdDelete']);
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['userIdDelete']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
    $getMsg = $signin->getUserIdDelete($id);
 }
 /* Bellow user Dactive id Active action get and validation */
 if (isset($_GET['userIdDactive']) && $_GET['userIdDactive']) {
    $id = preg_replace('/\D/', '', $_GET['userIdDactive']);
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['userIdDactive']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
    $getMsg = $signin->getUserIdActive($id);
 }
  /* Bellow user Active id Dactive action get and validation */
 if (isset($_GET['userIdActive']) && $_GET['userIdActive']) {
    $id = preg_replace('/\D/', '', $_GET['userIdActive']);
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['userIdActive']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
    $getMsg = $signin->getUserIdDactive($id);
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
        User List 
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#" onclick="history.go(-1);"><img src="upload/back.png" width="12px" height="12px"></a></li>
        <li class="active">User List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
       <?php 
      $per_page_user_list = 10;
        if (isset($_GET['userlist'])) {
          $userlist = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['userlist']);
          $userlist = mysqli_real_escape_string($db->link, $userlist);
          $userlist = (int)$userlist;
        }else{
          $userlist = 1;
        }
        if ($userlist == 0) {
          echo '<script>
          window.location.href="pdluser.php";
          </script>';
        }else{
          $total_user_list = ($userlist-1) * $per_page_user_list;
        
       ?>
        <section class="col-lg-12">
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Designation</th>
                <th>Phone</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             <?php 
               $getSResult = $signin->userListShowperp($total_user_list,$per_page_user_list);
               $i = 0;
               if ($getSResult) {
                  while ($getResult = $getSResult->fetch_assoc()) {
                    $i++
               ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $getResult['client_name']; ?></td>
                <td><?php echo $getResult['client_email']; ?></td>
                <td><?php echo $getResult['client_des']; ?></td>
                <td><?php echo $getResult['client_phone']; ?></td>
                <td align="center">
                  <?php if ($getResult['vstatus'] == '1') { ?>
                    <a href="?userIdActive=<?php echo $getResult['client_id']; ?>"><span style="color:green;">Active </span> </a> ||
                  <?php }elseif($getResult['vstatus'] == '0'){ ?>
                    <a href="?userIdDactive=<?php echo $getResult['client_id']; ?>"><span style="color:red;">Dactive </span> </a> || 
                  <?php } ?>
                  <a onclick="return confirm('Are you sure to Delete!');" href="?userIdDelete=<?php echo $getResult['client_id']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
              </tr>
               <?php } }else{

                echo "Services is Empty!";
               } ?>
            </tbody>
          </table>
        </section>
          <?php 
             $userlistpagination = $signin->userListShow();
             if ($userlistpagination) {
               $total_rows = mysqli_num_rows($userlistpagination);
               if ($total_rows > 0) {
                $total_pages = ceil($total_rows/$per_page_user_list);

                if ($total_pages < $userlist) {
                  echo '<script>window.location.href="pdluser.php";</script>';
                }
          ?>
        <section class="col-lg-6 col-lg-offset-5">
          <nav aria-label="Page navigation example">
            <ul class="pagination">

             <?php
             if ($userlist > 1) {
              echo "<li><a href='?userlist=1' aria-label='first'>".'First'."</a></li>";
             }
             
             
            $c="active";
            for ($i=1; $i <=$total_pages; $i++) {

              if ($userlist==$i) {
                $c="active";
              }else{$c="";}

              echo "<li class=\"$c\"><a href=\"?userlist=$i\">$i</a></li>";

            
            }

            if ($userlist < $total_pages) {
             echo "<li><a href='?userlist=$total_pages' aria-label='last'>".'Last'."</a></li>";
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
