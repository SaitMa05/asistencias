<?php

namespace Controllers;
use Controller;
use MVC\Router;
use Model\AsistenciasModel;
use Model\CursosModel;
use Model\AlumnosModel;

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

    public static function alumnos(Router $router) {
        if (isset($_POST['cursos'])) {
            $curso_id = $_POST['cursos'];
        
            // Lógica para obtener los alumnos del curso usando el modelo
            $alumnosModel = new AlumnosModel();
            $alumnos = $alumnosModel->obtenerAlumnosPorCurso($curso_id);
        
            // Devolver los alumnos como JSON
            header('Content-Type: application/json');
            echo json_encode($alumnos);
            exit;
        } else {
            // En caso de no recibir un curso válido, devolver un array vacío
            echo json_encode([]);
            exit;
        }
    }

}
