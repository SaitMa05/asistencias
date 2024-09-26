<?php

namespace Controllers;
use MVC\Router;

class LoginController{

    public static function login(Router $router){
        $router->render('login/login');
    }


    public static function crear(Router $router){
        $router->render('login/registro');
    }

    public static function bad(){
        header('Location: /login/');
    }

}