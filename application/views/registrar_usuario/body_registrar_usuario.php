<main class="registro-container" style="background-image: url('<?= $fondo; ?>');">
    <div class="registro-form">
        <h2 class="registro-title"><?= $titulo; ?></h2>

        <!-- Aviso de error si el usuario ya existe -->
        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <strong>⚠ Atención:</strong> <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?php echo site_url('registrar/registrar_usuario'); ?>" autocomplete="off">
            <div class="mb-2">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>

            <div class="mb-2">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" required>
            </div>

            <div class="mb-2">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" required>
            </div>

            <div class="mb-2">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" name="telefono" required>
            </div>

            <div class="mb-2">
                <label for="nombre_usuario" class="form-label">Email</label>
                <input type="email" class="form-control" name="nombre_usuario" required>
            </div>

            <div class="mb-2">
                <label for="palabra_clave" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="palabra_clave" required autocomplete="new-password">
            </div>

            <button type="submit" class="btn btn-success w-100 mt-3">Registrar</button>
        </form>

        <div class="registro-registered mt-3">
            <p>¿Ya tienes una cuenta?</p>
            <a href="<?php echo site_url('login'); ?>" class="btn btn-dark">Inicia sesión aquí</a>
        </div>

        <div class="volver-inicio mt-4">
            <a href="<?php echo site_url(''); ?>" class="btn btn-secondary">Volver al inicio</a>
        </div>
    </div>
</main>

<link rel="stylesheet" href="<?php echo base_url('activos/css/registrar_usuario/body_registrar_usuario.css'); ?>">
