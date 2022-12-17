$('#formUserBankDetails').submit(function(event){
	formData = $('#formUserBankDetails').serialize();
    // cancels the form submission
    event.preventDefault();

	$.ajax({
		type: "POST",
		url: "ConfirmAdoptionDAO.php",
		data: formData+"&phpfunction=createBankDetail",
	    success: function(echoedMsg){ 
			if(echoedMsg=='true')    {
				window.location="../RegistrationPage/Registration.html";
			} else {
				$("#divMessage").html(echoedMsg);
			}
	    },
		error: function(msg){ 
			console.log(msg);
            echo (msg);
	    }
	});
});