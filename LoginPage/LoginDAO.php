<?php
require_once '../include/config.php';
require_once '../common/php/common.php';


if(isset($_POST['phpFunction'])) {
    if($_POST['phpFunction'] == 'login') {
        login();
    }
}
//get user data from the database
function login() {

	session_start();
	$uName = $_POST['userName'];
	$pWord = $_POST['password'];
	
	$pass_hash = "SELECT `password` FROM `tbl_user` WHERE email='".$uName."'";
	$verify = password_verify($pWord, $pass_hash);
	//what should it be for email or password in the set statement?ac
	$sql = "SELECT `First_Name`, `Last_Name` FROM `tbl_user` WHERE email='".$uName."'";
	PreparedStatement statement = connection.prepareStantement(sql);
	statement.setEmail(1, $uName);
	ResultSet rs = statement.executeQuery();

	include "../include/config.php";
	
	$res = mysqli_query($connection, $sql);
	$num_row = mysqli_num_rows($res);
	$row=mysqli_fetch_assoc($res);
	if( $num_row == 1 ) {
		echo json_encode($row);
		$_SESSION['uName'] = $uName;
	}
	else {
		echo 'false';
	}
}		
?>