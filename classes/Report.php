<?php
/**
 * Report class for get User Report From...
 */
class Report{
	
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getUserReport($data,$file){
      if (empty($data['report_what']) || empty($data['report_where']) || empty($data['report_when']) || empty($data['report_who']) || empty($data['report_why']) || empty($data['report_how'])) {
      	$msg = '<div class="alert alert-danger fade in">Field must not be Empty!</div>';
      	return $msg;
      }else{
         $reporter_id    = $this->fm->validation($data['reporter_id']);
         $reporter_name  = $this->fm->validation($data['reporter_name']);
         $reporter_email = $this->fm->validation($data['reporter_email']);
         $reporter_phone = $this->fm->validation($data['reporter_phone']);
         $report_what    = $this->fm->validation($data['report_what']);
         $report_where   = $this->fm->validation($data['report_where']);
         $report_when    = $this->fm->validation($data['report_when']);
         $report_who     = $this->fm->validation($data['report_who']);
         $report_why     = $this->fm->validation($data['report_why']);
         $report_how     = $this->fm->validation($data['report_how']);
         $rdate_time     = $this->fm->validation($data['rdate_time']);
         
         $reporter_id    = mysqli_real_escape_string($this->db->link, $reporter_id);
         $reporter_name  = mysqli_real_escape_string($this->db->link, $reporter_name);
         $reporter_email = mysqli_real_escape_string($this->db->link, $reporter_email);
         $reporter_phone = mysqli_real_escape_string($this->db->link, $reporter_phone);
         $report_what    = mysqli_real_escape_string($this->db->link, $report_what);
         $report_where   = mysqli_real_escape_string($this->db->link, $report_where);
         $report_when    = mysqli_real_escape_string($this->db->link, $report_when);
         $report_who     = mysqli_real_escape_string($this->db->link, $report_who);
         $report_why     = mysqli_real_escape_string($this->db->link, $report_why);
         $report_how     = mysqli_real_escape_string($this->db->link, $report_how);
         $rdate_time     = mysqli_real_escape_string($this->db->link, $rdate_time);
         
         $permit     = array('jpg','jpeg','png','gif');
         $file_name  = $file['report_image']['name'];
         $file_size  = $file['report_image']['size'];
         $file_temp  = $file['report_image']['tmp_name'];

         $div        = explode('.', $file_name);
         $image_ext  = strtolower(end($div));
         $img_unique = substr(md5(time()), 0, 10).'.'.$image_ext;
         $img_file   = "upload/report/".$img_unique;

         /* Files and Document upload system ......*/

         $permitfile     = array('jpg','jpeg','png','gif','pdf','doc','docx');
         $file_namefile  = $file['report_file']['name'];
         $file_sizefile  = $file['report_file']['size'];
         $file_tempfile  = $file['report_file']['tmp_name'];

         $divfile        = explode('.', $file_namefile);
         $image_extfile  = strtolower(end($divfile));
         $img_uniquefile = substr(md5(date('Y-m-d-H-i-s')), 0, 10).'.'.$image_extfile;
         $img_filed      = "upload/report/".$img_uniquefile;

         if (!empty($file_name)) {
         	if ($file_size > 2097152) {
         	  $msg = '<div class="alert alert-danger">Image Size Should be less then 2 MB !</div>';
         	  return $msg;
         	}elseif(in_array($image_ext, $permit) === false){
              $msg = '<div class="alert alert-danger">
                   You can Upload onliy:-'.implode(', ', $permit).'</div>';
              return $msg;
         	}
         }else{
         	$img_file = '';
         }

         if (!empty($file_namefile)) {
         	if ($file_sizefile > 2097152) {
         	  $msg = '<div class="alert alert-danger">File Size Should be less then 2 MB !</div>';
         	  return $msg;
         	}elseif(in_array($image_extfile, $permitfile) === false){
              $msg = '<div class="alert alert-danger">
                   You can Upload onliy:-'.implode(', ', $permitfile).'</div>';
              return $msg;
         	}
         }else{
         	$img_filed = '';
         }
         
         move_uploaded_file($file_temp, $img_file);
         move_uploaded_file($file_tempfile, $img_filed);
         $sql = "INSERT INTO report_from_data_get(client_id,client_name,client_email,client_phone,	r_what,r_where,r_when,r_who,r_why,r_how,report_img,report_file,date_time) VALUES('$reporter_id','$reporter_name','$reporter_email','$reporter_phone','$report_what','$report_where','$report_when','$report_who','$report_why','$report_how','$img_file','$img_filed','$rdate_time')";
         $result = $this->db->insert($sql);
         if ($result) {
         	$msg = '<div class="alert alert-success">Thanks for Reporting!</div>';
         	return $msg;


            $to = "pdetective65@gmail.com,news@pdl007.com";
            $subject = $report_what;
            $message = "
                        Author: $reporter_name
                        <br>
                        What: $report_what
                        <br>
                        Where: $report_where
                        <br>
                        When: $report_when
                        <br>
                        Who: $report_who
                        <br>
                        Why: $report_why
                        <br>
                        How: $report_how

                  ";
            $headers  = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From:info@pdl007.com' . "\r\n";
            $rootfile = "../".$img_file;
            mail($to, $subject, $message, $headers, $rootfile);




         }else{
         	$msg = '<div class="alert alert-danger">Something went wrong please try again !</div>';
         }
      }
	}

	/*  User Report list Manage...*/
    public function reportListShowperp($total_report_list,$per_page_report_list){
    	$sql = "SELECT * FROM report_from_data_get ORDER BY report_data_id DESC LIMIT $total_report_list,$per_page_report_list";
    	$result = $this->db->select($sql);
    	return $result;
    }

    /* Report list Show ...*/
    public function reportListShow(){
    	$sql = "SELECT * FROM report_from_data_get ORDER BY report_data_id DESC";
    	$result = $this->db->select($sql);
    	return $result;
    }

    public function deleteReportid($id){
        $delrsql = "SELECT * FROM report_from_data_get WHERE report_data_id = '$id'";
        $delresult = $this->db->select($delrsql);
        if ($delresult) {
        	while ($checkresult = $delresult->fetch_assoc()) {
        		  $image        = $checkresult['report_img'];
        		  $filedoc      = $checkresult['report_file'];
        		  $imagelink    = '../'.$image;
        		  $filedoclink  = '../'.$filedoc;

        		  if (!file_exists($imagelink)) {
        		  	
        		  }else{
        		  	unlink($imagelink);
        		  }

        		  if (!file_exists($filedoclink)) {
        		  	
        		  }else{
        		  	unlink($filedoclink);
        		  }
        	}
        }

    	$sql = "DELETE FROM report_from_data_get WHERE report_data_id = '$id'";
    	$result = $this->db->delete($sql);
    	if ($result) {
    		 $msg = '<div class="alert alert-success">Report Data Deleted !</div>';
    		 return $msg;
    	}else{
    		$msg = '<div class="alert alert-danger">Data not Deleted!</div>';
    		return $msg;
    	}
    }

    public function getReportIdSeen($id){
        $sql = "SELECT * FROM report_from_data_get WHERE report_data_id = '$id'";
        $result = $this->db->select($sql);
        return $result;
    }
    
    public function getPerRepoterPost($c_id){
        $sameSql = "SELECT * FROM report_from_data_get WHERE client_id = '$c_id'";
        $result = $this->db->select($sameSql);
        return $result;
    }
}