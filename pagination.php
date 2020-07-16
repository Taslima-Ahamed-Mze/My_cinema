<?php

    $videoPargenre = 10;
    $videoTotales = $query->rowCount();
    $genresTotales = ceil($videoTotales/$videoPargenre);
    if($_GET['page'] >0)
    {
        $_GET['page'] = intval($_GET['page']);
        $genreCourante = $_GET['page'];
    }else{
        $genreCourante = 1;
    }
    $depart = ($genreCourante-1)*$videoPargenre;

?>