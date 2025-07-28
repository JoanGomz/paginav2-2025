<?php
require_once '../includes/config.php';
$use_carousel = false;
$use_carouselParque = true;
$use_carouselParque = true;
include_once '../includes/head.php';

// Obtener el ID del parque de la URL
$parque_id = $_GET['id'] ?? '';

// Información del parque (esto podría venir de una base de datos)
$parques = [
    'hayuelos' => [
        'nombre' => 'HAYUELOS',
        'park_horarios' => '../images/fotos/Planetas_Sedes/Hayuelos/imagenes/Horarios.png',
        'planeta'=> '../images/fotos/Planetas_Sedes/Hayuelos/imagenes/planeta.png',
        'park_ubicacion'=>'../images/fotos/Planetas_Sedes/Hayuelos/imagenes/ubicacion.png',
        'telefono' => '(+57) 3202325689',
        'park-site' => '../images/fotos/Planetas_Sedes/Hayuelos/imagenes/Hayuelos.png',
        'galeria' => [
            '../images/fotos/prueba.jpg',
            '../images/fotos/prueba1.jpg'
        ],
        'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.603604350199!2d-74.13261482520849!3d4.664551895310337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9c7c0cec0711%3A0x4652f39cd69ea2d0!2sStar%20Park%20Hayuelos!5e0!3m2!1ses-419!2sco!4v1752786663849!5m2!1ses-419!2sco%22%20width=%22600%22%20height=%22450%22%20style=%22border:0;%22%20allowfullscreen=%22%22%20loading=%22lazy%22%20referrerpolicy=%22no-referrer-when-downgrade%22'
    ],
    'altavista' => [
        'nombre' => 'ALTAVISTA',
        'park_horarios' => '../images/fotos/Planetas_Sedes/Altavista/imagenes/Horarios.png',
        'planeta'=> '../images/fotos/Planetas_Sedes/Altavista/imagenes/planeta.png',
        'park_ubicacion'=>'../images/fotos/Planetas_Sedes/Altavista/imagenes/ubicacion.png',
        'telefono' => '(+57) 3202325661',
        'park-site' => '../images/fotos/Planetas_Sedes/Altavista/imagenes/altavista.png',
        'galeria' => [
            '../images/fotos/prueba.jpg',
            '../images/fotos/prueba1.jpg'
        ],
        'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8686.220590919638!2d-74.12426633529013!3d4.533202041794881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3fa21ead67e6a9%3A0xe6225f65a30424cb!2sAltavista%20Mall!5e1!3m2!1sen!2sco!4v1737149046045!5m2!1sen!2sco'
    ],
    'boulevarniza' => [
        'nombre' => 'BULEVAR',
       'park_horarios' => '../images/fotos/Planetas_Sedes/BulevarNiza/imagenes/Horario.png',
        'planeta'=> '../images/fotos/Planetas_Sedes/BulevarNiza/imagenes/planeta.png',
        'park_ubicacion'=>'../images/fotos/Planetas_Sedes/BulevarNiza/imagenes/ubicacion.png',
        'telefono' => '(+57) 3208587729',
        'park-site' => '../images/fotos/Planetas_Sedes/BulevarNiza/imagenes/bulevar.png',
        'galeria' => [
            '../images/fotos/prueba.jpg',
            '../images/fotos/prueba1.jpg'
        ],
        'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4934.172929616685!2d-74.07419022502059!3d4.712194595262844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f8592be4fe607%3A0x1bf9d74fdf4302da!2sCentro%20Comercial%20Bulevar%20Niza!5e1!3m2!1sen!2sco!4v1737476684343!5m2!1sen!2sco'
    ],
    'paseovillaDelrio' => [
        'nombre' => 'PASEO VILLA DEL RIO',
        'park_horarios' => '../images/fotos/Planetas_Sedes/PaseoVillaRio/imagenes/Horario.png',
        'planeta'=> '../images/fotos/Planetas_Sedes/PaseoVillaRio/imagenes/planeta.png',
        'park_ubicacion'=>'../images/fotos/Planetas_Sedes/PaseoVillaRio/imagenes/ubicacion.png',
        'telefono' => '(+57) 3102326520',
        'park-site' => '../images/fotos/Planetas_Sedes/PaseoVillaRio/imagenes/paseoV_Rio.png',
        'galeria' => [
            '../images/fotos/prueba.jpg',
            '../images/fotos/prueba1.jpg'
        ],
        'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4934.9737188645995!2d-74.15537862502136!3d4.598004695376667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9ee66d1faa3f%3A0x4d427a253a2dbe8d!2sCentro%20Comercial%20Paseo%20Villa%20del%20R%C3%ADo!5e1!3m2!1sen!2sco!4v1737477104725!5m2!1sen!2sco'
    ],
    'mosquera' => [
        'nombre' => 'MOSQUERA',
        'park_horarios' => '../images/fotos/Planetas_Sedes/Mosquera/imagenes/Horario.png',
        'planeta'=> '../images/fotos/Planetas_Sedes/Mosquera/imagenes/planeta.png',
        'park_ubicacion'=>'../images/fotos/Planetas_Sedes/Mosquera/imagenes/ubicacion.png',
        'telefono' => '(+57) 3112470566',
        'park-site' => '../images/fotos/Planetas_Sedes/Mosquera/imagenes/Mosquera.png',
        'galeria' => [
            '../images/fotos/prueba.jpg',
            '../images/fotos/prueba1.jpg'
        ],
        'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4934.172056476821!2d-74.22427962502063!3d4.712317595262732!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f7801081bfef7%3A0x19fe5e58b776dff8!2sEcoplaza%20Centro%20Comercial!5e1!3m2!1sen!2sco!4v1737477518410!5m2!1sen!2sco'
    ],
    'neiva' => [
        'nombre' => 'NEIVA',
        'park_horarios' => '../images/fotos/Planetas_Sedes/Neiva/imagenes/Horario.png',
        'planeta'=> '../images/fotos/Planetas_Sedes/Neiva/imagenes/planeta.png',
        'park_ubicacion'=>'../images/fotos/Planetas_Sedes/Neiva/imagenes/ubicacion.png',
        'telefono' => '(+57) 3118080091',
        'park-site' => '../images/fotos/Planetas_Sedes/Neiva/imagenes/Neiva.png',
        'galeria' => [
            '../images/fotos/prueba.jpg',
            '../images/fotos/prueba1.jpg'
        ],
        'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4944.343238870447!2d-75.29098342502962!3d2.9507458970254796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3b7451271c5493%3A0x14bf201fa8730bf1!2sSan%20Pedro%20Plaza%20Shopping%20Center!5e1!3m2!1sen!2sco!4v1737477742421!5m2!1sen!2sco'
    ],
    'bello' => [
        'nombre' => 'BELLO',
        'park_horarios' => '../images/fotos/Planetas_Sedes/Bello/imagenes/Horario.png',
        'planeta'=> '../images/fotos/Planetas_Sedes/Bello/imagenes/planeta.png',
        'park_ubicacion'=>'../images/fotos/Planetas_Sedes/Bello/imagenes/ubicacion.png',
        'telefono' => '(+57) 3118080092',
        'park-site' => '../images/fotos/Planetas_Sedes/bello/imagenes/Bello.png',
        'galeria' => [
            '../images/fotos/prueba.jpg',
            '../images/fotos/prueba1.jpg'
        ],
        'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4920.634633323762!2d-75.54557562500864!3d6.339318993650392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e442f9a57f14d2b%3A0xaa895da5804ee322!2sPuerta%20del%20Norte%20Shopping%20Mall!5e1!3m2!1sen!2sco!4v1737478075477!5m2!1sen!2sco'
    ],
    'mayorca' => [
        'nombre' => 'MAYORCA',
        'park_horarios' => '../images/fotos/Planetas_Sedes/Mayorca/imagenes/Horario.png',
        'planeta'=> '../images/fotos/Planetas_Sedes/Mayorca/imagenes/planeta.png',
        'park_ubicacion'=>'../images/fotos/Planetas_Sedes/Mayorca/imagenes/ubicacion.png',
        'telefono' => '(+57) 3145442606',
        'park-site' => '../images/fotos/Planetas_Sedes/Mayorca/Imagenes/Mayorca.png',
        'galeria' => [
            '../images/fotos/prueba.jpg',
            '../images/fotos/prueba1.jpg'
        ],
        'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4922.310650581708!2d-75.60757417501021!3d6.161161493826045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e4683cc2769fda9%3A0x997386a695af1002!2sMayorca%20Mega%20Plaza!5e1!3m2!1sen!2sco!4v1737478320985!5m2!1sen!2sco'
    ],
    'cali' => [
        'nombre' => 'CALI',
        'park_horarios' => '../images/fotos/Planetas_Sedes/cali/imagenes/Horario.png',
        'planeta'=> '../images/fotos/Planetas_Sedes/cali/imagenes/planeta.png',
        'park_ubicacion'=>'../images/fotos/Planetas_Sedes/cali/imagenes/ubicacion.png',
        'telefono' => '(+57) 3118080084',
        'park-site' => '../images/fotos/Planetas_Sedes/Cali/imagenes/cali.png',
        'galeria' => [
            '../images/fotos/prueba.jpg',
            '../images/fotos/prueba1.jpg'
        ],
        'mapa' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3645.6578972973143!2d-76.5473719!3d3.4137529!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e30a6a7e04342fd%3A0xc7fcee81107f9811!2sLa%2014%20Cosmo%20Centro%2C%20Cl.%205%20%2350-103%2C%20panamericano%2C%20Cali%2C%20Valle%20del%20Cauca!5e1!3m2!1ses!2sco!4v1740425339999!5m2!1ses!2sco'
    ]
];
// Verificar si existe el parque
if (!isset($parques[$parque_id])) {
    header('Location: parques.php');
    exit;
}

$parque = $parques[$parque_id];
?>
<!-- Pagina de cada parque -->
<div class="sedes-space-background">
    <div class="sedes-space-background">
        <!-- barra navegacion -->
        <?php
        include_once '../includes/navbar.php';
        ?>
        <!-- Sección Ubicación (nave.png) -->
        <div class="info-parques-floor">
            <header class="parque-images-floor">
                 <!-- Sección del carrusel -->
                 <main class="park-carousel-container">
                    <!-- Almacenamos las imágenes como JSON para que JavaScript las procese -->
                    <div class="galeria-container" data-imagenes='<?php echo json_encode($parque['galeria']); ?>' style="display:none;"></div>

                    <article class="park-carousel">
                        <!-- El contenedor donde JavaScript insertará los items del carrusel -->
                        <div class="park-carousel-items">
                            <!-- Los elementos se crearán dinámicamente con JavaScript -->
                        </div>
                        <div class="carousel-controls">
                            <button class="carousel-prev" aria-label="Anterior">◀︎</button>
                            <div class="carousel-indicators"></div>
                            <button class="carousel-next" aria-label="Siguiente">▶︎</button>
                        </div>
                    </article>
                </main>
            </header>
            <!-- Sección de nave -->
            <section class="nave-container">
                <img src="../images/fotos/Planetas_Sedes/nave.png" alt="Nave">

            </section>
            <div class="sede-container">
                    <div class="park-site">
                        <img src="<?php echo $parque['park-site']; ?>" alt="Sede <?php echo $parque['nombre']; ?>">
                    </div>
                </div>
               
                <!-- Sección de información del parque -->
                <article class="park-info">
                    <div class="galeria-item">
                         <img src="<?php echo $parque['park_ubicacion']; ?>" alt="Imagen informativa del parque ">   
                    </div>
                    <div class="planeta">
                         <img src="<?php echo $parque['planeta']; ?>" alt="Imagen informativa del parque ">   
                    </div>
                    <div class="galeria-item">
                         <img src="<?php echo $parque['park_horarios']; ?>" alt="Imagen informativa del parque ">   
                    </div>
                </article>
            
            <!-- Sección de información -->
            <article class="info-container">
           
                <section class="hablemos-content">
                <div class="hablemos-button">
                        <p><span>¡Hola!</span> <br>¿Tienes dudas? <br>Estoy aqui para ayudarte.</p>
                        
                    </div>
                    <div class="dominick-container">
                    <a href="https://wa.me/573118090610" class="whatsapp" target="_blank">
                        <img src="../images/fotos/Planetas_Sedes/DOMINIC.png" alt="Dominick">
                        </a>
                    </div>
                   
                </section>
                <div class="llegar">
      <div>
        <img src="../images/fotos/Planetas_Sedes/como_llegar.png" alt="Nuestras sedes">
      </div>
      <div class="map">
      <iframe src="<?php echo $parque['mapa']; ?>" width="100%" height="900px" style="border:0;"allowfullscreen="">
      </iframe>
      </div>
    </div>
                
            </article>
            
            </div>
        </div>
    </div>
    <div class="footer-2">
        <img src="../images/fotos/Home/imagenes/Footer2.png" alt="">
    </div>
</div>


<!-- Contenedor del footer -->
<?php
// Incluye el footer
include_once '../includes/footer.php';
?>