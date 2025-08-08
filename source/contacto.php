<?php
require_once '../includes/config.php';
$use_carousel = false;
include_once '../includes/head.php';
?>
<div class="contact-space-background">
    <!-- barra navegacion -->
    <?php
    include_once '../includes/navbar.php';
    ?>
    <main class="contact-panel">
        <section class="informacion-contacto">
            <!-- Panel de información con el personaje espacial -->
            <div class="info-container">
                <!-- Estructura con imagen de monitor y texto superpuesto -->
                <div class="monitor-container">
                    <img src="../images/fotos/contactos/imagenes/domink.png" alt="Personaje representate del parque">
                    <div class="escribenos">
                        <h3>ESCRIBENOS AL SIGUIENTE NUMERO</h3>
                        <img src="../images/fotos/contactos/imagenes/numero.png" alt="numero al que se puede escribir">
                    <div class="redes-sociales-contacto">
                        <h3>O A NUESTRAS REDES</h3>
                        <img src="../images/fotos/contactos/imagenes/redes.png" alt="redes sociales">
                    </div>
                    </div>
                    <div class=" media-contacto">
                            <a href="https://www.facebook.com/starparkco" target="_blank"><img src="<?php echo SITE_URL; ?>images/fotos/Home/Botones/facebook.png" alt="Facebook"></a>
                            <a href="https://www.instagram.com/starparkco/?hl=es-la" target="_blank"><img src="<?php echo SITE_URL; ?>images/fotos/Home/Botones/instagram.png" alt="Instagram"></a>
                            <a href="http://tiktok.com/@starparkco?lang=es" target="_blank"><img src="<?php echo SITE_URL; ?>images/fotos/Home/Botones/tiktok.png" alt="TikTok"></a>
                        </div>
                   
        </section>

        <section class="trabaja-con-nosotros">
            <img class="contact-trabaja-banner" src="../images/fotos/contactos/imagenes/trabaja_con_nosotros.png" alt="Trabaja con nosotros">
        </section>

        <section class="formulario-contacto">
            <!-- Contenedor con imagen de fondo del formulario -->
            <div class="main-contact-form">
                <div class="contact-form-container">
                    <!-- Campos del formulario -->
                    <form class="contact-form" action="https://formsubmit.co/sistemasjoangomez@gmail.com" method="POST">
                        <!-- Campos ocultos de configuración -->
                        <input type="hidden" name="_next" value="http://localhost/starpark/contacto.php?status=success">
                        <input type="hidden" name="_subject" value="Nuevo contacto desde Star Park Web">
                        <input type="hidden" name="_template" value="box">
                        <div class="equipo-star-park">
                                <h3>¿QUIERES PERTENECER AL EQUIPO STAR PARK?</h3>
                        </div>
                        <div class= "nombres">
                        <div class="contact-form-input">
                            <div class="contact-input-icon">
                                <i class="fa-solid fa-circle-user"></i>
                                <input type="text" name="nombre" required>
                                <label>Nombres...</label>
                            </div>
                        </div>
                            <div class="contact-form-input">
                            <div class="contact-input-icon">
                                <i class="fa-regular fa-circle-user"></i>
                                <input type="text" name="apellido" required>
                                <label>Apellidos...</label>
                            </div>
                        </div>
                        
                        </div>

                        
                    <div class="email">
                        <div class="contact-form-input">
                            <div class="contact-input-icon">
                                <i class="fa-solid fa-envelope"></i>
                                <input type="email" name="email" required>
                                <label>Email...</label>
                            </div>
                        </div>
                    </div>

                    <div class="info-complementaria">
                        <div class="contact-form-input">
                            <div class="contact-input-icon">
                                <i class="fa-solid fa-location-dot"></i>
                                <input type="text" name="direccion" required>
                                <label>Dirección...</label>
                            </div>
                        </div>

                        <div class="contact-form-input">
                            <div class="contact-input-icon">
                                <i class="fa-solid fa-phone-flip"></i>
                                <input class="number" placeholder="Numero de telefono.." type="tel" name="telefono" required>
        
                            </div>
                        </div>
                        </div>

                    <div class="comments">
                        <div class="contact-form-input">
                            <div class="contact-input-icon">
                                <i class="fa-solid fa-comment-dots"></i>
                                <textarea name="comentarios" required></textarea>
                                <label>Comentarios...</label>
                            </div>
                        </div>
                    </div>

                        <div class="contact-form-terms">
                            <input type="checkbox" id="terminos" name="terminos" required>
                            <label for="terminos">Aplican los términos y condiciones.<a href="#">Ver Términos de Uso</a></label>
                        </div>

                        <button class="contact-register-btn" type="submit"><img src="../images/fotos/contactos/imagenes/registrar.png" alt="Boton para registrarse"></button>
                    </form>
                </div>
            </div>
        </section>

        <!-- Mensaje de éxito o error -->
        <?php if (isset($_GET['status'])): ?>
            <div class="message-box <?php echo $_GET['status']; ?>">
                <?php if ($_GET['status'] === 'success'): ?>
                    <p>¡Mensaje enviado con éxito! Pronto nos pondremos en contacto contigo.</p>
                <?php else: ?>
                    <p>Hubo un error al enviar el mensaje. Por favor, intenta nuevamente.</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </main>
    <img class="footer-contact" src="../images/fotos/Home/imagenes/Footer2.png" alt="footer superior">
</div>
<!-- Botones de whatsapp y dominick, lado derecho -->

<?php
// Incluye el footer
include_once '../includes/footer.php';
?>