<?php

namespace Controllers;
use Controller;
use MVC\Router;
use Model\PuertasManejoModel;

class PuertasManejoController{

    public static function index(Router $router) {
        iniciarSession();

        $nombre = $_SESSION['nombre'];
        $apellido = $_SESSION['apellido'];
        $email = $_SESSION['email'];
        $titulo = "Puertas";

        // Obtener las puertas desde el modelo
        $puertas = new PuertasManejoModel();
        $puertasListado = $puertas->obtener();

        // Obtener los movimientos de todas las puertas
        $movimientos = $puertas->movimientoObtener();

        // Arreglo para asociar los movimientos a las puertas
        $puertasConMovimientos = [];

        // Asociar los movimientos con las puertas
        foreach ($puertasListado as $puerta) {
            $puertaConMovimientos = (array) $puerta; // Convertimos el objeto a array para manipularlo
            $puertaConMovimientos['movimientos'] = []; // Inicializamos la lista de movimientos

            foreach ($movimientos as $mov) {
                if ($mov->fkPuertas == $puerta->id) { // Comparamos si los movimientos pertenecen a la puerta actual
                    $puertaConMovimientos['movimientos'][] = [
                        'fechaApertura' => $mov->fechaApertura,
                        'fechaCierre' => $mov->fechaCierre ?? 'Aun no se ha cerrado',
                        'nombreUsuario' => $mov->nombreUsuario
                    ];
                }
            }

            // Añadimos la puerta con sus movimientos al arreglo
            $puertasConMovimientos[] = $puertaConMovimientos;
        }

        // Si es una solicitud AJAX, devolver JSON
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            header('Content-Type: application/json');
            echo json_encode($puertasConMovimientos); // Devolver la lista de puertas con sus movimientos
            exit;
        }

        // Si no es una solicitud AJAX, renderizar la vista HTML
        $router->render('puertas/index', [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'titulo' => $titulo,
            'puertasListado' => $puertasConMovimientos
        ]);
    }
    

}