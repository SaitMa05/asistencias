<?php


namespace Model;

class LoginModel extends Model{

    protected static $tabla = 'usuario';
    protected static $columnasDB = [
        'id', 'nombre', 'apellido', 'nombreUsuario', 'dni', 'telefono', 'email', 
        'password', 'aceptado', 'fechaCreacion', 'fechaModificacion', 
        'fechaEliminacion', 'creadorPor', 'modificadoPor', 'eliminadoPor', 
        'aceptadoPor', 'fkRol'
    ];

    public $id;
    public $nombre;
    public $apellido;
    public $nombreUsuario;
    public $dni;
    public $telefono;
    public $email;
    public $password;
    public $aceptado;
    public $fechaCreacion;
    public $fechaModificacion;
    public $fechaEliminacion;
    public $creadorPor;
    public $modificadoPor;
    public $eliminadoPor;
    public $aceptadoPor;
    public $fkRol;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->nombreUsuario = $args['nombreUsuario'] ?? '';
        $this->dni = $args['dni'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->aceptado = $args['aceptado'] ?? '';
        $this->fechaCreacion = $args['fechaCreacion'] ?? date('Y/m/d');
        $this->fechaModificacion = $args['fechaModificacion'] ?? null;
        $this->fechaEliminacion = $args['fechaEliminacion'] ?? null;
        $this->creadorPor = $args['creadorPor'] ?? null;
        $this->modificadoPor = $args['modificadoPor'] ?? null;
        $this->eliminadoPor = $args['eliminadoPor'] ?? null;
        $this->aceptadoPor = $args['aceptadoPor'] ?? null;
        $this->fkRol = $args['fkRol'] ?? null;
    }

    public static function obtener(){
        $query = "call usuario_obtener()";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function persistir($args, $usuario){
        $sql = "CALL usuario_persistir(";
        $sql .= LibFormat::strEmptyToNull($args['id'] ?? null) . ", ";
        $sql .= LibFormat::strEmptyToNull($args['nombre']) . ", ";
        $sql .= LibFormat::strEmptyToNull($args['apellido']) . ", ";
        $sql .= LibFormat::strEmptyToNull($args['nombreUsuario']) . ", ";
        $sql .= LibFormat::strEmptyToNull($args['dni']) . ", ";
        $sql .= LibFormat::strEmptyToNull($args['telefono']) . ", ";
        $sql .= LibFormat::strEmptyToNull($args['email']) . ", ";
        $sql .= LibFormat::strEmptyToNull($args['password']) . ", ";
        $sql .= LibFormat::intEmptyToNull(0) . ", "; // Valor '1' fijo
        $sql .= LibFormat::strEmptyToNull($args['fechaModificacion'] ?? null) . ", "; // Puede ser NULL si está vacío
        $sql .= LibFormat::strEmptyToNull($usuario) . ", "; // Usuario
        $sql .= LibFormat::strEmptyToNull($args['modificadoPor'] ?? null) . ", "; // Puede ser NULL
        $sql .= LibFormat::strEmptyToNull($args['aceptadoPor'] ?? null) . ", "; // Puede ser NULL
        $sql .= LibFormat::intEmptyToNull($args['fkRol']) . ")"; // Valor fkRol puede ser NULL si está vacío
    
        // Para depuración, puedes quitarlo en producción
        $resultado = self::consultarSQL($sql);
        return $resultado;
    }
    


}