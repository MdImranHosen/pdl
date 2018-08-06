<?php
include "inc/header.php"; 
include 'classes/Notices.php';
$notice = new Notices();

?>
<style>
.background_color_red {
	background-color: #4267b2 !important;
}
p.body-text-style{
  font-size: 20px;
}
</style>
<body class="hold-transition skin-blue sidebar-mini" >
<div class="wrapper">
  <?php include "inc/header_bottom.php"; ?>
<!--SideBar Start-->
  <?php include "inc/sidebar.php"; ?>
<!--SideBar End-->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include 'inc/content-header.php'; ?>

    <!-- Main content -->
    <section class="content connectedSortable">
       <div class="row private_detective_jobs_body">
        <section class="col-lg-12 private_body_padding">
          <div class="callout text-center private_detective_jobs_text background_color_red font-weight-normal">
            <h2>নোটিশ</h2>
          </div>
        </section>

        <section class="col-lg-12">
         <article>
          <ol class="list-group">
              <?php 
                $notice_result = $notice->showAllNotices();
                if ($notice_result) {
                  while ($n_result = $notice_result->fetch_assoc()) {
              ?>
              <a href="<?php echo $n_result['notice_pdf']; ?>" target="_blank" class="list-group-item list-group-item-success">
                <i class="fa fa-circle"></i> <?php echo $n_result['notice_title']; ?> <span class="badge"><?php echo $n_result['date_time']; ?></span></a>
              <?php } }else{  echo "Notices Page is Empty!"; } ?>
          </ol>
         </article>
        </section>

      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footer.php"; ?>
