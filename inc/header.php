<?php
include "lib/SignSession.php";
SignSession::signinit();
include 'lib/Database.php';
$db = new Database();
include 'classes/ApplicationFrom.php';
include "classes/Clients.php";
$client = new Clients();

if (isset($_GET['signinAction']) && $_GET['signinAction'] == 'clientLogOut') {
    $getSignInAction = mysqli_real_escape_string($db->link, $_GET['signinAction']);
    if ($getSignInAction) {
      SignSession::signdestroy();
      header("Location:index.php");
    }else{
      header("Location:contact.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Private Detective Ltd in Bangladesh</title>
   <!-- This wedsite Design and Develop by Md. Imran Hosen:- www.fb.com/Md.ImranHosen.up --> 
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="description" content="Private Detective Ltd in Bangladesh">
  <meta name="keywords" content="Private Detective in Bangladesh, private detective jobs, private jobs, detective-job, Reporter, Repoter jobs, news, pdl, pdl007, pdl007.com">
  <meta name="author" content="Private Detective Ltd">
  <link rel="icon" href="dist/img/icon.png">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" type="text/css" href="css/style_inherit.css">
  <!-- country-calling-code-cicker-jquery-ccpicker -->
  <link rel="stylesheet" href="bower_components/country-calling-code-cicker-jquery-ccpicker/css/jquery.ccpicker.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
    .navbar-nav > .user-menu > .dropdown-menu > .text_style_signin_body {
     background-color: #3c8dbc;
     }
     .text_style_signin{border: 1px solid #ddd;}
     .text_style_signin p{font-size: 16px;}
     
      .footer_aboutus p{
        font-size: 15px;
        line-height: 28px;
        word-wrap: break-word;
        word-spacing: 4px;
        font-weight: normal;
        color: #787C83;
        text-align: justify;
      }
      .media {
        padding: 15px;
        font-size: 25px;
        width: 50px;
        text-align: center;
        text-decoration: none;
        margin: 4px 2px;
        border-radius: 50%;
      }

      .media:hover {
          opacity: 0.7;
      }

      .md-fb {
        background: #3B5998;
        color: white;
      }

      .md-tw {
        background: #55ACEE;
        color: white;
      }

      .md-gp {
        background: #dd4b39;
        color: white;
      }

      .md-lk {
        background: #007bb5;
        color: white;
      }

      .md-yt {
        background: #bb0000;
        color: white;
      }

      .md-ig {
        background: #125688;
        color: white;
      }

      .md-pr {
        background: #cb2027;
        color: white;
      }
      
      .socall_media ul li{display: inline-block;}
      .footer_services tr td a{font-size: 14px;}
      .footer_address{
        font-size: 15px;line-height: 22px;word-spacing: 3px;
      }
      .audio_pdl{color:#fff;cursor: pointer;}

      @media only screen and (max-width: 600px) {
        .list-group-item>.badge {
         float: none; 
        }
        .content-header{display: none;}
        .media {
        padding: 12px;
        font-size: 22px;
        width: 40px;
        margin: 3px 2px;
       }
      }
      @media only screen and (max-width: 400px){
       .media {
        padding: 8px;
        font-size: 14px;
        width: 30px;
        margin:2px;
       }
      }
  </style>
</head>