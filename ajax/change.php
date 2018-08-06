<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
include_once ($filepath.'/../classes/Signin.php');
$sign = new Signin();

$user_pass_change_id = $_POST['user_pass_change_id'];
$user_old_pass       = $_POST['user_old_pass'];
$user_new_pass       = $_POST['user_new_pass'];
$user_nconfirm_pass  = $_POST['user_nconfirm_pass'];

$get_user_pass_chenge = $sign->getUserChengePass($user_pass_change_id,$user_old_pass,$user_new_pass,$user_nconfirm_pass);

/* Chenge user password */