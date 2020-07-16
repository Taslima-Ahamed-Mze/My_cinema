<?php

    $i = 0;
	$qpdo = 'SELECT nom FROM genre';
	$query = $pdo->query($qpdo);
	foreach($query as $row){
        echo "<option value='$i'>".$row["nom"]."</option>";
        $i++;
       
	}
?>