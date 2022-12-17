$.post("AdminDAO.php", "phpfunction=FindUsername", function(data){
    alert("data" +data);
} , "json");

//function for the logout button
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