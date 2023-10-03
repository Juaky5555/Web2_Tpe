<?php
require_once 'app/tasks.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'mostrar';
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// mostrar    ->    mostrarIndividuos();
// agregar   ->    añadirIndividuo();
// eliminar/:id  -> eliminarIndividuo($id);
// individuo/:id -> mostrarEnDetalle($id)

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
    case 'animal':
        mostrarMas($params[1]);
        break;
    default: 
        echo "404 Page Not Found";
        break;
}