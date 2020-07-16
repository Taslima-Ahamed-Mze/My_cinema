<?php
if(isset($_GET['submit']))
{
	

	if(isset($_GET['genre'])&& empty($_GET['distrib'])&& empty($_GET['titre']))
    {
		$genre = $_GET['genre'];
		
		$qpdo = "SELECT titre,resum,nom FROM film,genre WHERE film.id_genre=genre.id_genre AND genre.id_genre = $genre ";
		$query = $pdo->query($qpdo);
		require_once('pagination.php');
		$qpdo = "SELECT * FROM film,genre WHERE film.id_genre=genre.id_genre AND genre.id_genre = $genre LIMIT $depart,$videoPargenre";
		$query = $pdo->query($qpdo);
		
        echo '
			<table>
				<thead>
					<tr>
						<th>Titre</th>
						<th>Resumée</th>
						<th>Genre</th>
						<th>voir</th>

					</tr>
				</thead>
				<tbody>'
                    ;
                    foreach($query as $row)
                    {
                        echo '<tr>';
                        echo '<td>'.$row['titre'].'</td>';
						echo '<td>'.$row['resum'].'</td>';
						echo '<td>'.$row['nom'].'</td>';
						echo '<td> <a href="comments_film.php?film='.$row['id_film'].'">Consulter</a></td>';

                        echo '</tr>';
                    }
						
						
					'</tr>
				</tbody>
			</table>';
			for($i = 1;$i<=$genresTotales;$i++)
			{
				if($i == $genreCourante)
				{
					echo $i;
				}else{
					echo '<a class="page" href="film.php?page='.$i.'&amp;genre='.$genre.'&amp;titre=&amp;submit="><strong> '.$i.' </strong></a>';
				}
			}

	}
	elseif(isset($_GET['distrib'])&& empty($_GET['genre'])&& empty($_GET['titre']))
	{
		$distrib = $_GET['distrib'];
		$qpdo = "SELECT * FROM film,distrib WHERE film.id_distrib=distrib.id_distrib AND distrib.id_distrib = $distrib ";
		$query = $pdo->query($qpdo);
		require_once('pagination.php');
        $qpdo = "SELECT * FROM film,distrib WHERE film.id_distrib=distrib.id_distrib AND distrib.id_distrib = $distrib LIMIT $depart,$videoPargenre ";
		$query = $pdo->query($qpdo);
		

        echo '
			<table>
				<thead>
					<tr>
						<th>Titre</th>
						<th>Resumée</th>
						<th>Distribiteur</th>
						<th>Voir</th>

					</tr>
				</thead>
				<tbody>'
                    ;
                    foreach($query as $row)
                    {
                        echo '<tr>';
                        echo '<td>'.$row['titre'].'</td>';
						echo '<td>'.substr($row['resum'],0,100).'...'.'</td>';
						echo '<td>'.$row['nom'].'</td>';
						echo '<td> <a href="comments_film.php?film='.$row['id_film'].'">Consulter</a></td>';

                        echo '</tr>';
                    }
						
						
					'</tr>
				</tbody>
			</table>';
			for($i = 1;$i<=$genresTotales;$i++)
			{
				if($i == $genreCourante)
				{
					echo $i;
				}else{
					echo '<a class="page" href="film.php?page='.$i.'&amp;distrib='.$distrib.'&amp;titre=&amp;submit="><strong> '.$i.' </strong></a>';
				}
			}
	}
	elseif(isset($_GET['titre'])&& empty($_GET['genre'])&& empty($_GET['distrib']))
	{
		$titre = $_GET['titre'];
		$qpdo = "SELECT * FROM film WHERE titre LIKE '%$titre%'";
        $query = $pdo->query($qpdo);
		require_once('pagination.php');
		
        $qpdo = "SELECT * FROM film WHERE titre LIKE '%$titre%' LIMIT $depart,$videoPargenre";
		$query = $pdo->query($qpdo);
		
        echo '
			<table>
				<thead>
					<tr>
						<th>Titre</th>
						<th>Resumée</th>
						<th>Voir</th>
					</tr>
				</thead>
				<tbody>'
					;
					
                    foreach($query as $row)
                    {
                        echo '<tr>';
                        echo '<td>'.$row['titre'].'</td>';
						echo '<td>'.$row['resum'].'</td>';
						echo '<td> <a href="comments_film.php?film='.$row['id_film'].'">Consulter</a></td>';
                        echo '</tr>';
                    }
					'</tr>
				</tbody>
			</table>';
			for($i = 1;$i<=$genresTotales;$i++)
			{
				if($i == $genreCourante)
				{
					echo $i;
				}else{
					echo '<a class="page" href="film.php?page='.$i.'&amp;titre='.$titre.'&amp;titre=&amp;submit="><strong> '.$i.' </strong></a>';
				}
			}
			
	}
	

	

	elseif(isset($_GET['genre'])&& isset($_GET['distrib'])&& empty($_GET['titre']))
	{
		$genre = $_GET['genre'];
		$distrib = $_GET['distrib'];
		$qpdo = "SELECT titre,genre.nom as genre,distrib.nom as distrib,id_film,resum FROM film,distrib,genre WHERE film.id_distrib=distrib.id_distrib AND film.id_genre = genre.id_genre AND distrib.id_distrib = $distrib AND genre.id_genre = $genre";
        $query = $pdo->query($qpdo);
        require_once('pagination.php');
        $qpdo = "SELECT titre,genre.nom as genre,distrib.nom as distrib,id_film,resum FROM film,distrib,genre WHERE film.id_distrib=distrib.id_distrib AND film.id_genre = genre.id_genre AND distrib.id_distrib = $distrib AND genre.id_genre = $genre LIMIT $depart,$videoPargenre";
        $query = $pdo->query($qpdo);

        echo '
			<table>
				<thead>
					<tr>
						<th>Titre</th>
						<th>Genre</th>
						<th>Distribiteur</th>
						<th>Resumée</th>
						<th>Voir</th>
					</tr>
				</thead>
				<tbody>'
                    ;
                    foreach($query as $row)
                    {
                        echo '<tr>';
                        echo '<td>'.$row['titre'].'</td>';
						echo '<td>'.$row['genre'].'</td>';
						echo '<td>'.$row['distrib'].'</td>';
						echo '<td>'.$row['resum'].'</td>';
						echo '<td> <a href="comments_film.php?film='.$row['id_film'].'">Consulter</a></td>';

                        echo '</tr>';
                    }
					'</tr>
				</tbody>
			</table>';
			for($i = 1;$i<=$genresTotales;$i++)
			{
				if($i == $genreCourante)
				{
					echo $i;
				}else{
					echo '<a class="page" href="film.php?page='.$i.'&amp;genre='.$genre.'&amp;distrib='.$distrib.'&amp;titre=&amp;submit="><strong> '.$i.' </strong></a>';
				}
			}
	}
	elseif(isset($_GET['genre'])&& isset($_GET['titre'])&&empty($_GET['distrib']))
	{
		$genre = $_GET['genre'];
		$titre = $_GET['titre'];
		$qpdo = "SELECT * FROM film,genre WHERE film.id_genre = genre.id_genre AND titre LIKE '%$titre%' AND genre.id_genre = $genre";
        $query = $pdo->query($qpdo);
        require_once('pagination.php');
        $qpdo = "SELECT * FROM film,genre WHERE film.id_genre = genre.id_genre AND titre LIKE '%$titre%' AND genre.id_genre = $genre LIMIT $depart,$videoPargenre";
        $query = $pdo->query($qpdo);

        echo '
			<table>
				<thead>
					<tr>
						<th>Titre</th>
						<th>Genre</th>
						<th>Resumée</th>
						<th>Voir</th>
					</tr>
				</thead>
				<tbody>'
                    ;
                    foreach($query as $row)
                    {
                        echo '<tr>';
                        echo '<td>'.$row['titre'].'</td>';
						echo '<td>'.$row['nom'].'</td>';
						echo '<td>'.substr($row['resum'],0,170).'...'.'</td>';
						echo '<td> <a href="comments_film.php?film='.$row['id_film'].'">Consulter</a></td>';

                        echo '</tr>';
                    }
					'</tr>
				</tbody>
			</table>';
			for($i = 1;$i<=$genresTotales;$i++)
			{
				if($i == $genreCourante)
				{
					echo $i;
				}else{
					echo '<a class="page" href="film.php?page='.$i.'&amp;genre='.$genre.'&amp;titre='.$titre.'&amp;distrib=&amp;submit="><strong> '.$i.' </strong></a>';
				}
			}
	}
	

	
	elseif(isset($_GET['distrib'])&& isset($_GET['titre'])&&empty($_GET['genre']))
	{
		$distrib = $_GET['distrib'];
		$titre = $_GET['titre'];
		
		$qpdo = "SELECT * FROM film,distrib WHERE film.id_distrib = distrib.id_distrib AND titre LIKE '%$titre%' AND distrib.id_distrib = $distrib";
        $query = $pdo->query($qpdo);
        require_once('pagination.php');
        $qpdo = "SELECT * FROM film,distrib WHERE film.id_distrib = distrib.id_distrib AND titre LIKE '%$titre%' AND distrib.id_distrib = $distrib LIMIT $depart,$videoPargenre";
        $query = $pdo->query($qpdo);

        echo '
			<table>
				<thead>
					<tr>
						<th>Titre</th>
						<th>Distribiteur</th>
						<th>Resumée</th>
						<th>Voir</th>
					</tr>
				</thead>
				<tbody>'
                    ;
                    foreach($query as $row)
                    {
                        echo '<tr>';
                        echo '<td>'.$row['titre'].'</td>';
						echo '<td>'.$row['nom'].'</td>';
						echo '<td>'.substr($row['resum'],0,170).'...'.'</td>';
						echo '<td> <a href="comments_film.php?film='.$row['id_film'].'">Consulter</a></td>';
                        echo '</tr>';
                    }
					'</tr>
				</tbody>
			</table>';
			for($i = 1;$i<=$genresTotales;$i++)
			{
				if($i == $genreCourante)
				{
					echo $i;
				}else{
					echo '<a class="page" href="film.php?page='.$i.'&amp;distrib='.$distrib.'&amp;titre='.$titre.'&amp;genre=&amp;submit="><strong> '.$i.' </strong></a>';
				}
			}
	}
	elseif(isset($_GET['genre'])&& isset($_GET['distrib'])&& isset($_GET['titre']))
	{
		$genre = $_GET['genre'];
		$distrib = $_GET['distrib'];
		$titre = $_GET['titre'];
		
		$qpdo = "SELECT titre,resum,genre.nom as genre,distrib.nom as distrib,id_film FROM film,distrib,genre WHERE film.id_distrib=distrib.id_distrib AND film.id_genre = genre.id_genre AND distrib.id_distrib = $distrib AND genre.id_genre = $genre AND titre LIKE '%$titre%'";
		$query = $pdo->query($qpdo);
        require_once('pagination.php');
        $qpdo = "SELECT titre,resum,genre.nom as genre,distrib.nom as distrib,id_film FROM film,distrib,genre WHERE film.id_distrib=distrib.id_distrib AND film.id_genre = genre.id_genre AND distrib.id_distrib = $distrib AND genre.id_genre = $genre AND titre LIKE '%$titre%' LIMIT $depart,$videoPargenre";
		$query = $pdo->query($qpdo);
		// if($query->fetchColumn()>0)
		// {
			echo '
			<table>
				<thead>
					<tr>
						<th>Titre</th>
						<th>Genre</th>
						<th>Distribiteur</th>
						<th>Resumée</th>
						<th>Voir</th>
					</tr>
				</thead>
				<tbody>'
                    ;
                    foreach($query as $row)
                    {
                        echo '<tr>';
                        echo '<td>'.$row['titre'].'</td>';
						echo '<td>'.$row['genre'].'</td>';
						echo '<td>'.$row['distrib'].'</td>';
						echo '<td>'.substr($row['resum'],0,120).'...'.'</td>';
						echo '<td> <a href="comments_film.php?film='.$row['id_film'].'">Consulter</a></td>';

                        echo '</tr>';
                    }
					'</tr>
				</tbody>
			</table>';
			for($i = 1;$i<=$genresTotales;$i++)
			{
				if($i == $genreCourante)
				{
					echo $i;
				}else{
					echo '<a class="page" href="film.php?page='.$i.'&amp;distrib='.$distrib.'&amp;titre='.$titre.'&amp;genre='.$genre.'&amp;submit="><strong> '.$i.' </strong></a>';
				}
			}
		

        
	}
	else{

	}

    
	
	
	
}

?>