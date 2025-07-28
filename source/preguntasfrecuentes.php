<?php
require_once '../includes/config.php';
$use_carousel = false;
include_once '../includes/head.php';
?>
<div class="pregfrecuentes-background">
    <!-- barra navegacion -->
    <?php
    include_once '../includes/navbar.php';
    ?>
    <div class="cta-section">
        <div class="preguntas-frecuentes-container">
            <img src="../images/fotos/preguntas_frecuentes/imagenes/preguntas_frecuentes.png"
                alt="Preguntas frecuentes">
        </div>
        <div class="faq-container">
            <div class="faq-item">
                <div class="faq-question">¿QUÉ ES EL SUPERDOMINGO?</div>
                <div class="faq-answer">
                    Es un gran evento masivo de diversión que hacemos cada mes en todos los parques de la compañia.
                    Consiste en que los niños reciben entrada a las atracciones mecánicas, entradas para
                    videojuegos, dinámicas, refrigerio y obsequio. Es una gran oportunidad para llevar a tus niños
                    al parque. Para poder asistir debes reservar tu cupo dias antes del evento en las instalaciones
                    del Star Park que tengas mas cercano.
                    <br><br>
                    <em>*Tener en cuenta que cada una de las atracciones tiene restricciones por lo que algunos
                        niños no podran acceder a algunas de ellas.</em>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">¿HACEN EVENTOS EMPRESARIALES?</div>
                <div class="faq-answer">
                    Sí, también hacemos los mejores eventos empresariales, en los que integramos a los empleados de
                    tu empresa junto con sus hijos en un evento de diversión que incluye entre otros: Atracciones
                    mecánicas, torneos, videojuegos, recreación, refrigerio.
                    <br>
                    </em>Es un evento que fortalece la relación entre padres y sus hijos.</em>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">¿CUÁLES SON LOS HORARIOS DE ATENCIÓN?</div>
                <div class="faq-answer">
                    En general nuestros parques de atracciones están en servicio a partir de las 12:00 hasta las
                    20:00. Los fines de semana vamos desde las 11:00 hasta las 21:00.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">¿CÓMO PUEDO RESERVAR MI FIESTA INFANTIL?</div>
                <div class="faq-answer">
                    En la administración de cada uno de nuestros parques puedes reservar la fecha de celebración de
                    tu evento infantil. La reserva se hace al menos con $50.000 y continuas abonando hasta antes del
                    inicio de la fiesta.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">¿MI NIÑO O NIÑA PUEDE ENTRAR A TODAS LAS ATRACCIONES?</div>
                <div class="faq-answer">
                    Existen restricciones por estatura y en cada una de nuestras atracciones está el reglamento que
                    se debe cumplir para poder acceder.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">¿HACEN FIESTAS INFANTILES?</div>
                <div class="faq-answer">
                    Sí, hacemos fiestas infantiles en nuestros parques de atracciones, con salón decorado según el
                    personaje favorito, piñata, torta, recreación y mucho mas. Hacemos fiestas infantiles en Bogotá,
                    fiestas infantiles en Neiva, fiestas infantiles en Mosquera, fiestas infantiles en Medellin.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">¿CÓMO PUEDO UTILIZAR LAS ATRACCIONES DEL PARQUE?</div>
                <div class="faq-answer">
                    Deberás adquirir la tarjeta Star Park en cualquiera de nuestros puntos, y esta tarjeta almacena
                    toda la información; como tus tickets acumulados, maquinas en las que haz jugado, saldo para
                    jugar, etc.
                    Ademas también puedes utilizarla en todos los parques de la compañía.
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                const preguntas = document.querySelectorAll('.faq-question');

                preguntas.forEach(pregunta => {
                pregunta.addEventListener('click', () => {
                const respuesta = pregunta.nextElementSibling;
                respuesta.classList.toggle('active');
                pregunta.classList.toggle('open');
        });
    });
});
</script>

        </div>
        
    </div>
    <div class="footersup">
        <img src="../images/fotos/Home/imagenes/Footer2.png" alt="">
    </div>
</div>
<!-- Botones de whatsapp y dominick, lado derecho -->


<?php
// Incluye el footer
include_once '../includes/footer.php';
?>