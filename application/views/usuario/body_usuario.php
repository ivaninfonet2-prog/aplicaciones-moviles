<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="<?= base_url('activos/css/usuario/body_usuario.css'); ?>?v=1.0">
</head>

<body style="background-image: url('<?= $fondo; ?>'); background-size: cover; background-position: center center;">

    <!-- Contenido Principal -->
    <main class="usuario-main container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 text-center animate-in">
                
                <h3 class="titulo fade-in">
                    Bienvenido <?= !empty($nombre) && !empty($apellido) ? $nombre . ' ' . $apellido : 'Usuario'; ?>
                </h3>

                <!-- Subtítulo -->
                <h5 class= "subtitulo fade-in delay-1">
                     Explorá tus opciones y disfrutá de la experiencia
                </h5>

                <!-- Caja de contenido (más pequeña y con fondo esmerilado) -->
                <div class="usuario-contenido">
                    <img src="<?= base_url('activos/imagenes/usuario.png'); ?>" 
                         alt="Bienvenido" 
                         class="welcome-img img-fluid" 
                         onerror="this.style.display='none'">

                    <!-- Texto dentro de la tarjeta -->
                    <p class="body-text fade-in delay-2">
                        Aquí podrás ver tus espectáculos favoritos, realizar reservas y mucho más.
                    </p>

                    <!-- Botones alineados horizontalmente -->
                    <div class="d-flex justify-content-center gap-4 fade-in delay-3">
                        <a href="<?= site_url('usuario/usuario_espectaculos'); ?>" class="btn btn-espectaculos btn-lg">Ver espectáculos</a>
                        <a href="<?= base_url('usuario/usuario_reservas'); ?>" class="btn btn-reservas btn-lg">Mis Reservas</a>
                    </div>

                    <p class="footer-text fade-in delay-4">
                        <small>Si necesitas ayuda, no dudes en contactarnos.</small>
                    </p>
                </div>
            </div>
        </div>
    </main>

    <!-- Scripts Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
