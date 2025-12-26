<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'UNLa Tienda'; ?></title>

    <!-- CSS Header -->
    <link rel="stylesheet" href="<?= base_url('activos/css/header_footer/header_footer_administrador.css'); ?>">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<header class="main-header">
    <div class="header-container d-flex justify-content-between align-items-center">
        <!-- Logo + título -->
        <?php if ($this->session->userdata('logged_in')): ?>
            <a href="<?= site_url(); ?>" class="brand d-flex align-items-center text-decoration-none">
                <img src="<?= base_url('activos/imagenes/logo.jpg'); ?>" class="logo-img me-2" alt="Logo UNLa">
                <span class="site-title">UNLa Tienda</span>
            </a>
        <?php else: ?>
            <span class="brand d-flex align-items-center">
                <img src="<?= base_url('activos/imagenes/logo.jpg'); ?>" class="logo-img me-2" alt="Logo UNLa">
                <span class="site-title">UNLa Tienda</span>
            </span>
        <?php endif; ?>

        <!-- Menú de navegación -->
        <nav class="nav-menu d-flex gap-2">
            <?php if ($this->session->userdata('logged_in')): ?>
                <a href="<?= site_url('administrador'); ?>" class="btn btn-success">
                    Ir al Administrador
                </a>
                <a href="<?= site_url('confirmacion/cerrar_sesion_administrador'); ?>" class="btn btn-danger">
                    Cerrar Sesión
                </a>
            <?php endif; ?>
        </nav>
    </div>
</header>

<!-- Scripts de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Prevención de retroceso si no hay sesión -->
<script>
    (function() 
    {
        <?php if (!$this->session->userdata('logged_in')): ?>
            window.addEventListener('pageshow', function(event) 
            {
                if (event.persisted) 
                {
                    alert('Debes iniciar sesión para acceder.');
                    window.location.replace('<?= site_url("login"); ?>');
                }
            });
        <?php endif; ?>
    })();
</script>

</body>
</html>
