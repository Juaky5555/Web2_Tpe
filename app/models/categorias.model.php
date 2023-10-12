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

    function borrarCategoria($id) {
        $query = $this->db->prepare('DELETE FROM especies WHERE id_especies = ?');
        $query->execute([$id]);
    }

    function seleccionarEspecie($id) {
        $query = $this->db->prepare('SELECT * FROM especies WHERE id_especies = ?');
        $query->execute([$id]);
        $especie = $query->fetch(PDO::FETCH_OBJ);
        return $especie;
    }
    
    function modificarCategoria($especie, $descripcion){
        $query = $this->db->prepare('UPDATE especies SET especie = ?, descripcion = ? WHERE id_especies = ?');
        $query->execute([$especie, $descripcion]);
    }

    function obtenerCategoriaPorId($id){
        $query = $this->db->prepare('SELECT * FROM especies WHERE id_especies = ?');
        $query->execute([$id]);
        $especie = $query->fetch(PDO::FETCH_OBJ);
        return $especie;
    }


}

?>