<?php

namespace Controllers;
use Controller;
use MVC\Router;

class AsistenciasController{


    public static function index(Router $router){
        iniciarSession();

        $titulo = "Asistencias";
            
        $router->render('asistencias/index', [
            'titulo' => $titulo
        ]);

    }

}
