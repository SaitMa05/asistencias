<?php

namespace Controllers;
use Controller;
use MVC\Router;

class DashboardController{


    public static function index(Router $router){
        iniciarSession();

        $router->render('dashboard/index');
    }

}
