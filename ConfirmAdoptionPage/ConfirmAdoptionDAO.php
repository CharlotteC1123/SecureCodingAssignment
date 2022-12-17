<?php

	if($_POST['phpfunction'] == 'createBankDetail') {
		createBankDetail();
	}
	//insert user bank details into the database table
	function createBankDetail() {
		$cardNum = $_POST['numCardNum'];
		$cardName = $_POST['cardName'];
		$expDate = $_POST['expDate'];
		$cvv = $_POST['CVVnum'];
		
		include "../include/config.php";
		
		$sql = "INSERT INTO `tbl_bank_details`".
			   " values ".
			   "('$cardNum', '$cardName', '$expDate', '$cvv')";

		//alert for user to show success
		if(mysqli_query($connection, $sql)) {
			echo '<script type="text/javascript">';
			echo ' alert("Success inputting bank details")';
			echo '</script>';
			echo '<script type="text/JavaScript"> location.reload(); </script>';
		} else {
			echo mysqli_error($connection);
            echo "Didnt work";
			return;
		}

		mysqli_close($connection);
	} 
?>