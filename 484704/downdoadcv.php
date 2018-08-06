<?php 
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; Filename= word.doc");
?>
<?php include "inc/header.php"; ?>
<?php
  # Shop List Delete Action Get....
 if (isset($_GET['wordCvDownload']) && $_GET['wordCvDownload']) {
    $id = preg_replace('/\D/', '', $_GET['wordCvDownload']);
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['wordCvDownload']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
   if (!filter_var($id, FILTER_VALIDATE_INT) == true) {
      header('Location:index.php');
    }else{
    $getResultCv = $app_from->getJobApplicatonCvView($id);
    }
 }

?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <div class="content-wrapper">
  <section class="content-header">
          <h1>Curriculum vitae</h1>
  </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
         <?php 
             if ($getResultCv) {
               while ($result = $getResultCv->fetch_assoc()) {
            ?>

        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">ব্যাক্তির নিজের সম্পর্কে</h3>
            </div>
            <!-- /.box-header -->
           
              <div class="box-body">
                <table>
                  <tr>
                    <td>নাম : </td>
                    <td> <span class="fontsizecv"> <?php echo $result['name1'] ?></span></td>
                  </tr>
                  <?php 
                    if (!$result['designation76'] == '') {
                  ?>
                  <tr>
                    <td>পদের নাম : </td>
                    <td> <span class="fontsizecv"> <?php echo $result['designation76'] ?></span></td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td>ইমেইল এডড্রেস : </td>
                    <td> <span class="fontsizecv"> <?php echo $result['email2'] ?></span></td>
                  </tr>
                  <?php 
                    if (!$result['facebookId58'] == '') {
                  ?>
                  <tr>
                    <td>ফেসবুক আইডি : </td>
                    <td> <span class="fontsizecv"> <?php echo $result['facebookId58'] ?></span></td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td>জন্মতারিখ : </td>
                    <td> <span class="fontsizecv"> <?php echo $result['age3'] ?></span></td>
                  </tr>
                  <tr>
                    <td>ফোন নাম্বার : </td>
                    <td> <span class="fontsizecv">+88 <?php echo $result['phone4'] ?></span></td>
                  </tr>
                  <?php 
                    if (!$result['nid6'] == '') {
                  ?>
                  <tr>
                    <td>জাতীয় পরিচয় নম্বর : </td>
                    <td><span class="fontsizecv"> <?php echo $result['nid6'] ?></span></td>
                  </tr>
                   <?php } if (!$result['gender81'] == '') {
                  ?>
                  <tr>
                    <td>লিঙ্গ : </td>
                    <td><span class="fontsizecv"><?php 
                        if ($result['gender81'] == 1) {
                          echo "পুরুষ";
                        }elseif($result['gender81'] == 2){
                          echo "মহিলা";
                        }
                     ?></span></td>
                  </tr>
                  <?php }  if (!$result['religion82'] == '') {
                  ?>
                  <tr>
                    <td>ধর্ম : </td>
                    <td><span class="fontsizecv"><?php echo $result['religion82'] ?></span></td>
                  </tr>
                  <?php } ?>

                  <tr>
                    <td>বৈবাহিক অবস্থা : </td>
                    <td> <span class="fontsizecv"> <?php echo $result['married7'] ?></span></td>
                  </tr>
                   <?php  if ($result['politic8'] == 1) { ?>
                  <tr>
                    <td>রাজনৈতিক সম্পৃক্ততা :- </td>
                    <td> <span class="fontsizecv"> <?php echo 'হ্যাঁ'; ?></span></td>
                  </tr>
                  <?php } ?>
                </table>
                <?php 
                  if (!$result['politic_d9'] == '') {
                 ?>
                <div class="form-group">
                  <label><u>বিস্তারিত : </u></label>
                  <p><span class="fontsizecv"> <?php echo $result['politic_d9']; ?></span></p>
              </div>
              <?php } ?>

              <table>
                <?php
                 if ($result['disease59']  == 1) {
                ?>
                <tr>
                  <td>পূর্বে কোন জটিল রোগ ছিল কিনা :- </td>
                  <td><span class="fontsizecv"> <?php echo 'হ্যাঁ'; ?></span></td>
                </tr>
                <?php } if ($result['diseasep60']  == 1) { ?>
                <tr>
                  <td>বর্তমানে কোন রোগে ভুগছেন কিনা :- </td>
                  <td><span class="fontsizecv"> <?php echo 'হ্যাঁ'; ?></span></td>
                </tr>
                <?php } ?>
              </table>
              <?php 
                  if (!$result['diseased61'] == '') {
                 ?>
                <div class="form-group">
                  <label><u>বিস্তারিত : </u></label>
                  <p><span class="fontsizecv"><?php echo $result['diseased61']; ?></span></p>
              </div>
              <?php } ?>
              </div>
          </div>
          <!-- /.box -->
          
          <!-- Form Element sizes -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">শিক্ষাগত যোগ্যতা</h3>
            </div>
            <div class="box-body">
              <label><u> এসএসসি </u> :  </label>
              <table>
                <tr>
                  <td>প্রতিষ্ঠানের নাম : </td>
                  <td><span class="fontsizecv"> <?php echo $result['sscpn10'] ?></span></td>
                </tr>
                <tr>
                  <td>বিভাগ : </td>
                  <td><span class="fontsizecv"> <?php echo $result['sscd11'] ?></span></td>
                </tr>
                <tr>
                  <td>গ্রেট : </td>
                  <td><span class="fontsizecv"> <?php echo $result['sscg12'] ?></span></td>
                </tr>
                <?php 
                    if (!$result['sscpassingyear83'] == '') {
                  ?>
                  <tr>
                    <td>পাশের সাল : </td>
                    <td><span class="fontsizecv"><?php echo $result['sscpassingyear83'] ?></span></td>
                  </tr>
                  <?php } ?>
              </table>
              <br>
              <label><u> এইচ এস সি বা ডিপ্লোমা </u> :  </label>
              <table>
                <tr>
                  <td>প্রতিষ্ঠানের নাম : </td>
                  <td><span class="fontsizecv"> <?php echo $result['hscpn13'] ?></span></td>
                </tr>
                <tr>
                  <td>বিভাগ : </td>
                  <td><span class="fontsizecv"> <?php echo $result['hscd14'] ?></span></td>
                </tr>
                <tr>
                  <td>গ্রেট : </td>
                  <td><span class="fontsizecv"> <?php echo $result['hscg15'] ?></span></td>
                </tr>
                <?php 
                    if (!$result['hscyar84'] == '') {
                  ?>
                  <tr>
                    <td>পাশের সাল : </td>
                    <td><span class="fontsizecv"><?php echo $result['hscyar84'] ?></span></td>
                  </tr>
                  <?php } ?>
              </table>
              <br>
                 <?php 
                  if (!$result['gpn16'] == '') {
                 ?>
              <label><u> গ্রাজুয়েট </u> :  </label>
              <table>
                <tr>
                  <td>প্রতিষ্ঠানের নাম : </td>
                  <td><span class="fontsizecv"> <?php echo $result['gpn16'] ?></span></td>
                </tr>
                <tr>
                  <td>বিভাগ : </td>
                  <td><span class="fontsizecv"> <?php echo $result['gdiv17'] ?></span></td>
                </tr>
                <tr>
                  <td>গ্রেট/CGPA : </td>
                  <td><span class="fontsizecv"> <?php echo $result['gcgpa18'] ?></span></td>
                </tr>
                <?php 
                    if (!$result['cgpapy84'] == '') {
                  ?>
                <tr>
                  <td>পাশের সাল : </td>
                  <td><span class="fontsizecv"><?php echo $result['cgpapy84'] ?></span></td>
                </tr>
                <?php } ?>
              </table>
                <?php } ?>
               <?php 
                  if (!$result['e_orther19'] == '') {
                 ?>
              <div class="form-group">
                  <label><u>অন্যান্য : </u></label>
                  <p><span class="fontsizecv"> <?php 
                    if (!$result['e_orther19'] == '') {
                      echo $result['e_orther19'];
                    } else{
                      echo 'নাই';
                    }
                    

                     ?></span></p>
              </div>
               <?php } ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">পেশাগত অভিজ্ঞতা</h3>
            </div>
            <div class="box-body">
              <table>
                <tr>
                  <td>বর্তমান পেশা : </td>
                  <td><span class="fontsizecv"> <?php echo $result['p_profession20'] ?></span></td>
                </tr>
                <?php
                    if (!$result['past_profession21'] == '') {
                 ?>
                <tr>
                  <td>অতীতের পেশা : </td>
                  <td><span class="fontsizecv"> <?php echo $result['past_profession21'] ?></span></td>
                </tr>
                 <?php } ?>
                <tr>
                  <td>বাৎসরিক আয়ের পরিমাণ : </td>
                  <td><span class="fontsizecv"> <?php echo $result['income22'] ?></span></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">বর্তমান ঠিকানা</h3>
            </div>
            <div class="box-body">
              <table>
                <tr>
                  <td>জেলা : </td>
                  <td><span class="fontsizecv"> <?php echo $result['p_district23'] ?></span></td>
                </tr>
                <tr>
                  <td>থানা / উপজেলা : </td>
                  <td><span class="fontsizecv"> <?php echo $result['p_thana24'] ?></span></td>
                </tr>
                <tr>
                  <td>গ্রাম / বাড়ি নম্বর , রাস্তা নম্বর : </td>
                  <td><span class="fontsizecv"> <?php echo $result['p_house_number25'] ?></span></td>
                </tr>
                <tr>
                  <td>বর্তমান বাড়ি : </td>
                  <td><span class="fontsizecv"><?php
                   if ($result['house64'] == 1) {
                     echo "ভাড়া বাড়ি";
                   }elseif($result['house64'] == 2){
                     echo "নিজের বাড়ি";
                   }
                     ?></span></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">স্থায়ী ঠিকানা</h3>
            </div>
            <div class="box-body">
              <table>
                <tr>
                  <td>জেলা : </td>
                  <td><span class="fontsizecv"> <?php echo $result['par_district26'] ?></span></td>
                </tr>
                <tr>
                  <td>থানা / উপজেলা : </td>
                  <td><span class="fontsizecv"> <?php echo $result['par_thana27'] ?></span></td>
                </tr>
                <tr>
                  <td>গ্রাম / বাড়ি নম্বর , রাস্তা নম্বর : </td>
                  <td><span class="fontsizecv"> <?php echo $result['par_house_number28'] ?></span></td>
                </tr>
                <tr>
                  <td>স্থায়ী বাড়ি : </td>
                  <td><span class="fontsizecv"><?php
                   if ($result['house65'] == 1) {
                     echo "ভাড়া বাড়ি";
                   }elseif($result['house65'] == 2){
                     echo "নিজের বাড়ি";
                   }
                     ?></span></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

        </div>
        <!--/.col (left) -->

        <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          
          <!-- /.box -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">পরিবার সম্পর্কে </h3>
            </div>
              <div class="box-body">
                <table>
                  <tr>
                    <td>পিতার নাম: </td>
                    <td><span class="fontsizecv"> <?php echo $result['father_name29'] ?></span></td>
                  </tr>
                  <tr>
                    <td>পিতার পেশা: </td>
                    <td><span class="fontsizecv"> <?php echo $result['father_professional30'] ?></span></td>
                  </tr>
                    <?php
                      if (!$result['brother_h31'] == '' || !$result['brother_h31'] == 0) {
                    ?>
                  <tr>
                    <td>ভাই কত জন: </td>
                    <td><span class="fontsizecv"> <?php echo $result['brother_h31']; ?></span></td>
                      
                  </tr>
                   <?php } ?>
                   <?php
                      if (!$result['sister_h32'] == '' || !$result['sister_h32'] == 0) {
                    ?>
                  <tr>
                    <td>বোন কত জন: </td>
                    <td><span class="fontsizecv"> <?php  echo $result['sister_h32']; ?></span></td>
                  </tr>
                   <?php } ?>
                   <?php
                      if (!$result['p_bro_sister33'] == '' || !$result['p_bro_sister33'] == 0) {
                    ?>
                  <tr>
                    <td>ভাই বোনদের মধ্যে আপনার অবস্থান: </td>
                    <td><span class="fontsizecv"> <?php echo $result['p_bro_sister33']; ?></span></td>
                  </tr>
                  <?php } ?>
                </table>
                
              <?php 
                  if (!$result['bro_sister_occ34'] == '') {
               ?>
              <div class="form-group">
                  <label><u>ভাই বোনদের নাম ও পেশার বিস্তারিত:- </u></label>
                  <p><span class="fontsizecv"> <?php echo $result['bro_sister_occ34']; ?></span></p>  
              </div>
               <?php 
                    }
                  if (!$result['g_p_rab_army35'] == '') {
               ?>
              <div class="form-group">
                  <label><u>ভাই বোন ও নিকট আত্মীয় স্বজনদের মধ্যে পালিশ, আর্মি , র‌্যাব, বিজিবি ও সরকারি গোয়েন্দা সংস্থায় কর্মরত বা অবসর প্রাপ্ত থাকলে তাদের নাম সহ বিস্তারিত লিখন :</u></label>
                  <p><span class="fontsizecv"> <?php echo $result['g_p_rab_army35']; ?></span>
                  </p> 
              </div>
               <?php } ?>
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">পরিদর্শন কৃত স্থান</h3>
            </div>
            <!-- /.box-body -->
           <div class="box-body">
               <div class="form-group">
                  <label><u>পরিদর্শন কৃত জেলা গুলোর নাম: </u></label>
                  <p><span class="fontsizecv"> <?php
                      if (!$result['visited_district36'] == '') {
                        echo $result['visited_district36'];
                      }else{
                        echo 'নাই';
                      }
                        
                    ?></span>
                  </p> 
              </div>
               <?php 
                  if (!$result['visited_country37'] == '') {
               ?>
              <div class="form-group">
                  <label><u>পরিদর্শন কৃত দেশ গুলোর নাম: </u></label>
                  <p><span class="fontsizecv"> <?php echo $result['visited_country37']; ?></span></p> 
              </div>
              <?php } ?>
            </div>
            <!-- /.box-body -->

          </div>

          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">সাধারণ দক্ষতা </h3>
            </div>
            <!-- /.box-body -->
           <div class="box-body">
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <table>
                     <?php if (!$result['report_writing38'] == 0) { ?>
                      <tr>
                        <td>প্রতিবেদন লেখা : </td>
                        <td><span class="fontsizecv"> <?php echo 'হাঁ'; ?></span></td>
                     </tr>
                     <?php } if (!$result['cooking41'] == 0) { ?>
                      <tr>
                        <td>রান্না করা: </td>
                        <td><span class="fontsizecv"><?php echo 'হাঁ'; ?></span></td>
                      </tr>
                        <?php } if (!$result['hand_drilling43'] == 0) { ?>
                      <tr>
                        <td>হাত ড্রিলিং: </td>
                        <td><span class="fontsizecv"> <?php echo 'হাঁ'; ?></span></td>
                      </tr>
                      <?php } if (!$result['dress_making42'] == 0) { ?>
                      <tr>
                        <td>পোষাক তৈরি: </td>
                        <td><span class="fontsizecv"> <?php echo 'হাঁ'; ?></span></td>
                      </tr>
                      <?php } if (!$result['electrical_wiring40'] == 0) { ?>
                      <tr>
                       <td>ইলেকট্রিক্যাল ওয়্যারিং : </td>
                       <td><span class="fontsizecv"><?php echo 'হাঁ'; ?></span></td>
                     </tr>
                     <?php } if (!$result['exercise49'] == 0) {  ?>
                     <tr>
                      <td>ব্যায়াম: </td>
                      <td><span class="fontsizecv"><?php echo 'হাঁ'; ?></span></td>
                     </tr>
                      <?php } ?>
                    </table>
                  </div>

                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <table>
                      <?php if (!$result['detective_book39'] == 0) { ?>
                      <tr>
                       <td>গোয়েন্দা বই পড়া : </td>
                       <td><span class="fontsizecv"><?php echo 'হাঁ'; ?></span></td>
                     </tr>
                     <?php } if (!$result['shooter50'] == 0) { ?>
                     <tr>
                       <td>শ্যুটার : </td>
                       <td><span class="fontsizecv"><?php echo 'হাঁ'; ?></span></td>
                     </tr>
                     <?php } if (!$result['song45'] == 0) { ?>
                      <tr>
                        <td>গান করা: </td>
                        <td><span class="fontsizecv"> <?php echo 'হাঁ'; ?></span></td>
                      </tr>
                      <?php } if (!$result['dance46'] == 0) { ?>
                      <tr>
                          <td>নাচ করা: </td>
                          <td><span class="fontsizecv"> <?php echo 'হাঁ'; ?></span></td>
                      </tr>
                      <?php } if (!$result['actor47'] == 0) { ?>
                      <tr>
                          <td>অভিনয় করা: </td>
                          <td><span class="fontsizecv"> <?php echo 'হাঁ'; ?></span></td>
                      </tr>
                      <?php } if (!$result['poem48'] == 0) { ?>
                      <tr>
                          <td>কবিতা: </td>
                          <td><span class="fontsizecv"> <?php echo 'হাঁ'; ?></span></td>
                      </tr>
                      <?php } ?>
                    </table>
                  </div>
                </div>
             <?php if (!$result['driving44'] == 0) { ?>
              <div class="row">
                <div class="col-xs-12">
                  <table>
                      <tr>
                          <td>চালক যেমন সাইকেল, মোটরসাইকেল, কার: </td>
                          <td><span class="fontsizecv"><?php echo 'হাঁ'; ?></span></td>
                      </tr>
                  </table>
                </div>
              </div>
              <?php } if (!$result['owncar66'] == 0) { ?>
              <div class="row">
                <div class="col-xs-12">
                  <table>
                      <tr>
                          <td>নিজের গাড়ি আছে : </td>
                          <td><span class="fontsizecv"><?php echo 'হাঁ'; ?></span></td>
                      </tr>
                  </table>
                </div>
              </div>
              <?php } if ($result['computer62'] == 1) { ?>
              <div class="row">
                <div class="col-xs-12">
                  <table>
                      <tr>
                          <td>কম্পিউটার চালনায় পারদর্শিতা: </td>
                          <td>
                            <span class="fontsizecv"><?php echo 'হাঁ'; ?></span>
                          </td>
                      </tr>
                  </table>
                </div>
              </div>
              <?php } if (!$result['computerd63'] == '') { ?>
              <div class="row">
                <div class="col-xs-12">
                  <label><u>কি কি জানেন তার বিবরণ :</u></label>
                  <p><span class="fontsizecv"> <?php echo $result['computerd63']; ?></span></p>
                </div>
              </div>
               <?php } if (!$result['otrher_know51'] == '') { ?>
              <div class="row">
                <div class="col-xs-12">
                  <label><u>অন্যান্য :</u></label>
                  <p><span class="fontsizecv"> <?php echo $result['otrher_know51']; ?></span></p>
                </div>
              </div>
              <?php } ?>
            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">স্থানীয় অভিভাবক: </h3>
            </div>
            <!-- /.box-body -->
           <div class="box-body">
                  <table>
                    <tr>
                      <td>অভিভাবকের নাম: </td>
                      <td><span class="fontsizecv"> <?php echo $result['local_guardian52'] ?></span></td>
                    </tr>
                    <tr>
                      <td>ফোন নম্বর: </td>
                      <td><span class="fontsizecv"> <?php echo $result['guardian_phone53'] ?></span></td>
                    </tr>
                    <tr>
                      <td>সম্পর্ক: </td>
                      <td><span class="fontsizecv"> <?php echo $result['relation54'] ?></span></td>
                    </tr>
                    <?php  
                      if (!$result['guardian_address55'] == '') {
                    ?>
                    <tr>
                      <td>ঠিকানা: </td>
                      <td><span class="fontsizecv"> <?php echo $result['guardian_address55'] ?></span></td>
                    </tr>
                    <?php } ?>
                    <?php  
                      if (!$result['guardian_profession56'] == '') {
                    ?>
                    <tr>
                      <td>পেশা: </td>
                      <td><span class="fontsizecv"> <?php echo $result['guardian_profession56'] ?></span></td>
                    </tr>
                    <?php } ?>
                    <?php  
                      if (!$result['guardian_age57'] == '') {
                    ?>
                    <tr>
                      <td>বয়স: </td>
                      <td><span class="fontsizecv"> <?php echo $result['guardian_age57'] ?></span></td>
                    </tr>
                     <?php } ?>
                  </table>
            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->

        </div>
       <?php } } ?>
      </div>
      <!-- /.row -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


   <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Develop by </b> Techo Group
    </div>
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a target="_blank" href="https://pdl007.com">WWW.PDL007.COM</a>.</strong> All rights
    reserved.
  </footer>
  <!-- /.content-wrapper -->
<?php include "inc/footer.php"; ?>
