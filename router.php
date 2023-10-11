<?php
require_once './app/controllers/individuos.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar';
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// mostrar    ->    mostrarIndividuos();
// agregar   ->    añadirIndividuo();
// eliminar/:id  -> eliminarIndividuo($id);
// individuo/:id -> mostrarEnDetalle($id);
// mostrarParaModificar/:id ->mostrarIndividuoModificar($id);

$params = explode('/', $action);

switch ($params[0]) {
    case 'listar':
        $controller = new controladorIndividuos();
        $controller-> mostrarIndividuos_control();
        break;
    case 'agregar':
        $controller = new controladorIndividuos();
        $controller-> sumarIndividuo();
        break;
    case 'eliminar':
        $controller = new controladorIndividuos();
        $controller-> eliminarIndividuo($params[1]);
        break;
    case 'mostrar':
        $controller = new controladorIndividuos();
        $controller-> mostrarIndividuoEnDetalle_control($params[1]);
        break;
    case 'mostrarParaModificar':
        $controller = new controladorIndividuos();
        $controller-> mostrarIndividuoAModificar_control($params[1]);
        break;
    case 'modificar':
        $controller = new controladorIndividuos();
        $controller-> modificarDatos();
        break;
    default: 
        echo "404 Page Not Found";
        break;
}