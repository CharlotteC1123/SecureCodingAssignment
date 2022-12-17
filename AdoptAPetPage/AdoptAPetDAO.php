<?php

	if($_POST['phpfunction'] == 'getMyPets') {
		getMyPets();
	}
	
	if($_POST['phpfunction'] == 'getPetsToAdopt') {
		getPetsToAdopt();
	}

	//select from database pets which the user has entered
	function getMyPets() {

		session_start();
		$uName = $_SESSION['uName'];
		$sql = 	"SELECT * FROM tbl_pet WHERE Owner_Email='".$uName."'";
		
		include "../include/config.php";
		$res = mysqli_query($connection, $sql);
		
		while( $row = mysqli_fetch_array( $res ) ) {
			$json[] = $row;
		}
		
		echo json_encode($json);
	}	
	//select from database pets which the user hasnt entered
	function getPetsToAdopt() {

		session_start();
		$uName = $_SESSION['uName'];
		
		$sql = 	"SELECT * FROM tbl_pet WHERE Owner_Email!='".$uName."'";
		//echo $qry;
		
		include "../include/config.php";
		$res = mysqli_query($connection, $sql);
		
		while( $row = mysqli_fetch_array( $res ) ) {
			$json[] = $row;
		}
		
		echo json_encode($json);
	}	

?>