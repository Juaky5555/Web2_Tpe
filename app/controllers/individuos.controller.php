<?php
require_once './app/models/individuos.model.php';
require_once './app/views/individuos.view.php';
//require_once './app/helpers/auth.helper.php'; acomodar despues

class controladorIndividuos{
    private $modelo;
    private $vista;

    public function __construct() {
        //AuthHelper::verify();          //ACOMODAR JUNTO AL REQUIRE
                                                    
        $this->modelo = new modeloIndividuos();
        $this->vista = new vistaIndividuos();
    }

    public function mostrarIndividuos_control() { //ponerle distinto nombre
        // obtengo tareas del controlador
        $individuos = $this->modelo->obtenerIndividuos();
        
        // muestro las tareas desde la vista
        $this->vista->mostrarIndividuos($individuos);
    }

    public function mostrarIndividuoEnDetalle_control($id){
        $animal = $this->modelo->obtenerIndividuoPorID($id);

        $this->vista->mostrarIndividuoEnDetalle($animal);
    }

    public function mostrarIndividuoAModificar_control($id){
        $animal = $this->modelo->obtenerIndividuoPorID($id);

        $this->vista->mostrarIndividuoAModificar($animal);
    }

    public function sumarIndividuo() {
        $id = 0;
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nombre = $_POST['nombre'];
            $fk_id_especie = $_POST['especie'];
            $raza = $_POST['raza'];
            $edad = $_POST['edad'];
            $color = $_POST['color'];
            $personalidad = $_POST['personalidad'];
            if (isset($_FILES['imagen']) && !empty($_FILES['imagen']['tmp_name'])){
                $imagen = file_get_contents($_FILES['imagen']['tmp_name']);
            }
        }
    
        if (empty($nombre) || empty($edad) || empty($raza) || empty($fk_id_especie) || empty($color)) {
            $this->vista->showError("Hay campos obligatorios sin completar");
        } else {
            $id = $this->modelo->insertarIndividuo($nombre, $raza, $edad, $color, $personalidad, $fk_id_especie, $imagen);
        }
    
        if ($id != 0) {
            header('Location: ' . BASE_URL);
        } else {
            $this->vista->showError("Error al insertar la tarea");
        }
    }

    function modificarDatos() {
        // ACA HABRIA QUE HACER UNA VALIDACION DE LOS DATOS, PARA CHEQUEAR QUE LOS CAMPOS NO VENGAN VACIOS O CON DATOS ERRONEOS.
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $raza = $_POST['raza'];
            $edad = $_POST['edad'];
            $color = $_POST['color'];
            $personalidad = $_POST['personalidad']; 
            $fk_id_especie = $_POST['especie'];
        }
        
        if (empty($nombre) || empty($edad) || empty($raza) || empty($fk_id_especie) || empty($color)) {
            $this->vista->showError("Hay campos obligatorios sin completar");
        } else {
            $id = $this->modelo->modificarIndividuo($id, $nombre, $raza, $edad, $color, $personalidad, $fk_id_especie);
        }
        
        if ($_POST['id'] != null) {
            header('Location: ' . BASE_URL);
        } else {
            $this->vista->showError("Error al modificar al individuo");
        }
    }

    function eliminarIndividuo($id) {
        $this->modelo->borrarIndividuo($id);
        header('Location: ' . BASE_URL);
    }
}