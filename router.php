<?php
require_once './app/controllers/individuos.controller.php';
require_once './app/controllers/categorias.controller.php';
require_once './app/controllers/autenticacion.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'individuos';
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

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
    case 'sumarEspecie':
        $controller = new categoriasController();
        $controller-> sumarEspecie();
        break;
    case 'borrarCategoria':
        $controller = new categoriasController();
        $controller-> borrarCategoria($params[1]);
        break;
    case 'mostrarespecie':
        $controller = new categoriasController();
        $controller-> mostrarEspecieEspecifica_control($params[1]);
        break;
    case 'especieAModificar':
        $controller = new categoriasController();
        $controller-> mostrarEspecieAModificar_control($params[1]);
        break;
    case 'modificarEspecies':
        $controller = new categoriasController();
        $controller-> modificarDatosEspecie();
        break;
    case 'login':
        $controller = new autenticacionController();
        $controller->mostrarLogin_control(); 
        break;
    case 'autenticar':
        $controller = new autenticacionController();
        $controller->autenticar();
        break;
    case 'logout':
        $controller = new autenticacionController();
        $controller->logout();
        break;
    default: 
        echo "404 Page Not Found";
        break;
}