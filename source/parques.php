<?php
require_once '../includes/config.php';
// Variable para indicar si esta página usa el carousel
$use_carousel = false;
include_once '../includes/head.php';
?>

<main class="parques-space-background">
    <!-- barra navegacion -->
    <?php
    include_once '../includes/navbar.php';
    ?>
    <!-- Seccion planetas -->
    <div class="cc-parques">
        <article class="starpark-locations location-section">
            <!-- Bogotá Central -->
            <section class="location-central bogota">
                <img src="../images/fotos/Parques/imagenes/bogotá.png" alt="SedesEnBogotá">
            </section>
            <!-- Primera fila de planetas - Bogotá -->
            <section class="planets-row">
            <div class="planet-item planet-orange">
                    <a href="../source/parque.php?id=hayuelos">
                        <div class="planet-content">
                            <img src="../images/fotos/Parques/botones/hayuelos.png" alt="Hayuelos">
                        </div>
                    </a>
                </div>
                <div class="planet-item planet-purple">
                    <a href="../source/parque.php?id=altavista">
                        <div class="planet-content">
                            <img src="../images/fotos/Parques/botones/altavista.png" alt="Altavista">
                        </div>
                    </a>
                </div>
                <div class="planet-item planet-yellow">
                    <a href="../source/parque.php?id=boulevarniza">
                        <div class="planet-content">
                            <img src="../images/fotos/Parques/botones/bulevar_niza.png" alt="Bulevar Niza">
                        </div>
                    </a>
                </div>
                <div class="planet-item planet-pink">
                    <a href="../source/parque.php?id=paseovillaDelrio">
                        <div class="planet-content">
                            <img src="../images/fotos/Parques/botones/paseo_villa_del_rio.png" alt="Paseo Villa del Río">
                        </div>
                    </a>
                </div> 
            </section>
        </article>

        <!-- Resto del país -->
        <article class="resto-pais location-section">
            <!-- Resto de países title -->
            <section class="location-central">
                <img src="../images/fotos/Parques/imagenes/resto_del_país.png" alt="RestoDelPaís">
            </section>
            <!-- Segunda fila de planetas - Resto del país -->
            <section class="planets-row">
            <div class="superior">
            <div class="planet-item2 planet-blue">
                    <a href="../source/parque.php?id=mosquera">
                        <div class="planet-content">
                            <img src="../images/fotos/Parques/botones/mosquera.png" alt="Mosquera">
                        </div>
                    </a>
                </div>
                <div class="planet-item planet-green">
                    <a href="../source/parque.php?id=bello">
                        <div class="planet-content">
                            <img src="../images/fotos/Parques/botones/bello.png" alt="Bello">
                        </div>
                    </a>
                </div>
                <div class="planet-item2 planet-saturn">
                    <a href="../source/parque.php?id=cali">
                        <div class="planet-content">
                            <img src="../images/fotos/Parques/botones/cali.png" alt="Cali">
                        </div>
                    </a>
                </div>
                </div>
                <div class="inferior">
                <div class="planet-item planet-red">
                    <a href="../source/parque.php?id=neiva">
                        <div class="planet-content">
                            <img src="../images/fotos/Parques/botones/neiva.png" alt="Neiva">
                        </div>
                    </a>
                </div>
                <div class="planet-item planet-earth">
                    <a href="../source/parque.php?id=mayorca">
                        <div class="planet-content">
                            <img src="../images/fotos/Parques/botones/mayorca.png" alt="Mayorca">
                        </div>
                    </a>
                </div>
              
                </div>
            </section>
        </article>
        <div class="footer2">
        <img src="../images/fotos/Home/imagenes/Footer2.png" alt="">
    </div>
    </div>
    <aside class="enlaces-derecha-parques">
    <a href="../source/index.php" class="dominik-icon ">
        <img src="../images/fotos/Home/Botones/DOMINIC.png" alt="Dominick">
    </a>
</aside>
</main>
<!-- Botones de whatsapp y dominick, lado derecho -->
<!-- Contenedor del footer -->
<?php
// Incluye el footer
include_once '../includes/footer.php';
?>