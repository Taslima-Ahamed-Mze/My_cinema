<?php
	require_once('connexion.php');
?>



<!DOCTYPE html>
<html>
<head>
	<title>my_cinema</title>
	 <link rel="stylesheet" href="css/bootstrap.css">
	 <link rel="stylesheet" href="css/main.css">
	 <link rel="stylesheet" href="css/index.css">

</head>
<body>
	<header class="container header ">
		<div class="row">
			<h2 class="col-sm-4"><img src="img/log1.jpeg" width="110px" height="40px"></h1>
				
			
			<nav class=" col-sm-8 nav justify-content-center"> <!-- alignement droite -->
			  <a class="nav-link active" href="index.php">Film</a>
			  <a class="nav-link" href=membres.php>Membre</a>
			  
			  <a class="nav-link" href="#">Projection</a>
			</nav>

		</div>
	</header>
<section class="jumbotron">
	<h1>Rechercher des films par date de projection</h1>
	<div class='content-film'>
		<div class="form1">
			<form action="film_project.php" method="GET">
				<label>Date</label><br>
				<input class="input" type="date" name="date_d" placeholder="Date debut"><br><br>
				<button class="but" type="submit" name="submit">Rechercher</button>

			</form>
		</div>
		
	</div>	
	
	
</section>

<div class="page-footer font-small blue justify-content-center">

  <div class="footer-copyright text-center py-3 ">© 2020 Copyright:
    my_cinema
  </div>
</div>





	

	

</body>
</html>