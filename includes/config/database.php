<?php 

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'rootUser', 'ma100A', 'c2650896_asisten');

    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    } 

    return $db;
    
}