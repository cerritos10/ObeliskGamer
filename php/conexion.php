<?php
    $servidor="localhost";
    $BD="obeliskgamer";
    $user="root";
    $pass="";
    $conexion = new mysqli($servidor,$user,$pass,$BD);
    if($conexion -> connect_error){
        die("No se pudo conectar");
    }
?>