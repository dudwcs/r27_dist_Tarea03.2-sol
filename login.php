<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">

                <h1 class="text-center mb-4">Iniciar sesión</h1>
                <?php
                session_start();

                if (isset($_SESSION['error_login'])):
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?= htmlspecialchars($_SESSION['error_login']) ?>
                    </div>
                    <?php
                    unset($_SESSION['error_login']);
                endif;
                ?>

                <form action="validar.php" method="POST">

                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="usuario" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Entrar
                    </button>

                </form>

            </div>
        </div>
    </div>

</body>

</html>