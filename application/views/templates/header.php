
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($titulo) ? $titulo : 'UNLa Tienda'; ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS personalizado -->
   <link rel="stylesheet" href="<?= base_url('activos/css/vista_comienzo_2.css'); ?>">

</head>
<body class="d-flex flex-column min-vh-100">

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="<?= base_url(); ?>">
                <img src="<?= base_url('activos/imagenes/logo.jpg'); ?>" alt="Logo UNLa" style="height:50px;" class="me-2">
                <span class="fw-bold">UNLa Tienda</span>
            </a>

            <!-- Botón hamburguesa -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menú -->
            <div class="collapse navbar-collapse justify-content-end" id="menuPrincipal">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('login'); ?>">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('registrar'); ?>">Registrar</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main class="container my-5">
