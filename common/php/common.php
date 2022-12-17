<?php

if(isset($_POST['phpFunction'])) {
		if($_POST['phpFunction'] == 'checkLogin') {
			checkLogin();
		} elseif($_POST['phpFunction'] == 'logout') {
			logout();
		}
}

function logout () {
	session_start();
	
	//Destroying all sessions
	if( session_destroy() )
	{
		echo 'true';
	} else {
		echo 'false';
	}
}

//check to see if the user is logged in
//function checkLogin() {
	//session_start();
	//$uName = $_SESSION['uName'];
	//if( isset( $uName ) ) {
		//echo 'true';
	//} else {
	//	echo 'false';
	//}
//}
?>