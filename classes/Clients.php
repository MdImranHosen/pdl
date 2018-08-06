<?php
/**
 * Clients class for Clients Registration and login management....
 */
class Clients{

	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function clientRegistration($data){

	 if (empty($data['name']) || empty($data['email']) || empty($data['phone']) || empty($data['address']) || empty($data['password']) || empty($data['captchan'])) {
	 	$msg = '<div class="alert alert-danger">Field must not be Empty!</div>';
	 	return $msg;
	 }else{

      $name      = $this->fm->validation($data['name']);
      $email     = $this->fm->validation($data['email']);
      $phone     = $this->fm->validation($data['phone']);
      $address   = $this->fm->validation($data['address']);
      $password  = $this->fm->validation($data['password']);
      $rpassword = $this->fm->validation($data['rpassword']);
      $captchan  = $this->fm->validation($data['captchan']);
      $firstca   = $this->fm->validation($data['firstca']);
      $secondca  = $this->fm->validation($data['secondca']);

      $phone_phoneCode = $data['phone_phoneCode'];

      $name            = mysqli_real_escape_string($this->db->link, $name);
      $email           = mysqli_real_escape_string($this->db->link, $email);
      $phone           = mysqli_real_escape_string($this->db->link, $phone);
      $phone_phoneCode = mysqli_real_escape_string($this->db->link, $phone_phoneCode);
      $address         = mysqli_real_escape_string($this->db->link, $address);
      $password        = mysqli_real_escape_string($this->db->link, $password);
      $rpassword       = mysqli_real_escape_string($this->db->link, $rpassword);
      $captchan        = mysqli_real_escape_string($this->db->link, $captchan);
      $firstca         = mysqli_real_escape_string($this->db->link, $firstca);
      $secondca        = mysqli_real_escape_string($this->db->link, $secondca);
      $email           = filter_var($email, FILTER_SANITIZE_EMAIL);

      $client_join_date = mysqli_real_escape_string($this->db->link, $data['client_join_date']);

      $captchanall     = $firstca+$secondca;

      $uppercase = preg_match('@[A-Z]@', $password);
      $lowercase = preg_match('@[a-z]@', $password);
      $number    = preg_match('@[0-9]@', $password);

      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $nameErr = '<div class="alert alert-warning"> Name Only letters and white space allowed!</div>';
        return $nameErr; 
       }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       	$emailErr = '<div class="alert alert-danger">Invalid email format!</div>';
       	return $emailErr;
       }elseif(!preg_replace('/\D/', '', $phone)){
        $phoneErr = '<div class="alert alert-warning">Phone Number Only Number Allowed!</div>';
        return $phoneErr;
       }elseif(strlen($phone) > 11){
        $msg = '<div class="alert alert-warning">Phone Number Maximum 11 Characters!</div>';
        return $msg;
       }elseif(strlen($password) < 8) {
        $msg = '<div class="alert alert-warning">New Password at Least 8 Characters!</div>';
        return $msg;
      }elseif(strlen($password) > 22){
       $msg = '<div class="alert alert-warning">New Password Must be within 8 to 22 Characters!</div>';
        return $msg;
      }elseif(!$uppercase || !$lowercase || !$number){
       $msg = '<div class="alert alert-warning"> Minimum 8 and maximum 22 characters, at least one uppercase letter, one lowercase letter and one number! Exe: aA12hhhh5</div>';
        return $msg;
      }elseif($password !== $rpassword){
          $passwordErr = '<div class="alert alert-danger">Password and Confrom passwrd Not Match!</div>';
          return $passwordErr;
       }elseif(!preg_replace('/\D/', '', $captchan)){
        $msg = '<div class="alert alert-warning">Captcha Only Number Allowed!</div>';
        return $msg;
       }elseif($captchan != $captchanall){
         $msg = '<div class="alert alert-warning">Invalied Captcha!</div>';
        return $msg;
       }else{
         
         $clientMail = "SELECT * FROM tbl_client_reg WHERE client_email = '$email' LIMIT 1";
         $clientMResult = $this->db->select($clientMail);
         if ($clientMResult !=false) {
         	$msg = '<div class="alert alert-danger"><u>'.$email.'</u> is email already Exists!</div>';
         	return $msg;
         }else{
         
        $phone = "+".$phone_phoneCode.$phone;

	      $password = md5($password);
	      $code     = md5(uniqid(100,99999));
	      $sql = "INSERT INTO tbl_client_reg(client_name,client_email,client_phone,client_address,client_password,ucode,client_reg_date) VALUES('$name','$email','$phone','$address','$password','$code','$client_join_date')";
	      $result = $this->db->insert($sql);
	      if ($result) {

            $to = $email;
            $subject = "Welcome to Confiramtion Account";
            $message = " Welcome to $name
                       Please click on blelow link for verify yours PDL account 
                       http://www.pdl007.com/activeuser.php?email=$email&code=$code";

          $headers = 'From:info@pdl007.com' . "\r\n";

          if(mail($to,$subject,$message,$headers)){
           $msg = '<div class="alert alert-success">Please Check your email address for active your account!</div>';
          return $msg; 
        }else{
           $msg = '<div class="alert alert-danger">Yours mail activation code send Failed !</div>';
          return $msg;  
        }
      }else{
	      	$msg = '<div class="alert alert-danger">Something Wrong!</div>';
	      	return $msg;
       }
     }
   }
  }
 }

 public function getCodeVerify($email,$code){
 	$sql = "SELECT * FROM tbl_client_reg WHERE client_email = '$email' AND ucode = '$code'";
 	$result = $this->db->select($sql);
 	if ($result !== false) {
    $checkSql = "SELECT * FROM tbl_client_reg WHERE client_email = '$email' AND ucode = '$code' AND vstatus = '1'";
    $checkresult = $this->db->select($checkSql);
    if ($checkresult !== false) {
      $msg = '<div class="alert alert-danger">This Link already Use!</div>';
          return $msg;
    }else{
      $usql = "UPDATE tbl_client_reg SET vstatus = '1' WHERE client_email = '$email' AND ucode = '$code' AND vstatus = '0'";
      $uresult = $this->db->update($usql);
      $msg = '<div class="alert alert-success">
       Your account has been activated, you can now login!
        </div>';
      return $msg;
    }

 	}else{
        $msg = '<div class="alert alert-danger">Your Activation Code Something Wrong!</div>';
	      	return $msg;
 	}
 }
}