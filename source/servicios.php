<?php
require_once '../includes/config.php';
$use_carousel = false;
include_once '../includes/head.php';
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
        <section class="servicios-grid">
            <a href="https://wa.me/573118090610" class="servicio-card">
                <div class="card-content">
                    <img src="../images/fotos/servicios/imagenes/CelebraCumple.png" alt="Celebra tu Cumpleaños">
                    <!-- <h3>CELEBRA TU<br>CUMPLEAÑOS</h3>
                        <p>¡FESTEJA TU CUMPLEAÑOS<br>HOY Y VÍVELO CON DIVERSIÓN!</p> -->
                </div>
            </a>

            <a href="https://wa.me/573118090610" class="servicio-card">
                <div class="card-content">
                    <img src="../images/fotos/servicios/imagenes/FiestasColegios.png" alt="Fiestas Colegios">
                    <!-- <h3>FIESTAS<br>COLEGIOS</h3>
                        <p>¡EL MEJOR CIERRE DE AÑO<br>PARA TU INSTITUCIÓN!</p> -->
                </div>
            </a>

            <a href="https://wa.me/573118090610" class="servicio-card">
                <div class="card-content">
                    <img src="../images/fotos/servicios/imagenes/SuperDiversion.png" alt="Super Diversión">
                    <!-- <h3>SUPER<br>DIVERSIÓN</h3>
                        <p>¡MOMENTOS DE DIVERSIÓN<br>PERFECTOS EN STAR PARK!</p> -->
                </div>
            </a>

            <a href="https://wa.me/573118090610" class="servicio-card">
                <div class="card-content">
                    <img src="../images/fotos/servicios/imagenes/EventosEmpresariales.png" alt="Eventos Empresariales">
                    <!-- <h3>EVENTOS<br>EMPRESARIALES</h3>
                        <p>¡CELEBRA TUS EVENTOS<br>EMPRESARIALES CON NOSOTROS!</p> -->
                </div>
            </a>

            <a href="https://wa.me/573118090610" class="servicio-card">
                <div class="card-content">
                    <img src="../images/fotos/servicios/imagenes/FiestasInfantiles.png" alt="Fiestas Infantiles">
                    <!-- <h3>FIESTAS<br>INFANTILES</h3>
                        <p>¡CELEBRA TU EVENTO<br>INFANTIL CON NOSOTROS!</p> -->
                </div>
            </a>
        </section>

        <!-- Llamado a la acción -->
        <div class="cta-section">
            <h2>DIVIÉRTETE CON NOSOTROS</h2>
            <div class="cta-button">
                <a href="cotizar.php">¡Y COTIZA TU FIESTA YA!</a>
            </div>
        </div>
    </article>
</main>
<!-- Botones de whatsapp y dominick, lado derecho -->
<?php
// Incluye el aside
include_once '../includes/aside.php';
?>
<!-- Contenedor del footer -->
<?php
// Incluye el footer
include_once '../includes/footer.php';
?>