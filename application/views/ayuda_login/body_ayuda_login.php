<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Enlace al CSS -->
    <link rel="stylesheet" href="<?= base_url('activos/css/ayuda_login/body_ayuda_login.css'); ?>">
</head>
<body style="background-image: url('<?= $fondo; ?>');">

    <main class="main-content">
        <div class="cuadro-ayuda text-center text-white">
            <h2>Ayuda</h2>
            <p>
                En esta sección encontrarás información y soporte para utilizar UNLa Tienda.
            </p>
            
            <!-- 🔹 Ambos botones dentro del mismo contenedor -->
            <div class="volver-inicio">
                <a href="<?= base_url('principal'); ?>" class="btn btn-celeste">
                    Volver al Principio
                </a>
                <a href="<?= site_url('login'); ?>" class="btn btn-celeste">
                    Volver al Login
                </a>
            </div>
        </div>
    </main>

</body>
</html>
