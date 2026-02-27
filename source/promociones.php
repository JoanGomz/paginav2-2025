<?php
require_once '../includes/config.php';
$use_carousel = false;
$use_carouselParque = false;
include_once '../includes/head.php';
?>

<!-- Pagina de Promociones -->
<main class="servicios-space-background">
    <!-- barra navegacion -->
    <?php
    include_once '../includes/navbar.php';
    ?>
    <article class="servicios-content">
        <!-- Título principal -->
        <div class="title-servicios">
            <h1>Titulo de promociones</h1>
        </div>
        <div class="content" style="justify-content: center; padding-bottom:14px; display:flex;">
            <h1>Contenido de este apartado</h1>
        </div>

        <!-- Llamado a la acción -->
        <div class="cta-section-service">
            <h1>Imagen para este aparatdo en caso de ser necesario</h1>
        </div>
        </div>
    </article>
</main>

<!-- Contenedor del footer -->
<?php
// Incluye el footer
include_once '../includes/footer.php';
?>