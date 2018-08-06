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
.carousel-inner>.item>a>img, .carousel-inner>.item>img {
    line-height: 1;
    height: 255px !important;
    width: 100%;
}

.noticesallstyle{
 background-color:#000;
 color:#fff;
 padding: 5px;
 border: 1px dotted #ccc;
}
.noticesallstyle:hover{opacity: 0.6;color: #fff;}
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
    <section class="content">
       <div class="row">
        <section class="col-lg-8">
          <div class="box box-body">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="upload/slider/2558.png" alt="First slide">

                    <div class="carousel-caption slider_text">
                      <h3>প্রাইভেট ডিটেকটিভ লিমিটেড ।</h3>
                      <p>অপরাধ দমনে জনগণ ও সরকারকে সহযোগিতা করাই আমাদের লক্ষ্য !</p>
                    </div>
                  </div>
                  <div class="item">
                    <a href="https://www.pdnewsbd.com" target="_blank"><img src="upload/slider/2557.jpg" alt="Second slide"></a>

                    <div class="carousel-caption slider_text">
                      <h3>www.pdnewsbd.com</h3>
                      <p>Online News Paper Website.</p>
                    </div>
                  </div>
                  <div class="item">
                    <a href="applicationFrom.php"><img src="upload/slider/2559.png" alt="Third slide"></a>
                    <div class="carousel-caption slider_text">
                     <h3>Private Detective</h3>
                     <p>we search truth behind the crime.</p>
                    </div>
                  </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
              </div>

              <!-- Carousel end style... -->

        <!-- </section>
       

        <section class="col-lg-8"> -->
          <article style="border: 2px solid #ddd; margin-top: 10px;padding-top: 10px;padding: 8px;">
            <h3>নোটিশ বোর্ড</h3>
          <ol class="list-group">
              <?php 
                $notice_result = $notice->showlimitNotices();
                if ($notice_result) {
                  while ($n_result = $notice_result->fetch_assoc()) {
              ?>
              <a href="<?php echo $n_result['notice_pdf']; ?>" target="_blank" class="list-group-item list-group-item-success">
                <img src="upload/background/notics_icon.png"> <?php echo $n_result['notice_title']; ?> <span class="badge"><?php echo $n_result['date_time']; ?></span></a>
              <?php } }else{  echo "Notices Page is Empty!"; } ?>
          </ol>
           <a class="btn right noticesallstyle" href="notice.php" title="সকল নোটিশ">সকল নোটিশ</a>
         </article>

        </section>
 <section class="col-lg-4">
  <div class="box box-body">
    <iframe width="100%" height="255" src="https://www.youtube.com/embed/T7svYDftET0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
  </div>
<!-- </section>
<section class="col-lg-4"> -->
  <div class="box box-body">
    <iframe width="100%" height="255" src="https://www.youtube.com/embed/4v6HAQb1bn4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
  </div>
</section>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footer.php"; ?>
