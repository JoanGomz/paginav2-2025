<?php
require_once '../includes/config.php';
$use_carousel = false;
include_once '../includes/head.php';
?>
<div class="nempresa-space-background">
    <!-- barra navegacion -->
    <?php
    include_once '../includes/navbar.php';
    ?>
    <div class="main-title">
        <img src="../images/fotos/quienes_somos/imagenes/quienes_somos.png" alt="Nuestra Empresa">
    </div>
    <div class="about-container">

        <div class="content-wrapper">
            <!-- Dominic animado -->
            <div class="dominic-container">
                <div class="dominic">
                    <img src="../images/fotos/quienes_somos/imagenes/dominic.png" alt="Star Park Mascota">
                </div>
            </div>

            <!-- Contenido -->
            <div class="text-content">
                <h2>Centros de entretenimiento para jugar y disfrutar en familia</h2>

                <p>Hace ya más de 30 años que un visionario tuvo el deseo de brindar experiencias de diversión para
                    toda
                    la familia. Un emprendedor que venía de brindar también su grano de arena en la universidad como
                    maestro, Decidió incursionar en este apasionante mundo de los parques de atracciones. Durante
                    varios
                    años, su emblemática atracción preferida, el carrusel, giro, transportando a los niños en un
                    viaje
                    hacia mundos mágicos de princesas y caballeros. Otra atracción mecánica, la rueda también ha
                    llevado
                    hasta el espacio fantástico a miles y miles de niños.</p>

                <p>Con el tiempo, nuestros niños fueron exigiendo más y mejores máquinas y nosotros siempre con el
                    deseo
                    de darles gusto hemos evolucionado cada día en infraestructura y variedad en la oferta de
                    entretenimiento. Hoy en día, el objetivo es el mismo: Brindar experiencias de diversión para
                    toda la
                    familia en parques de atracciones, ubicados en centros comerciales como:</p>
                <div class="locations-dominic">
                    <div class="locations">
                        <p>- Hayuelos, Ecoplaza, Bulevar, Altavista y Paseo Villa del Río en Bogotá.</p>
                        <p>- Puerta del Norte, en Medellín</p>
                        <p>- San pedro Plaza, en Neiva</p>
                        <p>- Ecoplaza, en Mosquera</p>
                        <p>- Cosmocentro, en Cali</p>
                    </div>
                    <!-- Dominic animado -->
                    <div class="dominic-container dominic-mobile">
                        <div class="dominic">
                            <img src="../images/fotos/quienes_somos/imagenes/dominic.png" alt="Star Park Mascota">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Botones de whatsapp y dominick, lado derecho -->
<?php
// Incluye el aside
include_once '../includes/aside.php';
?>
<?php
// Incluye el footer
include_once '../includes/footer.php';
?>