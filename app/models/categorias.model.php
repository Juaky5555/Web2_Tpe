<?php
include_once './config/config.php';

class modeloCategorias{
    protected $db;

    public function __construct() {
        $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);

        $this->deploy();
    }
    private function deploy() {
        $query = $this->db->prepare('SELECT * FROM especies');
        $query->execute();
        
        $especie = $query->fetchAll(PDO::FETCH_OBJ);
        if(count($especie) == 0) {
            $archivoExportacion = './sql/db_veterinaria.sql';
            
            $comando = "mysql -u ". DB_USER ." -p " . DB_NAME ." < $archivoExportacion";
            
            exec($comando);
        }
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