<?php
require_once './app/controllers/individuos.controller.php';
require_once './app/controllers/categoriasController.php';

 define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'individuos';
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
    case 'individuos':
        $controller = new controladorIndividuos();
        $controller-> mostrarIndividuos_control();
        break;
    case 'agregarIndividuo':
        $controller = new controladorIndividuos();
        $controller-> sumarIndividuo();
        break;
    case 'eliminarIndividuo':
        $controller = new controladorIndividuos();
        $controller-> eliminarIndividuo($params[1]);
        break;
    case 'individuo':
        $controller = new controladorIndividuos();
        $controller-> mostrarIndividuoEnDetalle_control($params[1]);
        break;
    case 'individuoAModificar':
        $controller = new controladorIndividuos();
        $controller-> mostrarIndividuoAModificar_control($params[1]);
        break;
    case 'modificarIndividuo':
        $controller = new controladorIndividuos();
        $controller-> modificarDatos();
        break;
    case 'especies':
        $controller = new categoriasController();
        $controller-> mostrarCategorias();
        break;
    case 'agregarEspecies':
        $controller = new categoriasController();
        $controller-> sumarEspecie();
        break;
    case 'eliminarEspecies':
        $controller = new categoriasController();
        $controller-> eliminarEspecie($params[1]);
        break;
    case 'mostrarEspecies':
        $controller = new categoriasController();
        $controller-> seleccionarEspecie($params[1]);
        break;
    case 'especieAModificar':
        $controller = new categoriasController();
        $controller-> mostrarEspecieAModificar_control($params[1]);
        break;
    case 'modificarEspecies':
        $controller = new categoriasController();
        $controller-> modificarDatosEspecie();
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

