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

try {
    // Iniciar la sesión
    session_start();

    $usuario = getUsuarioByUserName($username);
} catch (Exception $e) {
    error_log("Error al consultar el usuario: " . $e->getMessage());
    $_SESSION['error_login'] = "Error al consultar el usuario. Por favor, inténtelo de nuevo más tarde.";
    header("Location: login.php");
    exit;
}

// Comprobar las credenciales
if ($usuario !== null && password_verify($password, $usuario['password'])) {




    // Guardar la identidad del usuario
    $_SESSION['id_usuario'] = $usuario['id'];
    $_SESSION['usuario'] = $usuario['usuario'];
    $_SESSION['rol'] = $usuario['rol_nombre'];

    if ($_SESSION['rol'] === 'admin') {
        header("Location: admin.php");
        exit;
    } else if ($_SESSION['rol'] === 'user') {
        // Acceder a la página privada
        header("Location: privada.php");
        exit;
    }



} else {

    session_start();

    $_SESSION['error_login'] = "Usuario o contraseña incorrectos.";

    // Credenciales incorrectas
    header("Location: login.php");
    exit;
}