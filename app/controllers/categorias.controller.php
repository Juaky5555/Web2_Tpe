<?php
require_once './app/views/categorias.view.php';
require_once './app/models/categorias.model.php';
require_once './app/helpers/autenticacion.helper.php';


class categoriasController{ 
    private $modelo;
    private $vista;
    private $modeloIndividuo;
    
    public function __construct() {
        //AutenticacionHelper::verify();
        AutenticacionHelper::inicializar();                                
        $this->modelo = new modeloCategorias();
        $this->modeloIndividuo = new modeloIndividuos();
        $this->vista = new vistaCategorias();
    }

    public function mostrarCategorias(){
        $especie = $this->modelo->obtenerCategorias();   
        $this->vista->mostrarCategorias($especie);
    }

    public function mostrarEspecieAModificar_control($id_especie){
        $categoria = $this->modelo->obtenerCategoriaPorId($id_especie);
        $this->vista->mostrarEspecieAModificar($categoria);
    }
    
    public function sumarEspecie() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $especie = $_POST['especie'];
            $descripcion = $_POST['descripcion'];         
        }
        
        if (empty($especie) || empty($descripcion)) {
            $this->vista->showError("Hay campos obligatorios sin completar");
        } else {
            $id_especie = $this->modelo->insertarCategoria($especie, $descripcion);
        }
    
        if ($id_especie != 0) {
            header('Location: ' . 'especies');
        } else {
            $this->vista->showError("Error al insertar la tarea");
        }
    }

    public function mostrarEspecieEspecifica_control($id_especie){
        $individuos = $this->modeloIndividuo->obtenerIndividuosPorEspecie($id_especie);
        $this->vista->mostrarEspecieEspecifica($individuos);
    }

    function modificarDatosEspecie() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id_especie = $_POST['id_especie'];
            $descripcion = $_POST['descripcion']; 
            $especie = $_POST['especie'];
        }
        
        if (empty($descripcion) || empty($especie)) {
            $this->vista->showError("Hay campos obligatorios sin completar");
        } else {
            $id_especie = $this->modelo->modificarCategoria($especie, $descripcion, $id_especie);
        }
        
        if ($_POST['id_especie'] != null) {
            header('Location: ' . BASE_URL . 'especies');
        } else {
            $this->vista->showError("Error al modificar al individuo");
        }
    }

    function borrarCategoria($id_especie) {
        $this->modelo->borrarCategoria($id_especie);
        header('Location: ' . BASE_URL . 'especies');
    }
}