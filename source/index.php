<?php
// Es CRUCIAL usar la ruta correcta para config.php
require_once '../includes/config.php';

// Variable para indicar si esta página usa el carousel
$use_carousel = true;
include_once '../includes/head.php';
?>
<div class="index-space-background">
    <section class="inicio-video-container">
        <video autoplay loop muted alt="videoPrincipal">
            <source src="../images/videoprincipal.mp4" type="video/mp4">
        </video>
    </section>
    <!-- Contenedor del header -->
     <div class="header-father">
     <header class="background-header">
        <!-- Logo -->
        <div class="logo-container">
            <img src="../images/fotos/Home/Botones/Starpark.png" alt="Logo StarPark">
        </div>
        <!-- Navegación -->
        <nav class="nav-container">
            <a href="../source/parques.php"> <img src="../images/fotos/Home/Botones/parques.png" alt="Botón Parques"> </a>
            <a class="button-center" href="../source/servicios.php"><img src="../images/fotos/Home/Botones/servicios.png"
                    alt="Botón Servicos"></a>
            <a href="../source/contacto.php"><img src="../images/fotos/Home/Botones/contacto.png" alt="Bontón Contacto"></a>
        </nav>
    </header>
     </div>
    <!-- Contenedor del main -->
    <main class="carousel-container"> <!-- Contenedor principal del carrusel -->
        <div class="title-novedades">
            <img src="../images/fotos/Home/Botones/Novedades.png" alt="Novedades"> <!-- Titulo del carrusel -->
        </div>
        <div class="carousel"> <!-- Contenedor del carrusel -->
            <div class="carousel-items"> <!-- Contenedor de los items del carrusel -->
                <!-- Se crean los items de manera dinámica -->
            </div>
            <div class="carousel-controls">
                <button class="carousel-prev" aria-label="Anterior">◀︎</button>
                <div class="carousel-indicators"></div>
                <button class="carousel-next" aria-label="Siguiente">▶︎</button>
            </div>
        </div>
    </main>
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