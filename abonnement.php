<?php

    
    $membre = $_GET['membre'];
    $message = "";
    $qpdo1 = "SELECT * FROM abonnement,membre WHERE abonnement.id_abo = membre.id_abo AND id_membre=$membre ";
    $query1 = $pdo->query($qpdo1);

    foreach($query1 as $row)
    {
        if($row['id_abo']!=0){
        echo"
        <div class='comment'>";
        echo "
        <h4> Nom de l'abonnement</h4>".$row['nom'];
        echo "
        <h4> Resumée</h4>".$row['resum'];
        echo "
        <h4> Prix</h4>".$row['prix'].'€';
        echo "
        <h4> Durée</h4>".$row['duree_abo'].' jours';
        echo "
        <h4> Options</h4>";
         
        echo "
            <form action='#' methode='GET'>
                <input  name='id_membre' type='hidden' value='".$membre."'>
                <select>
                <option value=''>Abonnement</option>";
                require_once('ajout_abo.php');
                echo "</select>
                </select>
                <button type='submit' name='submit1'>Ajouter</button>
                <button type='submit' name='submit1'>Modifier</button>
                <button type='submit' name='submit1'>Suprimer</button>
            </form>
        ";  
        echo "</div>";
        }   
        
    }
    

    if(isset($_GET['submit']))
    {
        $comment = $_GET['texte'];
        $membre = $_GET['id_membre'];
        $film = $_GET['id_film'];
        
        
        $stmt= $pdo->prepare("UPDATE historique_membre SET avis=? WHERE id_membre=? AND id_film=?");
        $stmt->execute([$comment, $membre, $film]);
        
        echo '

            <p class="commentText"> Votre commentaire est ajouté avec succés</p>
        
        ';
        
        
    }
    


    
?>