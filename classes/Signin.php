<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
include_once ($filepath.'/../lib/SignSession.php');
SignSession::signinit();
/**
 * Signin class use for client signin ....
 */
class Signin{
	
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
    public function getClientSigin($client_email_use, $client_password_pass){

    if (empty($client_email_use) || empty($client_password_pass)) {
    	echo '<div class="alert alert-danger">Field must not be Empty!</div>';
    	exit();
    }else{

      $client_email    = $this->fm->validation($client_email_use);
      $client_password = $this->fm->validation($client_password_pass);
      $client_email    = mysqli_real_escape_string($this->db->link, $client_email);
      $client_password = mysqli_real_escape_string($this->db->link, $client_password);
      $client_email    = filter_var($client_email, FILTER_SANITIZE_EMAIL);

      if (!filter_var($client_email, FILTER_VALIDATE_EMAIL)) {
      	echo '<div class="alert alert-danger"><u>'.$client_email.'</u> is Invalied email!</div>';
         exit();
      }else{
      	$client_password = md5($client_password);
      	$checkverifysql = "SELECT * FROM tbl_client_reg WHERE client_email = '$client_email' AND client_password = '$client_password' AND vstatus = '0'";
      	$checkverifyresult = $this->db->select($checkverifysql);
        if ($checkverifyresult != false) {
        	echo '<div class="alert alert-danger">Unverified Account! Go to your Registration email then Click Link.</div>';
        }else{

      	$signinsql = "SELECT * FROM tbl_client_reg WHERE client_email = '$client_email' AND client_password = '$client_password' AND vstatus = '1'";
      	$signResult = $this->db->select($signinsql);
      	if ($signResult != false) {
      		$signResultv = $signResult->fetch_assoc();
      		SignSession::set("signin", true);
      		SignSession::set("client_id", $signResultv['client_id']);
      		SignSession::set("client_name", $signResultv['client_name']);
      		SignSession::set("client_email", $signResultv['client_email']);
      		SignSession::set("vstatus", $signResultv['vstatus']);
      		SignSession::set("join_date", $signResultv['client_reg_date']);

      		echo "<meta http-equiv='refresh' content='0'>";

      		 /*header("Location:profile.php");*/
      	}else{
      		echo '<div class="alert alert-info" role="alert">
                  Wrong Information Included!
                 </div>';
        	exit();
      	}
      }
     }
    }
   }

   public function getSignInClientDataShow($signId){
   	$sql = "SELECT * FROM tbl_client_reg WHERE client_id = '$signId'";
   	$result = $this->db->select($sql);
   	return $result;
   }

   public function getUserProfileUpdate($data){

    if (empty($data['user_name_edit']) || empty($data['user_phone_edit']) || empty($data['user_address_edit'])) {
    	$msg = '<div class="alert alert-danger">Field must not be Empty!</div>';
    	return $msg;
    }else{ 
      
      $user_name_edit     = $this->fm->validation($data['user_name_edit']);
      $user_desig_edit    = $this->fm->validation($data['user_desig_edit']);
      $user_phone_edit    = $this->fm->validation($data['user_phone_edit']);
      $user_address_edit  = $this->fm->validation($data['user_address_edit']);
      
      $user_id = mysqli_real_escape_string($this->db->link, $data['user_profile_id']);
      $user_name_edit     = mysqli_real_escape_string($this->db->link, $user_name_edit);
      $user_desig_edit    = mysqli_real_escape_string($this->db->link, $user_desig_edit);
      $user_phone_edit    = mysqli_real_escape_string($this->db->link, $user_phone_edit);
      $user_address_edit  = mysqli_real_escape_string($this->db->link, $user_address_edit);

      $sql = "UPDATE tbl_client_reg 
               SET 
             client_name     = '$user_name_edit',
             client_des      = '$user_desig_edit',
             client_phone    = '$user_phone_edit',
             client_address  = '$user_address_edit'
             WHERE client_id = '$user_id'";
     $result = $this->db->update($sql);
     if ($result) {
     	$msg = '<div class="alert alert-success">Your Profile Data Updated</div>';
     	return $msg;
     }else{
     	$msg = '<div class="alert alert-danger">Data Not Updated !</div>';
     	return $msg;
     }
     }
   }

   public function getUserChengePass($user_pass_change_id,$user_old_pass,$user_new_pass,$user_nconfirm_pass){
   	if (empty($user_old_pass) || empty($user_new_pass) || empty($user_nconfirm_pass)) {
   		echo '<div class="alert alert-danger">Field Must Not be Empty!</div>';
   		exit();
   	}else{
      $user_old_pass      = $this->fm->validation($user_old_pass);
      $user_new_pass      = $this->fm->validation($user_new_pass);
      $user_nconfirm_pass = $this->fm->validation($user_nconfirm_pass);

      $user_old_pass      = mysqli_real_escape_string($this->db->link, $user_old_pass);
      $user_new_pass      = mysqli_real_escape_string($this->db->link, $user_new_pass);
      $user_nconfirm_pass = mysqli_real_escape_string($this->db->link, $user_nconfirm_pass);

      $uppercase = preg_match('@[A-Z]@', $user_new_pass);
      $lowercase = preg_match('@[a-z]@', $user_new_pass);
      $number    = preg_match('@[0-9]@', $user_new_pass);
      
      if (strlen($user_new_pass) < 8) {
      	echo '<div class="alert alert-warning">New Password at Least 8 Characters!</div>';
      	exit();
      }elseif(strlen($user_new_pass) > 22){
       echo '<div class="alert alert-warning">New Password Must be within 8 to 22 Characters!</div>';
      	exit();
      }elseif(!$uppercase || !$lowercase || !$number){
       echo '<div class="alert alert-warning">New Password Minimum 8 and maximum 22 characters, at least one uppercase letter, one lowercase letter and one number! Exe: aA12hhhh5</div>';
      	exit();
      }elseif ($user_new_pass !== $user_nconfirm_pass) {
      	echo '<div class="alert alert-warning">New Password and Confirm Password Not Metch!</div>';
      	exit();
      }else{
        $user_old_pass = md5($user_old_pass);
        $checksql = "SELECT * FROM tbl_client_reg WHERE client_password = '$user_old_pass' AND  client_id = '$user_pass_change_id'";
        $checkResult = $this->db->select($checksql);
        if ($checkResult != true) {
        	echo '<div class="alert alert-danger">Your Old Password Incorrect.</div>';
        	exit();
        }else{
        	$user_new_pass = md5($user_new_pass);
        	$updatesqlpass = "UPDATE tbl_client_reg SET client_password = '$user_new_pass' WHERE client_id = '$user_pass_change_id'";
            $updateResult = $this->db->update($updatesqlpass);
            if ($updateResult) {
            	echo '<div class="alert alert-success">Your Password Chenge Successfully!</div>';
            	exit();
            }else{
            	echo '<div class="alert alert-danger">Incorrect Password</div>';
            	exit();
            }
        }
      }
   	}
   }

   public function userListShow(){
    $sql = "SELECT * FROM tbl_client_reg ORDER BY client_id DESC";
    $result = $this->db->select($sql);
    return $result;
   }
   public function userListShowperp($total_user_list,$per_page_user_list){
    $sql = "SELECT * FROM tbl_client_reg ORDER BY client_id DESC LIMIT $total_user_list,$per_page_user_list";
    $result = $this->db->select($sql);
    return $result;
   }
   public function getUserIdDelete($id){
    $sql = "DELETE FROM tbl_client_reg WHERE client_id = '$id'";
    $result = $this->db->delete($sql);
    if ($result) {
      $msg = '<div class="alert alert-success">User Id Delete Successfully!</div>';
      return $msg;
    }
   }
   public function getUserIdActive($id){
    $sql = "UPDATE tbl_client_reg SET vstatus = '1' WHERE client_id = '$id'";
    $result = $this->db->update($sql);
    return $result;
   }
   public function getUserIdDactive($id){
    $sql = "UPDATE tbl_client_reg SET vstatus = '0' WHERE client_id = '$id'";
    $result = $this->db->update($sql);
    return $result;
   }
}