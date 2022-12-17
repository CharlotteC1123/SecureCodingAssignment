<?php
    FindUsername();

    function FindUsername() {
	    session_start();
    	$uName = $_SESSION['uName'];
	    if( isset( $uName ) ) {
		    echo $uName;
	    } else {
    		echo 'false';
    	}
        echo json_encode($uName);
    }
?>