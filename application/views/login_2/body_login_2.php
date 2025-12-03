<div class="container-fluid inicio-container full-width"
     style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
            url('<?= $fondo ?>') no-repeat center center fixed;
            background-size: cover;">

    <!-- Bootstrap si lo usas -->
    <link rel="stylesheet" href="<?= base_url('activos/css/bootstrap.min.css'); ?>">

    <!-- Sección dinámica -->
    <div class="row mt-4 justify-content-center">
        <div class="col-md-10 animate__animated animate__fadeInUp">
            <?= $contenido ?>
        </div>
    </div>

        <!-- Botón volver colocado más arriba -->
    <div class="volver-inicio text-center mt-4">
        <a href="<?php echo site_url('principal'); ?>" class="btn btn-secondary">Volver al inicio</a>
    </div>
 
           <!-- Botón volver colocado más arriba -->
    <div class="volver-inicio text-center mt-4">
        <a href="<?php echo site_url('login/index_login'); ?>" class="btn btn-secondary">Volver al Login</a>
    </div>
 
    <!-- Sección extra decorativa -->
    <div class="row mt-5">
        <div class="col-12 text-center animate__animated animate__zoomIn">
            <h3 class="mensaje-bienvenida">¡Disfrutá de nuestros espectáculos!</h3>
            <p class="mensaje-sub">Explorá la cartelera y viví experiencias únicas.</p>
        </div>
    </div>
</div>

