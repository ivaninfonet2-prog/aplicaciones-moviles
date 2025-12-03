<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="<?= base_url('activos/css/usuario/body_usuario.css'); ?>">
</head>

<body style="background-image: url('<?= $fondo; ?>');">

    <!-- Contenido Principal -->
    <main class="usuario-main container-fluid">
        <div class="row justify-content-center align-items-center usuario-contenido">
            <div class="col-12 col-md-8 text-center animate-in">
                
                <img src="<?= base_url('activos/imagenes/usuario.png'); ?>" 
                     alt="Bienvenido" 
                     class="welcome-img img-fluid" 
                     onerror="this.style.display='none'">

                <!-- Aquí se muestra nombre y apellido -->
                <h1 class="titulo fade-in">
                    Bienvenido <?= !empty($nombre) && !empty($apellido) ? $nombre . ' ' . $apellido : 'Usuario'; ?>
                </h1>

                <p class="subtitulo fade-in delay-1">
                    Explorá tus opciones y disfrutá de la experiencia
                </p>

                <div class="d-flex flex-wrap justify-content-center gap-3 fade-in delay-2">
                    <a href="<?= site_url('usuario/usuario_espectaculos'); ?>" class="btn btn-espectaculos btn-lg">Ver espectáculos</a>
                    <a href="<?= base_url('usuario/usuario_reservas'); ?>" class="btn btn-reservas btn-lg">Mis Reservas</a>
                    <a href="<?= base_url('login/logout'); ?>" class="btn btn-logout btn-lg">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Scripts Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
