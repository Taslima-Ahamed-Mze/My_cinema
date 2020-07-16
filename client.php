<?php

    $id = $_GET['id'];
    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];
    $qpdo = "SELECT * FROM film,historique_membre WHERE film.id_film=historique_membre.id_film AND id_membre  = $id ORDER BY historique_membre.date DESC ";
    $query = $pdo->query($qpdo);
    require_once('paginationHisto.php');
    $qpdo = "SELECT * FROM film,historique_membre WHERE film.id_film=historique_membre.id_film AND id_membre  = $id ORDER BY historique_membre.date DESC LIMIT $depart,$videoPargenre ";
    $query = $pdo->query($qpdo);

    echo '
    <div class="contentClient">
        <div class="histo">
            <h3 class="historique">Historique de '.ucfirst($nom).' '.ucfirst($prenom).'</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Resumee</th>
                            <th>Date</th>
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
                            echo '<td>'.$row['date'].'</td>';
                            echo '<td> <a href="filmEntier.php?film='.$row['id_film'].'&amp;membre='.$row['id_membre'].'">Consulter</a></td>';

                            echo '</tr>';
                        }	
                    echo '</tr>
                    </tbody>
                </table>';

                for($i = 1;$i<=$genresTotales;$i++)
			    {
                    if($i == $genreCourante)
                    {
                        echo $i;
                    }else{
                        echo '<a class="page" href="infoClient.php?page='.$i.'&amp;id='.$id.'&amp;nom='.$nom.'&amp;prenom='.$prenom.'"><strong> '.$i.' </strong></a>';
                    }
			    }
                
       echo ' </div>
        <div class="ajoutHisto">
        
            <h6>Ajouter une entrée à cet historique</h6>
             <form action="" methode="GET"> 
                 <select name="film">
                    <option value="">selectionner</option>';
                    require_once("ajout_historique.php");
               echo '</select>
                <input  name="nom" type="hidden" value='.$nom.'>  
                <input  name="prenom" type="hidden" value='.$prenom.'>   
                <input  name="id" type="hidden" value='.$id.'> <br><br>  
                <button type="submit" name="submit">Ajouter</button>
            </form>';
            if(isset($_GET['submit']) )
            {
                $film = $_GET['film'];
                $nom = $_GET['nom'];
                
                $id=$_GET['id'];
                $pdo->exec("INSERT INTO historique_membre (id_membre,id_film,date) VALUES ($id,$film,now())");  
               
                // echo '
                // <p class="commentText"> Votre film est ajouté avec succés</p>
                // ';    
            }
           echo' <br><br><br><br>
            <h6> Abonnement</h6>
            <div class="abo">';

           
                $qpdo1 = "SELECT * FROM abonnement,membre WHERE abonnement.id_abo = membre.id_abo AND id_membre=$id ";
                $query1 = $pdo->query($qpdo1);
                
                
                foreach($query1 as $row)
                {
                    echo "<strong>".$row['nom']."</strong>";
                }
    echo "  </div>
    <br><br>
            <form action='' methode='GET'>
                <input  name='nom' type='hidden' value='".$nom."'>  
                <input  name='prenom' type='hidden' value='".$prenom."'> 
                <input  name='id' type='hidden' value='".$id."'>
                <input  name='stok' type='hidden' value='".$stok."'>

                <select name='abo'>
                <option value=''>Abonnement</option>";
                require_once('ajout_abo.php');
                echo "</select>
                </select>
                <button type='submit' name='submit1'>Ajouter</button>
                <button type='submit' name='submit2'>Modifier</button>
                <button type='submit' name='submit3'>Suprimer</button>
            </form>   


        </div>
    </div>";
       
        if(isset($_GET['submit1'])|| isset($_GET['submit2']) )
        {
            $abo = $_GET['abo'];
            $id = $_GET['id'];
            
            $pdo->exec("UPDATE membre SET id_abo=$abo WHERE id_membre=$id");  
            echo '
            <p class="commentText"> Votre abonnement est ajouté avec succés</p>
            ';  
              
        }
        if(isset($_GET['submit3']) )
        {
            
            $id = $_GET['id'];
            $pdo->exec("UPDATE membre SET id_abo=0 WHERE id_membre=$id");  
            echo '
            <p class="commentText"> Votre abonnement est supprimé</p>
            '; 
        }
        
        
       
        
        
        









