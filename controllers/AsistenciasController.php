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
    
            // Generar la vista parcial que devolverá las filas de la tabla
            if (!empty($alumnos)) {
                foreach ($alumnos as $alumno) {
                    echo "<tr>";
                    echo "<td>" . $alumno->nombre . " " . $alumno->apellido . "</td>";
                    echo "<td class='asistencia-confirma text-center'><input type='checkbox' name='asistencia' data-id='" . $alumno->id . "' value='asistencia'></td>";
                    echo "<td class='asistencia-confirma text-center'><input type='checkbox' name='tardanza' data-id='" . $alumno->id . "' value='tardanza'></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No se encontraron alumnos para este curso.</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No se recibió el ID del curso.</td></tr>";
        }

        
    }

}
