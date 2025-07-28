<?php
// Es CRUCIAL usar la ruta correcta para config.php
require_once '../includes/config.php';

// Variable para indicar si esta página usa el carousel
$use_carousel = true;
include_once '../includes/head.php';
?>
<div class="fondo-header">
        <img src="..\images\fotos\Home\imagenes\FONDO.png" alt="fondo">
        <div class=" social-media">
            <a href="https://www.facebook.com/starparkco" target="_blank"><img src="<?php echo SITE_URL; ?>images/fotos/Home/Botones/facebook.png" alt="Facebook"></a>
            <a href="https://www.instagram.com/starparkco/?hl=es-la" target="_blank"><img src="<?php echo SITE_URL; ?>images/fotos/Home/Botones/instagram.png" alt="Instagram"></a>
            <a href="http://tiktok.com/@starparkco?lang=es" target="_blank"><img src="<?php echo SITE_URL; ?>images/fotos/Home/Botones/tiktok.png" alt="TikTok"></a>
        </div>
    </div>
<div class="inicio-video-container">
    <video autoplay loop muted playsinline>
      <source src="../images/videoprincipal.mp4" type="video/mp4" />
    </video>
  </div>
<header class="background-header">
  <!-- VIDEO AL FONDO -->
  
  <!-- LOGO -->
  <div class="logo-container">
    <img src="../images/fotos/Home/Botones/Starpark.png" alt="Logo StarPark">
  </div>

  <!-- BOTONES -->
  <nav class="nav-container">
    <a href="../source/parques.php">
      <img src="../images/fotos/Home/Botones/parques.png" alt="Botón Parques">
    </a>
    <a class="button-center" href="../source/servicios.php">
      <img src="../images/fotos/Home/Botones/servicios.png" alt="Botón Servicos">
    </a>
    <a href="../source/contacto.php">
      <img src="../images/fotos/Home/Botones/contacto.png" alt="Botón Contacto">
    </a>
  </nav>
</header>


  <!-- Carrusel -->
  <main class="carousel-container">
    <div class="title-novedades">
      <img src="../images/fotos/Home/Botones/Novedades.png" alt="Novedades">
    </div>

    <div class="carousel">
      <div class="carousel-items">
        <!-- Carrusel dinámico -->
      </div>

      <div class="carousel-controls">
        <button class="carousel-prev" aria-label="Anterior">
          <img src="../images/fotos/Home/Botones/izquierda.png" alt="Izquierda">
        </button>
        <div class="carousel-indicators"></div>
        <button class="carousel-next" aria-label="Siguiente">
          <img src="../images/fotos/Home/Botones/derecha.png" alt="Derecha">
        </button>
      </div>
    </div>

    <!-- Sedes -->
    <div class="sedes">
      <div>
        <img src="../images/fotos/Home/imagenes/nuestras_sedes.png" alt="Nuestras sedes">
      </div>
      <div class="mapa">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7953.188550676852!2d-74.12928900000001!3d4.666199!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9c7c0cec0711%3A0x4652f39cd69ea2d0!2sStar%20Park%20Hayuelos!5e0!3m2!1ses-419!2sco!4v1752266550957!5m2!1ses-419!2sco"
          width="100%" height="900" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
    </div>
    <img class="footer_2" src="../images/fotos/Home/imagenes/Footer2.png" alt="footer superior">
  </main>



<!-- Botones de whatsapp y dominick, lado derecho -->
<?php
// Incluye el aside
include_once '../includes/aside.php';
?>
<?php
// Incluye el footer
include_once '../includes/footer.php';
?>