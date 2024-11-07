<?php

namespace Controllers;
use MVC\Router;
use Model\LoginModel;
use Model\EmailModel;

class LoginController{

    public static function login(Router $router){
        loginOn();
        $titulo = "Login";
        $router->render('login/login', [
            'titulo' => $titulo,
        ]);
    }
    public static function autenticar(Router $router){
        $auth = $_POST;
        $credencial = $auth['nombreUsuario'];
        $password = $auth['password'];
    
        $usuarioModel = new LoginModel();
        $usuario = $usuarioModel->obtenerPorLogin($credencial);

        
        if ($usuario) {
            // Convertimos a JSON y luego a array
            $json = json_encode($usuario);
            $array = json_decode($json, true);
            $passwordUsuario = $array[0]['password'];
    
            // Verificamos la contraseña
            if (password_verify($password, $passwordUsuario)) {
                session_start();

                session_regenerate_id(true);
                $_SESSION['id'] = $array[0]['id'];
                $_SESSION['nombreUsuario'] = $array[0]['nombreUsuario'];
                $_SESSION['nombre'] = $array[0]['nombre'];
                $_SESSION['apellido'] = $array[0]['apellido'];
                $_SESSION['email'] = $array[0]['email'];
                $_SESSION['login'] = true;
        
                $rol = $usuarioModel->obtenerRolPorId($array[0]['fkRol']);
                $_SESSION['rol'] = $rol;
                $_SESSION['fkRol'] = $array[0]['fkRol'];
                
    
                echo json_encode([
                    'success' => true,
                    'message' => 'Usuario autenticado'
                ]);

                exit; // Finalizamos para evitar otras salidas
            } else {
                // Contraseña incorrecta
                echo json_encode([
                    'success' => false,
                    'message' => 'Contraseña incorrecta'
                ]);
                exit;
            }
        } else {
            // Usuario no encontrado
            echo json_encode([
                'success' => false,
                'message' => 'Usuario no encontrado o no aceptado'
            ]);
            exit;
        }
    }

    public static function index(Router $router){
        loginOn();
        $titulo = "Registro";
        $router->render('login/registro', [
            'titulo' => $titulo,
        ]);
    }



    public static function crear(Router $router){
        
        $argsUsuario = $_POST;

        // Hashear la contraseña antes de persistir
        if (isset($argsUsuario['password'])) {
            $argsUsuario['password'] = password_hash($argsUsuario['password'], PASSWORD_BCRYPT);
        }
        // Crear la instancia del modelo de usuario
        $usuario = new LoginModel($argsUsuario);

        $userExistente = $usuario->verificarRegistro();

        if (!empty($userExistente)) {
            // Si el usuario ya existe, devolver mensaje de error
            echo json_encode([
                'status' => false,
                'message' => 'El usuario ya existe con alguno de los datos proporcionados (nombre de usuario, DNI, teléfono o email).'
            ]);
            exit;
        }

        // Persistir el usuario con la contraseña hasheada
        $usuario->persistir($argsUsuario['nombreUsuario']);
        
        // Responder con un mensaje de éxito
        echo json_encode([
            'status' => true,
            'data' => $argsUsuario,
            'message' => 'Usuario registrado correctamente'
        ]);
        
        exit;

    }

    public static function bad(){
        header('Location: /login/');
    }

    public static function cs(){
        session_start();
        $_SESSION = [];
        header('Location: /login');
    }

    public static function resetPassword(Router $router){
        $titulo = "Reset Password";
        $router->render('login/resetpassword', [
            'titulo' => $titulo,
        ]);
    }

    public static function enviarEmail(Router $router) {
        session_start();
        $emailUsuario = $_POST['email'];

        $loginModel = new LoginModel([
            'email' => $emailUsuario
        ]);

        $emailVerificado = $loginModel->obtenerPorEmail();

        if($emailVerificado){
            $email = new EmailModel();

            $destinatorio = $emailUsuario;
            $asunto = 'Recuperación de contraseña';
            $token = $email->generarToken();
    
            $cuerpo = "http://asistencias.localhost/resetpassword?token=$token";
    
            $email->enviar($destinatorio, $asunto, $cuerpo);
            
            $_SESSION['emailEnviado'] = true;
            echo json_encode([
                'success' => true,
                'data' => $email,
                'message' => 'Email enviado correctamente'
            ]);
            exit;

        }else{
            echo json_encode([
                'success' => false,
                'message' => 'Email no encontrado'
            ]);
            exit;
        }
    }

    public static function emailsend(Router $router){
        session_start();
        $emailEnviado = $_SESSION['emailEnviado'];
        if(!$emailEnviado){
            header('Location: /resetpassword');
        }
        $_SESSION = [];
        $titulo = "Email Enviado";
        $router->render('login/emailsend', [
            'titulo' => $titulo,
        ]);
    }

}