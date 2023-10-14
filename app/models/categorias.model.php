<?php

class modeloCategorias{
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_veterinaria;charset=utf8', 'root', '');
    }
    
    function obtenerCategorias() {
        $query = $this->db->prepare('SELECT * FROM especies');
        $query->execute();
        
        $especie = $query->fetchAll(PDO::FETCH_OBJ);
        return $especie;
    }

    function insertarCategoria($especie, $descripcion) {
        $query = $this->db->prepare('INSERT INTO especies (especie, descripcion) VALUES(?,?)');
        $query->execute([$especie, $descripcion]);
        return $this->db->lastInsertId();
    }

    function borrarCategoria($id_especie) {
        $query = $this->db->prepare('DELETE FROM especies WHERE id_especie = ?');
        $query->execute([$id_especie]);
    }

    function seleccionarEspecie($id_especie) {
        $query = $this->db->prepare('SELECT * FROM especies WHERE id_especies = ?');
        $query->execute([$id_especie]);
        $especie = $query->fetch(PDO::FETCH_OBJ);
        return $especie;
    }
    
    function modificarCategoria($especie, $descripcion, $id_especie){
        $query = $this->db->prepare('UPDATE especies SET especie = ?, descripcion = ? WHERE id_especie = ?');
        $query->execute([$especie, $descripcion, $id_especie]);
    }

    function obtenerCategoriaPorId($id_especie){
        $query = $this->db->prepare('SELECT * FROM especies WHERE id_especie = ?');
        $query->execute([$id_especie]);
        $animales = $query->fetch(PDO::FETCH_OBJ);
        return $animales;
    }

}
?>