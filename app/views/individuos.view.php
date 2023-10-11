<?php

class vistaIndividuos{
    public function mostrarIndividuos($individuos){
        $cuenta = count($individuos);

        require 'templates/listaIndividuos.phtml';
    }

    public function mostrarIndividuoEnDetalle($animal){
        require 'templates/individuoEnDetalle.phtml';
    }

    public function mostrarIndividuoAModificar($animal){
        require 'templates/individuoAModificar.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}