<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
/**
* Title Class 
*/
class Title{
	
	private $db;
	private $fm;
	
  public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getCvTitle($pagetitleid){
		$sql = "SELECT * FROM tbl_registration WHERE id = '$pagetitleid'";
		$result = $this->db->select($sql);
		return $result;
	}

	public function getCvTitleDownload($tiDowid){
		$sql = "SELECT * FROM tbl_registration WHERE id = '$tiDowid'";
		$result = $this->db->select($sql);
		return $result;
	}

	public function getCvTitleDownloadWord($tiDowidword){
		$sql = "SELECT * FROM tbl_registration WHERE id = '$tiDowidword'";
		$result = $this->db->select($sql);
		return $result;
	}
}