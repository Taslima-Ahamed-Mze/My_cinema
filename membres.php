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
			  <a class="nav-link" href="#">Membre</a>
			  
			  <a class="nav-link" href="project.php">Projection</a>
			</nav>

		</div>
	</header>
<section class="jumbotron">
	<h1>Rechercher un membre</h1>
	<div class='content-film'>
		<div class="form">
			<form action="membre.php" method="GET">
				<input  name="page" type="hidden" >   
                <input class="input" type="text" name="nom" placeholder="Rechercher par nom"><br><br>
				<input class="input" type="text" name="prenom" placeholder="Rechercher par prenom"><br><br>
				<button class="but" type="submit" name="submit">Rechercher</button>

			</form>
		</div>
		<div>
			<?php
			// require_once('form.php');
		?>
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