    //ajax to post data from form and alert user on success
    e.preventDefault();
    $.ajax({
      url: "CutestPetDAO.php",
      method: "POST",
      data: formData+"&phpfunction=addPicture",
      contentType: false,
      cache: false,
      processData: false,
      success: function (echoedMsg) {
        alert("Picture Successfully Registered");
        location.reload();
      }
    });