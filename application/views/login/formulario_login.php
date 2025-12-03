<!-- Enlace al CSS específico del formulario -->
<link rel="stylesheet" href="<?= base_url('activos/css/login/formulario_login.css'); ?>">

<form action="<?= base_url('login/autenticar'); ?>" 
      method="post" 
      class="login-form" 
      autocomplete="off">

    <p class="login-description mb-4">
        Bienvenido a <strong>UNLa Tienda login</strong>. Ingresa tus credenciales para acceder a tu cuenta.
    </p>

    <!-- Mensaje de error -->
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <!-- Usuario -->
    <div class="mb-3">
        <label for="nombre_usuario" class="form-label">Usuario</label>
        <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario"
               placeholder="Ingresa tu usuario" required autocomplete="off">
    </div>

    <!-- Contraseña -->
    <div class="mb-3">
        <label for="palabra_clave" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="palabra_clave" name="palabra_clave"
               placeholder="Ingresa tu contraseña" required autocomplete="new-password">
    </div>

    <!-- Botones -->
    <div class="login-buttons">
        <button type="submit" class="btn btn-primary">Ingresar</button>
       <a href="<?= site_url('registrar'); ?>" class="btn btn-success">Regístrate</a>
    </div>

    <!-- Extra -->
    <div class="login-extra text-center mt-3">
        <p class="registro-text">
            ¿No tienes cuenta todavía? <br>
            <span class="highlight">¡Únete a nuestra comunidad!</span>
        </p>
    </div>
</form>
