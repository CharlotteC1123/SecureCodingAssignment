<?php
	session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<title> Adopt a pet </title>
    	<link href="../css/styles.css" type="text/css" rel = "stylesheet"/>
		
		<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

	</head>
	<body>
		
			<header>
				
				<nav>
					<ul>
						<!--links for nav bar -->
						<li><a href="../ListNewPetPage/ListNewPet.html">LIST AN ANIMAL FOR ADOPTION</a></li>
						<li><a href="../AdoptAPetPage/AdoptAPet.html">ADOPT</a></li>
						<li><a href="../CutestPet/CutestPet.php">CUTEST PET UPLOAD</a></li>
						<li><a href="../LoginPage/Login.html">LOGIN</a></li>
					</ul>
				</nav>
			</header>
			<section>
			<div id="divError"></div>
			<strong id="linkLogout"><a href="">Log Out</a></strong>
			<strong>Hi</strong>
			<!-- get the username of logged in user to then check if they are admin or not-->
			<?php
				echo $_SESSION['uName'];
			?>       
			<!-- display not admin page-->
			<h2> You are NOT an admin. You ARE NOT allowed to access this</h2>     
		</section>
		
		<script src="./Admin.js"></script>
			<footer>
				&copy; 2022
			</footer>
	</body>
</html>