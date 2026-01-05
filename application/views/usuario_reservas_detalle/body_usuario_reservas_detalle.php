<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Reserva</title>

    <!-- CSS ÚNICO necesario -->
    <link rel="stylesheet" href="<?= base_url('activos/css/usuario_reservas_detalle/body_usuario_reservas_detalle.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('activos/css/confirmacion/cancelar_reserva.css'); ?>"> <!-- CSS para el modal -->
</head>

<?php
$mensaje = $this->session->flashdata('mensaje');

$precio_unitario = number_format($reserva['precio'], 2, ',', '.');
$total_abonado   = number_format($reserva['monto_total'], 2, ',', '.');
?>

<body style="background-image: url('<?= $fondo; ?>');">

<main class="contenido">

    <!-- ENCABEZADO -->
    <section class="intro">
        <h1 class="titulo">Detalle de la Reserva</h1>
        <p class="subtitulo">
            Reserva Nº <?= $reserva['id_reserva']; ?> · Revisá toda la información
        </p>
    </section>

    <!-- CONTENEDOR -->
    <section class="detalle-wrapper">

        <!-- DETALLE -->
        <div class="detalle-card">

            <div class="fila">
                <span>Espectáculo</span>
                <strong><?= $reserva['nombre_espectaculo']; ?></strong>
            </div>

            <div class="fila">
                <span>Fecha del espectáculo</span>
                <strong><?= $reserva['fecha_espectaculo']; ?></strong>
            </div>

            <div class="fila">
                <span>Cantidad de entradas</span>
                <strong><?= $reserva['cantidad']; ?></strong>
            </div>

            <div class="fila">
                <span>Precio unitario</span>
                <strong>$<?= $precio_unitario; ?></strong>
            </div>

            <div class="total">
                Total abonado: $<?= $total_abonado; ?>
            </div>

            <div class="fila">
                <span>Fecha de reserva</span>
                <strong><?= $reserva['fecha_reserva']; ?></strong>
            </div>

            <div class="fila">
                <span>Entradas disponibles</span>
                <strong><?= $reserva['disponibles']; ?></strong>
            </div>

        </div>

        <!-- MENSAJE O ACCIONES -->
        <?php if ($mensaje): ?>

            <div class="aviso-cancelacion">
                <?= $mensaje; ?>
            </div>

        <?php else: ?>

            <div class="acciones">
                <!-- Botón que abre el modal de confirmación -->
                <button id="btnCancelar" class="boton cancelar">
                    Cancelar reserva
                </button>

                <a href="<?= site_url('usuario/usuario_reservas'); ?>" class="boton volver">
                    Volver a reservas
                </a>
            </div>

        <?php endif; ?>

    </section>

</main>

<!-- Modal de confirmación -->
<div id="modalConfirmacion" class="confirmacion-container">
    <div class="confirmacion-card peligro">
        <h1>¿Estás seguro de cancelar la reserva?</h1>
        <p>Esta acción es irreversible, ¿quieres proceder?</p>

        <div class="acciones">
            <!-- Botón para confirmar la cancelación -->
            <a href="<?= site_url('reservar/cancelar_reserva/' . $reserva['id_reserva']); ?>" class="btn confirmar">
                Confirmar cancelación
            </a>
            <!-- Botón para cerrar el modal -->
            <button id="btnCerrarModal" class="btn cancelar">
                Cancelar
            </button>
        </div>
    </div>
</div>

<script>
    // Obtener el botón de cancelar y el modal
    const btnCancelar = document.getElementById('btnCancelar');
    const modalConfirmacion = document.getElementById('modalConfirmacion');
    const btnCerrarModal = document.getElementById('btnCerrarModal');

    // Abrir el modal cuando se hace clic en el botón "Cancelar reserva"
    btnCancelar.addEventListener('click', function() 
    {
        modalConfirmacion.style.display = 'flex';
    });

    // Cerrar el modal cuando se hace clic en el botón "Cancelar"
    btnCerrarModal.addEventListener('click', function()
    {
        modalConfirmacion.style.display = 'none';
    });
</script>

</body>
</html>
