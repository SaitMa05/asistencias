<?php 

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'c2650896_asisten', 'ma85DIvefu', 'c2650896_asisten');

    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    } 

    return $db;
    
}