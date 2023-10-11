<?php

class vistaCategorias{

    function mostrarCategorias($categorias){
        require_once 'templates/listasCategorias.phtml';
    }

    public function mostrarmostrarEspecieEspecifica($categoria){
        require 'templates/mostrarEspecieEspecifica.phtml';
    }
    
    public function showError($error) {
        require 'templates/error.phtml';
    }
}


?>