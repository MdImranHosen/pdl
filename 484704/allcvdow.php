<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') {
  header("Location:index.php");
} ?>
<body class="hold-transition skin-blue sidebar-mini" onload="window.print()">
  <!-- allcvdow.php -->
<div class="wrapper">
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
               <table class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>District</th>
                  <th>Upazila</th>
                  <th>Deg.</th>
                </tr>
                </thead>
                <tbody>
                <?php
                     $getShortList = $app_from->getAllCvImportents();
                     if ($getShortList) {
                       while ($result = $getShortList->fetch_assoc()) {
                ?>
                <tr>
                  <td><?php echo $result['name1']; ?></td>
                  <td>+88<?php echo $result['phone4']; ?></td>
                  <td><?php echo $result['email2']; ?></td>
                  <td><?php echo $result['p_district23']; ?></td>
                  <td><?php echo $result['p_thana24']; ?></td>
                  <td><?php echo $result['designation76']; ?></td>
                </tr>
                 <?php } } ?>
                </tbody>
              </table>
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
