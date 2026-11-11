<?php

require_once 'usuarios.php';

// Comprobar que la petición procede de un formulario POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit;
}

// Comprobar que se han recibido las credenciales
if (
    !isset($_POST['usuario'], $_POST['password']) ||
    !is_string($_POST['usuario']) ||
    !is_string($_POST['password'])
) {
    header("Location: login.php");
    exit;
}


// Recuperar las credenciales
$username = $_POST['usuario'];
$password = $_POST['password'];

// Buscar el usuario del sistema de persistencia
$usuario = getUsuarioByUserName($username);

// Comprobar las credenciales
if ($usuario !== null && password_verify($password, $usuario['password'])) {

    // Iniciar la sesión
    session_start();


    // Guardar la identidad del usuario
    $_SESSION['id_usuario'] = $usuario['id'];
    $_SESSION['usuario'] = $usuario['usuario'];

    // Acceder a la página privada
    header("Location: privada.php");
    exit;

} else {

    session_start();

    $_SESSION['error_login'] = "Usuario o contraseña incorrectos.";

    // Credenciales incorrectas
    header("Location: login.php");
    exit;
}