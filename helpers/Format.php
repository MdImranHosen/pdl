<?php
/**
* Format class
*/
class Format{

public function validation($data){
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 }
  public function validationText($data){
  $data = trim($data);
  $data = stripcslashes($data);
  #$data = htmlspecialchars($data);
  return $data;
 }
 
  public function textMqShorten($text, $limit = 60){
  $text = $text. " ";
  $text = substr($text, 0, $limit);
  $text = substr($text, 0, strrpos($text, ' '));
  $text = $text."...";
  return $text;
 }

 public function FormatDate($date){
    return date('F j, Y, g:i a', strtotime($date));

  }

   public function title(){
           $path = $_SERVER['SCRIPT_FILENAME'];
           $title = basename($path, '.php');
           $title = str_replace('_', ' ', $title);
           if ($title == 'index') {
             $title = 'Home Admin Panel';
           } elseif ($title == 'mailbox') {
             $title = 'User Message';
           } elseif($title == 'registration'){
              $title = 'Admin Registration';
           } elseif($title == 'cvdowndoadok'){
              $title = 'Already Download CV List';
           } elseif($title == 'search'){
              $title = 'View Search Result';
           }
           return $title = ucwords($title);
    }

}