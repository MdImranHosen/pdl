<?php
/**
 * Registrationfacility class....
 */
class Registrationfacility{
	
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function registrationFacilityAdd($data){
	  if (empty($data['user_reg_fac'])) {
	  	$msg = '<div class="alert alert-danger">Field Must not be Empty!</div>';
	  	return $msg;
	  }else{
	  	$user_reg_fac = $this->fm->validation($data['user_reg_fac']);
       $user_reg_fac = mysqli_real_escape_string($this->db->link, $user_reg_fac);


       $sql = "INSERT INTO  tbl_reg_fac(reg_facility) VALUES('$user_reg_fac')";
       $result = $this->db->insert($sql);
       return $result;
	  }
       
	}
	public function regfacilityShow(){
		$sql = "SELECT * FROM tbl_reg_fac ORDER BY reg_fac_id ASC";
		$result = $this->db->select($sql);
		return $result;
	}
	public function getRegFacilityDelete($id){
		$sql = "DELETE FROM tbl_reg_fac WHERE reg_fac_id = '$id'";
		$result = $this->db->delete($sql);
		return $result;
	}
	public function reportDataAdd($data){
      if (empty($data['report_data_title']) || empty($data['report_data_details'])) {
      	$msg = '<div class="alert alert-danger"></div>';
      	return $msg;
      }else{
         $report_data_title   = $this->fm->validation($data['report_data_title']);
         $report_data_details = $this->fm->validation($data['report_data_details']);
         $date_time           = $this->fm->validation($data['date_time']);

         $report_data_title   = mysqli_real_escape_string($this->db->link, $report_data_title);
         $report_data_details = mysqli_real_escape_string($this->db->link, $report_data_details);
         $date_time           = mysqli_real_escape_string($this->db->link, $date_time);

         $sql = "INSERT INTO user_report_data(report_title,report_details,date_time) VALUES('$report_data_title','$report_data_details','$date_time')";
         $result = $this->db->insert($sql);
         if ($result) {
         	$msg = '<div class="alert alert-success">User Report From Data Inserted !</div>';
            return $msg;
         }else{
         	$msg = '<div class="alert alert-danger">Not Inserted !</div>';
            return $msg;
         }
      }
	}
	public function showAllReprotData(){
		$sql = "SELECT * FROM user_report_data ORDER BY report_id ASC";
		$result = $this->db->select($sql);
		return $result;
	}
	public function getReportDeleteId($id){
		$sql = "DELETE FROM user_report_data WHERE report_id = '$id'";
		$result = $this->db->delete($sql);
		return $result;
	}
}