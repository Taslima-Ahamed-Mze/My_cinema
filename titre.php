// $videoParpage = 10;
		// $qpdo1 = "SELECT titre,resum,nom FROM film,genre WHERE film.id_genre=genre.id_genre AND genre.id_genre = $genre";
		// $query1 = $pdo->query($qpdo1);
		// $videoTotales = $query1->rowCount();
		// $genresTotales = ceil($videoTotales/$videoPargenre);
		// if(isset($_GET['page'])&& is_numeric($_GET['page']))
		// {
		// 	$page_num = $_GET['page'];
		// }else{
		// 	$page_num = 1;
		// }
		// $depart = ($page_num-1)*$videoParpage;
		// $pagination = '';
		// if($page_num > 1)
		// {
		// 	$previous = $page_num -1;
		// 	$pagination.='<a href="film.php?page='.$previous.'">precedent</a>&nbsp;&nbsp;';
		// }