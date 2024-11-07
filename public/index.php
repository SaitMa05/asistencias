<?php
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;

// Controllers
use Controllers\DashboardController;
use Controllers\LoginController;
use Controllers\AsistenciasController;
use Controllers\PuertasManejoController;
use Controllers\AdminController;

$router = new Router();


$router->get('/dashboard', [DashboardController::class,'index']);
$router->get('/login', [LoginController::class, 'login']);
$router->get('/login/bad', [LoginController::class, 'bad']);
$router->get('/registro', [LoginController::class, 'index']);
$router->get('/login/cerrar-sesion', [LoginController::class, 'cs']);
$router->get('/asistencias', [AsistenciasController::class, 'index']);
$router->get('/puertas', [PuertasManejoController::class, 'index']);
$router->get('/admin', [AdminController::class, 'index']);
$router->get('/admin/asistencias', [AdminController::class, 'asistencias']);
$router->get('/resetpassword', [LoginController::class, 'resetPassword']);

// Post
$router->post('/registro/crear', [LoginController::class, 'crear']);
$router->post('/login/autenticar', [LoginController::class, 'autenticar']);
$router->post('/asistencias/alumnos', [AsistenciasController::class, 'alumnosPorCurso']);
$router->post('/asistencias/enviar', [AsistenciasController::class, 'enviar']);
$router->post('/puertas/movimiento', [PuertasManejoController::class, 'movimiento']);
$router->post('/puertas/token', [PuertasManejoController::class, 'token']);
$router->post('/resetpassword/enviarEmail', [LoginController::class, 'enviarEmail']);


$router->comprobarRutas();