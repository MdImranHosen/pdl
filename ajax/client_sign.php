<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
include_once ($filepath.'/../classes/Signin.php');
$sign = new Signin();

  $client_email_use       = $_POST['client_email_use'];
  $client_password_pass   = $_POST['client_password_pass'];

  $get_signin_user = $sign->getClientSigin($client_email_use, $client_password_pass);

  //Insert Contact us data with ajax