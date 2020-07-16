<?php

    $i = 0;
    $qpdo = "SELECT * FROM film ";
    $query = $pdo->query($qpdo);
    foreach($query as $row){
        echo "<option value='$i'>".$row["titre"]."</option>";
        $i++;
       
    }
?>