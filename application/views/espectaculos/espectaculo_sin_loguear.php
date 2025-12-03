<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>
    <link rel="stylesheet" href="<?= base_url('activos/css/espectaculos/espectaculos_sin_loguear.css?v=' . time()) ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>
    <div class="page-wrapper">
        <main class="contenido">
            <?php if (!empty($espectaculos)): ?>
                <?php foreach ($espectaculos as $espectaculo): ?>
                    <article class="espectaculo animate__animated animate__fadeInUp">
                        <section class="descripcion">
                            <h2><?= $espectaculo['nombre'] ?></h2>
                            <p><?= $espectaculo['descripcion'] ?></p>
                        </section>

                        <section class="imagen">
                            <img src="<?= base_url('activos/imagenes/' . $espectaculo['imagen']) ?>" 
                                 alt="<?= $espectaculo['nombre'] ?>" 
                                 class="imagen-espectaculo">
                        </section>

                        <section class="detalles">
                            <h3>Detalles del Evento</h3>
                            <ul>
                                <li><strong>Fecha:</strong> <?= $espectaculo['fecha'] ?></li>
                                <li><strong>Hora:</strong> <?= $espectaculo['hora'] ?></li>
                                <li><strong>Dirección:</strong> <?= $espectaculo['direccion'] ?></li>
                            </ul>
                        </section>

                        <section class="informacion">
                            <h3>Entradas</h3>
                            <p class="entradas">Disponibles: <strong><?= $espectaculo['disponibles'] ?></strong></p>

                            <?php if (!empty($mensaje)): ?>
                                <p class="mensaje"><?= $mensaje ?></p>
                            <?php endif; ?>

                            <?php if ($espectaculo['disponibles'] > 0): ?>
                                <p class="estado disponible">¡Todavía hay lugares disponibles!</p>
                            <?php else: ?>
                                <p class="estado agotado">Entradas agotadas.</p>
                            <?php endif; ?>
                        </section>

                        <section class="reserva-login">
                            <p class="aviso-login">Para reservar entradas, primero debes iniciar sesión.</p>
                            <a href="<?= site_url('login') ?>" class="boton-login">Iniciar sesión</a>
                        </section>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="sin-espectaculos">No hay espectáculos disponibles en este momento.</p>
            <?php endif; ?>

            <!-- Botón volver al inicio -->
            <div class="boton-inicio-container">
                <a href="<?= site_url('principio') ?>" class="boton-inicio">Volver al inicio</a>
            </div>

          
            </section>
        </main>
    </div>
</body>
</html>
