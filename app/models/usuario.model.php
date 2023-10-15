<?php
include_once './config/config.php';
class modeloUsuarios {
    protected $db;

    public function __construct() {
        $this->db = new PDO(
            "mysql:host=".DB_HOST .
            ";dbname=".DB_NAME.";charset=utf8", 
            DB_USER, DB_PASS);

        $this->deploy();
    }

    private function deploy() {
        // Consulta para verificar si la tabla de usuarios existe
        $query = $this->db->prepare('SELECT COUNT(*) FROM usuarios');
        $query->execute();
        $count = $query->fetchColumn();

        // Si la tabla de usuarios no tiene datos, intentamos importarla desde el archivo SQL
        if ($count === false || $count == 0) {
            $archivoExportacion = './sql/db_veterinaria.sql';

            $comando = "mysql -u ". DB_USER ." -p" . DB_PASS . " " . DB_NAME ." < $archivoExportacion";

            exec($comando);
        }
    }



    public function obtenerUsuarioPorEmail($email) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE email = ?'); 
        $query->execute([$email]);
        $usuario = $query->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }
}