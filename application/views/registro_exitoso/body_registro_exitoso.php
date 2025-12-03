<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro Exitoso</title>
    <link rel="stylesheet" href="<?php echo base_url('activos/css/registro_exitoso/body_registro_exitoso.css'); ?>">
</head>
<body style="background-image: url('<?php echo $fondo; ?>'); background-size: cover; background-position: center;">
    <!-- Fondo animado eliminado -->
    <main class="inicio-container">
        <div class="contenido">
            <h1 class="titulo">¡Registro Exitoso!</h1>
            <p class="mensaje">Tu cuenta ha sido creada correctamente.</p>
            <p class="submensaje">Ya puedes explorar todas nuestras funcionalidades.</p>
            <div class="botones">
                <a href="<?= base_url('principio/index'); ?>" class="boton">Página Principal</a>
                <a href="<?= base_url('login'); ?>" class="boton">Loguearse</a>
            </div>
        </div>
    </main>
</body>


</html>
