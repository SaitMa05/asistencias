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

    public static function enviar(Router $router) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Captura los datos de asistencia y tardanza desde $_POST
            $asistencias = isset($_POST['asistencia']) ? $_POST['asistencia'] : [];
            $tardanzas = isset($_POST['tardanza']) ? $_POST['tardanza'] : [];
    
            $resultados = []; // Arreglo para almacenar los resultados de asistencia y tardanza
    
            // Verifica que $asistencias y $tardanzas sean arrays
            if (is_array($asistencias) && is_array($tardanzas)) {
                // Procesa cada alumno en el array de asistencias
                foreach ($asistencias as $alumno_id => $asistencia) {
                    $tardanza = isset($tardanzas[$alumno_id]) ? 1 : 0;
                    $asistencia = $asistencia ? 1 : 0;
    
                    // Almacena el resultado en el arreglo
                    $resultados[] = [
                        'alumno_id' => $alumno_id,
                        'asistencia' => $asistencia,
                        'tardanza' => $tardanza
                    ];
                }
            // Devuelve el resultado como respuesta JSON para que puedas verificarlo en la vista previa
            header('Content-Type: application/json');
            echo json_encode(['status' => true, 'resultados' => $resultados]);
            exit;
            } else {
                echo "Error: Los datos de asistencia o tardanza no están en el formato esperado.";
                exit;
            }

        }
    }
    
    

}
