<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel del Administrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Enlace al CSS externo -->
    <link rel="stylesheet" href="<?= base_url('activos/css/administrador/body_administrador.css'); ?>">
</head>
<body>
    <!-- Ya no incluimos el header porque está en otra vista/layout -->

    <main class="inicio-container" style="background-image: url('<?= $fondo ?>');">
        <div class="botones-container">
            <h2 class="panel-title">Panel de Control</h2>
            <a href="<?= base_url('espectaculos/index_administrador'); ?>" class="boton"> Espectáculos</a>
            <a href="<?= base_url('ventas/listar_ventas'); ?>" class="boton"> Ventas</a>
            <a href="<?= base_url('clientes/mostrar_clientes'); ?>" class="boton"> Clientes</a>
            <a href="<?= base_url('espectaculos/crear'); ?>" class="boton"> Agregar Espectáculo</a>
            <a href="<?= site_url('login/logout'); ?>" class="boton cerrar"> Cerrar Sesión</a>
        </div>
    </main>
</body>
</html>
