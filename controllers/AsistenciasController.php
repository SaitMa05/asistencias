<?php

namespace Controllers;
use Controller;
use MVC\Router;
use Model\AsistenciasModel;
use Model\CursosModel;

class AsistenciasController{


    public static function index(Router $router){
        iniciarSession();

        $nombre = $_SESSION['nombre'];
        $apellido = $_SESSION['apellido'];
        $email = $_SESSION['email'];
        $rol = $_SESSION['rol'];
        $titulo = "Asistencias";


        $cursos = new CursosModel();
        $cursos = $cursos->obtenerCursos();

        
            
        $router->render('asistencias/index', [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'titulo' => $titulo,
            'rol' => $rol,
            'cursos' => $cursos
        ]);

    }

}
