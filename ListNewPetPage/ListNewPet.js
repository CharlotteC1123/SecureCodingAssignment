$(document).ready(function(){
	//check login
	$.ajax({
			type: "POST",
			url: "../common/php/common.php",
			data: "phpFunction=checkLogin",
		    success: function(html){ 
				if(html=='false')    {
					window.location="../LoginPage/Login.html";
				}
		    }
	});
});

//logout function
$("#linkLogout").click(function(event){
	event.preventDefault();
	$.ajax({
			type: "POST",
			url: "../common/php/common.php",
			data: "phpFunction=logout",
		    success: function(html){ 
				if(html=='true')    {
					window.location.href="../LoginPage/Login.html";
				}
		    },
			error: function(xhr,textStatus,err)
			{
				console.log("readyState: " + xhr.readyState);
				console.log("responseText: "+ xhr.responseText);
				console.log("status: " + xhr.status);
				console.log("text status: " + textStatus);
				console.log("error: " + err);
			}
	});
	
});

//Event handler for registration form submit 
$('#formListPet').submit(function(event){
	formData = $('#formListPet').serialize();
    // cancels the form submission
    event.preventDefault();

	$.ajax({
		type: "POST",
		url: "ListNewPetDAO.php",
		data: formData+"&phpfunction=addPet",
	    success: function(echoedMsg){ 
			if(echoedMsg=='true')    {
				$("#divMessage").html("Pet added succesfully");
				window.location.href="../ListNewPetPage/ListNewPet.html";
			} else {
				$("#divMessage").html(echoedMsg);
			}
	    },
		error: function(msg){ 
			console.log(msg);
	    }
	});
});



