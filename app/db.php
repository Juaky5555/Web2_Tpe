<?php

function obtenerConexion() {
    return new PDO('mysql:host=localhost;dbname=db_veterinaria;charset=utf8', 'root', '');
}

function obtenerIndividuos() {
    $db = obtenerConexion();
    
    $query = $db->prepare('SELECT * FROM individuos JOIN especies ON individuos.fk_id_especie = especies.id_especie');
    $query->execute();
    
    $tasks = $query->fetchAll(PDO::FETCH_OBJ);
    return $tasks;
}

function insertarIndividuo($nombre, $raza, $edad, $color, $personalidad, $fk_id_especie) {
    $db = obtenerConexion();
    $query = $db->prepare('INSERT INTO individuos (nombre, raza, edad, color, personalidad, fk_id_especie) VALUES(?,?,?,?,?,?)');
    $query->execute([$nombre, $raza, $edad, $color, $personalidad, $fk_id_especie]);
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