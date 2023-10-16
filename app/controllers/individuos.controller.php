<?php
require_once './app/models/individuos.model.php';
require_once './app/views/individuos.view.php';
require_once './app/helpers/autenticacion.helper.php';
class controladorIndividuos{
    private $modelo;
    private $vista;
    private $modeloEspecies;

    public function __construct() {
        //AutenticacionHelper::verify();
        AutenticacionHelper::inicializar();                                 
        $this->modelo = new modeloIndividuos();
        $this->vista = new vistaIndividuos();
        $this->modeloEspecies = new modeloCategorias();
    }

    public function mostrarIndividuos_control() { 
        $individuos = $this->modelo->obtenerIndividuos();
        $especies = $this->modeloEspecies->obtenerCategorias();
        $this->vista->mostrarIndividuos($individuos, $especies);
    }

    public function mostrarIndividuoEnDetalle_control($id){
        $animal = $this->modelo->obtenerIndividuoPorID($id);

        $this->vista->mostrarIndividuoEnDetalle($animal);
    }

    public function mostrarIndividuoAModificar_control($id){
        $animal = $this->modelo->obtenerIndividuoPorID($id);
        $especies = $this->modeloEspecies->obtenerCategorias();
        $this->vista->mostrarIndividuoAModificar($animal, $especies);
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