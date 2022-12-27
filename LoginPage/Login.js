/*$(document).ready(function(){
	$.ajax({
			type: "POST",
			url: "../common/php/common.php",
			data: "phpFunction=checkLogin",
		    success: function(html){ 
				if(html=='true')    {
					$("#divError").html("already logged in...");
					window.location="../LoginPage/AlreadyLoggedIn.html";
				}
		    }
	});
});*/
//check the user has entered details which are correct and already in the database
$('#formUserLogin').submit(function(event){
	formData = $('#formUserLogin').serialize();
	event.preventDefault();
	
	$.ajax({
		type: "POST",
		url: "LoginDAO.php",
		data: formData+"&phpFunction=login",
		datatype: 'json',
		success: function(data){ 
			if(data=='false')    {
				$("#divError").css('display', 'inline', 'important');
				$("#divError").html("<img src='../images/alert.png' />Wrong username or password");
			}
			else    {
				$("#divError").html("right username or password");
				dataJson = JSON.parse(data);
				firstName = dataJson['First_Name'];
				lastName = dataJson['Last_Name'];
				sessionStorage.setItem('firstName', firstName);
				sessionStorage.setItem('lastName', lastName);
				if(firstName = "Admin" && lastName == "Admin"){
                    // if admin has logged in then admin page will be shown
                    location.href = '../AdminPage/Admin.php';
                }else{
                    window.location="../LoginPage/AlreadyLoggedIn.html";
                }

			}
		},
		beforeSend:function()
		{
			//$("#divError").css('display', 'inline', 'important');
			$("#divError").html("<img src='../images/ajax-loader.gif' /> Loading...")
		}
	});
	//return false;
});
