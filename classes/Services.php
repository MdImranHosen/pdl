<?php
/**
* Services Class....
*/
class Services{
	
	private $db;
	private $fm;
	
  public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
  public function servicesAddCategory($data){
       $services_category = $this->fm->validation($data['services_category']);
       $services_category = mysqli_real_escape_string($this->db->link, $services_category);
       if (empty($services_category)) {
       	$msg = '<div class="alert alert-warning" role="alert">
                 Category Field must not be Empty!
                 </div>';
              return $msg;
       }else{
       	$sql = "INSERT INTO services_cat(s_category) VALUES('$services_category')";
       	$result = $this->db->insert($sql);
       	if ($result) {
       	 $msg = '<div class="alert alert-success" role="alert">
                 Category Add Successfully!
                 </div>';
             return $msg;
       	}else{
       		 $msg = '<div class="alert alert-danger" role="alert">
                 Category not Added!
                 </div>';
             return $msg;
       	}
       }
  }

  public function services_categoryResult(){
  	$sql = "SELECT * FROM services_cat ORDER BY s_cId ASC";
  	$result = $this->db->select($sql);
  	return $result;
  }

  public function getServicesCatDelete($id){
  	$sql = "DELETE FROM services_cat WHERE s_cId = '$id'";
  	$result = $this->db->delete($sql);
  	if ($result) {
  		$msg = '<div class="alert alert-success"> Services Category Deleted!</div>';
  		return $msg;
  	}else{
  		$msg = '<div class="alert alert-danger"> Services Category not Deleted!</div>';
  		return $msg;
  	}
  }

 /*   public function getServicesCatDelete($id){

      $sql = "DELETE FROM services_cat WHERE s_cId IN (SELECT services_cat.s_cId FROM pdl_services WHERE s_cId = '$id')";
      $result = $this->db->delete($sql);
    if ($result) {
      $msg = '<div class="alert alert-success"> Services Category Deleted!</div>';
      return $msg;
    }else{
      $msg = '<div class="alert alert-danger"> Services Category not Deleted!</div>';
      return $msg;
    }
  }*/

  public function servicesAdd($data,$file){
   if (empty($data['services_cId']) || empty($data['services_title']) || empty($data['ftext'])) {
     $smg = '<div class="alert alert-danger">
           Field Must not be Empty!
      </div>';
      return $smg;
   }else{
        $services_cId   = $this->fm->validation($data['services_cId']);
        $services_title = $this->fm->validation($data['services_title']);
        $ftext          = $this->fm->validationText($data['ftext']);
        $stext          = $this->fm->validationText($data['stext']);
        
        $services_cId   = mysqli_real_escape_string($this->db->link, $services_cId);
        $services_title = mysqli_real_escape_string($this->db->link, $services_title);
        $ftext          = mysqli_real_escape_string($this->db->link, $ftext);
        $stext          = mysqli_real_escape_string($this->db->link, $stext);

        $permitted      = array('png', 'jpg', 'jpeg', 'gif');
        $file_name      = $file['fimg']['name'];
        $file_size      = $file['fimg']['size'];
        $file_temp      = $file['fimg']['tmp_name'];

        $div            = explode('.', $file_name);
        $image_ext      = strtolower(end($div));
        $unique_image   = substr(md5(time()), 0, 10).'.'.$image_ext;
        $upload_image   = "upload/services/".$unique_image;

     #extra image input query....start.....

        $permitt      = array('png', 'jpg', 'jpeg', 'gif');
        $file_na_e    = $file['simg']['name'];
        $file_s_e     = $file['simg']['size'];
        $file_tm_e    = $file['simg']['tmp_name'];

        $div_e        = explode('.', $file_na_e);
        $file_ext     = strtolower(end($div_e));
        $unique_file  = substr(md5(date('Y-m-d-H-i-s')), 0, 10).'.'.$file_ext;
        $upload_file  = "upload/services/".$unique_file;

       #extra image input query....end.....
        if (!empty($file_na_e)) {
          
          if($file_s_e > 2097152){
         $msg = '<div class="alert alert-danger" role="alert">
               Image Size Should be less then 2 MB !
             </div>';
           return $msg;
      }elseif(in_array($file_ext, $permitt) === false){
          $msg = '<div class="alert alert-danger" role="alert">
                   You can uploads only:-'.implode(', ', $permitt).'</div>';
                return $msg;
      }
        }

       if(empty($file_name)){
        $msg = '<div class="alert alert-warning" role="alert">
                  Images file is not Empty!
                 </div>';
              return $msg;
       }elseif($file_size > 2097152){
         $msg = '<div class="alert alert-danger" role="alert">
               Image Size Should be less then 2 MB !
             </div>';
           return $msg;
    }elseif(in_array($image_ext, $permitted) === false){
        $msg = '<div class="alert alert-danger" role="alert">
                 You can uploads only:-'.implode(', ', $permitted).'</div>';
              return $msg;
    }else{
      $moveFile = "../".$upload_image;
      move_uploaded_file($file_temp, $moveFile);

      $moveSecondFile = "../".$upload_file;
      move_uploaded_file($file_tm_e, $moveSecondFile);
      $sql = "INSERT INTO pdl_services(s_cId,pdl_s_title,pdl_s_img,pdl_s_ftext,pdl_s_simg,pdl_s_stext) VALUES('$services_cId','$services_title','$upload_image','$ftext','$upload_file','$stext')";
      $result = $this->db->insert($sql);
      if ($result) {
        $msg = '<div class="alert alert-success" role="alert">
               Data Inserted Successfully!
             </div>';
           return $msg;
      }else{
          $msg = '<div class="alert alert-danger" role="alert">
               Data Not Inserted!
             </div>';
           return $msg;
      }
    }


   }

  }

  public function getAllServicesResult($s_id){
    $sql = "SELECT * FROM pdl_services WHERE s_cId = '$s_id'";
    $result = $this->db->select($sql);
    return $result;
  }

  public function getServicesDetailsView($id){
    $sql = "SELECT * FROM pdl_services WHERE id = '$id'";
    $result = $this->db->select($sql);
    return $result;
  }

  /*  SELECT services_cat.*, pdl_services.name FROM services_cat
            INNER JOIN pdl_services
            ON services_cat.cat = pdl_services.id
            ORDER BY services_cat.title DESC */

/*  public function getServicesViewCategory(){
    $sql = "SELECT * FROM services_cat INNER JOIN pdl_services ON services_cat.s_cId = pdl_services.s_cId";
    $result = $this->db->select($sql);
    return $result;
  }*/

  public function getServicesViewCategory($getSId){
    $sql = "SELECT * FROM services_cat WHERE s_cId = '$getSId'";
    $result = $this->db->select($sql);
    return $result;
  }

  public function getRelatedServices($c_id){
    $sql = "SELECT * FROM pdl_services WHERE s_cId = '$c_id'";
    $result = $this->db->select($sql);
    return $result;
  }

  /* Services Delete Query..Start... */

public function getServicesIdDelete($id){

  $delSql = "SELECT * FROM pdl_services WHERE id = '$id'";
  $delResult = $this->db->select($delSql);
  if ($delResult) {
     while ($delImage = $delResult->fetch_assoc()) {
            $delLink  = $delImage['pdl_s_img'];
            $delink   = '../'.$delLink;
             unlink($delink);
     }
  }

  $sql = "DELETE FROM pdl_services WHERE id = '$id'";
  $result = $this->db->delete($sql);
  if ($result) {
    $msg = '<div class="alert alert-success" role="alert">
               Data Deleted Successfully!
             </div>';
           return $msg;
  }else{
    $msg = '<div class="alert alert-warning" role="alert">
               Data is not Deleted!
             </div>';
           return $msg;
  }

}
 public function getServicesEdit($id){
  $sql = "SELECT * FROM pdl_services WHERE id = '$id'";
  $result = $this->db->select($sql);
  return $result;
 }

 public function servicesUpdate($data, $file, $id){
  if (empty($data['services_title']) || empty($data['ftext'])) {
     $smg = '<div class="alert alert-danger">
           Field Must not be Empty!
      </div>';
      return $smg;
   }else{

        $services_cId   = $this->fm->validation($data['services_cId']);
        $services_title = $this->fm->validation($data['services_title']);
        $ftext          = $this->fm->validationText($data['ftext']);
        $stext          = $this->fm->validationText($data['stext']);
        
        $services_cId   = mysqli_real_escape_string($this->db->link, $services_cId);
        $services_title = mysqli_real_escape_string($this->db->link, $services_title);
        $ftext          = mysqli_real_escape_string($this->db->link, $ftext);
        $stext          = mysqli_real_escape_string($this->db->link, $stext);

        $permitted      = array('png', 'jpg', 'jpeg', 'gif');
        $file_name      = $file['fimg']['name'];
        $file_size      = $file['fimg']['size'];
        $file_temp      = $file['fimg']['tmp_name'];

        $div            = explode('.', $file_name);
        $image_ext      = strtolower(end($div));
        $unique_image   = substr(md5(time()), 0, 10).'.'.$image_ext;
        $upload_image   = "upload/services/".$unique_image;

     #extra image input query....start.....

        $permitt      = array('png', 'jpg', 'jpeg', 'gif');
        $file_na_e    = $file['simg']['name'];
        $file_s_e     = $file['simg']['size'];
        $file_tm_e    = $file['simg']['tmp_name'];

        $div_e        = explode('.', $file_na_e);
        $file_ext     = strtolower(end($div_e));
        $unique_file  = substr(md5(date('Y-m-d-H-i-s')), 0, 10).'.'.$file_ext;
        $upload_file  = "upload/services/".$unique_file;

       #extra image input query....end.....

         if (!empty($file_name)) {
          
          if($file_size > 2097152){
             $msg = '<div class="alert alert-danger" role="alert">
                   Image Size Should be less then 2 MB !
                 </div>';
               return $msg;
          }elseif(in_array($image_ext, $permitted) === false){
              $msg = '<div class="alert alert-danger" role="alert">
                       You can uploads only:-'.implode(', ', $permitted).'</div>';
                    return $msg;
          }
        }
         if (!empty($file_na_e)) {
          
          if($file_s_e > 2097152){
             $msg = '<div class="alert alert-danger" role="alert">
                   Image Size Should be less then 2 MB !
                 </div>';
               return $msg;
          }elseif(in_array($file_ext, $permitt) === false){
              $msg = '<div class="alert alert-danger" role="alert">
                       You can uploads only:-'.implode(', ', $permitt).'</div>';
                    return $msg;
          }
        }

        if (empty($file_name) && empty($file_na_e)) {

          $editSql = "UPDATE pdl_services
                   SET 
                 s_cId       = '$services_cId',
                 pdl_s_title = '$services_title',
                 pdl_s_ftext = '$ftext',
                 pdl_s_stext = '$stext' 
                 WHERE id = '$id'";
          $editResult = $this->db->update($editSql);
          if ($editResult) {
           $msg = '<div class="alert alert-success">
              Services Data Updated Successfully!
            </div>';
            return $msg;
          }else{
            $msg = '<div class="alert alert-danger">
              Services Data Not Updated!
            </div>';
            return $msg;
          }
          
        }else{

      $moveFile = "../".$upload_image;
      move_uploaded_file($file_temp, $moveFile);

      $moveSecondFile = "../".$upload_file;
      move_uploaded_file($file_tm_e, $moveSecondFile); 

      $editSql = "UPDATE pdl_services
                   SET 
                 s_cId       = '$services_cId',
                 pdl_s_title = '$services_title',
                 pdl_s_img   = '$upload_image',
                 pdl_s_ftext = '$ftext',
                 pdl_s_simg  = '$upload_file',
                 pdl_s_stext = '$stext' 
                 WHERE id = '$id'";
      $editResult = $this->db->update($editSql);
      if ($editResult) {
       $msg = '<div class="alert alert-success">
          Services Data Updated Successfully!
        </div>';
        return $msg;
      }else{
        $msg = '<div class="alert alert-danger">
          Services Data Not Updated!
        </div>';
        return $msg;
      }

    }
   }
 }


}