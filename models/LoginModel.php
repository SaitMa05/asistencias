<?php


namespace Model;

class LoginModel extends Model
{

    protected static $tabla = 'usuario';
    protected static $columnasDB = [
        'id',
        'nombre',
        'apellido',
        'nombreUsuario',
        'dni',
        'telefono',
        'email',
        'password',
        'aceptado',
        'fechaCreacion',
        'fechaModificacion',
        'fechaEliminacion',
        'creadorPor',
        'modificadoPor',
        'eliminadoPor',
        'aceptadoPor',
        'fkRol'
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
    public $token;

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
        $this->fechaCreacion = $args['fechaCreacion'] ?? null;
        $this->fechaModificacion = $args['fechaModificacion'] ?? null;
        $this->fechaEliminacion = $args['fechaEliminacion'] ?? null;
        $this->creadorPor = $args['creadorPor'] ?? null;
        $this->modificadoPor = $args['modificadoPor'] ?? null;
        $this->eliminadoPor = $args['eliminadoPor'] ?? null;
        $this->aceptadoPor = $args['aceptadoPor'] ?? null;
        $this->fkRol = $args['fkRol'] ?? null;
        $this->token = $args['token'] ?? null;
    }

    public static function obtener()
    {
        $query = "call usuario_obtener()";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }


    public function persistir($usuario)
    {
        // Usar las propiedades del objeto en lugar de $args
        $sql = "CALL usuario_persistir(";
        $sql .= LibFormat::strEmptyToNull($this->id) . ", ";
        $sql .= LibFormat::strEmptyToNull($this->nombre) . ", ";
        $sql .= LibFormat::strEmptyToNull($this->apellido) . ", ";
        $sql .= LibFormat::strEmptyToNull($this->nombreUsuario) . ", ";
        $sql .= LibFormat::strEmptyToNull($this->dni) . ", ";
        $sql .= LibFormat::strEmptyToNull($this->telefono) . ", ";
        $sql .= LibFormat::strEmptyToNull($this->email) . ", ";
        $sql .= LibFormat::strEmptyToNull($this->password) . ", ";
        $sql .= LibFormat::intEmptyToNull(0) . ", "; // Valor '0' fijo
        $sql .= LibFormat::strEmptyToNull($this->fechaModificacion) . ", ";
        $sql .= LibFormat::strEmptyToNull($usuario) . ", "; // Usuario que realiza la operación
        $sql .= LibFormat::strEmptyToNull($this->modificadoPor) . ", ";
        $sql .= LibFormat::strEmptyToNull($this->aceptadoPor) . ", ";
        $sql .= LibFormat::intEmptyToNull($this->fkRol) . ")";

        // Ejecutar la consulta
        $resultado = self::consultarSQL($sql);
        return $resultado;
    }

    public function obtenerPorLogin($credencial)
    {
        // Preparar la consulta con el procedimiento almacenado
        $sql = "CALL usuario_obtenerPorLogin(";
        $sql .= LibFormat::strEmptyToNull($credencial) . ")";  // Formateo de la credencial para que sea NULL si está vacía

        // Ejecutar la consulta y devolver el resultado
        $resultado = self::consultarSQL($sql);
        return $resultado;
    }

    public function verificarRegistro()
    {
        $sql = "CALL usuario_verificarRegistro(";
        $sql .= LibFormat::strEmptyToNull($this->nombreUsuario) . ", ";
        $sql .= LibFormat::strEmptyToNull($this->dni) . ", ";
        $sql .= LibFormat::strEmptyToNull($this->telefono) . ", ";
        $sql .= LibFormat::strEmptyToNull($this->email) . ")";
        // Ejecutar la consulta y devolver el resultado
        $resultado = self::consultarSQL($sql);
        return $resultado;
    }

    public function obtenerRolPorId($fkRol){
        $sql = "CALL obtener_rolPorId(" . LibFormat::intEmptyToNull($fkRol) . ")";
        $resultado = self::consultarSQL($sql);

        return $resultado[0]->nombre;
    }

    public function almacenarToken(){
        $sql = "CALL usuario_almacenarToken(";
        $sql .= LibFormat::strEmptyToNull($this->id) . ", ";
        $sql .= LibFormat::strEmptyToNull($this->token) . ")";

        $resultado = self::consultarSQL($sql);
        return $resultado;
    }

}