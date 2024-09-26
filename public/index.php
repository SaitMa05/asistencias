<?php
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\LoginController;

$router = new Router();



$router->get('/', 'index');
$router->get('/login', [LoginController::class, 'login']);
$router->get('/login/bad', [LoginController::class, 'bad']);
$router->get('/registro', [LoginController::class, 'crear']);


$router->comprobarRutas();