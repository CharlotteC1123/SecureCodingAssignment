<?php

	if($_POST['phpfunction'] == 'createUser') {
		createUser();
	}
	

	function createUser() {
		
		$firstname = $_POST['firstName'];
		$lastname = $_POST['lastName'];
		$email = $_POST['email'];
		$pass = $_POST['password'];
		
		$verificationcode = substr(md5(uniqid(rand(), true)), 16, 16);
		
		$pass = password_hash($pass, PASSWORD_BCRYPT);
		
		include "../include/config.php";
		
		$sql = "SELECT * FROM `tbl_user` WHERE email='$email'";
		
		$query = mysqli_query($connection, $sql);

		if(mysqli_num_rows($query) > 0){
			echo "This email already registered.";
			return;
		}
		
		$sql = "INSERT INTO `tbl_user`".
			   " values ".
			   "('$firstname', '$lastname', '$email', '$pass', NOW(), '$verificationcode', '1')";
		
		if(mysqli_query($connection, $sql)) {
			echo '<script type="text/javascript">';
			echo ' alert("Success registering")';
			echo '</script>';
			echo '<script type="text/JavaScript"> location.reload(); </script>';
		} else {
			echo mysqli_error($connection);
			return;
		}
		
		//sendEmail($email, $verificationcode);
		
		mysqli_close($connection);
	} 

	

?>