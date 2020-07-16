<?php

    $film = $_GET['film'];
    
    
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
        <h4>Commentaires</h4>";
        echo "</div>";    
    }
    $qpdo1 = "SELECT avis FROM historique_membre WHERE id_film = $film";
    $query1 = $pdo->query($qpdo1);
    foreach($query1 as $row)
    {
        echo "<div class='comment'>";
        echo $row['avis'];
        echo "</div>";
        
        
    }

    

    
    


    
?>