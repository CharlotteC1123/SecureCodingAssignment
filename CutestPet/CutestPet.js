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
	
	cutestPet();
});
function cutestPet(){
//Event handler for registration form submit 
$('#formCutestPet').submit(function(event){
	formData = $('#formCutestPet').serialize();
    // cancels the form submission
$.ajax({
  url: "CutestPetDAO.php",
  method: "POST",
  //will call the add picture function
  data: formData+"&phpfunction=addPicture",
  contentType: false,
  cache: false,
  processData: false,
});
});
}