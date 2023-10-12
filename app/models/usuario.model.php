<?php

class modeloUsuarios {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_veterinaria;charset=utf8', 'root', '');
    }

    public function obtenerUsuarioPorEmail($email) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE email = ?'); 
        $query->execute([$email]);
        $usuario = $query->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }
}