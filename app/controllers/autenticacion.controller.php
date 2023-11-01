<?php
require_once './app/views/autenticacion.view.php';
require_once './app/models/usuario.model.php';
require_once './app/helpers/autenticacion.helper.php';

class autenticacionController {
    private $vista;
    private $modelo;

    function __construct() {
        $this->modelo = new modeloUsuarios();
        $this->vista = new vistaAutenticacion();
    }

    public function mostrarLogin_control() {
        $this->vista->mostrarLogin();
    }

    public function autenticar() {
        $usser = $_POST['name'];
        $password = $_POST['password'];

        if (empty($usser) || empty($password)) {
            $this->vista->mostrarLogin('Faltan completar campos');
            return;
        }

        $usuario = $this->modelo->obtenerUsuarioPorNombre($usser);

        if ($usuario && password_verify($password, $usuario->password)) {
            AutenticacionHelper::login($usuario);
            header('Location: ' . BASE_URL);
        } else {
            $this->vista->mostrarLogin('Usuario inválido');
        }
    }

    public function logout() {
        AutenticacionHelper::logout();
        header('Location: ' . BASE_URL);    
    }
}