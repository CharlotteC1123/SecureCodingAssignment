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
	
	showMyPets();
	showPetsToAdopt();
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

//Show my pets function
function showMyPets() {
	var html = '';
	$.post("AdoptAPetDAO.php", "phpfunction=getMyPets", function(data) {
				$.each(data, function(key, value){
				html = '<div>';
				html = html + value['Pet_Category'] + '---';
				html = html + value['Pet_Name'] + '---';
				html = html + value['Pet_Description'] + '---';
				html = html + '</div> <hr>';
				$('#myPets').append(html);
			});
			
	} , "json");
}

//Show pets to adopt function
function showPetsToAdopt() {
	var html = '';
	$.post("AdoptAPetDAO.php", "phpfunction=getPetsToAdopt", function(data) {
			$.each(data, function(key, value){
				html = '<div>';
				html = html + value['Pet_Category'] + '---';
				html = html + value['Pet_Name'] + '---';
				html = html + value['Pet_Description'] + '---';
				html = html + value['Owner_Email'];
				html = html + '</div> <hr>';
				
				$('#petsToAdopt').append(html);
			});
			
	} , "json");
}