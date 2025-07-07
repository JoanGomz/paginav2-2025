<?php
require_once '../includes/config.php';
$use_carousel = false;
include_once '../includes/head.php';
?>
<div class="servicio-space-background">
    <!-- barra navegacion -->
    <?php
    include_once '../includes/navbar.php';
    ?>
    <!-- contenedor principal con la imagen y formulario -->
    <main class="main-container-servicio">
        <section class="servicio-left">
            <img src="../images/fotos/servicio_al_cliente/imagenes/informacion.png" alt="Información">
        </section>

        <section class="servicio-right">
            <div class="service-form-container">
                <h2>Servicio al <br> cliente</h2>

                <form class="serviceForm" action="procesarservicio.php" method="post">
                    <div class="service-form-input">
                        <div class="service-form-group">
                            <i class="fa-solid fa-circle-user"></i>
                            <input type="text" id="nombre" name="nombre" required>
                            <label for="nombre">Nombre</label>
                        </div>
                    </div>
                    <div class="service-form-input">
                        <div class="service-form-group">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" id="email" name="email" required>
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="service-form-input">
                        <div class="service-form-group">
                            <i class="fa-solid fa-phone"></i>
                            <input type="tel" id="telefono" name="telefono" required>
                            <label for="telefono">Número telefónico</label>
                        </div>
                    </div>
                    <div class="service-form-input">
                        <div class="service-form-group">
                            <i class="fa-solid fa-location-dot"></i>
                            <select id="ubicacion" name="ubicacion" required>
                                <option value="" disabled selected></option>
                                <option value="altavista">Altavista</option>
                                <option value="bulevar_niza">Bulevar Niza</option>
                                <option value="hayuelos">Hayuelos</option>
                                <option value="paseo_villa_del_rio">Paseo Villa del Río</option>
                                <option value="bello">Bello</option>
                                <option value="cali">Cali</option>
                                <option value="mayorca">Mayorca</option>
                                <option value="mosquera">Mosquera</option>
                                <option value="neiva">Neiva</option>
                            </select>
                            <label for="ubicacion">Ubicación del parque</label>

                        </div>
                    </div>

                    <div class="service-form-input">
                        <div class="service-form-group">
                            <i class="fa-solid fa-comment-dots"></i>
                            <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
                            <label for="descripcion">Descripción</label>
                        </div>
                    </div>
                    <div class="service-form-submit">
                        <button type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </section>
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