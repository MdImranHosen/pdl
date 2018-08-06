<?php include "inc/header.php"; ?>
<?php
/*$con_us = new Contact();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
  $get_userMess = $con_us->getMessageFromUser($_POST);
}
*/
?>
<link rel="stylesheet" type="text/css" href="admin/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="admin/css/demo.css" />
<link rel="stylesheet" type="text/css" href="admin/css/component.css" />
<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>

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
    <?php include 'inc/content-header.php'; ?>

    <!-- Main content -->
  <section class="content contact_us_page_background_image">
      <div class="row">
  <!-- Traning private Detective -->
     
    
  <!--End a pdl007.com body design with banner-->
        <div class="col-lg-12 connectedSortable">
           <span id="state"></span>
          <!-- quick email widget -->
          <div class="box box-info contact_us_fback_img">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Only CV Send</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="This Message From Hidden.">
                  <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
              <h3>Your CV with image</h3>
            <div class="box-body">
                <div class="form-group">
                  <input type="file" name="file-7[]" id="file-7" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
                 <label for="file-7"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a CV file&hellip;</strong></label>
                    <button type="button" id="userMessage" name="userMessage" class="pull-right btn btn-danger"> Send CV
                <i class="fa fa-arrow-circle-right"></i></button>
                    <!-- <span class="pull-right"><b>Your CV size < 4MB (Pdf, docx, doc)</b></span> -->
               </div>
            </div>
            <div class="box-footer clearfix contact_us_fback_img_send">
              
            </div>
            </form>
            <!--  Demo -->

            <!-- End -->
          </div>

        </div>
        <!-- /.col -->

<!-- Traning private Detective -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script src="admin/js/custom-file-input.js"></script>
<?php include "inc/footer.php"; ?>
