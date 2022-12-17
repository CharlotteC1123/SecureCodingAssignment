<?php

	if($_POST['phpfunction'] == 'addPet') {
		addPet();
	}
	//insert the users new data for a pet into the database
	function addPet() {
		
		$petCategory = $_POST['petCategory'];
		$petName = $_POST['petName'];
		$petDescription = $_POST['petDescription'];
		
		session_start();
		$uName = $_SESSION['uName'];
		
		include "../include/config.php";
		
		$sql = "INSERT INTO `tbl_pet`".
			   " values ".
			   "('$petCategory', '$petName', '$petDescription', '$uName')";
		
		if(mysqli_query($connection, $sql)) {
			echo '<script type="text/javascript">';
			echo ' alert("Success listing new animal")';
			echo '</script>';
			echo '<script type="text/JavaScript"> location.reload(); </script>';
		} else {
			echo mysqli_error($connection);
			return;
		}
		
		mysqli_close($connection);
	} 

?>