<?php
/**
 * Notices Class for Notice...
 */
class Notices{

	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function noticesAdd($data, $file){
		if (empty($data['notice_title'])) {
			$mgs = '<div class="alert alert-danger">
                    Field must not be Empty!
			      </div>';
			return $mgs;
		}else{

		$notice_title = $this->fm->validation($data['notice_title']);
		$notice_title = mysqli_real_escape_string($this->db->link, $notice_title);
		$date_time    = mysqli_real_escape_string($this->db->link, $data['date_time']);

		$parmit_file = array('pdf','xlsx','xls');
		$file_name   = $file['notice_pdf']['name'];
		$file_size   = $file['notice_pdf']['size'];
		$file_temp   = $file['notice_pdf']['tmp_name'];

		$file_div    = explode('.', $file_name);
		$file_ext    = strtolower(end($file_div));
		$unique_file = substr(md5(date('s/i/H/d/m/Y')), 0, 10).'.'.$file_ext;
		$upload_file = "upload/notice/".$unique_file;

		if (empty($file_name)) {
			$mgs = '<div class="alert alert-danger">
                    Notice pdf file must not be Empty!
			      </div>';
			return $mgs;
		}else{
			   $move_file  = '../'.$upload_file;
               move_uploaded_file($file_temp, $move_file);
			$sql = "INSERT INTO tbl_notice(notice_title,notice_pdf,date_time) VALUES('$notice_title','$upload_file','$date_time')";
			$result = $this->db->insert($sql);
			if ($result) {
				$mgs = '<div class="alert alert-success">
                    Notice Uploaded Successfully!
			      </div>';
			return $mgs;
			}else{
				$mgs = '<div class="alert alert-worning">
                     Notice Not Insert!
			      </div>';
			return $mgs;
			}
		}

		}

	}
  public function showAllNotices(){
  	$sql = "SELECT * FROM tbl_notice ORDER BY id DESC";
  	$result = $this->db->select($sql);
  	return $result;
  }

  public function getNoticeDeleteId($id){
  	$delSelect = "SELECT * FROM tbl_notice WHERE id ='$id'";
  	$noticRes = $this->db->select($delSelect);
  	if ($noticRes) {
  		while ($notices_res = $noticRes->fetch_assoc()) {
  			  $delPdf = $notices_res['notice_pdf'];
  			  $delPdfLink = '../'.$delPdf;
  			  if (!file_exists($delPdfLink)) {
  			  	
  			  }else{
  			  unlink($delPdfLink);
  			  }
  		}
  		
  	}

  	$delSql = "DELETE FROM tbl_notice WHERE id = '$id'";
  	$delResult = $this->db->delete($delSql);
  	if ($delResult) {
  		$mgs = '<div class="alert alert-success">Notice Delete Successfully!</div>';
  		return $mgs;
  	}else{
  		$mgs = '<div class="alert alert-danger">Notice Not Deleted.</div>';
  		return $mgs;
  	}
  }

  public function showlimitNotices(){
  	$sql = "SELECT * FROM tbl_notice ORDER BY id DESC LIMIT 5";
  	$result = $this->db->select($sql);
  	return $result;
  }

}