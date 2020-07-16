<?php

$qpdo1 = "SELECT * FROM abonnement,membre WHERE abonnement.id_abo = membre.id_abo AND id_membre=$id ";
                $query1 = $pdo->query($qpdo1);
                $compte = $query1->rowCount();
                if($compte>0)
                {
                    $stok = 1;
                }
                
                foreach($query1 as $row)
                {
                    echo "<strong>".$row['nom']."</strong>";
                }
?>