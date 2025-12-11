<footer class="main-footer">
    <div class="container">
        <!-- Derechos de autor -->
        <p class="mb-2">&copy; <?= date('Y'); ?> UNLa Tienda. Todos los derechos reservados.</p>

        <!-- Enlaces del footer -->
        <div class="footer-links">
            <a href="<?= base_url('acerca/acerca_login'); ?>" class="footer-link">Acerca de</a>
            <a href="<?= base_url('contacto/contacto_login'); ?>" class="footer-link">Contacto</a>
            <a href="<?= base_url('politicas/politicas_login'); ?>" class="footer-link">Políticas</a>
            <a href="<?= base_url('ayuda/ayuda_login'); ?>" class="footer-link">Ayuda</a>
        </div>
    </div>
</footer>

<!-- Enlace al CSS del footer -->
<link rel="stylesheet" href="<?= base_url('activos/css/principal/footer_principal.css'); ?>">
