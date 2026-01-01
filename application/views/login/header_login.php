<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'UNLa Tienda'; ?></title>

    <!-- CSS HEADER LOGIN (CARGAR DESPUÉS DE TODOS LOS OTROS CSS) -->
    <link rel="stylesheet" href="<?= base_url('activos/css/login/header_login.css'); ?>">
</head>

<body>

<header class="main-header">
    <div class="header-container">

        <!-- Logo + título -->
        <a href="<?= base_url(); ?>" class="brand">
            <img
                src="<?= base_url('activos/imagenes/logo.jpg'); ?>"
                alt="Logo UNLa Tienda"
                class="logo-img"
            >
            <span class="site-title">UNLa Tienda</span>
        </a>

        <!-- Botón derecho -->
        <nav class="nav-menu">
            <a href="<?= base_url(); ?>" class="btn btn-login">
                Volver al Inicio
            </a>
        </nav>

    </div>
</header>

<main>
    <!-- Contenido de la vista -->
</main>

</body>
</html>
