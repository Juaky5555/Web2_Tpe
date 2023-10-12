<?php

class AutenticacionHelper {

    public static function inicializar() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function login($user) {
        AutenticacionHelper::inicializar();
        $_SESSION['USER_ID'] = $user->id_usuario;
        $_SESSION['USER_EMAIL'] = $user->email;
    }

    public static function logout() {
        AutenticacionHelper::inicializar();
        session_destroy();
    }

    public static function verify() {
        AutenticacionHelper::inicializar();
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: ' . BASE_URL . 'login');
            die();
        }
    }
}