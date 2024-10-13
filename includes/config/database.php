<?php 

function conectarDB() : mysqli {
    $db = new mysqli('vps-4445190-x.dattaweb.com', 'c2650896_asisten', '@Sb@ftt7bP', 'c2650896_asisten');

    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    } 

    return $db;
    
}