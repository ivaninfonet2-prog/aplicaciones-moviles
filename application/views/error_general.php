<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Error</title>

    <!-- Enlace al CSS -->
    <link rel="stylesheet" href="<?php echo base_url('activos/css/error_general.css'); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="error-container">
        <div class="error-box">
            <h1> Ha ocurrido un error</h1>

            <p class="mensaje-error">
                <?= isset($error) ? $error : "Ha ocurrido un error desconocido."; ?>
            </p>

            <a class="btn-volver" href="<?php echo base_url('usuario'); ?>">Volver al usuario</a>
        </div>
    </div>

</body>
</html>
