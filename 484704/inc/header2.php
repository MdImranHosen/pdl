<?php
 include "../lib/Session.php";
 Session::checkSession();

  include "../lib/Database.php";
  include "../helpers/Format.php";
  include "../classes/ApplicationFrom.php";
  include "../classes/Contact.php";
  include "../classes/Title.php";

  $db  = new Database();
  $fm  = new Format();
  $app_from = new ApplicationFrom();
  $con_us = new Contact();
  $tit = new Title(); 

  /* Admin Panel  LOG OUT OPTION */
 
    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        Session::destroy();
    }

/* Cache control or Cache Remove */
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php include 'script/title.php'; ?>
 
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="dist/img/icon.png">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
    .menu_defarent{text-align: center;}
    .menu_defarent span{padding-right: 8px;}
    .menu_defarent span a{}
    .selectedStyle{cursor: pointer;border-radius: 3px;}
    .fileImage{border: 1px solid #ddd;}
    .fontsizecv{font-size: 17px;padding-left: 4px; }
    .actionStyle{}
    .actionStyle span{}
    .actionStyle span a{padding-left: 5px;}
    table tr td{font-size: 17px;}
    label u{font-size: 17px; font-weight: normal;}
    .title-font-size{font-size: 22px;font-weight: bold;}
    .downdoad-font-size li a{font-size: 16px;}
    .downdoad-font-size li a i{color: blue;font-size: 18px;}
    .style_pagination a{cursor: pointer !important;}
  </style>
</head>