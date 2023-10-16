<?php

class vistaIndividuos{
    public function mostrarIndividuos($individuos, $especies){
        require 'templates/listaIndividuos.phtml';
    }

    public function mostrarIndividuoEnDetalle($animal){
        require 'templates/individuoEnDetalle.phtml';
    }

    public function mostrarIndividuoAModificar($animal, $especies){
        require 'templates/individuoAModificar.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}