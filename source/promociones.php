<?php
require_once '../includes/config.php';
$use_carousel = false;
$use_carouselParque = false;
include_once '../includes/head.php';
?>

<!-- Pagina de Promociones -->
<main class="promociones-space-background">
    <!-- barra navegacion -->
    <?php
    include_once '../includes/navbar.php';
    ?>
    <article class="promociones-content">
        <!-- Título principal -->
        <div class="title-promociones">
            <img src="../images/fotos/promociones/imagenes/promociones.png" alt="Nuestras promociones">
        </div>

        <div class="content" style="justify-content: center; height:100%; padding-bottom:14px; display:flex;">
                <div>
                    <img src="images\fotos\Planetas_Sedes\DOMINIC.png" alt="">
                </div>
        </div>

        <!-- Llamado a la acción -->
        <div class="boton-centro">
             <img src="../images/fotos/promociones/imagenes/centro.png" alt="Nuestras promociones">
        </div>
         <div class="boton-der">
             <img src="../images/fotos/promociones/imagenes/der.png" alt="Nuestras promociones">
        </div>
         <div class="boton-izq">
             <img src="../images/fotos/promociones/imagenes/izq.png" alt="Nuestras promociones">
        </div>
        <div class="fooder-promo">
             <img src="../images/fotos/Home/imagenes/Footer2.png" alt="Nuestras promociones">
        </div>


        </div>
    </article>
</main>

<!-- Contenedor del footer -->
<?php
// Incluye el footer
include_once '../includes/footer.php';
?>