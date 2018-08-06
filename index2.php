<?php include "inc/header.php"; ?>
<?php
 $sit = new Siteuser();

  
  if (isset($_SERVER['REQUEST_METHOD'])) {
    /*$ipadd =  getenv('HTTP_CLIENT_IP')?:
              getenv('HTTP_X_FORWARDED_FOR')?:
              getenv('HTTP_X_FORWARDED')?:
              getenv('HTTP_FORWARDED_FOR')?:
              getenv('HTTP_FORWARDED')?:
              getenv('REMOTE_ADDR');*/
    $ipadd     = $_SERVER['REMOTE_ADDR'];
    $siterelod = $sit->getSiteReload($ipadd);
  }
  
?>
<body class="hold-transition skin-blue sidebar-mini" >
<div class="wrapper">
  <?php include "inc/header_bottom.php"; ?>
<!--SideBar Start-->
  <?php include "inc/sidebar.php"; ?>
<!--SideBar End-->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="text-center style_head_text">
       <h1> প্রাইভেট ডিটেকটিভ </h1>
        <small>অপরাধ দমনে জনগণ ও সরকারকে সহযোগিতা করাই আমাদের লক্ষ্য</small>
      </div>
      <?php include "inc/apply_now.php"; ?>      
    </section>

    <!-- Main content -->
    <section class="content connectedSortable">
       <div class="row private_detective_jobs_body">
        <section class="col-lg-12 private_body_padding">
          <div class="callout text-center private_detective_jobs_text background_color_red font-weight-normal">
            <h2>গোয়েন্দায় নিয়োগ বিজ্ঞপ্তি !</h2>
          </div>
        </section>
        <section class="col-lg-12 private_body_padding">
          <div class="callout callout-defult text-center private_detective_jobs_title font-weight-normal">
            <h3>প্রতিটি বিভাগ, জেলা, উপজেলা, ও গুরুত্বপূর্ণ স্থানে এক জন করে নিয়োগ করা হবে !</h3>
          </div>
        </section>
        <section class="col-lg-12 private_body_padding">
          <div class="text-center private_detective_jobs_body_text font-weight-normal">
            <h3 title="আবেদন করুন ">আপনি কি গোয়েন্দা পেশায় ক্যারিয়ার গড়তে চান ?</h3>
            <p>
             তবে নিজ নিজ এলাকায় কাজ করার শর্তে গোয়েন্দা কাজে নিজের এলাকায়  থেকে ক্যারিয়ার গড়ে তুলুন। 
            আপনার এলাকায় সকল প্রকার অপরাধ মূলক কার্যক্রমের বিরুদ্ধে অবস্থান নিয়ে প্রাইভেট ডিটেকটিভ লিঃ এ যোগ দিন। 
            যাদের চাকরীর বয়ষ শেষ হয়েছে কিন্তু এখনো কোন চাকরী পাননি তাদের জন্য গোয়েন্দা পেশায় ক্যারিয়ার গড়ার সূবর্ন সুযোগ।
            তাই নিজেকে গোয়েন্দা কর্মে সম্পৃক্ত করতে চাইলে নিম্নোক্ত ঠিকানায় অতিস্বত্তর যোগাযোগ করুন। 
            ব্যাংলাদেশে বেসরকারি পর্যায়ে প্রায় ১৬ বছরের দীর্ঘ পথচলার অভিজ্ঞতার আলোকে নতুন করে গণপ্রজাতন্ত্রী ব্যাংলাদেশ সরকার অনুমোদিত “প্রাইভেট ডিটেকটিভ লিঃ” এ সারা দেশের প্রতিটি বিভাগ, জেলা, উপজেলা ও গুরুত্বপুর্ন স্থানে একজন করে গোয়েন্দা কর্মকর্তা নিয়োগ চলছে। নিজেকে প্রতিষ্ঠিত করার পাশাপাশি নিজ এলাকার গোয়েন্দা কাজে প্রতিনিধিত্ব করা এবং যে কোন অপরাধের তথ্য-প্রমান দেশের সকল আইন প্রয়োগকারী সংস্থাকে সরবরাহ করে অপরাধ দমনে জঙ্গন ও সরকারকে সহায়তা করার লক্ষ্য নিয়ে আমাদের এই কার্যক্রম। এছাড়াও ন্যায় বিচার প্রতিষ্ঠায়, তথ্য-প্রমান সংগ্রহ করে দেশের বিভিন্ন আদালতে সাক্ষ্য প্রমানের অভাবে যে সব মামলা ন্যায় বিচার পেতে বাধাগ্রস্থ হয় সেই, সকল বাদিকে সহায়তা করা।

            </p>
          </div>
        </section>
        <section class="col-lg-4">
        <div class="box">
            <div class="box-header text-center box-header-text-title">
              <h2 class="box-title text-title">পদের নাম </h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed text-center table_style_degis">
                <tr>
                  <td><h4>Regional Detective Incharge</h4><p>( R.D.I )</p></td>
                </tr>
                <tr>
                  <td><h4>District Detective Inspector</h4><p>( D.D.I )</p></td>
                </tr>
                <tr>
                  <td><h4>Upzilla Detective Inspector</h4><p>( U.D.I )</p></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          </section>
        <section class="col-lg-4">
        <div class="box">
            <div class="box-header text-center box-header-text-title">
              <h2 class="box-title text-title">যোগ্যতা ও বয়সসীমা </h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed text-left table_style_degis">
                <tr>
                  <td>
                    <ul>
                    
                    <li> যাদের সরকারি চাকরির বয়সসীমা শেষ, অথবা ২৮ থেকে ৪৫ বছর বয়সের যে কেউ পুরুষ / মহিলা গণ আবেদন করতে পারবেন । </li>
                    <li> বিশেষ ক্ষেত্রে মেধাবী , উদ্দোমী ও সাহসীদের জন্য বয়স শিথিলযোগ্য । </li>
                    <li> শিক্ষাগত যোগ্যতা ন্যূনতম HSC এবং R.D.I / D.D.I এর ক্ষেত্রে দক্ষ ও উচ্চতর শিক্ষা অগ্রাধিকার |</li>
                   </ul>
                  </td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </section>
         <section class="col-lg-4">
        <div class="box">
            <div class="box-header text-center box-header-text-title">
              <h2 class="box-title text-title">সুযোগ - সুবিধা </h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed text-left table_style_degis">
                <tr>
                  <td>
                    <ul>
                    <li> নির্বাচিত প্রার্থীদের নিয়োগ শেষে প্রশিক্ষণ সহ অানুষঙ্গিক দাপ্তরিক কাগজপত্র ও একটি করে ব্যাগ , বিশেষ ক্যামেরা , ডাইরি, কলম , স্টিকার , কর্পোরেট মোবাইল নাম্বার  আইডিকার্ড সহ প্রয়োজনীয় সকল উপকরণ সরবরাহ করা হবে । </li>
                    <li> সকলের জন্য দেশে ও বিদেশে বিশেষ প্রশিক্ষণের সুযোগ রয়েছে । </li>
                    <li> মাসিক বেতন আলোচনা সাপেক্ষে</li>
                   </ul>
                  </td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </section>
        <section class="col-lg-12 ">
         <div class="box">
          <div class="box-header important_private_detective_key">
              <h4 class="box-title important_p_detective_key"><span>*</span> রাষ্ট্রবিরোধী ও যে কোন অপরাধের সাথে যুক্ত থাকলে আবেদনের অযোগ্য বলে বিবেচিত হবে । </h4>
         </div>
         <div class="box-body no-padding">
          <aside class="application_way_text">
            <h4><a href="#" onclick="applyNow();"  title="আবেদন করুন">
            অনলাইনে অথবা সরাসরি আবেদন করুন। :</a></h4>
            <p>
          • পূর্ণাঙ্গ জীবন বৃত্তান্তসহ বর্তমান ও স্থায়ী যোগাযোগের ঠিকানা, জাতীয় পরিচয়পত্রের ফটোকপি , চারিত্রিক সনদপত্র (ইউপি চেয়ারম্যান, মেয়র হতে), শিক্ষাগত যোগ্যতার সকল সনদপত্র, সদ্য তোলা ৩ কপি পাসপোর্ট সাইজের ছবি সহ যে এলাকায় কাজ করতে আগ্রহী সে এলাকায় কাজ করতে আগ্রহী সে এলাকায় নাম উল্লেখপুর্বক আবেদন করতে হইবে।
          অনলাইন এ আবেদন করার জন্য <a href="#" onclick="applyNow();">Apply Now</a>  এ ক্লিক করুন।
          অথবা আবেদনপত্র ইমেইলে পাঠাতে পারেন। ইমেইল পাঠানোর ঠিকানাঃ pdnews007@gmail.com
          প্রার্থীকে শুধু মৌখিক পরীক্ষার জন্য এস.এম.এস/মোবাইলে ডাকা হবে। মৌখিক পরীক্ষার সময় সকল সনদের মূল কপি সঙ্গে নিয়ে আসতে হবে।  
          </p>
          </aside>
         </div>
        </div>
        </section>
        
        <section class="col-lg-12 text-center apply_new_style">
          <a href="#" onclick="applyNow();"><img src="upload/private_detective_apply_now.png" width="200" height="80" class="pulseit" ></a>
        </section>
        <section class="col-lg-7">
         <div class="box">
         <div class="box-body no-padding apply_date_and_text">
         <!--  <img src="upload/pd.png" title="" class="img-thumbnail" alt="Image" width="100%" height="auto"> -->

         <h3>আবেদনের শেষ তারিখ ৩০ শে মার্চ ২০১৮ রাত ১২ পর্যন্ত </h3>
         <img src="upload/logo/private_detective_i.png" class="apply_date_image">
         <h4>অপরাধ দমনে জনগণ ও সরকারকে সহযোগিতা করাই আমাদের লক্ষ্য</h4>
         </div>
        </div>
        </section>

        <section class="col-lg-5">
         <div class="box">
         <div class="box-body no-padding">
          <address class="text-center address_style_text">
             <h2>যোগাযোগের ঠিকানা</h2>
             <strong><name>আতিকুর রহমান</name></strong>
             <p>সহকারী পুলিশ সুপার (অব:)<br>
              বিভাগীয় প্রধান, মানব সম্পদ উন্নয়ন<br>
               ৮ম তলা, রুম নং ৮/বি, ৩০/এ, নয়া পাল্টান, ঢাকা - ১০০০<br>
               মোবাইল ০১৭১১-৯০১১৫৫,০১৫৫৬-৩৫৬২৭০
           </p>
          </address>
         </div>
        </div>
        </section>

      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footer.php"; ?>
