<?php 
include "inc/header.php";
include "classes/Registrationfacility.php";
$regfacility = new Registrationfacility();
/* This code is define for client login or not */
SignSession::signcheckLogin();

/* This code is define for client Registration get Data */
if (isset($_POST['register']) && $_SERVER['REQUEST_METHOD']) {
  $client_reg_mgs = $client->clientRegistration($_POST);
}

$number_one = 1;
$number_two = 15;
$captchaNum1 = mt_rand($number_one, $number_two);
$captchaNum2 = mt_rand($number_one, $number_two);

 ?>
 <style type="text/css">
.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}
.private_detective_jobs_body {
    border: 2px solid #A5822D;
    padding: 5px 0px;
    margin: 5px;
    background-image: url("upload/background/bo.png");
  }

.content-wrapper {
  min-height: 100%;
   background-image: url("upload/background/bo.png");
  z-index: 800;
}
.box {
  border-top: 3px solid #A5822D;
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
        <div class="box">
        <section class="col-lg-6"> <!-- col-lg-offset-2 -->
          
          <div class="box-header with-border">
            <?php
              if (isset($client_reg_mgs)) {
                echo $client_reg_mgs;
              }
            ?>
            <h3>User Registration</h3>

          </div>
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
          <div class="box-body">
          <div class="form-group has-feedback">
            <input type="text" id="clientName" class="form-control" name="name" maxlength="50" placeholder="Full name" required="">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <span id="outputName"></span>
         </div>
          <div class="form-group has-feedback">
            <input type="email" size="30" spellcheck="false" title="Your Email Address" class="form-control" name="email" maxlength="30" placeholder="E-mail" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="email" aria-required="true" required="">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <!-- phone mask -->
        <div class="form-group has-feedback">
            <input type="number" id="phoneField" style="width: 80%;padding: 5px;" class="phone-field" name="phone" maxlength="11" placeholder="Phone Number" required="">
          <!-- /.input group -->
        </div>
              <!-- /.form group -->
          <div class="form-group has-feedback">
            <input type="text" class="form-control" maxlength="450" name="address" placeholder="Address" required="">
            <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input id="password-field" type="password" class="form-control"  name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter Confirm Password" minlength="8" maxlength="22" required="">
            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            <small style="color:#8a1717;font-size: 14px;">Must contain at least one uppercase, one lowercase letters and one number, within 8 to 22 characters.</small>
          </div>

          <div class="form-group has-feedback">
            <input id="rpassword" type="password" class="form-control" name="rpassword" placeholder="Retype password" minlength="8" maxlength="22">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            <span id='message'></span>
          </div>

          <div class="form-group has-feedback">
            <label for="captcha"><strong>Captcha <?php echo $captchaNum1; ?> + <?php echo $captchaNum2; ?> = </strong></label>
            <input type="number" style="width: 58%;padding: 5px;" id="captcha" name="captchan" placeholder="Enter Number">
            <input type="hidden" name="firstca" value="<?php echo $captchaNum1; ?>">
            <input type="hidden" name="secondca" value="<?php echo $captchaNum2; ?>">
          </div>

          <input type="hidden" name="client_join_date" value="<?php echo date('l jS \of F Y'); ?>">
          <div>
            <button type="submit" name="register" class="btn btn-success">Register</button>
            <button type="reset" class="btn btn-default pull-right">Cancel</button>
          </div>
          </div>
          
        </form>

         <!-- </div> -->
        </section>
        <section class="col-lg-6">
          <div class="box-header with-border">
            <h3>Registration Facility</h3>
          </div>
          <div class="box-body">
            <ul class="list-group list-group-flush">
            <?php
              $getResult = $regfacility->regfacilityShow();
              if ($getResult) {
                while ($result = $getResult->fetch_assoc()) {
             ?>
            <li class="list-group-item"><img src="upload/background/spyder.png"><?php echo $result['reg_facility']; ?></li>
            <?php } }else{ ?>
             <li class="list-group-item"><img src="upload/background/spyder.png"><span style="color:red;">Registration Facility is Empty (0)!</span></li>
            <?php } ?>
            </ul>
         </div>
        </section>
        </div>
        <!--service category end -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include "inc/footer.php"; ?>
<!--Password Show and Hidden Options -->
<script>
   $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

   $('#password-field, #rpassword').on('keyup', function () {
  if ($('#password-field').val() == $('#rpassword').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
  });

  $(document).ready(function(){
    $("#clientName").keypress(function(event){
        var inputValue = event.which;
        // allow letters and whitespaces only.
        $('#outputName').html('Allow letters and whitespaces only.').css('color', 'green');
        if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)) { 
            event.preventDefault(); 
        }
    });
  });

$('#phoneField').keypress(function(e){
   if (this.value.length == 0 && e.which == 48 ){
      return false;
   }
});
</script>
