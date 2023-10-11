<?php

class modeloIndividuos{
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_veterinaria;charset=utf8', 'root', '');
    }

    function obtenerIndividuos() {
        $query = $this->db->prepare('SELECT * FROM individuos JOIN especies ON individuos.fk_id_especie = especies.id_especie');
        $query->execute();
        
        $individuo = $query->fetchAll(PDO::FETCH_OBJ);
        return $individuo;
    }

    function insertarIndividuo($nombre, $raza, $edad, $color, $personalidad, $fk_id_especie, $imagen) {
        $query = $this->db->prepare('INSERT INTO individuos (nombre, raza, edad, color, personalidad, fk_id_especie, imagen) VALUES(?,?,?,?,?,?,?)');
        $query->execute([$nombre, $raza, $edad, $color, $personalidad, $fk_id_especie, $imagen]);
        return $this->db->lastInsertId();
    }

    function borrarIndividuo($id) {
        $query = $this->db->prepare('DELETE FROM individuos WHERE id = ?');
        $query->execute([$id]);
    }
    
    function obtenerIndividuoPorID($id) {
        $query = $this->db->prepare('SELECT * FROM individuos JOIN especies ON individuos.fk_id_especie = especies.id_especie WHERE id = ?');
        $query->execute([$id]);
        $individuo = $query->fetch(PDO::FETCH_OBJ);
        return $individuo;
    }
    
    function modificarIndividuo($id, $nombre, $raza, $edad, $color, $personalidad, $fk_id_especie){
        $query = $this->db->prepare('UPDATE individuos SET nombre = ?, raza = ?, edad = ?, color = ?, personalidad = ?, fk_id_especie = ? WHERE id = ?');
        $query->execute([$nombre, $raza, $edad, $color, $personalidad, $fk_id_especie, $id]);
    }
}