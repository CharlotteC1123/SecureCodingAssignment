//Information from user form
var email = document.getElementById("txtEmail");
var password = document.getElementById("txtPassword");

$('#formUserRegistration').submit(function(event){
	formData = $('#formUserRegistration').serialize();
    // cancels the form submission
    event.preventDefault();

	$.ajax({
		type: "POST",
		url: "RegistrationDAO.php",
		data: formData+"&phpfunction=createUser",
	    success: function(echoedMsg){ 
			if(echoedMsg=='true')    {
				window.location="../LoginPage/Login.html";
			} else {
				$("#divMessage").html(echoedMsg);
			}
	    },
		error: function(msg){ 
			console.log(msg);
	    }
	});
	alert("Success Registering");
	location.reload();
});

var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When passwrod field clicked show the message box
password.onfocus = function() {
  document.getElementById("message").style.display = "block";
}
//hide the message box when not needed
password.onblur = function() {
  document.getElementById("message").style.display = "none";
}
// Vlidate the user input
password.onkeyup = function() {

  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(password.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(password.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(password.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(password.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}