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
			  
			  <a class="nav-link" href="project.php">Projection</a>
			</nav>

		</div>
	</header>
<div class='film'>

<?php require_once('form2.php'); ?>
</div>

</body>
</html>