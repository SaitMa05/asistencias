<?php

namespace MVC;

class Router{
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }


    public function comprobarRutas() {

        $urlActual = $_SERVER['REQUEST_URI'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if(strpos($urlActual, '?')){ 
            $urlActual = $_SERVER['REDIRECT_URL'];
        }

        if($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null;
        }

        if($fn) {
            call_user_func($fn, $this);
        } else {
            call_user_func($this->rutasGET['/login/bad']);
            
        }
    }

    // Mostrar Vistas
    public function render($view){

        ob_start();
        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean();
        include __DIR__ . "/views/layout.php";
    }
}