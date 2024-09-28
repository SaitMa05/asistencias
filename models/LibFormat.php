<?php 

namespace Model;

class LibFormat extends Model {

    public static function strEmptyToNull($value) {
        // Verifica si el valor es nulo o vacío, y devuelve "NULL" sin comillas.
        return empty($value) ? "NULL" : "'$value'";  // Agrega comillas solo si no es NULL.
    }

    public static function intEmptyToNull($value) {
        // Para los enteros, devuelve NULL si está vacío
        return empty($value) ? "NULL" : $value;
    }
}