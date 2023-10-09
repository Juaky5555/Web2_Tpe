<?php
require_once 'app/individuos.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'mostrar';
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
    case 'mostrar':
        mostrarIndividuos();
        break;
    case 'agregar':
        añadirIndividuo();
        break;
    case 'eliminar':
        eliminarIndividuo($params[1]);
        break;
    case 'individuo':
        mostrarIndividuoEnDetalle($params[1]);
        break;
    case 'mostrarParaModificar':
        mostrarIndividuoModificar($params[1]);
        break;
    case 'modificar':
        modificarDatos();
        break;
    default: 
        echo "404 Page Not Found";
        break;
}