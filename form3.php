<?php

    if(isset($_GET['submit']))
    {
        $date = $_GET['date_d'];
        $qpdo = "SELECT * FROM film WHERE '".$date."' BETWEEN date_debut_affiche AND date_fin_affiche";
		$query = $pdo->query($qpdo);
		

        echo '
			<table>
				<thead>
					<tr>
						<th>Titre</th>
						<th>Resumée</th>
                        <th>Debut</th>
                        <th>Fin</th>


					</tr>
				</thead>
				<tbody>'
                    ;
                    foreach($query as $row)
                    {
                        echo '<tr>';
                        echo '<td>'.$row['titre'].'</td>';
						echo '<td>'.$row['resum'].'</td>';
                        echo '<td>'.$row['date_debut_affiche'].'</td>';
                        echo '<td>'.$row['date_fin_affiche'].'</td>';
                        echo '</tr>';
                    }
						
						
					'</tr>
				</tbody>
			</table>';
    }




?>