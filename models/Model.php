<?php

namespace Model;

class Model {

    // Base DE DATOS
    protected static $db;

    // Definir la conexión a la BD
    public static function setDB($database) {
        self::$db = $database;
    }


    

    
}