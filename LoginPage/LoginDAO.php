<?php

include '../include/config.php';
include '../common/php/common.php';

session_start();// starts the session
  



$Email = $_POST['userName']; //gets the email input 
$pass = $_POST['pass']; //get the password input

$stmt = $connection->prepare('SELECT count(*)FROM tbl_user WHERE email = ?'); //secures the query to prevent sql injection 
$stmt->bind_param('s', $Email); 
$stmt->execute(); 
$result = $stmt->get_result(); 

$query = "SELECT * FROM tbl_user WHERE email='".$Email."'"; // finds row with the email mataching user email
$tbl = mysqli_query($connection,$query);
if(mysqli_num_rows($tbl)>0){//if there is an email in the database same as what was entered
	$row = mysqli_fetch_array($tbl); // looks through returned data
    $pass_hash = $row['Password'];
    if(password_verify($pass, $pass_hash)){ // if the password matches the hash from database 
        //logs user into website 
        $First = $row['First_Name'];
        $uName =$row['Email'];
        $_SESSION['firstName'] = $First;
		$_SESSION['uName'] = $uName;
		echo "<script language='javascript'>";
        echo 'alert("Successful login");';//lets user know 
        echo 'window.location.replace("AlreadyLoggedIn.html");';
        echo "</script>";
	}else {//unsuccessful login
        echo "<script language='javascript'>";
        echo 'alert("Invalid Email or Password");';
        echo 'window.location.replace("Login.html");';
        echo "</script>";
    }
}else {//invalid email
        echo "<script language='javascript'>";
        echo 'alert("Invalid Email or Password");';
        echo 'window.location.replace("Login.html");';
        echo "</script>";
    }
?>