<?php

function getUsuarioByUserName($username) {

    // Leer los usuarios del fichero JSON
    $contenido = file_get_contents("usuarios.json");
    $usuarios = json_decode($contenido, true);

    // Buscar el usuario
    foreach ($usuarios as $usuario) {
        if ($usuario['usuario'] === $username) {
            return $usuario;
        }
    }

    // El usuario no existe
    return null;
}