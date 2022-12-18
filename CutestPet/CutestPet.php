<!DOCTYPE html>
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
						<!-- links for nav bar-->
						<li><a href="../ListNewPetPage/ListNewPet.html">LIST AN ANIMAL FOR ADOPTION</a></li>
						<li><a href="../AdoptAPetPage/AdoptAPet.html">ADOPT</a></li>
						<li><a href="../CutestPet/CutestPet.php">CUTEST PET UPLOAD</a></li>
						<li><a href="../LoginPage/Login.html">LOGIN</a></li>
					</ul>
				</nav>
			</header>
			<section>
				<div id="divMessage"></div>
					<!-- logout button-->
					<strong id="linkLogout"><a href="">Log Out</a></strong> <br><br>
                    <form method="post" action="CutestPetDAO.php" enctype="multipart/form-data">
						<!--Form for user to enter details and picture of their pet-->	
						<h2>Please enter a picture of your pet to win cutest pet :</h2>
						<label>Your Name: </label>
						<input type="text" maxlength="25" name="pname"><br> <br>
						<label>Description: </label>
						<input type="text" maxlength="255" name="pdesc"><br> <br>
						<input type="hidden" name="MAX_FILE_SIZE" value="250000">
						<label for="file">Picture</label>
    		    		<input type="file" class="form-control-file" name="pfile"> <br> <br>
						<input type="submit" name="Submit">
					</form>
			</section>	
			<!--calls the relevant javascript file-->
			<script src="./CutestPet.js"></script>
			<footer>
				&copy; 2022 
			</footer>
	</body>
</html>