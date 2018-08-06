$(function(){
	$("#user_change_pass").click(function(){
      
      var user_pass_change_id = $("#user_pass_change_id").val();
      var user_old_pass       = $("#user_old_pass").val();
      var user_new_pass       = $("#user_new_pass").val();
      var user_nconfirm_pass  = $("#user_nconfirm_pass").val();

      var datastringchenge = 'user_pass_change_id='+user_pass_change_id+'&user_old_pass='+user_old_pass+'&user_new_pass='+user_new_pass+'&user_nconfirm_pass='+user_nconfirm_pass;
      $.ajax({
      	type:"POST",
      	url:"ajax/change.php",
      	data:datastringchenge,
      	success:function(data){
      		$("#chengenotify").html(data);
      	}
      });
      return false;
	});
});