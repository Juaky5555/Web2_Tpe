<?php

function obtenerConexion() {
    return new PDO('mysql:host=localhost;dbname=db_veterinaria;charset=utf8', 'root', '');
}

function obtenerIndividuos() {
    $db = obtenerConexion();

    $query = $db->prepare('SELECT * FROM individuos JOIN especies ON individuos.fk_id_especie = especies.id_especie');
    $query->execute();
    
    $individuo = $query->fetchAll(PDO::FETCH_OBJ);
    return $individuo;
}

function insertarIndividuo($nombre, $raza, $edad, $color, $personalidad, $fk_id_especie, $imagen) {
    $db = obtenerConexion();
    $query = $db->prepare('INSERT INTO individuos (nombre, raza, edad, color, personalidad, fk_id_especie, imagen) VALUES(?,?,?,?,?,?,?)');
    $query->execute([$nombre, $raza, $edad, $color, $personalidad, $fk_id_especie, $imagen]);
    return $db->lastInsertId();
}

function borrarIndividuo($id) {
    $db = obtenerConexion();
    $query = $db->prepare('DELETE FROM individuos WHERE id = ?');
    $query->execute([$id]);
}

function obtenerIndividuoPorID($id) {
    $db = obtenerConexion();
    $query = $db->prepare('SELECT * FROM individuos JOIN especies ON individuos.fk_id_especie = especies.id_especie WHERE id = ?');
    $query->execute([$id]);
    $individuo = $query->fetch(PDO::FETCH_OBJ);
    return $individuo;
}
function modificarIndividuo($id, $nombre, $raza, $edad, $color, $personalidad, $fk_id_especie){
    $db = obtenerConexion();
    $query = $db->prepare('UPDATE individuos SET nombre = ?, raza = ?, edad = ?, color = ?, personalidad = ?, fk_id_especie = ? WHERE id = ?');
    $query->execute([$nombre, $raza, $edad, $color, $personalidad, $fk_id_especie, $id]);
}

function obtenerEspecies(){
    $db = obtenerConexion();
    
    $query = $db->prepare('SELECT * FROM especies');
    $query->execute();
    
    $especie = $query->fetchAll(PDO::FETCH_OBJ);
    return $especie;
}