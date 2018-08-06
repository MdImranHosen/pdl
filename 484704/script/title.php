<?php
   if (isset($_GET['viewJobApplicatonCv'])) {
    $pagetitleid = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['viewJobApplicatonCv']);
    $pagetitleid = (int)$pagetitleid;
    
    $getVtitle = $tit->getCvTitle($pagetitleid);
     if ($getVtitle) {
       while ($result = $getVtitle->fetch_assoc()) { ?>
           <title><?php echo $result['name1']; ?></title>

     <?php  }  }   } elseif (isset($_GET['pdfCvDownload'])) {
   	  $tiDowid = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['pdfCvDownload']);
      $tiDowid = (int)$tiDowid;
      
      $getDownloadId = $tit->getCvTitleDownload($tiDowid);
     if ($getDownloadId) {
       while ($result = $getDownloadId->fetch_assoc()) { ?>
           <title><?php echo $result['name1']; ?></title>

     <?php  }  }   } elseif (isset($_GET['wordCvDownload'])) {
      $tiDowidword = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['wordCvDownload']);
      $tiDowidword = (int)$tiDowidword;
      
      $getWordId = $tit->getCvTitleDownloadWord($tiDowidword);
     if ($getWordId) {
       while ($result = $getWordId->fetch_assoc()) { ?>
           <title><?php echo $result['name1']; ?></title>
     <?php  }  }   } else{ ?>
           <title><?php echo $fm->title(); ?></title>
 <?php } ?>