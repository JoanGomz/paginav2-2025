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
        'park_info' => '../images/fotos/Planetas_Sedes/Hayuelos/imagenes/info.png',
        'telefono' => '(+57) 3202325689',
        'park-site' => '../images/fotos/Planetas_Sedes/Hayuelos/imagenes/Hayuelos.png',
        'galeria' => [
            '../images/fotos/Planetas_Sedes/Hayuelos/imagen1.png',
            '../images/fotos/Planetas_Sedes/Hayuelos/imagen2.png'
        ],
        'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3070.480671334933!2d-74.13145828119882!3d4.663593453672537!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9c7c183b5caf%3A0xac7d29a15cf82ed1!2sHayuelos%20Mall!5e1!3m2!1sen!2sco!4v1737142903345!5m2!1sen!2sco'
    ],
    'altavista' => [
        'nombre' => 'ALTAVISTA',
        'park_info' => '../images/fotos/Planetas_Sedes/Altavista/imagenes/info.png',
        'telefono' => '(+57) 3202325661',
        'park-site' => '../images/fotos/Planetas_Sedes/Altavista/imagenes/altavista.png',
        'galeria' => [
            '../images/fotos/Planetas_Sedes/Altavista/imagen1.jpg',
            '../images/fotos/Planetas_Sedes/Altavista/imagen2.jpeg'
        ],
        'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8686.220590919638!2d-74.12426633529013!3d4.533202041794881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3fa21ead67e6a9%3A0xe6225f65a30424cb!2sAltavista%20Mall!5e1!3m2!1sen!2sco!4v1737149046045!5m2!1sen!2sco'
    ],
    'boulevarniza' => [
        'nombre' => 'BULEVAR',
        'park_info' => '../images/fotos/Planetas_Sedes/BulevarNiza/imagenes/info.png',
        'telefono' => '(+57) 3208587729',
        'park-site' => '../images/fotos/Planetas_Sedes/BulevarNiza/imagenes/bulevar.png',
        'galeria' => [
            '../images/fotos/Planetas_Sedes/BulevarNiza/imagen1.jpg',
            '../images/fotos/Planetas_Sedes/BulevarNiza/imagen2.jpg'
        ],
        'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4934.172929616685!2d-74.07419022502059!3d4.712194595262844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f8592be4fe607%3A0x1bf9d74fdf4302da!2sCentro%20Comercial%20Bulevar%20Niza!5e1!3m2!1sen!2sco!4v1737476684343!5m2!1sen!2sco'
    ],
    'paseovillaDelrio' => [
        'nombre' => 'PASEO VILLA DEL RIO',
        'park_info' => '../images/fotos/Planetas_Sedes/PaseoVillaRio/imagenes/info.png',
        'telefono' => '(+57) 3102326520',
        'park-site' => '../images/fotos/Planetas_Sedes/PaseoVillaRio/imagenes/paseoV_Rio.png',
        'galeria' => [
            '../images/fotos/Planetas_Sedes/PaseoVillaRio/imagen1.PNG',
            '../images/fotos/Planetas_Sedes/PaseoVillaRio/imagen2.png',
            '../images/fotos/Planetas_Sedes/PaseoVillaRio/imagen3.png'
        ],
        'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4934.9737188645995!2d-74.15537862502136!3d4.598004695376667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9ee66d1faa3f%3A0x4d427a253a2dbe8d!2sCentro%20Comercial%20Paseo%20Villa%20del%20R%C3%ADo!5e1!3m2!1sen!2sco!4v1737477104725!5m2!1sen!2sco'
    ],
    'mosquera' => [
        'nombre' => 'MOSQUERA',
        'park_info' => '../images/fotos/Planetas_Sedes/Mosquera/imagenes/info.png',
        'telefono' => '(+57) 3112470566',
        'park-site' => '../images/fotos/Planetas_Sedes/Mosquera/imagenes/Mosquera.png',
        'galeria' => [
            '../images/fotos/Planetas_Sedes/Mosquera/imagen1.png',
            '../images/fotos/Planetas_Sedes/Mosquera/imagen2.PNG'
        ],
        'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4934.172056476821!2d-74.22427962502063!3d4.712317595262732!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f7801081bfef7%3A0x19fe5e58b776dff8!2sEcoplaza%20Centro%20Comercial!5e1!3m2!1sen!2sco!4v1737477518410!5m2!1sen!2sco'
    ],
    'neiva' => [
        'nombre' => 'NEIVA',
        'park_info' => '../images/fotos/Planetas_Sedes/Neiva/imagenes/info.png',
        'telefono' => '(+57) 3118080091',
        'park-site' => '../images/fotos/Planetas_Sedes/Neiva/imagenes/Neiva.png',
        'galeria' => [
            '../images/fotos/Planetas_Sedes/Neiva/imagen1.jpg',
            '../images/fotos/Planetas_Sedes/Neiva/imagen2.jpg'
        ],
        'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4944.343238870447!2d-75.29098342502962!3d2.9507458970254796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3b7451271c5493%3A0x14bf201fa8730bf1!2sSan%20Pedro%20Plaza%20Shopping%20Center!5e1!3m2!1sen!2sco!4v1737477742421!5m2!1sen!2sco'
    ],
    'bello' => [
        'nombre' => 'BELLO',
        'park_info' => '../images/fotos/Planetas_Sedes/bello/imagenes/info.png',
        'telefono' => '(+57) 3118080092',
        'park-site' => '../images/fotos/Planetas_Sedes/bello/imagenes/Bello.png',
        'galeria' => [
            '../images/fotos/Planetas_Sedes/bello/imagen1.jpg',
            '../images/fotos/Planetas_Sedes/bello/imagen2.jpg'
        ],
        'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4920.634633323762!2d-75.54557562500864!3d6.339318993650392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e442f9a57f14d2b%3A0xaa895da5804ee322!2sPuerta%20del%20Norte%20Shopping%20Mall!5e1!3m2!1sen!2sco!4v1737478075477!5m2!1sen!2sco'
    ],
    'mayorca' => [
        'nombre' => 'MAYORCA',
        'park_info' => '../images/fotos/Planetas_Sedes/Mayorca/Imagenes/info.png',
        'telefono' => '(+57) 3145442606',
        'park-site' => '../images/fotos/Planetas_Sedes/Mayorca/Imagenes/Mayorca.png',
        'galeria' => [
            '../images/fotos/Planetas_Sedes/Mayorca/imagen1.jpg',
            '../images/fotos/Planetas_Sedes/Mayorca/imagen2.jpg'
        ],
        'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4922.310650581708!2d-75.60757417501021!3d6.161161493826045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e4683cc2769fda9%3A0x997386a695af1002!2sMayorca%20Mega%20Plaza!5e1!3m2!1sen!2sco!4v1737478320985!5m2!1sen!2sco'
    ],
    'cali' => [
        'nombre' => 'CALI',
        'park_info' => '../images/fotos/Planetas_Sedes/Cali/imagenes/info.png',
        'telefono' => '(+57) 3118080084',
        'park-site' => '../images/fotos/Planetas_Sedes/Cali/imagenes/cali.png',
        'galeria' => [
            '../images/fotos/Planetas_Sedes/Cali/imagen1.JPG',
            '../images/fotos/Planetas_Sedes/Cali/imagen2.jpg'
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
            <header class="ubication">
                <section class="ubication-map">
                    <div class="map-container">
                        <iframe src="<?php echo $parque['mapa']; ?>" width="100%" height="100%" style="border:0;"
                            allowfullscreen="">
                        </iframe>
                    </div>
                </section>
            </header>
            <!-- Sección de nave -->
            <section class="nave-container">
                <img src="../images/fotos/Planetas_Sedes/nave.png" alt="Nave">
                <div class="sede-container">
                    <div class="park-site">
                        <img src="<?php echo $parque['park-site']; ?>" alt="Sede <?php echo $parque['nombre']; ?>">
                    </div>
                </div>
            </section>
            <!-- Sección de la galería -->
            <div class="parque-images-floor">
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
                <!-- Sección de información del parque -->
                <article class="park-info">
                    <div class="galeria-item">
                        <img src="<?php echo $parque['park_info']; ?>" alt="Imagen informativa del parque">
                    </div>
                </article>
            </div>
            <!-- Sección de información -->
            <article class="info-container">
                <div class="lines">
                    <img src="../images/fotos/Planetas_Sedes/azul_y_rojo.png" alt="Decoración azul y rojo">
                </div>
                <section class="hablemos-content">
                    <div class="dominick-container">
                        <img src="../images/fotos/Planetas_Sedes/dominick.png" alt="Dominick">
                    </div>
                    <div class="hablemos-button">
                        <p><span>¡Hola!</span> <br>Estoy aquí para ayudarte</p>
                        <a href="https://wa.me/573118090610" class="whatsapp" target="_blank">
                            <img src="../images/fotos/Planetas_Sedes/hablemos.png" alt="Hablemos">
                        </a>
                    </div>
                </section>
            </article>
        </div>
    </div>
</div>
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