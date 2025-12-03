<!-- Enlace al CSS específico de espectáculos -->
<link rel="stylesheet" href="<?= base_url('activos/css/espectaculos/index_espectaculos.css?v=' . time()); ?>">

<h2 class="titulo">Lista de los mejores Espectáculos</h2>
<p class="descripcion-titulo">
    Descubrí nuestra selección de eventos destacados: conciertos, obras de teatro y experiencias culturales únicas.
    Aquí encontrarás toda la información necesaria para elegir y disfrutar tu próximo espectáculo.
</p>

<div class="tarjetas-container">
    <?php if (!empty($espectaculos)): ?>
        <?php foreach ($espectaculos as $espectaculo): ?>
            <div class="tarjeta">
                <img src="<?= base_url('activos/imagenes/' . $espectaculo['imagen']); ?>" 
                     alt="<?= $espectaculo['nombre']; ?>" 
                     class="imagen">

                <div class="contenido">
                    <h3><?= $espectaculo['nombre']; ?></h3>
                    <h2><?= $espectaculo['descripcion']; ?></h2>
                    <p class="precio">
                        $<?= number_format($espectaculo['precio'], 2, ',', '.'); ?>
                    </p>
                    <a href="<?= site_url('espectaculos/espectaculo_sin_loguear/' . $espectaculo['id_espectaculo']); ?>" 
                       class="boton-ver">Ver espectáculo</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay espectáculos disponibles en este momento.</p>
    <?php endif; ?>
</div>
