$(function() {
	$("#addmenu").click(function(){
       var addmenuname  = $("#addmenuname").val();
       var addmenu_url  = $("#addmenu_url").val();
       var menu_id_add  = $("#menu_id_add").val();
       var dataString   = 'addmenuname='+addmenuname+'&addmenu_url='+addmenu_url+'&menu_id_add='+menu_id_add;

       $.ajax({
           type:"POST",
           url:"getregister.php",
           data:dataString,
           success:function(data){
           	  $("#state").html(data);
               // $("#state").fadeOut(5000);

           }
       });
       
       return false;

	});
});

function Redirect(){
	window.location="menu_list.php";
}

function RedirectPopulerNews(){
  window.location="populer_list.php";
}



$(function() {
  $("#addpnews").click(function(){
    var addnewsname      = $("#addnewsname").val();
    var populerNewstitle = $("#populerNewstitle").val();
    var addnews_url      = $("#addnews_url").val();
    var populerNewsImage = $("#populerNewsImage").val();

   // var formData         = new FormData($(this)[0]);

    var dataStringAdd    = 'addnewsname='+addnewsname+'&populerNewstitle='+populerNewstitle+'&addnews_url='+addnews_url+'&populerNewsImage='+populerNewsImage;

    $.ajax({
      type:"POST",
      url:"getpopulernews.php",
      data:dataStringAdd,
      contentType: false,
      cache: false,
      processData:false,
      success:function(addnews){
       $("#addnewsMsg").html(addnews);
      }
    });
    return false;
  });
});

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function myFunctionPdf() {
    window.print();
}
//function fade() {
   // $('#state').fadeIn().delay(5000).fadeOut();
   // $('#state').delay(5000).fadeIn().delay(5000).fadeOut();
   // $('#state').delay(10000).fadeIn().delay(5000).fadeOut(fade);
//}
//fade();
/*
function fadetime(){
	$("#deleteMassagetimeout").fadeOut(5000);
}
fadetime();

$(document).ready(function(){
  $(document).on('click', '.btn_delete', function(){
    var id = $(this).data("id3");
    if (confirm("Are you sure you want to delete this?")) {
    $.ajax({
         url:"menu_delete.php",
         method:"POST",
         data:{id:id},
         dataType:"text",
         success:function(data){
            $("#deleteMess").html(data);
           }
        });
    }
    return false;
  });
});  */