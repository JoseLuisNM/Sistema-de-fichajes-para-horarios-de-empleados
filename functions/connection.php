<?php

    $mysqli = new mysqli("localhost","root","","sistema_fichajes");

    if($mysqli->connect_errno){
        echo "Error en la conexion de la base de datos!";
    }
?>