<?php
echo '<script type="text/javascript">';
echo ' alert("In RegistrationDAO.PHP")';
echo '</script>';
echo '<script type="text/JavaScript"> location.reload(); </script>';



	if($_POST['phpfunction'] == 'createUser') {
		createUser();
	}
	//create the user from the register form previously
	function createUser() {

		echo '<script type="text/javascript">';
		echo ' alert("In createuser ")';
		echo '</script>';
		echo '<script type="text/JavaScript"> location.reload(); </script>';


		$firstname = $_POST['firstName'];
		$lastname = $_POST['lastName'];
		$email = $_POST['email'];
		$pass = $_POST['password'];
		
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
			   "('$firstname', '$lastname', '$email', '$pass', NOW())";
		
		if(mysqli_query($connection, $sql)) {
			echo '<script type="text/javascript">';
			echo ' alert("Success registering")';
			echo '</script>';
			echo '<script type="text/JavaScript"> location.reload(); </script>';
		} else {
			echo mysqli_error($connection);
			return;
		}		
		mysqli_close($connection);
	} 

?>