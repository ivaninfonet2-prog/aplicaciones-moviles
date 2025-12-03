<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Enlace al CSS -->
    <link rel="stylesheet" href="<?= base_url('activos/css/politicas_administrador/body_politicas_administrador.css'); ?>">
</head>
<body style="background-image: url('<?= $fondo; ?>');">

    <main class="main-content">
        <div class="cuadro-contacto text-center text-white">
            <h2>Políticas</h2>
            <p>
                En esta sección encontrarás nuestras políticas de uso, privacidad y condiciones de servicio.
            </p>
            
            <!--  Contenedor flex para botones -->
            <div class="botones">
                <a href="<?= base_url('administrador'); ?>" class="btn btn-celeste">
                    Volver al Administrador
                </a>
                <a href="<?= base_url('login/logout'); ?>" class="btn btn-celeste">
                    cerrar sesion
                </a>
            </div>
        </div>
    </main>

</body>
</html>
