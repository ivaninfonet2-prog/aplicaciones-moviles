<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Enlace al CSS -->
    <link rel="stylesheet" href="<?= base_url('activos/css/contacto_usuario/body_contacto_usuario.css'); ?>">
</head>
<body style="background-image: url('<?= $fondo; ?>');">

    <main class="main-content">
        <div class="cuadro-contacto text-center text-white">
            <h2 class="animated-title">Contacto</h2>
            <p class="animated-text">
                Puedes escribirnos a <strong>contacto@unla.edu.ar</strong> o llamarnos al <strong>(011) 1234-5678</strong>.
            </p>
            
            <!-- 🔹 Contenedor flex para botones -->
            <div class="botones">
                <a href="<?= base_url('usuario/usuario_espectaculos'); ?>" class="btn btn-celeste">
                    Volver a los espectaculos
                </a>
                <a href="<?= site_url('login/logout'); ?>" class="btn btn-celeste">
                    cerrar sesion
                </a>
            </div>
        </div>
    </main>

</body>
</html>
