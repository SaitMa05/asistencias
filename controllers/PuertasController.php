<?php

namespace Controllers;
use Controller;
use MVC\Router;
use Model\PuertasManejoModel;


class PuertasController{

    
    public static function index(Router $router){

        iniciarSession();
        adminSession();

        $nombre = $_SESSION['nombre'];
        $apellido = $_SESSION['apellido'];
        $email = $_SESSION['email'];

        $titulo = "Listado de Puertas";

        $puertas = new PuertasManejoModel();
        $puertasListado = $puertas->obtener();        

        // Arreglo para asociar los movimientos a las puertas
        $puertasConMovimientos = [];

        // Asociar los movimientos con las puertas
        foreach ($puertasListado as $puerta) {
            $puertaConMovimientos = (array) $puerta; // Convertimos el objeto a array para manipularlo
            $puertaConMovimientos['movimientos'] = []; // Inicializamos la lista de movimientos

            $puertasConMovimientos[] = $puertaConMovimientos;
        }

        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')  {
            header('Content-Type: application/json');
            echo json_encode($puertasConMovimientos); // Devolver la lista de puertas con sus movimientos
            exit;
        }
        
        $router->renderAdmin('admin/puertas/index', [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'titulo' => $titulo,
            'puertasListado' => $puertasConMovimientos
        ]);
    }
}

