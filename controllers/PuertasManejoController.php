<?php

namespace Controllers;
use Controller;
use MVC\Router;
class PuertasManejoController{

    public static function index(Router $router){
        iniciarSession();

        $nombre = $_SESSION['nombre'];
        $apellido = $_SESSION['apellido'];
        $email = $_SESSION['email'];
        $titulo = "Inicio";
        $titulo = "Puertas";
            
        $router->render('puertas/index', [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'titulo' => $titulo
        ]);

    }
}