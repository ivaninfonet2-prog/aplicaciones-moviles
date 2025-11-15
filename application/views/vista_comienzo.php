
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Ventas | UNLa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="<?= base_url('activos/css/vista_comienzo.css'); ?>">
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Header con navbar responsive -->
    <header class="main-header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container-fluid px-4">
                <!-- Logo -->
                <a class="navbar-brand d-flex align-items-center" href="<?= base_url(); ?>">
                    <img src="<?= base_url('activos/imagenes/logo.jpg'); ?>" 
                         alt="Logo de la empresa UNLa" 
                         class="me-2" 
                         style="height:50px;">
                    <span class="fw-bold">UNLa Tienda</span>
                </a>

                <!-- Botón hamburguesa -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menú -->
                <div class="collapse navbar-collapse justify-content-end" id="menuPrincipal">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="<?= base_url('login'); ?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="<?= base_url('registrar'); ?>">Registrar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Contenido principal -->
    <main class="container my-5 text-center">
        <h1 class="mb-4">Bienvenido a la Tienda de Ventas UNLa</h1>
        <p class="lead">Explora nuestros productos y disfruta de una experiencia de compra sencilla y rápida.</p>
        <a href="<?= base_url('productos'); ?>" class="btn btn-primary btn-lg mt-3">Ver Productos</a>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <p class="mb-0">&copy; <?= date('Y'); ?> UNLa Tienda. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
