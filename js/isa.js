function pollResults(){
		var isChecked = "false";
		for(var i=0; i<document.forms["poll-form"].elements.length; i++){
			if(document.forms["poll-form"].elements[i].name == "poll-option"){
				if(document.forms["poll-form"].elements[i].checked == true){
					isChecked = "true";
					break;
				}
			}
		}
		 
		if(isChecked == "false"){
			alert('Please select your answer before submitting');
			return;
		} 
		document.getElementById('poll-question').style.display = "none";
		document.getElementById('poll-answer').style.display = "block";
}

$(document).ready(function(){
	$('#btnLogin').click(function(){
		var userName = $('#username').val();
		var password = $('#password').val();

		if((userName == 'admin') && (password == 'admin')){
			window.location.href = 'admin/adminHome.html';
		}
	});
}); 	

$(document).ready(function(){
	$('#logout').click(function(){
  		window.location.href = '/isa';
  	});
});