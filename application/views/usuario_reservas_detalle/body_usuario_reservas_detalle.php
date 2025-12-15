<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Reserva</title>

    <link rel="stylesheet" href="<?= base_url('activos/css/usuario_reservas_detalle/body_usuario_reservas_detalle.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('activos/css/usuario_reservas_detalle/aviso_usuario_reservas_detalle.css'); ?>">
</head>

<body style="background-image: url('<?= $fondo; ?>');">

    <main class="contenido">

        <!-- TEXTO SUPERIOR -->
        <div class="intro">
            <h1 class="titulo">Detalle de la Reserva #<?= $reserva['id_reserva']; ?></h1>
            <p class="subtitulo">Revisá la información completa de tu reserva</p>
        </div>

        <!-- TARJETA -->
        <div class="detalle-card">
            <p><span>Espectáculo:</span> <?= $reserva['nombre_espectaculo']; ?></p>
            <p><span>Fecha del espectáculo:</span> <?= $reserva['fecha_espectaculo']; ?></p>
            <p><span>Cantidad de entradas:</span> <?= $reserva['cantidad']; ?></p>
            <p><span>Precio unitario:</span> $<?= number_format($reserva['precio'], 2, ',', '.'); ?></p>
            <p class="total"><span>Total:</span> $<?= number_format($reserva['monto_total'], 2, ',', '.'); ?></p>
            <p><span>Fecha de reserva:</span> <?= $reserva['fecha_reserva']; ?></p>
            <p><span>Entradas disponibles:</span> <?= $reserva['disponibles']; ?></p>
        </div>

        <?php if ($this->session->flashdata('mensaje_cancelacion')): ?>
            <div class="detalle-card aviso-cancelacion">
                <?= $this->session->flashdata('mensaje_cancelacion'); ?>
            </div>
        <?php else: ?>
            <div class="boton-container">
                <a href="#aviso-cancelacion" class="boton cancelar">Cancelar Reserva</a>
            </div>
        <?php endif; ?>

    </main>

    <!-- POPUP CONFIRMACIÓN -->
    <div id="aviso-cancelacion" class="overlay">
        <div class="popup">
            <h2>Confirmar Cancelación</h2>
            <p>¿Está seguro de que desea cancelar la reserva?</p>

            <div class="acciones">
                <a href="<?= base_url('reservar/cancelar_reserva/'.$reserva['id_reserva']); ?>" class="boton confirmar">
                    Sí, cancelar
                </a>
                <a href="#" class="boton volver">
                    No, volver
                </a>
            </div>
        </div>
    </div>

</body>
</html>
