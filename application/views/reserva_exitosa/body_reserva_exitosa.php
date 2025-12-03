<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reserva Exitosa</title>
    <link rel="stylesheet" href="<?php echo base_url('activos/css/reserva_exitosa/body_reserva_exitosa.css'); ?>">
</head>

<body style="background-image: url('<?= $fondo; ?>');">

    <div class="fondo-animado"></div>
   
    <main class="contenido">
        <div class="contenedor-mensaje">
            <h1 class="titulo"> Reserva Exitosa</h1>
            <p class="mensaje">Tu reserva se ha registrado correctamente. ¡Gracias por elegirnos!</p>
            
            <p class="detalle">
                Hemos enviado un correo electrónico con los detalles de tu reserva.  
                Recuerda llegar al menos 15 minutos antes de la hora programada para garantizar tu lugar.  
                Si necesitas realizar cambios o cancelar tu reserva, puedes hacerlo desde tu perfil de usuario.
            </p>

            <p class="agradecimiento">
                Nuestro equipo está listo para recibirte y brindarte la mejor experiencia.  
                ¡Esperamos verte pronto!
            </p>

            <a href="<?= site_url('usuario') ?>" class="boton">Volver a Usuario</a>
        </div>
    </main>

</body>
</html>
