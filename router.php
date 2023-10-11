<?php
require_once 'app/individuos.php';
require_once 'app/especies.php';
include_once './app/controllers/PrimerController.php';

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
        sumarIndividuo();
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
    case 'especies':
        $p1 = new PrimerController();
        $p1->mostrarEspecies();
        break;
    default: 
        echo "404 Page Not Found";
        break;
}

// class Router{
//     public static $ACTION = "action";
//     public static $PARAMS = "params";
//     public static $ACTIONS = [
//         'individuos' => 'mostrarIndividuos',
//         'especies' => "mostrarEspecies",
//         'sumar' => 'sumarIndividuo',
//         'eliminar' => 'eliminarIndividuo',
//         'mostrar' => 'mostrarIndividuoEnDetalle',
//         'modificar' => 'modificarDatos'
    
//     ];
// }

