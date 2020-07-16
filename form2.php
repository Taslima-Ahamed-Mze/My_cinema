<?php
if(isset($_GET['submit']))
{
	if(isset($_GET['nom'])&& empty($_GET['prenom']))
    {
        $nom = $_GET['nom'];
        $qpdo = "SELECT * FROM fiche_personne,membre WHERE membre.id_fiche_perso=fiche_personne.id_perso AND nom LIKE '%$nom%'";
        $query = $pdo->query($qpdo);
        require_once('paginationMembre.php');
        $qpdo = "SELECT * FROM fiche_personne,membre WHERE membre.id_fiche_perso=fiche_personne.id_perso AND nom LIKE '%$nom%' LIMIT $depart,$videoPargenre";
        $query = $pdo->query($qpdo);

        echo '
			<table>
				<thead>
					<tr>
						<th>Nom</th>
						<th>Date de naissance</th>
                        <th>email</th>
                        <th>Code postal</th>
                        <th>Ville</th>
                        <th>Voir plus</th>
					</tr>
				</thead>
				<tbody>'
                    ;
                    foreach($query as $row)
                    {
                        echo '<tr>';
                        echo '<td>'.$row['nom'].'</td>';
						echo '<td>'.$row['date_naissance'].'</td>';
                        echo '<td>'.$row['email'].'</td>';
                        echo '<td>'.$row['cpostal'].'</td>';
                        echo '<td>'.$row['ville'].'</td>';
                        echo '<td> <a classe="voir" href="infoClient.php?id='.$row['id_membre'].'&amp;nom='.$row['nom'].'&amp;prenom='.$row['prenom'].'&amp;page=">Consulter</a></td>';
                        
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
					echo '<a class="page" href="membre.php?page='.$i.'&amp;nom='.$nom.'&amp;prenom=&amp;submit="><strong> '.$i.' </strong></a>';
				}
			}
	}
	elseif(isset($_GET['prenom'])&& empty($_GET['nom']))
    {
        $prenom = $_GET['prenom'];
        $qpdo = "SELECT * FROM fiche_personne,membre WHERE membre.id_fiche_perso=fiche_personne.id_perso AND prenom LIKE '%$prenom%'";
        $query = $pdo->query($qpdo);
        require_once('paginationMembre.php');
        $qpdo = "SELECT * FROM fiche_personne,membre WHERE membre.id_fiche_perso=fiche_personne.id_perso AND prenom LIKE '%$prenom%' LIMIT $depart,$videoPargenre";
        $query = $pdo->query($qpdo);

        echo '
			<table>
				<thead>
					<tr>
                        <th>Nom</th>
                        <th>Prenom</th>
						<th>Date de naissance</th>
                        <th>Email</th>
                        <th>Code postal</th>
                        <th>Ville</th>
                        <th>Voir plus</th>


					</tr>
				</thead>
				<tbody>'
                    ;
                    foreach($query as $row)
                    {
                        echo '<tr>';
                        echo '<td>'.$row['nom'].'</td>';
                        echo '<td>'.$row['prenom'].'</td>';
						echo '<td>'.$row['date_naissance'].'</td>';
                        echo '<td>'.$row['email'].'</td>';
                        echo '<td>'.$row['cpostal'].'</td>';
                        echo '<td>'.$row['ville'].'</td>';
                        echo '<td> <a classe="voir" href="infoClient.php?id='.$row['id_membre'].'&amp;nom='.$row['nom'].'&amp;prenom='.$row['prenom'].'">Consulter</a></td>';

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
					echo '<a class="page" href="membre.php?page='.$i.'&amp;prenom='.$prenom.'&amp;nom=&amp;submit="><strong> '.$i.' </strong></a>';
				}
			}
	}
	elseif(isset($_GET['prenom'])&& isset($_GET['nom']))
    {
        $prenom = $_GET['prenom'];
        $nom = $_GET['nom'];
        $qpdo = "SELECT * FROM fiche_personne,membre WHERE membre.id_fiche_perso=fiche_personne.id_perso AND prenom LIKE '%$prenom%' AND nom LIKE '%$nom%' ";
        $query = $pdo->query($qpdo);
        require_once('paginationMembre.php');
        $qpdo = "SELECT * FROM fiche_personne,membre WHERE membre.id_fiche_perso=fiche_personne.id_perso AND prenom LIKE '%$prenom%' AND nom LIKE '%$nom%' LIMIT $depart,$videoPargenre ";
        $query = $pdo->query($qpdo);

        echo '
			<table>
				<thead>
					<tr>
                        <th>Nom</th>
                        <th>Prenom</th>
						<th>Date de naissance</th>
                        <th>Email</th>
                        <th>Code postal</th>
                        <th>Ville</th>
                        <th>Voir plus</th>


					</tr>
				</thead>
				<tbody>'
                    ;
                    foreach($query as $row)
                    {
                        echo '<tr>';
                        echo '<td>'.$row['nom'].'</td>';
                        echo '<td>'.$row['prenom'].'</td>';
						echo '<td>'.$row['date_naissance'].'</td>';
                        echo '<td>'.$row['email'].'</td>';
                        echo '<td>'.$row['cpostal'].'</td>';
                        echo '<td>'.$row['ville'].'</td>';
                        echo '<td> <a classe="voir" href="infoClient.php?id='.$row['id_membre'].'&amp;nom='.$row['nom'].'&amp;prenom='.$row['prenom'].'">Consulter</a></td>';

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
					echo '<a class="page" href="membre.php?page='.$i.'&amp;prenom='.$prenom.'&amp;nom='.$nom.'&amp;submit="><strong> '.$i.' </strong></a>';
				}
			}
	}
	

	

	
	

    
	
	
	
}

?>