
<?php
	$servername = "localhost";
	$username = "s1900464Pets";
	$password = "y9N3n^57q";
	$dbname = "s1900464_Pets";

	$connection = new mysqli($servername, $username, $password, $dbname);

	if($connection->connect_error) {
		echo $connection->connect_error;
	}
?>