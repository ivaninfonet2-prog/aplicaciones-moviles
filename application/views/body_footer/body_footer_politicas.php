<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="<?= base_url('activos/css/body_footer/body_footer_politicas.css'); ?>">
</head>
<body style="background-image: url('<?= $fondo; ?>'); background-size: cover; background-position: center center; background-attachment: fixed;">

    <!-- Texto introductorio -->
    <section class="intro-text text-center">
        <h1>Nuestras Políticas</h1>
        <p>Conoce las normas y condiciones para el uso seguro y responsable de nuestra plataforma.</p>
    </section>

    <!-- Tarjeta de políticas -->
    <main class="main-content d-flex flex-column align-items-center">
        <div class="cuadro-politicas text-center">
            <h2>Políticas</h2>
            <p>Aquí encontrarás nuestras políticas de privacidad, uso y condiciones de servicio.</p>
            <p class="extra-info">Nuestro objetivo es garantizar transparencia y seguridad para todos los usuarios.</p>
        </div>

        <!-- Texto adicional debajo de la tarjeta -->
        <div class="texto-debajo text-center">
            <p>Es importante leer y comprender nuestras políticas para asegurar una experiencia segura y confiable.</p>
        </div>
    </main>

</body>
</html>
