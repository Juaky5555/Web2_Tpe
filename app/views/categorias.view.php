<?php

class vistaCategorias{

    function mostrarCategorias($categorias){
        require_once 'templates/listasCategorias.phtml';
    }

    public function mostrarEspecieEspecifica($individuos, $especies){
        require 'templates/mostrarEspecieEspecifica.phtml';
    }
    
    public function mostrarEspecieAModificar($categoria){
        require 'templates/categoriaAModificar.phtml';
    }
    
    public function showError($error) {
        require 'templates/error.phtml';
    }
}


?>