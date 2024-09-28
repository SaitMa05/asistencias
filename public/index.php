<?php
require_once __DIR__ . '/../includes/app.php';

use Controllers\HomeController;
use MVC\Router;
use Controllers\LoginController;

$router = new Router();



$router->get('/', [HomeController::class, 'index']);
$router->get('/login', [LoginController::class, 'login']);
$router->get('/login/bad', [LoginController::class, 'bad']);
$router->get('/registro', [LoginController::class, 'index']);
$router->post('/registro/crear', [LoginController::class, 'crear']);


$router->comprobarRutas();