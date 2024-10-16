<?php


namespace Model;

class AsistenciasModel extends Model
{

    protected static $tabla = 'asistencias';
    protected static $columnasDB = [
        'id',
        'fecha',
        'asistencia',
        'fkUsuario',
        'fkAlumnos',
        'fechaCreacion',
        'fechaCreacionProfesor',
        'fechaEliminacion',
    ];

    public $id;
    public $fecha;
    public $asistencia;
    public $fkUsuario;
    public $fkAlumnos;
    public $fechaCreacion;
    public $fechaCreacionProfesor;
    public $fechaEliminacion;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->fecha = $args['fecha'] ?? date('Y-m-d H:i:s');
        $this->asistencia = $args['asistencia'] ?? 0;
        $this->fkUsuario = $args['fkUsuario'] ?? null;
        $this->fkAlumnos = $args['fkAlumnos'] ?? null;
        $this->fechaCreacion = $args['fechaCreacion'] ?? date('Y-m-d H:i:s');
        $this->fechaCreacionProfesor = $args['fechaCreacionProfesor'] ?? date('Y-m-d H:i:s');
        $this->fechaEliminacion = $args['fechaEliminacion'] ?? null;
    }



}