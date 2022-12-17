<?php
	session_start();
?>
<html>


	<head>
		<meta charset="utf-8">
		<title> Adopt a pet </title>
		<link href="../css/styles.css" type="text/css" rel = "stylesheet"/>
		
		<script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			  crossorigin="anonymous"></script>
			
	</head>

	<body>

		<header>	
			<nav>
				<ul>
					<!-- Links for the nav bar -->
					<li><a href="../ListNewPetPage/ListNewPet.html">LIST AN ANIMAL FOR ADOPTION</a></li>
					<li><a href="../AdoptAPetPage/AdoptAPet.html">ADOPT</a></li>
					<li><a href="../AnimalGallery/AnimalGallery.php">GALLERY</a></li>
					<li><a href="../LoginPage/Login.html">LOGIN</a></li>
				</ul>
			</nav>
		</header>
		
		<section>
			<!-- Logout button -->
			<div id="divError"></div>
			<strong id="linkLogout"><a href="">Log Out</a></strong>
			<strong>Hi</strong>
			<!-- check if the logged in user is admin -->
			<?php
				echo $_SESSION['uName'];
				if($_SESSION['uName'] === "admin1@email.com"){
					echo '<script type="text/javascript">';
					echo '</script>';
				}
				else{
					echo '<script type="text/javascript">';
					echo '</script>';
					header("Location: ../AdminPage/NotAdmin.php");
				}
			?>       
			<!-- What is shown on the page -->
			<h2> Welcome to the admin page </h2>     
		</section>
		<!--calls js script -->
		<script src="./Admin.js"></script>
	</body>

</html>