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
						<li><a href="../AnimalGallery/AnimalGallery.php">GALLERY</a></li>
						<li><a href="../LoginPage/Login.html">LOGIN</a></li>
					</ul>
				</nav>
			</header>
			<section>
				<div id="divMessage"></div>
				<form id="formListPet" >
					<!-- logout button-->
					<strong id="linkLogout"><a href="">Log Out</a></strong>
                    <form  method="post" enctype="multipart/form-data" id="formRegAnimal">
                    <div>
					 <!-- image upload -->
                        <div>
                            <label for="file">Choose image(s) to upload</label>
                            <input type="file" class="form-control-file" id="fileAnimalImages" multiple name="images[]"> <br />
                            <img src="" alt="Image preview..." id="bannerImg" width="50%" height="50%"> <br /><br />
                        </div>
                        <input type="submit" class="btn btn-primary" id="btnRegAnimal" value="Register">
                    </div>
                    </form>  
                <script src="AnimalGallery.js"></script>
			</section>	
			<footer>
				&copy; 2022 
			</footer>
	</body>
</html>