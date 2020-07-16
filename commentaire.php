<?php

    $film = $_GET['film'];
    $membre = $_GET['membre'];
    $qpdo = "SELECT * FROM film WHERE id_film = $film";
    $query = $pdo->query($qpdo);

    foreach($query as $row)
    {
        echo"
        <div class='comment'>";
        echo "
        <h4> Titre</h4>".$row['titre'];
        echo "
        <h4> Resumee</h4>".$row['resum'];
        echo "
        <h4> Date debut d'affichage</h4>".$row['date_debut_affiche'];
        echo "
        <h4> Date de fin d'affichage</h4>".$row['date_fin_affiche'];
        echo "
        <h4> Duree</h4>".$row['duree_min'].' minutes';
        echo "
        <h4> Année de production</h4>".$row['annee_prod'];
        echo "
        <h4> Commentaire </h4>";
        echo "</div>"; 
        echo "
            <form action='#' methode='GET'>
            <input  name='membre' type='hidden' value='".$membre."'>
            <input  name='film' type='hidden' value='".$film."'>
            <textarea  name='texte' placeholder='commentaire'></textarea>
            <button type='submit' name='submit'>Ajouter</button>
    
    </form>
        ";  
         
    }
    

    if(isset($_GET['submit']))
    {
        $comment = $_GET['texte'];
        $membre = $_GET['membre'];
        $film = $_GET['film'];
        
        
        // $pdo->exec("UPDATE historique_membre SET avis='".$comment."' WHERE id_membre=$membre AND id_film=$film");
        $stmt= $pdo->prepare("UPDATE historique_membre SET avis=? WHERE id_membre=? AND id_film=?");
        $stmt->execute([$comment, $membre, $film]);
        
        echo '

            <p class="commentText"> Votre commentaire est ajouté avec succés</p>
        
        ';
        
        
    }
    


    
?>