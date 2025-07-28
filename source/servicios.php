<?php
require_once '../includes/config.php';
$use_carousel = false;
$use_carouselParque = true;
include_once '../includes/head.php';
$whatsapp_link="https://wa.me/573118090610";
$fotos = [
      
    'galeria' => [
        '../images/fotos/servicios/imagenes/CelebraCumple.png',
        '../images/fotos/servicios/imagenes/FiestasColegios.png',
        '../images/fotos/servicios/imagenes/SuperDiversion.png',
        '../images/fotos/servicios/imagenes/EventosEmpresariales.png',
        '../images/fotos/servicios/imagenes/FiestasInfantiles.png',
        
    ],
]
?>

<!-- Pagina de servicios -->
<main class="servicios-space-background">
    <!-- barra navegacion -->
    <?php
    include_once '../includes/navbar.php';
    ?>
    <article class="servicios-content">
        <!-- Título principal -->
        <div class="title-servicios">
            <img src="../images/fotos/servicios/imagenes/servicios.png" alt="Nuestros Servicios">
        </div>

        <!-- Grid de servicios -->
         <section class="servicios">
        <main class="park-carousel-container-service">
                    <!-- Almacenamos las imágenes como JSON para que JavaScript las procese -->
                    <div class="galeria-container-service" 
                    data-imagenes='<?php echo json_encode($fotos['galeria']); ?>' 
                    data-whatsapp="<?php echo $whatsapp_link; ?>">

                    </div>

                    <article class="park-carousel-service">
                        <!-- El contenedor donde JavaScript insertará los items del carrusel -->
                        <div class="park-carousel-items-service">
                        
                            <!-- Los elementos se crearán dinámicamente con JavaScript -->
                        </div>
                        <div class="carousel-controls-service">
                            <button class="carousel-prev-service" aria-label="Anterior"><</button>
                            <div class="carousel-indicators-service"></div>
                            <button class="carousel-next-service" aria-label="Siguiente">></button>
                        </div>
                    </article>
                </main>
                </section>
        <!-- Llamado a la acción -->
        <div class="cta-section-service">
                <img src="../images/fotos/servicios/imagenes/text_cotizar.png" alt="cotizar fiesta">
                <a href="cotizar.php"><img src="../images/fotos/servicios/imagenes/boton-cotizar.png" alt="cotizar fiesta"></a>
            </div>
        </div>
    </article>
    <div class="service-foot">
    <img src="../images/fotos/Home/imagenes/Footer2.png" alt="">
    </div>
</main>

<!-- Contenedor del footer -->
<?php
// Incluye el footer
include_once '../includes/footer.php';
?>