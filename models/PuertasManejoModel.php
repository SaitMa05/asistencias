<?php

namespace Model;

class PuertasManejoModel extends Model{
    protected static $tabla = 'puertas';
    protected static $columnasDB = [
        'id',
        'nombre',
        'descripcion',
        'fechaCreacion',
        'fechaModificacion',
        'fechaEliminacion',
        'creadoPor',
        'modificadoPor',
        'eliminadoPor'
    ];

    public $id;
    public $nombre;
    public $descripcion;
    public $fechaCreacion;
    public $fechaModificacion;
    public $fechaEliminacion;
    public $creadoPor;
    public $modificadoPor;

    public $eliminadoPor;

    public $nombrePuerta;
    public $nombreUsuario;
    public $fkPuertas;
    public $fechaApertura;

    public $fechaCierre;



    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->fechaCreacion = $args['fechaCreacion'] ?? null;
        $this->fechaModificacion = $args['fechaModificacion'] ?? null;
        $this->fechaEliminacion = $args['fechaEliminacion'] ?? null;
        $this->creadoPor = $args['creadoPor'] ?? '';
        $this->modificadoPor = $args['modificadoPor'] ?? '';
        $this->eliminadoPor = $args['eliminadoPor'] ?? '';

        $this->nombrePuerta = $args['nombrePuerta'] ?? '';
        $this->nombreUsuario = $args['nombreUsuario'] ?? '';
        $this->fkPuertas = $args['fkPuertas'] ?? '';
        $this->fechaApertura = $args['fechaApertura'] ?? '';
        $this->fechaCierre = $args['fechaCierre'] ?? 'Aun no se ha cerrado';

        
    }

    public function obtener()
    {
        $query = "call puertas_obtener()";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public function movimientoObtener(){
        $query = "call movimientoPuerta_obtener()";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

}