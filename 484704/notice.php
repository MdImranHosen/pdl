<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') {
  header("Location:index.php");
} ?>
<?php
 include '../classes/Notices.php';
 $notice = new Notices();
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_notices'])) {
   $notice_add  = $notice->noticesAdd($_POST, $_FILES);
 }

if (isset($_GET['noticeDelete']) && $_GET['noticeDelete']) {
    $id = preg_replace('/\D/', '', $_GET['noticeDelete']);
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['noticeDelete']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
    $getMsg = $notice->getNoticeDeleteId($id);
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
        Notices
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#" onclick="history.go(-1);"><img src="upload/back.png" width="12px" height="12px"></a></li>
        <li class="active">Notices</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
       <section class="col-lg-4">

         <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> Add Notice</h3>

          <!--   <button type="button" class="btn btn-success pull-right" title="View Services List" onclick="view_services();"><i class="fa fa-eye"></i> View Notices List </button> -->

            <?php
            if (isset($notice_add)) {
              echo $notice_add;
              echo '<script>
                setTimeout(function(){
                  window.location.href="notice.php";
                }, 2000);
              </script>';
            }

            ?>
          </div>

        <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
         <div class="box-body">
           <div class="form-group">
            <label for="notice_title">Notice Title:</label>
            <input type="text" class="form-control" name="notice_title" id="notice_title" placeholder="Enter Notice Title ...">
          </div>
          <div class="form-group">
            <label for="notice_pdf">Notice PDF File:</label>
            <input type="file" name="notice_pdf" id="notice_pdf" accept="application/pdf,application/vnd.ms-excel">
          </div>
          <input type="hidden" name="date_time" value="<?php echo date("l jS \of F Y") ?>">
         </div>
         <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" name="add_notices" class="btn btn-primary pull-right">Add Notice</button>
          </div>
        </form>
       </div>
      <!-- /.box -->
       </section>
       <section class="col-lg-8">
        <div class="box box-success">
         <table class="table table-hover table-border">
           <thead>
             <tr>
               <th>No</th>
               <th>Notice Title</th>
               <th>Date</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>
            <?php
                 $i = 0;
                 $notice_show = $notice->showAllNotices();
                 if ($notice_show) {
                   while ($show_result = $notice_show->fetch_assoc()) {
                    $i++;
            ?>
             <tr>
               <td><?php echo $i; ?></td>
               <td width="50%"><a href="../<?php echo $show_result['notice_pdf']; ?>" target="_blank"><?php echo $show_result['notice_title'] ?></a></td>
               <td><?php echo $show_result['date_time'] ?></td>
               <td style="color: #3C8DBC;text-align: center;"><a href="?noticeDelete=<?php echo $show_result['id'] ?>"><i class="fa fa-trash"></i></a></td>
             </tr>
            <?php } }else{ ?>
             <tr>
               <td>0</td>
               <td width="50%">Notice Field is Empty</td>
               <td><?php echo date("l jS \of F Y") ?></td>
               <td></td>
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
