
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cierre de sesión</title>
    <link rel="stylesheet" href="<?= base_url('activos/css/cerrar_sesion/body_cerrar_sesion.css'); ?>">
</head>
<body style="background-image: url('<?= $fondo; ?>');">

    <main class="cuerpo">
        <div class="contenedor">
            <h1>Sesión cerrada exitosamente</h1>
            <p>Gracias por tu visita. ¡Esperamos verte pronto!</p>
            <a href="<?= site_url('principal'); ?>" class="boton">Volver al inicio</a>
        </div>
    </main>

</body>
</html>
