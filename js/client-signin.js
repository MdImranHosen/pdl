$(function() {
	$("#signin_use").click(function(){

		var client_email_use     = $("#client_email_use").val();
		var client_password_pass = $("#client_password_pass").val();

		var dataStringSign = 'client_email_use='+client_email_use+'&client_password_pass='+client_password_pass;

		$.ajax({
			type:"POST",
			url:"ajax/client_sign.php",
			data:dataStringSign,
			success:function(data){
				$("#outputsign").html(data);
			}
		});

		return false;
	});
});