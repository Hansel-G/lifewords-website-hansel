$(document).ready(function(){
	$('#User_Nickname').blur(function(){
		$.post(
			'/lifewords/Users/validate_form',
			{field: $('#User_Nickname').attr('id'), value: $('#User_Nickname').val() },
			handleNameValidation
		);
	});
	
	function handleNameValidation(error){
	if (error.length > 0) {
		if ($('#User_Nickname-notEmpty').length == 0){
			$('#User_Nickname').after('<div id = "User_Nickname-notEmpty" class = "error-message">' + error + '</div>');
			}
		}
		else{
			$('User_Nickname-notEmpty').remove();
			
		}
	}
});

// (url, [data], [success(data, textStatus, XMLHttpRequest)], [dataType])


//"data[User][" + $('#User_Nickname').attr('id') + "]": $('#User_Nickname').val()
//$.ajax('/lifewords/Users/validate_form',
	//		{
		//	 	field: $('#User_Nickname').attr('id'),
			//	value: $('#User_Nickname').val()
			//},
			
			
		//	handleNameValidation
	//	);