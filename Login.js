$(document).ready(function(){
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
});


	//$("#btnLogin").click(function(){	
$('#formUserLogin').submit(function(event){
		//username=$("#txtUserName").val();
		//password=$("#txtPassword").val();
		//modulecode=$("#txtModuleCode").val();
		formData = $('#formUserLogin').serialize();
		//alert(formData);
		event.preventDefault();
		//alert(formData);
		
		$.ajax({
			type: "POST",
			url: "LoginDAO.php",
			//data: "username="+username+"&password="+password+"&modulecode="+modulecode,
			data: formData+"&phpFunction=login",
			datatype: 'json',
		    success: function(data){ 
				if(data=='false')    {
					$("#divError").css('display', 'inline', 'important');
					$("#divError").html("<img src='../images/alert.png' />Wrong username or password");
				}
				else    {
					//alert("test1:" + html);
					//$("#divError").css('display', 'inline', 'important');
					//$("#divError").html("<img src='../images/alert.png' />Wrong username or password");
					
					$("#divError").html("right username or password");
					dataJson = JSON.parse(data);
					firstName = dataJson['First_Name'];
					lastName = dataJson['Last_Name'];
					sessionStorage.setItem('firstName', firstName);
					sessionStorage.setItem('lastName', lastName);
					if(firstName = "Admin" && lastName == "Admin"){
						// redirect if fulfilled
						//alert ("HIIIIIIIIIIIIIIIIIIIIIIIIII");
						location.href = '../AdminPage/Admin.html';
						//window.location="../AdminPage/Admin.html";
						}else{
							//alert ("NOOOOOOOOOOOOOOOOOOOOOOOOOOOOO");
							window.location="../LoginPage/AlreadyLoggedIn.html";
						//some another operation you want
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
