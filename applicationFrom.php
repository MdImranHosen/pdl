<?php include "inc/header.php"; ?>
<?php
$app_from = new ApplicationFrom();
if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST['submit'])) {
  $getApplicationFrom = $app_from->getApplicationFromSubmit($_POST, $_FILES);
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
      <div class="text-center style_head_text">
      <h1>আবেদন ফরম </h1>
        <small>অপরাধ দমনে জনগণ ও সরকারকে সহযোগিতা করাই আমাদের লক্ষ্য</small>
        <p> * সাইন কৃত ইনপুট ফিল্ড গুলো অবশ্যই পূরণ করতে হবে !</p>
     </div>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
         <div class="text-center">
              <?php
                  if (isset($getApplicationFrom)) {
                    echo $getApplicationFrom;
                  }
              ?>
            </div>
      <div class="row">
        <!-- left column -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data" >
        <section class="col-lg-6  connectedSortable">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">ব্যাক্তির নিজের সম্পর্কে</h3>
            </div>
            <!-- /.box-header -->
              <div class="box-body">
                <div class="form-group">
                  <label>নাম :</label> <span class="scolor">*</span>
                  <input type="text" class="form-control" id="name1" name="name1" placeholder="প্রার্থীর নাম." maxlength="50">
                </div>
                <div class="form-group">
                  <label>পদের নাম :</label> <span class="scolor">*</span>
                  <input type="text" class="form-control" id="designation76" name="designation76" placeholder=" Designation "  maxlength="50">
                </div>
                <div class="form-group">
                  <label>ইমেইল : </label> <span class="scolor">*</span>
                  <input type="email" class="form-control" id="email2" name="email2" placeholder="example@gmail.com "  maxlength="30">
                </div>
                <div class="form-group">
                  <label>ফেসবুক আইডি : </label>
                  <input type="text" class="form-control" id="facebookId58" name="facebookId58" placeholder="http://www.facebook.com/Username"  maxlength="100">
                </div>
                <div class="form-group">
                  <label>জন্ম তারিখ :</label> <span class="scolor">*</span>
                  <input type="text" class="form-control" name="age3" value="<?php echo date('m/d/Y'); ?>" id="datepicker"  maxlength="50">
                </div>
                <div class="form-group">
                  <label>ফোন :</label> <span class="scolor">*</span>
                  <span style="font-size: 18px;">+88</span> <input type="number" onkeypress="return isNumberKey(event)" style="padding: 5px;"  id="phone4" name="phone4" placeholder="01900 000000"  maxlength="16">
                </div>
                <div class="form-group">
                  <label>প্রার্থীর ছবি (৩০০px*৩০০px) এবং সাইজ ২ এম্বি এর কম :</label> <span class="scolor">*</span>
                  <input type="file" name="image5" id="image5" accept="image/png, image/jpeg, image/gif">
                </div>
                <div class="form-group">
                  <label>জাতীয় পরিচয় নম্বর :</label>
                  <input type="number" onkeypress="return isNumberKey(event)" class="form-control" id="nid6" name="nid6" placeholder="519990000 5000" maxlength="16">
                </div>
                <div class="form-group">
                  <label>লিঙ্গ : </label> <span class="scolor">*</span>
                   <label class="radio-inline"><input type="radio" name="gender81" value="1">পুরুষ</label>
                   <label class="radio-inline"><input type="radio" name="gender81" value="2">মহিলা</label>
                </div>
                <div class="form-group">
                  <label>ধর্ম :</label> <span class="scolor">*</span>
                  <input type="text" class="form-control" name="religion82" placeholder=" ধর্ম"  maxlength="50">
                </div>
                <div class="form-group">
                  <label>বৈবাহিক অবস্থা : </label> <span class="scolor">*</span>
                   <label class="radio-inline"><input type="radio" name="married7" value="বিবাহিত">বিবাহিত</label>
                   <label class="radio-inline"><input type="radio" name="married7" value="অবিবাহিত">অবিবাহিত</label>
                   <label class="radio-inline"><input type="radio" name="married7" value="একক">একক</label> 
                </div>
                <div class="form-group">
                  <label>রাজনৈতিক সম্পৃক্ততা: </label> <span class="scolor">*</span>
                   <label class="radio-inline"><input type="radio" name="politic8" data-toggle="collapse" data-target=".collapseOne:not(.in)" value="1" >হ্যাঁ </label>
                   <label class="radio-inline"><input type="radio" name="politic8" data-toggle="collapse" data-target=".collapseOne.in" value="2"> না</label>
                </div>

                <div class="form-group collapseOne  collapse">
                  <label>রাজনৈতিক সম্পৃক্ততার বিস্তারিত:</label>
                  <textarea class="form-control" rows="3" id="politic_d9" name="politic_d9" placeholder="রাজনৈতিক সম্পৃক্ততার বিস্তারিত.."></textarea>
                </div>
                <div class="form-group">
                  <label>পূর্বে কোন জটিল রোগ ছিল কিনা : </label> <span class="scolor">*</span>
                   <label class="radio-inline"><input type="radio" name="disease59" value="1">হ্যাঁ</label>
                   <label class="radio-inline"><input type="radio" name="disease59" value="2">না</label>
                </div>
                <div class="form-group">
                  <label>বর্তমানে কোন রোগে ভুগছেন কিনা : </label><span class="scolor">*</span>
                   <label class="radio-inline"><input type="radio" name="diseasep60" data-toggle="collapse" data-target=".diseasedOne:not(.in)" value="1" >হ্যাঁ </label>
                   <label class="radio-inline"><input type="radio" name="diseasep60" data-toggle="collapse" data-target=".diseasedOne.in" value="2"> না</label>
                </div>
                <div class="form-group diseasedOne collapse">
                  <label>যেমন: ডায়াবেটিস, হাই প্রেসার, অনন্য তার বিস্তারিত:</label>
                  <textarea class="form-control" rows="3" id="diseased61" name="diseased61" placeholder=" বিস্তারিত.."></textarea>
                </div>
              </div>
          </div>
          <!-- /.box -->
          
          <!-- Form Element sizes -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">শিক্ষাগত যোগ্যতা</h3>
            </div>
            <div class="box-body">
              <label><strong> এসএসসি : </strong></label> <span class="scolor">*</span>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                  <label>প্রতিষ্ঠানের নাম : </label><span class="scolor">*</span>
                  <input type="text" class="form-control" id="sscpn10" name="sscpn10" placeholder="প্রতিষ্ঠানের নাম" maxlength="200">
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                  <label>বিভাগ : </label><span class="scolor">*</span>
                  <input type="text" class="form-control" id="sscd11" name="sscd11" placeholder="বিভাগ" maxlength="50">
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                  <label>গ্রেড : </label><span class="scolor">*</span>
                  <input type="text" class="form-control" id="sscg12" name="sscg12" placeholder="গ্রেড" maxlength="20">
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                  <label>পাশের সাল : </label><span class="scolor">*</span>
                  <input type="number" onkeypress="return isNumberKey(event)" class="form-control" name="sscpassingyear83" placeholder="পাশের সাল" maxlength="20">
                </div>
              </div><br>

              <label><strong> এইচ এস সি বা ডিপ্লোমা : </strong></label> <span class="scolor">*</span>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                  <label>প্রতিষ্ঠানের নাম : </label><span class="scolor">*</span>
                  <input type="text" class="form-control" name="hscpn13" id="hscpn13" placeholder="প্রতিষ্ঠানের নাম" maxlength="200">
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                  <label>বিভাগ : </label><span class="scolor">*</span>
                  <input type="text" class="form-control" name="hscd14" id="hscd14" placeholder="বিভাগ" maxlength="50">
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                  <label>গ্রেড : </label><span class="scolor">*</span>
                  <input type="text" class="form-control" name="hscg15" id="hscg15" placeholder="গ্রেড" maxlength="20">
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                  <label>পাশের সাল : </label><span class="scolor">*</span>
                  <input type="number" onkeypress="return isNumberKey(event)" class="form-control" name="hscyar84" placeholder="পাশের সাল" maxlength="20">
                </div>
              </div><br>
              <label><strong> গ্রাজুয়েট : </strong></label>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                   <label>প্রতিষ্ঠানের নাম : </label>
                  <input type="text" class="form-control" name="gpn16" id="gpn16" placeholder="প্রতিষ্ঠানের নাম" maxlength="200">
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                  <label>বিভাগ : </label>
                  <input type="text" class="form-control" name="gdiv17" id="gdiv17" placeholder="বিভাগ" maxlength="90">
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                  <label>গ্রেড/CGPA : </label>
                  <input type="text" class="form-control" name="gcgpa18" id="gcgpa18" placeholder="গ্রেড/CGPA" maxlength="50">
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                  <label>পাশের সাল : </label>
                  <input type="number" onkeypress="return isNumberKey(event)" class="form-control" name="cgpapy84" placeholder="পাশের সাল" maxlength="20">
                </div>
              </div>
              <div class="form-group">
                  <label>অন্যান্য</label>
                  <textarea class="form-control" rows="3" name="e_orther19" id="e_orther19" placeholder="উচ্চ লেভেলের শিক্ষা ..."></textarea>
              </div>
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
              <div class="form-group">
                  <label>বর্তমান পেশা :</label> <span class="scolor">*</span>
                  <input type="text" class="form-control" id="p_profession20" name="p_profession20" placeholder="আপনার বর্তমান পেশা" maxlength="100">
              </div>
              <div class="form-group">
                  <label>অতীতের পেশা :</label>
                  <input type="text" class="form-control" id="past_profession21" name="past_profession21" placeholder="আপনার অতীতের পেশা" maxlength="100">
                </div>
              <div class="form-group">
                  <label>বাৎসরিক আয়ের পরিমাণ</label> <span class="scolor">*</span>
                  <select class="form-control selectedStyle" name="income22" id="income22">
                    <option value="" style="display: none" selected hidden>নির্বাচন করুন</option>
                    <option value="৫০০০০ থেকে ১০০০০০ টাকা ">৫০০০০ থেকে ১০০০০০ টাকা </option>
                    <option value="১০০০০০ থেকে ২০০০০০ টাকা ">১০০০০০ থেকে ২০০০০০ টাকা </option>
                    <option value="২০০০০০ থেকে ৩৫০০০০ টাকা ">২০০০০০ থেকে ৩৫০০০০ টাকা </option>
                    <option value="৩৫০০০০ থেকে ৫০০০০০ টাকা ">৩৫০০০০ থেকে ৫০০০০০ টাকা </option>
                    <option value="৫০০০০০ থেকে ১০০০০০০ টাকা ">৫০০০০০ থেকে ১০০০০০০ টাকা </option>
                    <option value="১০০০০০০ থেকে ৫০০০০০০ টাকা ">১০০০০০০ থেকে ৫০০০০০০ টাকা </option>
                    <option value="৫০০০০০০ থেকে ১০০০০০০০ টাকা ">৫০০০০০০ থেকে ১০০০০০০০ টাকা</option>
                  </select>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">বর্তমান ঠিকানা</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                  <label>জেলা </label> <span class="scolor">*</span>
                  <select class="form-control selectedStyle" data-show-subtext="true" data-live-search="true" name="p_district23" id="p_district23">
                    <option value="" style="display: none" selected hidden>জেলার নাম নির্বাচন করুন</option>
                    <option value="ঢাকা">ঢাকা</option>
                    <option value="ফরিদপুর">ফরিদপুর</option>
                    <option value="টাঙ্গাইল">টাঙ্গাইল</option>
                    <option value="গাজীপুর">গাজীপুর</option>
                    <option value="গোপালগঞ্জ">গোপালগঞ্জ</option>
                    <option value="কিশোরগঞ্জ">কিশোরগঞ্জ</option>
                    <option value="মাদারিপুর">মাদারিপুর</option>
                    <option value="মানিকগঞ্জ">মানিকগঞ্জ</option>
                    <option value="মুন্সিগঞ্জ">মুন্সিগঞ্জ</option>
                    <option value="নারায়ণগঞ্জ">নারায়ণগঞ্জ</option>
                    <option value="নরসিংদী">নরসিংদী</option>
                    <option value="রাজবাড়ী">রাজবাড়ী</option>
                    <option value="শরিয়তপুর">শরিয়তপুর</option>
                    <option value="বাগেরহাট">বাগেরহাট</option>
                    <option value="চুয়াডাঙ্গা">চুয়াডাঙ্গা</option>
                    <option value="যশোর">যশোর</option>
                    <option value="ঝিনাইদহ">ঝিনাইদহ</option>
                    <option value="খুলনা">খুলনা</option>
                    <option value="কুষ্টিয়া">কুষ্টিয়া</option>
                    <option value="মাগুরা">মাগুরা</option>
                    <option value="মেহেরপুর">মেহেরপুর</option>
                    <option value="নড়াইল">নড়াইল</option>
                    <option value="সাতক্ষীরা">সাতক্ষীরা</option>
                    <option value="বান্দরবান">বান্দরবান</option>
                    <option value="ব্রাহ্মণবাড়িয়া">ব্রাহ্মণবাড়িয়া</option>
                    <option value="চাঁদপুর">চাঁদপুর</option>
                    <option value="চট্টগ্রাম">চট্টগ্রাম</option>
                    <option value="কুমিল্লা">কুমিল্লা</option>
                    <option value="কক্সবাজার">কক্সবাজার</option>
                    <option value="ফেনী">ফেনী</option>
                    <option value="খাগড়াছড়ি">খাগড়াছড়ি</option>
                    <option value="লক্ষ্মীপুর">লক্ষ্মীপুর</option>
                    <option value="নোয়াখালী">নোয়াখালী</option>
                    <option value="রাঙামাটি">রাঙামাটি</option>
                    <option value="বরগুনা">বরগুনা</option>
                    <option value="বরিশাল">বরিশাল</option>
                    <option value="ভোলা">ভোলা</option>
                    <option value="ঝালকাঠি">ঝালকাঠি</option>
                    <option value="পটুয়াখালী">পটুয়াখালী</option>
                    <option value="পিরোজপুর">পিরোজপুর</option>
                    <option value="দিনাজপুর">দিনাজপুর</option>
                    <option value="গাইবান্ধা">গাইবান্ধা</option>
                    <option value="কুড়িগ্রাম">কুড়িগ্রাম</option>
                    <option value="লালমনিরহাট">লালমনিরহাট</option>
                    <option value="নীলফামারী">নীলফামারী</option>
                    <option value="পঞ্চগড়">পঞ্চগড়</option>
                    <option value="রংপুর">রংপুর</option>
                    <option value="ঠাকুরগাঁও">ঠাকুরগাঁও</option>
                    <option value="বগুড়া">বগুড়া</option>
                    <option value="পাবনা">পাবনা</option>
                    <option value="রাজশাহী">রাজশাহী</option>
                    <option value="জয়পুরহাট">জয়পুরহাট</option>
                    <option value="চাঁপাইনবাবগঞ্জ">চাঁপাইনবাবগঞ্জ</option>
                    <option value="নওগাঁ">নওগাঁ</option>
                    <option value="নাটোর">নাটোর</option>
                    <option value="সিরাজগঞ্জ">সিরাজগঞ্জ</option>
                    <option value="হবিগঞ্জ">হবিগঞ্জ</option>
                    <option value="মৌলভীবাজার">মৌলভীবাজার</option>
                    <option value="সুনামগঞ্জ">সুনামগঞ্জ</option>
                    <option value="সিলেট">সিলেট</option>
                    <option value="ময়মনসিংহ">ময়মনসিংহ</option>
                    <option value="শেরপুর">শেরপুর</option>
                    <option value="জামালপুর">জামালপুর</option>
                    <option value="নেত্রকোনা">নেত্রকোনা</option>
                  </select>
              </div>
              <div class="form-group">
                  <label>থানা / উপজেলা :</label> <span class="scolor">*</span>
                  <input type="text" class="form-control" name="p_thana24" id="p_thana24" placeholder="থানা / উপজেলা " maxlength="200">
              </div>
              <div class="form-group">
                  <label>গ্রাম / বাড়ি নম্বর , রাস্তা নম্বর  :</label> <span class="scolor">*</span>
                  <input type="text" class="form-control"  name="p_house_number25" id="p_house_number25" placeholder="গ্রাম /বাড়ি নম্বর , রাস্তা নম্বর" maxlength="350">
              </div>
              <div class="form-group">
                  <label>বর্তমান বাড়ি : </label> <span class="scolor">*</span>
                   <label class="radio-inline"><input type="radio" name="house64" value="1">ভাড়া বাড়ি </label>
                   <label class="radio-inline"><input type="radio" name="house64" value="2">নিজের বাড়ি</label>
               </div>
            </div>
            <!-- /.box-body -->
          </div>
          
        </section>
        <!--/.col (left) -->

        <!-- right column -->
        <section class="col-lg-6  connectedSortable">
          <!-- Horizontal Form -->
          <!-- /.box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">স্থায়ী ঠিকানা</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                  <label>জেলা </label> <span class="scolor">*</span>
                  <select class="form-control selectedStyle" data-show-subtext="true" data-live-search="true" name="par_district26" id="par_district26">
                    <option value="" style="display: none" selected hidden>জেলার নাম নির্বাচন করুন</option>
                    <option value="ঢাকা">ঢাকা</option>
                    <option value="ফরিদপুর">ফরিদপুর</option>
                    <option value="টাঙ্গাইল">টাঙ্গাইল</option>
                    <option value="গাজীপুর">গাজীপুর</option>
                    <option value="গোপালগঞ্জ">গোপালগঞ্জ</option>
                    <option value="কিশোরগঞ্জ">কিশোরগঞ্জ</option>
                    <option value="মাদারিপুর">মাদারিপুর</option>
                    <option value="মানিকগঞ্জ">মানিকগঞ্জ</option>
                    <option value="মুন্সিগঞ্জ">মুন্সিগঞ্জ</option>
                    <option value="নারায়ণগঞ্জ">নারায়ণগঞ্জ</option>
                    <option value="নরসিংদী">নরসিংদী</option>
                    <option value="রাজবাড়ী">রাজবাড়ী</option>
                    <option value="শরিয়তপুর">শরিয়তপুর</option>
                    <option value="বাগেরহাট">বাগেরহাট</option>
                    <option value="চুয়াডাঙ্গা">চুয়াডাঙ্গা</option>
                    <option value="যশোর">যশোর</option>
                    <option value="ঝিনাইদহ">ঝিনাইদহ</option>
                    <option value="খুলনা">খুলনা</option>
                    <option value="কুষ্টিয়া">কুষ্টিয়া</option>
                    <option value="মাগুরা">মাগুরা</option>
                    <option value="মেহেরপুর">মেহেরপুর</option>
                    <option value="নড়াইল">নড়াইল</option>
                    <option value="সাতক্ষীরা">সাতক্ষীরা</option>
                    <option value="বান্দরবান">বান্দরবান</option>
                    <option value="ব্রাহ্মণবাড়িয়া">ব্রাহ্মণবাড়িয়া</option>
                    <option value="চাঁদপুর">চাঁদপুর</option>
                    <option value="চট্টগ্রাম">চট্টগ্রাম</option>
                    <option value="কুমিল্লা">কুমিল্লা</option>
                    <option value="কক্সবাজার">কক্সবাজার</option>
                    <option value="ফেনী">ফেনী</option>
                    <option value="খাগড়াছড়ি">খাগড়াছড়ি</option>
                    <option value="লক্ষ্মীপুর">লক্ষ্মীপুর</option>
                    <option value="নোয়াখালী">নোয়াখালী</option>
                    <option value="রাঙামাটি">রাঙামাটি</option>
                    <option value="বরগুনা">বরগুনা</option>
                    <option value="বরিশাল">বরিশাল</option>
                    <option value="ভোলা">ভোলা</option>
                    <option value="ঝালকাঠি">ঝালকাঠি</option>
                    <option value="পটুয়াখালী">পটুয়াখালী</option>
                    <option value="পিরোজপুর">পিরোজপুর</option>
                    <option value="দিনাজপুর">দিনাজপুর</option>
                    <option value="গাইবান্ধা">গাইবান্ধা</option>
                    <option value="কুড়িগ্রাম">কুড়িগ্রাম</option>
                    <option value="লালমনিরহাট">লালমনিরহাট</option>
                    <option value="নীলফামারী">নীলফামারী</option>
                    <option value="পঞ্চগড়">পঞ্চগড়</option>
                    <option value="রংপুর">রংপুর</option>
                    <option value="ঠাকুরগাঁও">ঠাকুরগাঁও</option>
                    <option value="বগুড়া">বগুড়া</option>
                    <option value="পাবনা">পাবনা</option>
                    <option value="রাজশাহী">রাজশাহী</option>
                    <option value="জয়পুরহাট">জয়পুরহাট</option>
                    <option value="চাঁপাইনবাবগঞ্জ">চাঁপাইনবাবগঞ্জ</option>
                    <option value="নওগাঁ">নওগাঁ</option>
                    <option value="নাটোর">নাটোর</option>
                    <option value="সিরাজগঞ্জ">সিরাজগঞ্জ</option>
                    <option value="হবিগঞ্জ">হবিগঞ্জ</option>
                    <option value="মৌলভীবাজার">মৌলভীবাজার</option>
                    <option value="সুনামগঞ্জ">সুনামগঞ্জ</option>
                    <option value="সিলেট">সিলেট</option>
                    <option value="ময়মনসিংহ">ময়মনসিংহ</option>
                    <option value="শেরপুর">শেরপুর</option>
                    <option value="জামালপুর">জামালপুর</option>
                    <option value="নেত্রকোনা">নেত্রকোনা</option>
                  </select>
              </div>
              <div class="form-group">
                  <label>থানা / উপজেলা :</label> <span class="scolor">*</span>
                  <input type="text" class="form-control" name="par_thana27" id="par_thana27" placeholder="থানা / উপজেলা " maxlength="200">
              </div>
              <div class="form-group">
                  <label>গ্রাম / বাড়ি নম্বর , রাস্তা নম্বর  :</label> <span class="scolor">*</span>
                  <input type="text" class="form-control"  name="par_house_number28" id="par_house_number28" placeholder="গ্রাম /বাড়ি নম্বর , রাস্তা নম্বর" maxlength="350">
              </div>
              <div class="form-group">
                  <label>স্থায়ী বাড়ি : </label> <span class="scolor">*</span>
                   <label class="radio-inline"><input type="radio" name="house65" value="1">ভাড়া বাড়ি </label>
                   <label class="radio-inline"><input type="radio" name="house65" value="2">নিজের বাড়ি</label>
               </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">পরিবার সম্পর্কে </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label>পিতার নাম :</label> <span class="scolor">*</span>
                  <input type="text" class="form-control" name="father_name29" id="father_name29" placeholder="পিতার নাম " maxlength="200">
                </div>
                <div class="form-group">
                  <label>পিতার পেশা :</label> <span class="scolor">*</span>
                  <input type="text" class="form-control" name="father_professional30" id="father_professional30" placeholder="পিতার পেশা " maxlength="200">
                </div>
                <div class="row">
                <div class="col-xs-6">
                  <label>ভাই কত জন :</label>
                  <input type="number" onkeypress="return isNumberKey(event)" class="form-control" name="brother_h31" id="brother_h31" placeholder="0" maxlength="40">
                </div>
                <div class="col-xs-6">
                  <label>বোন কত জন :</label>
                  <input type="number" onkeypress="return isNumberKey(event)" class="form-control" name="sister_h32" id="sister_h32" placeholder="0" maxlength="40">
                </div>
              </div><br>
              <div class="form-group">
                <label>ভাই বোনদের মধ্যে আপনার অবস্থান:</label>
                <input type="number" onkeypress="return isNumberKey(event)" class="form-control" name="p_bro_sister33" id="p_bro_sister33" placeholder="0" maxlength="40">
              </div>
              <div class="form-group">
                  <label>ভাই বোনদের নাম ও পেশার বিস্তারিত:</label>
                  <textarea class="form-control" rows="3" name="bro_sister_occ34" id="bro_sister_occ34" placeholder="ভাই বোনদের নাম ও পেশার বিস্তারিত..."></textarea>
              </div>
              <div class="form-group">
                  <label>ভাই বোন ও নিকট আত্মীয় স্বজনদের মধ্যে পালিশ, আর্মি , র‌্যাব, বিজিবি ও সরকারি গোয়েন্দা সংস্থায় কর্মরত বা অবসর প্রাপ্ত থাকলে তাদের নাম সহ বিস্তারিত লিখন :</label>
                  <textarea class="form-control" rows="3" name="g_p_rab_army35" id="g_p_rab_army35" placeholder="ভাই বোন ও নিকট আত্মীয় স্বজনদের মধ্যে পালিশ, আর্মি , র‌্যাব, বিজিবি ও সরকারি গোয়েন্দা সংস্থায় কর্মরত বা অবসর প্রাপ্ত থাকলে তাদের নাম সহ বিস্তারিত লিখন..."></textarea>
              </div>
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
                <!-- text input -->
                <div class="form-group"> 
                  <label>বাংলাদেশের পরিদর্শন কৃত জেলা গুলোর নাম:</label> <span class="scolor">*</span>
                  <textarea class="form-control" name="visited_district36" id="visited_district36" rows="3" placeholder="পরিদর্শন কৃত জেলা গুলোর নাম..."></textarea>
                </div>
                <div class="form-group">
                  <label>পরিদর্শন কৃত দেশ গুলোর নাম:</label>
                  <textarea class="form-control" rows="3" name="visited_country37" id="visited_country37" placeholder="পরিদর্শন কৃত দেশ গুলোর নাম..."></textarea>
                </div>
            </div>
            <!-- /.box-body -->

          </div>

          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">সাধারণ দক্ষতা </h3>
            </div>
            <!-- /.box-body -->
           <div class="box-body">
                <!-- checkbox -->
                <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-6 checkbox_text_style">
                  <input type="hidden" name="report_writing38" value="0">
                  <input type="checkbox" name="report_writing38" id="report_writing38" value="প্রতিবেদন লেখা"> প্রতিবেদন লেখা
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 checkbox_text_style">
                  <input type="hidden" name="detective_book39" value="0">
                  <input type="checkbox" name="detective_book39" id="detective_book39" value="গোয়েন্দা বই পড়া"> গোয়েন্দা বই পড়া
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 checkbox_text_style">
                  <input type="hidden" name="electrical_wiring40" value="0">
                  <input type="checkbox" name="electrical_wiring40" id="electrical_wiring40" value="ইলেকট্রিক্যাল ওয়্যারিং"> ইলেকট্রিক্যাল ওয়্যারিং
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-6 checkbox_text_style">
                  <input type="hidden" name="cooking41" value="0">
                  <input type="checkbox" name="cooking41" id="cooking41" value="রান্না করা"> রান্না করা
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 checkbox_text_style">
                  <input type="hidden" name="dress_making42" value="0">
                  <input type="checkbox" name="dress_making42" id="dress_making42" value="পোষাক তৈরি"> পোষাক তৈরি
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 checkbox_text_style">
                  <input type="hidden" name="hand_drilling43" value="0">
                  <input type="checkbox" name="hand_drilling43" id="hand_drilling43" value="হাত ড্রিলিং"> হাত ড্রিলিং
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 checkbox_text_style">
                  <input type="hidden" name="driving44" value="0">
                  <input type="checkbox" name="driving44" id="driving44" value="চালক যেমন সাইকেল, মোটরসাইকেল, কার"> চালক যেমন সাইকেল, মোটরসাইকেল, কার
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 checkbox_text_style">
                  <input type="hidden" name="owncar66" value="0">
                  <input type="checkbox" name="owncar66" id="owncar66" value="1"> নিজের কোনো গাড়ি আছে যেমন কার, মোটর সাইকেল, বই সাইকেল
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-6 checkbox_text_style">
                  <input type="hidden" name="song45" value="0">
                  <input type="checkbox" name="song45" id="song45" value="গান করা"> গান করা
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 checkbox_text_style">
                  <input type="hidden" name="dance46" value="0">
                  <input type="checkbox" name="dance46" id="dance46" value="নাচ করা"> নাচ করা 
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 checkbox_text_style">
                  <input type="hidden" name="actor47" value="0">
                  <input type="checkbox" name="actor47" id="actor47" value="অভিনয় করা"> অভিনয় করা
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-6 checkbox_text_style">
                  <input type="hidden" name="poem48" value="0">
                  <input type="checkbox" name="poem48" id="poem48" value="কবিতা"> কবিতা
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 checkbox_text_style">
                  <input type="hidden" name="exercise49" value="0">
                  <input type="checkbox" name="exercise49" id="exercise49" value="ব্যায়াম"> ব্যায়াম
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 checkbox_text_style">
                  <input type="hidden" name="shooter50" value="0">
                  <input type="checkbox" name="shooter50" id="shooter50" value="শ্যুটার"> শ্যুটার
                </div>
              </div>
              <div class="form-group">
                  <label>কম্পিউটার চালনায় পারদর্শিতা : </label><span class="scolor">*</span>
                   <label class="radio-inline"><input type="radio" name="computer62" data-toggle="collapse" data-target=".computerOne:not(.in)" value="1" >হ্যাঁ </label>
                   <label class="radio-inline"><input type="radio" name="computer62" data-toggle="collapse" data-target=".computerOne.in" value="2"> না</label>
                </div>
                <div class="form-group computerOne collapse">
                  <label>কম্পিউটারের কোন কাজ গুলো জানেন তার নাম :</label>
                  <textarea class="form-control" rows="3" id="computerd63" name="computerd63" placeholder=" বিস্তারিত.."></textarea>
                </div>
              <div class="row">
                <div class="col-xs-12">
                  <input type="text" name="otrher_know51" id="otrher_know51" class="form-control" placeholder="অন্যান্য..." maxlength="250">
                </div>
              </div>
            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">স্থানীয় অভিভাবক: </h3><span class="scolor">*</span>
            </div>
            <!-- /.box-body -->
           <div class="box-body">
            <!-- Relative Address -->
              <div class="form-group">
                <label>অভিভাবকের নাম:</label> <span class="scolor">*</span>
                <input type="text" class="form-control" name="local_guardian52" id="local_guardian52" placeholder="অভিভাবকের নাম" maxlength="100">
              </div>
             <div class="row">
              <div class="col-lg-6 col-md-6 col-xs-12">
                 <label>ফোন নম্বর:</label><span class="scolor">*</span>
                  <input type="number" onkeypress="return isNumberKey(event)" class="form-control" name="guardian_phone53" id="guardian_phone53" placeholder="019000 00000" maxlength="16">
              </div>
              <div class="col-lg-6 col-md-6 col-xs-12">
                 <label>বয়স:</label><span class="scolor">*</span>
                  <input type="number" onkeypress="return isNumberKey(event)" class="form-control" name="guardian_age57" placeholder="00" maxlength="5">
              </div>
              <div class="col-lg-6 col-md-6 col-xs-12">
                 <label>পেশা:</label><span class="scolor">*</span>
                  <input type="text" class="form-control" name="guardian_profession56" id="guardian_profession56" placeholder="পেশা" maxlength="200">
              </div>
              <div class="col-lg-6 col-md-6 col-xs-12">
                  <label>সম্পর্ক:</label><span class="scolor">*</span>
                  <input type="text" class="form-control" name="relation54" id="relation54" placeholder="সম্পর্ক" maxlength="100">
              </div>
            </div>
            <div class="form-group">
                <label>ঠিকানা:</label> <span class="scolor">*</span>
                <input type="text" class="form-control" name="guardian_address55" id="guardian_address55" placeholder="ঠিকানা" maxlength="250">
              </div>
             <!-- Relative Address-->
           </div>

          </div>
          <!-- /.box -->
          <!-- File Attest file with CV End-->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">CV এবং চারিত্রিক সনদপত্র যোগ করতে পারেন</h3>
            </div>
            <div class="box-body">
             <div class="form-group">
                  <label>CV সাইজ ২ এম্বি এর কম (Only-.pdf,.doc,.docx):</label>
                  <input type="file" name="image71" id="image71">
              </div>
              <div class="form-group">
                  <label>চারিত্রিক সনদপত্র সাইজ ২ এম্বি এর কম (Only-.png,.jpg,.jpeg):</label>
                  <input type="file" name="image75" id="image75">
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- File Attest File with CV  End-->

        </section>
        <!--/.col (right) -->
        <div class="col-lg-12">
         <div class="box-footer">
          <button type="reset" class="btn btn-default">বাতিল</button>
          <button type="submit" name="submit" class="btn btn-info pull-right">জমা দিন</button>
        </div>
      </div>
        <!-- /.box-footer -->
      </form>
       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footer.php"; ?>
