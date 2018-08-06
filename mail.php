<?php
function send_mail($id,$name,$email,$password)
{   
    $from='Admin <admin@mydomain.com>';
    $headers = '';
    $headers .= "From: $from\n";
    $headers .= "Reply-to: $from\n";
    $headers .= "Return-Path: $from\n";
    $headers .= "Message-ID: <" . md5(uniqid(time())) . "@" . $_SERVER['SERVER_NAME'] . ">\n";
    $headers .= "Date: " . date('r', time()) . "\n";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

    $subject = "Welcome!";
    $message = "
    <p></p><br>
    Hi ".$name."<br>
   Thank you for registering for the event.<br><br>
   Your ID is ".$id."<br>
   Login using your email id : ".$email." and,<br>
   your password : ".$password."<br><br>";


  mail($email,$subject,$message,$headers);

}