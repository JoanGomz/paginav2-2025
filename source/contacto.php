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
            <h1>CONTACTO</h1>
            <div class="info-container">
                <!-- Estructura con imagen de monitor y texto superpuesto -->
                <div class="monitor-container">
                    <img src="../images/fotos/contactos/imagenes/domink_computador.png" alt="Personaje con monitor">

                    <!-- Texto superpuesto en la pantalla -->
                    <div class="screen-overlay">
                        <div class="contact-info">
                            <p>Cali: <span>3118080084</span></p>
                            <p>Neiva: <span>3118080091</span></p>
                            <p>Bello: <span>3118080092</span></p>
                            <p>Mayorca: <span>3118080092</span></p>
                            <p>Bulevar: <span>3208587729</span></p>
                            <p>Hayuelos: <span>3202325689</span></p>
                            <p>Mosquera: <span>3112470566</span></p>
                            <p>Mercadeo: <span>3118090610</span></p>
                            <p>Paseo Villa del río: <span>3102326520</span></p>
                            <p>Correo: <span>Mercadeo@starpark.com.co</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="trabaja-con-nosotros">
            <img class="contact-trabaja-banner" src="../images/fotos/contactos/imagenes/trabaja_con_nosotros.png" alt="Trabaja con nosotros">
        </section>

        <section class="formulario-contacto">
            <!-- Contenedor con imagen de fondo del formulario -->
            <div class="main-contact-form">
                <img class="contact-form-bgImage" src="../images/fotos/contactos/imagenes/formulario.png" alt="Fondo formulario">
                <div class="contact-form-container">
                    <!-- Campos del formulario -->
                    <form class="contact-form" action="https://formsubmit.co/sistemasjoangomez@gmail.com" method="POST">
                        <!-- Campos ocultos de configuración -->
                        <input type="hidden" name="_next" value="http://localhost/starpark/contacto.php?status=success">
                        <input type="hidden" name="_subject" value="Nuevo contacto desde Star Park Web">
                        <input type="hidden" name="_template" value="box">

                        <div class="contact-form-input">
                            <div class="contact-input-icon">
                                <i class="fa-solid fa-circle-user"></i>
                                <input type="text" name="nombre" required>
                                <label>Nombre</label>
                            </div>
                        </div>

                        <div class="contact-form-input">
                            <div class="contact-input-icon">
                                <i class="fa-regular fa-circle-user"></i>
                                <input type="text" name="apellido" required>
                                <label>Apellido</label>
                            </div>
                        </div>

                        <div class="contact-form-input">
                            <div class="contact-input-icon">
                                <i class="fa-solid fa-envelope"></i>
                                <input type="email" name="email" required>
                                <label>Email</label>
                            </div>
                        </div>

                        <div class="contact-form-input">
                            <div class="contact-input-icon">
                                <i class="fa-solid fa-location-dot"></i>
                                <input type="text" name="direccion" required>
                                <label>Dirección</label>
                            </div>
                        </div>

                        <div class="contact-form-input">
                            <div class="contact-input-icon">
                                <i class="fa-solid fa-phone-flip"></i>
                                <input type="tel" name="telefono" required>
                                <label>Número telefónico</label>
                            </div>
                        </div>

                        <div class="contact-form-input">
                            <div class="contact-input-icon">
                                <i class="fa-solid fa-comment-dots"></i>
                                <textarea name="comentarios" required></textarea>
                                <label>Comentarios</label>
                            </div>
                        </div>

                        <div class="contact-form-terms">
                            <input type="checkbox" id="terminos" name="terminos" required>
                            <label for="terminos">Acepto los términos y condiciones.
                                <a href="#">Ver Términos de Uso</a></label>
                        </div>

                        <button class="contact-register-btn" type="submit">Registrar</button>
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