<?php
include_once './app/views/categorias.view.php';
include_once './app/models/categorias.model.php';

class categoriasController{ 
    private $modelo;
    private $vista;

    
    public function __construct() {
        //AuthHelper::verify();          //ACOMODAR JUNTO AL REQUIRE
                                                    
        $this->modelo = new modeloCategorias();
        $this->vista = new vistaCategorias();
    }

    public function mostrarCategorias(){
        //ponerle distinto nombre
        // obtengo tareas del controlador
        $especie = $this->modelo->obtenerCategorias();
        
        // muestro las tareas desde la vista
        $this->vista->mostrarCategorias($especie);
    }

    public function mostrarEspecieAModificar_control($id){
        $especie = $this -> modelo -> obtenerCategoriaPorId($id);

    }
    
    public function sumarEspecie() {
        $id = 0;
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $especie = $_POST['especie'];
            $descripcion = $_POST['descripcion'];
        }
        
        if (empty($especie) || empty($descripcion)) {
            $this->vista->showError("Hay campos obligatorios sin completar");
        } else {
            $id = $this->modelo->insertarCategoria($especie, $descripcion);
        }
        
    
        if ($id != 0) {
            header('Location: ' . 'listarEspecies');
        } else {
            $this->vista->showError("Error al insertar la tarea");
        }
    }
     

}