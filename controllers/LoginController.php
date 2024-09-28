<?php

namespace Controllers;
use MVC\Router;
use Model\LoginModel;

class LoginController{

    public static function login(Router $router){


        $router->render('login/login', [
        ]);
    }


    public static function index(Router $router){

        
        $router->render('login/registro', [
            
        ]);
    }



    public static function crear(Router $router){
        
        $argsUsuario = $_POST;

        $usuario = new LoginModel();
        $usuario->persistir($argsUsuario, "Mati");

        // Procesar los datos de inicio de sesión o validarlos
        // Aquí podrías validar al usuario, pero por ahora solo devolveremos los datos

        // Enviar los datos de vuelta como respuesta JSON
        echo json_encode([
            'status' => 'success',
            'data' => $argsUsuario,
            'message' => 'Usuario registrado correctamente'
        ]);

        exit;


        $router->render('login/registro', []);
    }

    public static function bad(){
        header('Location: /login/');
    }

}