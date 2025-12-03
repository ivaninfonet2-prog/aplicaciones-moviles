<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Enlace al CSS -->-
    <link rel="stylesheet" href="<?= base_url('activos/css/acerca_administrador/body_acerca_administrador.css'); ?>">
</head>
<body style="background-image: url('<?= $fondo; ?>');">

    <main class="main-content">
        <div class="cuadro-ayuda text-center text-white">
            <h2>Acerca de</h2>
            <p>
                Somos una tienda universitaria que ofrece productos y espectáculos para toda la comunidad.
            </p>
            
            <!-- 🔹 Ambos botones dentro del mismo contenedor -->
            <div class="volver-inicio">
                <a href="<?= base_url('login/logout'); ?>" class="btn btn-celeste">
                    Cerrar Sesion
                </a>
                <a href="<?= site_url('administrador'); ?>" class="btn btn-celeste">
                    Volver al Administrador
                </a>
            </div>
        </div>
    </main>

</body>
</html>
