<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'UNLa Tienda'; ?></title>

    <!-- CSS para el Header -->
    <link rel="stylesheet" href="<?= base_url('activos/css/header_footer/header_footer_usuario.css'); ?>">

    <!-- CSS para la confirmación de Cerrar Sesión -->
    <link rel="stylesheet" href="<?= base_url('activos/css/confirmacion/cerrar_sesion.css'); ?>">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<header class="main-header">
    <div class="header-container d-flex justify-content-between align-items-center">
        <!-- Logo + título con evento para abrir el modal -->
        <a href="#" class="brand d-flex align-items-center text-decoration-none" 
           data-bs-toggle="modal" data-bs-target="#logoutModal" title="Ir a inicio">
            <img src="<?= base_url('activos/imagenes/logo.jpg'); ?>" class="logo-img me-2" alt="Logo UNLa">
            <span class="site-title">UNLa Tienda</span>
        </a>

        <!-- Menú de navegación -->
        <nav class="nav-menu d-flex gap-3">
            <a href="<?= base_url('usuario'); ?>" class="btn btn-volver">
                Ir a Usuario
            </a>
            <!-- Botón que activa el modal para cerrar sesión -->
            <button type="button" class="btn btn-cerrar" data-bs-toggle="modal" data-bs-target="#logoutModal">
                Cerrar Sesión
            </button>
        </nav>
    </div>
</header>

<!-- Modal de Confirmación de Cerrar Sesión -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">¿Cerrar sesión?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas cerrar tu sesión actual?
            </div>
            <div class="modal-footer">
                <!-- El enlace que ejecuta el logout -->
                <a href="<?= site_url('login/logout'); ?>" class="btn btn-danger">
                    Sí, cerrar sesión
                </a>
                <!-- Botón de cancelar -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Scripts de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Protección contra volver con la flecha (logout forzado) -->
<script>
    // Evitar que se pueda volver a páginas privadas si no hay sesión
    if (window.history.replaceState) 
    {
        window.history.replaceState(null, null, window.location.href);
    }

    window.onpageshow = function(event) 
    {
        if (event.persisted || !<?= json_encode($this->session->userdata('logged_in')); ?>) 
        {
            // Si no hay sesión activa, redirige al login
            window.location.replace('<?= site_url("login"); ?>');
        }
    };
</script>

</body>
</html>
