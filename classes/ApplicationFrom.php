<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class ApplicationFrom{
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getApplicationFromSubmit($data, $file){
        
         if (empty($data['name1']) || empty($data['designation76']) || empty($data['email2']) || empty($data['age3']) || empty($data['phone4']) || empty($data['gender81']) || empty($data['religion82']) || empty($data['married7']) || empty($data['politic8']) || empty($data['disease59']) || empty($data['diseasep60']) || empty($data['sscpn10']) || empty($data['sscd11']) || empty($data['sscd11']) || empty($data['sscg12']) || empty($data['sscpassingyear83']) || empty($data['hscpn13']) || empty($data['hscd14']) || empty($data['hscg15']) || empty($data['hscyar84']) || empty($data['p_profession20']) || empty($data['income22']) || empty($data['p_district23']) || empty($data['p_thana24']) || empty($data['p_house_number25']) || empty($data['house64']) || empty($data['par_district26']) || empty($data['par_thana27']) || empty($data['par_house_number28']) || empty($data['house65']) || empty($data['father_name29']) || empty($data['father_professional30']) || empty($data['visited_district36']) || empty($data['computer62']) || empty($data['local_guardian52']) || empty($data['guardian_phone53']) || empty($data['relation54'])) {
	    	$msg = '<div class="alert alert-danger" role="alert">
                অবশ্যই পূরণ করতে হবে  * সাইন কৃত ইনপুট ফিল্ড গুলো
                 </div>';
              return $msg;
	    } else{

		$name1                 = $this->fm->validation($data['name1']);
    $designation76         = $this->fm->validation($data['designation76']);
		$email2                = $this->fm->validation($data['email2']);
    $facebookId58          = $this->fm->validation($data['facebookId58']);
		$age3                  = $this->fm->validation($data['age3']);
		$phone4                = $this->fm->validation($data['phone4']);
		$nid6                  = $this->fm->validation($data['nid6']);
    $gender81              = $this->fm->validation($data['gender81']);
    $religion82            = $this->fm->validation($data['religion82']);
		$married7              = $this->fm->validation($data['married7']);
		$politic8              = $this->fm->validation($data['politic8']);
		$politic_d9            = $this->fm->validation($data['politic_d9']);
    $disease59             = $this->fm->validation($data['disease59']);
    $diseasep60            = $this->fm->validation($data['diseasep60']);
    $diseased61            = $this->fm->validation($data['diseased61']);
		$sscpn10               = $this->fm->validation($data['sscpn10']);
		$sscd11                = $this->fm->validation($data['sscd11']);
		$sscg12                = $this->fm->validation($data['sscg12']);
    $sscpassingyear83      = $this->fm->validation($data['sscpassingyear83']);
		$hscpn13               = $this->fm->validation($data['hscpn13']);
		$hscd14                = $this->fm->validation($data['hscd14']);
		$hscg15                = $this->fm->validation($data['hscg15']);
    $hscyar84              = $this->fm->validation($data['hscyar84']);
		$gpn16                 = $this->fm->validation($data['gpn16']);
		$gdiv17                = $this->fm->validation($data['gdiv17']);
		$gcgpa18               = $this->fm->validation($data['gcgpa18']);
    $cgpapy84              = $this->fm->validation($data['cgpapy84']);
		$e_orther19            = $this->fm->validation($data['e_orther19']);
		$p_profession20        = $this->fm->validation($data['p_profession20']);
		$past_profession21     = $this->fm->validation($data['past_profession21']);
		$income22              = $this->fm->validation($data['income22']);
		$p_district23          = $this->fm->validation($data['p_district23']);
		$p_thana24             = $this->fm->validation($data['p_thana24']);
		$p_house_number25      = $this->fm->validation($data['p_house_number25']);
    $house64               = $this->fm->validation($data['house64']);
		$par_district26        = $this->fm->validation($data['par_district26']);
		$par_thana27           = $this->fm->validation($data['par_thana27']);
		$par_house_number28    = $this->fm->validation($data['par_house_number28']);
    $house65               = $this->fm->validation($data['house65']);
		$father_name29         = $this->fm->validation($data['father_name29']);
		$father_professional30 = $this->fm->validation($data['father_professional30']);
		$brother_h31           = $this->fm->validation($data['brother_h31']);
		$sister_h32            = $this->fm->validation($data['sister_h32']);
		$p_bro_sister33        = $this->fm->validation($data['p_bro_sister33']);
		$bro_sister_occ34      = $this->fm->validation($data['bro_sister_occ34']);
		$g_p_rab_army35        = $this->fm->validation($data['g_p_rab_army35']);
		$visited_district36    = $this->fm->validation($data['visited_district36']);
		$visited_country37     = $this->fm->validation($data['visited_country37']);
		$report_writing38      = $this->fm->validation($data['report_writing38']);
		$detective_book39      = $this->fm->validation($data['detective_book39']);
		$electrical_wiring40   = $this->fm->validation($data['electrical_wiring40']);
		$cooking41             = $this->fm->validation($data['cooking41']);
		$dress_making42        = $this->fm->validation($data['dress_making42']);
		$hand_drilling43       = $this->fm->validation($data['hand_drilling43']);
		$driving44             = $this->fm->validation($data['driving44']);
    $owncar66              = $this->fm->validation($data['owncar66']);
		$song45                = $this->fm->validation($data['song45']);
    $dance46               = $this->fm->validation($data['dance46']);
    $actor47               = $this->fm->validation($data['actor47']);
    $poem48                = $this->fm->validation($data['poem48']);
    $exercise49            = $this->fm->validation($data['exercise49']);
    $shooter50             = $this->fm->validation($data['shooter50']);
    $computer62            = $this->fm->validation($data['computer62']);
    $computerd63           = $this->fm->validation($data['computerd63']);
    $otrher_know51         = $this->fm->validation($data['otrher_know51']);
    $local_guardian52      = $this->fm->validation($data['local_guardian52']);
    $guardian_phone53      = $this->fm->validation($data['guardian_phone53']);
    $relation54            = $this->fm->validation($data['relation54']);
    $guardian_address55    = $this->fm->validation($data['guardian_address55']);
    $guardian_profession56 = $this->fm->validation($data['guardian_profession56']);
    $guardian_age57        = $this->fm->validation($data['guardian_age57']);
     
        $name1                 = mysqli_real_escape_string($this->db->link, $name1);
        $designation76         = mysqli_real_escape_string($this->db->link, $designation76);
        $email2                = mysqli_real_escape_string($this->db->link, $email2);
        $facebookId58          = mysqli_real_escape_string($this->db->link, $facebookId58);
        $age3                  = mysqli_real_escape_string($this->db->link, $age3);
        $phone4                = mysqli_real_escape_string($this->db->link, $phone4);
        $nid6                  = mysqli_real_escape_string($this->db->link, $nid6);
        $gender81              = mysqli_real_escape_string($this->db->link, $gender81);
        $religion82            = mysqli_real_escape_string($this->db->link, $religion82);
        $married7              = mysqli_real_escape_string($this->db->link, $married7);
        $politic8              = mysqli_real_escape_string($this->db->link, $politic8);
        $politic_d9            = mysqli_real_escape_string($this->db->link, $politic_d9);
        $disease59             = mysqli_real_escape_string($this->db->link, $disease59);
        $diseasep60            = mysqli_real_escape_string($this->db->link, $diseasep60);
        $diseased61            = mysqli_real_escape_string($this->db->link, $diseased61);
        $sscpn10               = mysqli_real_escape_string($this->db->link, $sscpn10);
        $sscd11                = mysqli_real_escape_string($this->db->link, $sscd11);
        $sscg12                = mysqli_real_escape_string($this->db->link, $sscg12);
        $sscpassingyear83      = mysqli_real_escape_string($this->db->link, $sscpassingyear83);
        $hscpn13               = mysqli_real_escape_string($this->db->link, $hscpn13);
        $hscd14                = mysqli_real_escape_string($this->db->link, $hscd14);
        $hscg15                = mysqli_real_escape_string($this->db->link, $hscg15);
        $hscyar84              = mysqli_real_escape_string($this->db->link, $hscyar84);
        $gpn16                 = mysqli_real_escape_string($this->db->link, $gpn16);
        $gdiv17                = mysqli_real_escape_string($this->db->link, $gdiv17);
        $gcgpa18               = mysqli_real_escape_string($this->db->link, $gcgpa18);
        $cgpapy84              = mysqli_real_escape_string($this->db->link, $cgpapy84);
        $e_orther19            = mysqli_real_escape_string($this->db->link, $e_orther19);
        $p_profession20        = mysqli_real_escape_string($this->db->link, $p_profession20);
        $past_profession21     = mysqli_real_escape_string($this->db->link, $past_profession21);
        $income22              = mysqli_real_escape_string($this->db->link, $income22);
        $p_district23          = mysqli_real_escape_string($this->db->link, $p_district23);
        $p_thana24             = mysqli_real_escape_string($this->db->link, $p_thana24);
        $p_house_number25      = mysqli_real_escape_string($this->db->link, $p_house_number25);
        $house64               = mysqli_real_escape_string($this->db->link, $house64);
        $par_district26        = mysqli_real_escape_string($this->db->link, $par_district26);
        $par_thana27           = mysqli_real_escape_string($this->db->link, $par_thana27);
        $par_house_number28    = mysqli_real_escape_string($this->db->link, $par_house_number28);
        $house65               = mysqli_real_escape_string($this->db->link, $house65);
        $father_name29         = mysqli_real_escape_string($this->db->link, $father_name29);
        $father_professional30 = mysqli_real_escape_string($this->db->link, $father_professional30);
        $brother_h31           = mysqli_real_escape_string($this->db->link, $brother_h31);
        $sister_h32            = mysqli_real_escape_string($this->db->link, $sister_h32);
        $p_bro_sister33        = mysqli_real_escape_string($this->db->link, $p_bro_sister33);
        $bro_sister_occ34      = mysqli_real_escape_string($this->db->link, $bro_sister_occ34);
        $g_p_rab_army35        = mysqli_real_escape_string($this->db->link, $g_p_rab_army35);
        $visited_district36    = mysqli_real_escape_string($this->db->link, $visited_district36);
        $visited_country37     = mysqli_real_escape_string($this->db->link, $visited_country37);
        $report_writing38      = mysqli_real_escape_string($this->db->link, $report_writing38);
        $detective_book39      = mysqli_real_escape_string($this->db->link, $detective_book39);
        $electrical_wiring40   = mysqli_real_escape_string($this->db->link, $electrical_wiring40);
        $cooking41             = mysqli_real_escape_string($this->db->link, $cooking41);
        $dress_making42        = mysqli_real_escape_string($this->db->link, $dress_making42);
        $hand_drilling43       = mysqli_real_escape_string($this->db->link, $hand_drilling43);
        $driving44             = mysqli_real_escape_string($this->db->link, $driving44);
        $owncar66              = mysqli_real_escape_string($this->db->link, $owncar66);
        $song45                = mysqli_real_escape_string($this->db->link, $song45);
        $dance46               = mysqli_real_escape_string($this->db->link, $dance46);
        $actor47               = mysqli_real_escape_string($this->db->link, $actor47);
        $poem48                = mysqli_real_escape_string($this->db->link, $poem48);
        $exercise49            = mysqli_real_escape_string($this->db->link, $exercise49);
        $shooter50             = mysqli_real_escape_string($this->db->link, $shooter50);
        $computer62            = mysqli_real_escape_string($this->db->link, $computer62);
        $computerd63           = mysqli_real_escape_string($this->db->link, $computerd63);
        $otrher_know51         = mysqli_real_escape_string($this->db->link, $otrher_know51);
        $local_guardian52      = mysqli_real_escape_string($this->db->link, $local_guardian52);
        $guardian_phone53      = mysqli_real_escape_string($this->db->link, $guardian_phone53);
        $relation54            = mysqli_real_escape_string($this->db->link, $relation54);
        $guardian_address55    = mysqli_real_escape_string($this->db->link, $guardian_address55);
        $guardian_profession56 = mysqli_real_escape_string($this->db->link, $guardian_profession56);
        $guardian_age57        = mysqli_real_escape_string($this->db->link, $guardian_age57);
        
       # $facebookId58          = filter_var($facebookId58, FILTER_SANITIZE_URL);
        $email2                = filter_var($email2, FILTER_SANITIZE_EMAIL);

      $permited    = array('jpg', 'png', 'gif', 'jpeg');
	    $file_name   = $file['image5']['name'];
	    $file_size   = $file['image5']['size'];
	    $file_temp   = $file['image5']['tmp_name'];

	    $div         = explode('.', $file_name);
	    $file_ext    = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "upload/".$unique_image;

      /* applicationForom apply person CV */

        $permitt      = array('doc', 'pdf', 'docx');
        $file_na_e    = $file['image71']['name'];
        $file_s_e     = $file['image71']['size'];
        $file_tm_e    = $file['image71']['tmp_name'];

        $div_e        = explode('.', $file_na_e);
        $file_extes     = strtolower(end($div_e));
        $unique_file  = substr(md5(date('Y-m-d-H-i-s')), 0, 10).'.'.$file_extes;
        $upload_file  = "upload/cvfile/".$unique_file;

       #extra image input query....end.....
        if (!empty($file_na_e)) {
          
          if($file_s_e > 2097152){
         $msg = '<div class="alert alert-danger" role="alert">
               CV size Should be less then 2 MB !
             </div>';
           return $msg;
      }elseif(in_array($file_extes, $permitt) === false){
          $msg = '<div class="alert alert-danger" role="alert">
                   You can uploads only:-'.implode(', ', $permitt).'</div>';
                return $msg;
      }
        }

      /* applicationForm apply person end CV */

      /* applicationForom apply person Sonod */

        $permitted      = array('png', 'jpg', 'jpeg');
        $file_na_eso    = $file['image75']['name'];
        $file_s_eso     = $file['image75']['size'];
        $file_tm_eso    = $file['image75']['tmp_name'];

        $div_eso        = explode('.', $file_na_eso);
        $file_extso     = strtolower(end($div_eso));
        $unique_fileso  = substr(md5(date('y-m-d-h-i-s')), 0, 10).'.'.$file_extso;
        $upload_fileso  = "upload/cvfileso/".$unique_fileso;

       #extra image input query....end.....
        if (!empty($file_na_eso)) {
          
          if($file_s_eso > 2097152){
         $msg = '<div class="alert alert-danger" role="alert">
               Image Size Should be less then 2 MB !
             </div>';
           return $msg;
      }elseif(in_array($file_extso, $permitted) === false){
          $msg = '<div class="alert alert-danger" role="alert">
                   You can uploads only:-'.implode(', ', $permitted).'</div>';
                return $msg;
      }
        }

      /* applicationForm apply person end Sonod */

	   if (!filter_var($email2, FILTER_VALIDATE_EMAIL)) {
	    	$msg = '<div class="alert alert-danger" role="alert">
                  অকার্যকর ইমেইল ঠিকানা !
                 </div>';
              return $msg;
	    }/*elseif (!filter_var($facebookId58, FILTER_VALIDATE_URL)) {
          $msg = '<div class="alert alert-warning" role="alert">
                  $facebookId58 is a Invalid URL
                 </div>';
         return $msg;
     }*/elseif(empty($file_name)){
          $msg = '<div class="alert alert-warning" role="alert">
                  অবশ্যই ছবির ফিল্ড টি পূরণ  করতে হবে
                 </div>';
              return $msg;
	    }elseif($file_size > 2097152){
          $msg = '<div class="alert alert-warning" role="alert">
                  ছবির সাইজ অবশ্যই ২ এম্বি এর কম হতে হবে
                 </div>';
              return $msg;
	    }elseif(in_array($file_ext, $permited) === false){
           $msg = '<div class="alert alert-danger" role="alert">
                  ছবির এক্সটেনশন অবশ্যই '.implode(", ", $permited).' হতে হবে
                 </div>';
              return $msg;
	    }else{
	    	$mailchake = "SELECT * FROM tbl_registration WHERE email2 = '$email2' LIMIT 1";
	    	$mailresult = $this->db->select($mailchake);
	    	if ($mailresult != false) {
	    		$msg = '<div class="alert alert-warning" role="alert">
                  এই ইমেইল এড্রেস একবার ব্যবহার করা হয়েছে 
                 </div>';
              return $msg;
	    	}else{
	    		move_uploaded_file($file_temp, $uploaded_image);
          move_uploaded_file($file_tm_e, $upload_file);
          move_uploaded_file($file_tm_eso, $upload_fileso);

	    		$sql = "INSERT INTO tbl_registration(name1, designation76, email2, facebookId58, age3, phone4, image5, nid6, gender81, religion82, married7, politic8, politic_d9, disease59, diseasep60, diseased61, sscpn10, sscd11, sscg12, sscpassingyear83, hscpn13, hscd14, hscg15, hscyar84, gpn16, gdiv17, gcgpa18, cgpapy84, e_orther19, p_profession20, past_profession21, income22, p_district23, p_thana24, p_house_number25, house64, image71, image75, par_district26, par_thana27, par_house_number28, house65, father_name29, father_professional30, brother_h31, sister_h32, p_bro_sister33, bro_sister_occ34, g_p_rab_army35, visited_district36, visited_country37, report_writing38, detective_book39, electrical_wiring40, cooking41, dress_making42, hand_drilling43, driving44, owncar66, song45, dance46, actor47, poem48, exercise49, shooter50,computer62, computerd63, otrher_know51, local_guardian52, guardian_phone53, relation54, guardian_address55, guardian_profession56, guardian_age57) VALUES('$name1','$designation76','$email2','$facebookId58','$age3','$phone4','$uploaded_image','$nid6','$gender81','$religion82','$married7','$politic8','$politic_d9','$disease59','$diseasep60','$diseased61','$sscpn10','$sscd11','$sscg12','$sscpassingyear83','$hscpn13','$hscd14','$hscg15','$hscyar84','$gpn16','$gdiv17','$gcgpa18','$cgpapy84','$e_orther19','$p_profession20','$past_profession21','$income22','$p_district23','$p_thana24','$p_house_number25','$house64','$upload_file','$upload_fileso','$par_district26','$par_thana27','$par_house_number28','$house65','$father_name29','$father_professional30','$brother_h31','$sister_h32','$p_bro_sister33','$bro_sister_occ34','$g_p_rab_army35','$visited_district36','$visited_country37','$report_writing38','$detective_book39','$electrical_wiring40','$cooking41','$dress_making42','$hand_drilling43','$driving44','$owncar66','$song45','$dance46','$actor47','$poem48','$exercise49','$shooter50','$computer62','$computerd63','$otrher_know51','$local_guardian52','$guardian_phone53','$relation54','$guardian_address55','$guardian_profession56','$guardian_age57')";
	    		$result = $this->db->insert($sql);
	    		if ($result) {
            $to = $email2;
            $subject = "Welcome to Private Detective LTD";
            $message = "
              
                  Welcome $name1 
                 Thanks for applying for this jobs. If you selected our shortlist we will notify you.
                 <address>৮৬/১, মসজিদ গলি,নয়া পল্টন, ঢাকা - ১০০০</address>
                 www.pdl007.com and Newspaper: www.pdnewsbd.com
              ";
            $headers = 'From:info@pdl007.com' . "\r\n";
            mail($to, $subject, $message, $headers);
	    			$msg = '<div class="alert alert-success">
                       Thank you for apply for this job. Check your Email!
	    			</div>';
	    			return $msg;
	    		}else{
	    			$msg = '<div class="alert alert-danger">
                       Data Not Inserted!
	    			</div>';
	    			return $msg;
	    		}

	    	}

	    }
	    
	}
   }

// application form admin panel in query...

public function getJobApplicatonCvList($start_form,$per_page){
  $sql = "SELECT * FROM tbl_registration WHERE c_id ='0' ORDER BY p_district23 DESC LIMIT $start_form, $per_page";

  $result = $this->db->select($sql);
  return $result;
 }
 
 // get Pagination New Cv List index page ..

public function getPaginationCvList(){
  $sql = "SELECT * FROM tbl_registration WHERE c_id ='0' ORDER BY id DESC";
  $result = $this->db->select($sql);
  return $result;
 }

//CV Download after show Download list...
 public function getJobApplicatonCvListDownOk($start_form,$per_page){
  $sql = "SELECT * FROM tbl_registration WHERE c_id ='1' ORDER BY id DESC LIMIT $start_form, $per_page";
  $result = $this->db->select($sql);
  return $result;
 }

 //CV get Download Pagination Cv List...
  public function getDownloadPaginationCvList(){
  $sql = "SELECT * FROM tbl_registration WHERE c_id ='1' ORDER BY id DESC";
  $result = $this->db->select($sql);
  return $result;
 }

/* Serch CV start from keyword */
 public function getSearchKeyword($search){
  if (empty($search)) {
    $msg = '<div class="alert alert-danger">
              Field Must Not be Empty!
            </div>';
    return $msg;
  }else{
  $search = $this->fm->validation($search);

  $search = mysqli_real_escape_string($this->db->link, $search);
  return $search;
  }
 }
/* Serch CV start from keyword Search Query */
 public function getSearchCatchTable($search){
   $query = "SELECT * FROM tbl_registration WHERE name1 LIKE '%$search%' OR email2 LIKE '%$search%' OR phone4 LIKE '%$search%' OR p_district23 LIKE '%$search%' OR p_thana24 LIKE '%$search%'";
     $result = $this->db->select($query);
     return $result;
 }

 //CV list to Delete query.....

 public function getJobApplicatonCvDelete($id){
  $sqlResult = "SELECT * FROM tbl_registration WHERE id = '$id'";
  $resultQuery = $this->db->select($sqlResult);
  if ($resultQuery) {
    while ($delImg = $resultQuery->fetch_assoc()) {
      $dellink = '../'.$delImg['image5'];
          unlink ($dellink);
    }
  }

  $sql = "DELETE FROM tbl_registration WHERE id = '$id'";
  $result = $this->db->delete($sql);
  if ($result) {
    $msg = '<div class="alert alert-danger" role="alert">
                  Shop List to Data Deleted Successfully!
                 </div>';
        return $msg;
  }else{
    $msg = '<div class="alert alert-Warning" role="alert">
                  Data Not Deleted!
                 </div>';
        return $msg;
  }
 }

 // Job applicaction CV View Options...
   public function getJobApplicatonCvView($id){
    $sql = "SELECT * FROM tbl_registration WHERE id = '$id'";
    $result = $this->db->select($sql);
    return $result;
   }

  //New CV to Download Ok Successfully ....
  public function getJobCvdownloadOk($id){
    $sql = "UPDATE tbl_registration SET 
                  c_id = '1'
                  WHERE id = '$id'";
    $result = $this->db->update($sql);
    return $result;

  }

  /* Total CV Count Number */
   public function getCvNumber(){
    $serSql = "SELECT * FROM tbl_registration ORDER BY id DESC";
    $searchNumber = $this->db->select($serSql);
    return $searchNumber;
  }
 /* New CV Number Count */
  public function getNewCvNumber(){
    $serSql = "SELECT * FROM tbl_registration WHERE c_id = '0' ORDER BY id DESC";
    $searchNumber = $this->db->select($serSql);
    return $searchNumber;
  }
  /* Old CV Download Number Count */
  public function getOldCVDownload(){
    $oldSql = "SELECT * FROM tbl_registration WHERE c_id = '1' ORDER BY id DESC";
    $oldNumber = $this->db->select($oldSql);
    return $oldNumber;
  }

  // all cv importent thing download.....

  public function getAllCvImportents(){
    $pdf = "SELECT * FROM tbl_registration WHERE id ORDER BY p_district23 DESC";
    $result = $this->db->select($pdf);
    return $result;
  }

}