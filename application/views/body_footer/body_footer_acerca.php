<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $titulo; ?></title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Estilos personalizados -->
  <link rel="stylesheet" href="<?= base_url('activos/css/body_footer/body_footer_acerca.css'); ?>">
</head>

<body style="background-image: url('<?= $fondo; ?>'); background-size: cover; background-position: center center;">

  <!-- Texto fuera de la tarjeta -->
  <section class="intro-text text-center">
    <h1><?= $titulo; ?></h1>
    <p>Un espacio pensado para estudiantes</p>
  </section>

  <!-- Contenedor principal -->
  <main class="main-content d-flex flex-column align-items-center">
    <div class="cuadro-acerca">
      <h2><?= $titulo; ?></h2>
      <p>
        Te ofrecemos productos y actividades diseñadas para acompañarte en tu vida universitaria.
      </p>
      <p class="extra-info">
        Explora nuestras secciones y descubre beneficios, eventos y contenido exclusivo para nuestra comunidad.
      </p>
    </div>

    <div class="texto-debajo text-center">
      <p>¡Aprovecha todas las herramientas y recursos que tenemos para ti!</p>
    </div>
  </main>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
