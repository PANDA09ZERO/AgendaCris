<?php

require_once __DIR__ . '/../model/Usuario.php';

class AuthController
{
    public function login(string $correo, string $clave): bool
    {
        $usuarioModel = new Usuario();
        $usuario = $usuarioModel->login($correo, $clave);

        if ($usuario) {

            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['usuario'] = $usuario['nombre'] ?: $usuario['correo'];
            $_SESSION['nombre'] = $usuario['nombre'];

            return true;
        }

        return false;
    }
}