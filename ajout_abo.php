<?php

    $i = 1;
    $qpdo = "SELECT * FROM abonnement ";
    $query = $pdo->query($qpdo);
    foreach($query as $row){
        echo "<option value='$i'>".$row["nom"]."</option>";
        $i++;
       
    }
?>