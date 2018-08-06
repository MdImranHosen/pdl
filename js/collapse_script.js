$(document).ready(function(){
   
   $("#collapseOne").on("hide.bs.collapse", function(){
    $(".haveone").html('প্রাইভেট ডিটেকটিভ <i class="fa fa-plus"></i>');
  });
  $("#collapseOne").on("show.bs.collapse", function(){
    $(".haveone").html('প্রাইভেট ডিটেকটিভ <i class="fa fa-minus"></i>');
  });

  $("#collapseTwo").on("hide.bs.collapse", function(){
    $(".havetow").html('ডিটেকটিভ বৈশিষ্ট্যাবলী <i class="fa fa-plus"></i>');
  });
  $("#collapseTwo").on("show.bs.collapse", function(){
    $(".havetow").html('ডিটেকটিভ বৈশিষ্ট্যাবলী <i class="fa fa-minus"></i>');
  });
  
  $("#collapseThree").on("hide.bs.collapse", function(){
    $(".have").html('ডিটেকটিভ প্রশিক্ষণ <i class="fa fa-plus"></i>');
  });
  $("#collapseThree").on("show.bs.collapse", function(){
    $(".have").html('ডিটেকটিভ প্রশিক্ষণ <i class="fa fa-minus"></i>');
  });

});