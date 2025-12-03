<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Reserva</title>
    <link rel="stylesheet" href="<?php echo base_url('activos/css/usuario_reservas_detalle/body_usuario_reservas_detalle.css'); ?>">
</head>

<body style="background-image: url('<?= $fondo; ?>');">

    <main class="contenido">
        <h1 class="titulo">Detalle de la Reserva #<?= $reserva['id_reserva']; ?></h1>

        <div class="detalle-card">
            <p><strong>Espectáculo:</strong> <?= $reserva['nombre_espectaculo']; ?></p>
            <p><strong>Fecha del espectáculo:</strong> <?= $reserva['fecha_espectaculo']; ?></p>
            <p><strong>Cantidad de entradas:</strong> <?= $reserva['cantidad']; ?></p>
            <p><strong>Precio unitario:</strong> $<?= number_format($reserva['precio'], 2, ',', '.'); ?></p>
            <p><strong>Total:</strong> $<?= number_format($reserva['monto_total'], 2, ',', '.'); ?></p>
            <p><strong>Fecha de reserva:</strong> <?= $reserva['fecha_reserva']; ?></p>
            <p><strong>Entradas disponibles actualmente:</strong> <?= $reserva['disponibles']; ?></p>
        </div>

        <div class="boton-container">
            <a href="<?= base_url('usuario/usuario_reservas'); ?>" class="boton">Volver a mis reservas</a>
        </div>
    </main>

</body>
</html>
