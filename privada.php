<?php

session_start();

// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zona privada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="alert alert-success">
                    <h1 class="h4">Bienvenido/a, <?= htmlspecialchars($_SESSION['usuario']) ?></h1>
                    <p class="mb-0">Se ha iniciado sesión correctamente.</p>
                </div>

                <a href="logout.php" class="btn btn-outline-danger">Cerrar sesión</a>
            </div>
        </div>
    </div>
</body>
</html>