<?php
require_once 'includes/config.php';
require_once 'includes/header.php';
?>

<div class="space-background">
    <div class="work-container">
        <h1>TRABAJA CON NOSOTROS</h1>
        
        <form action="https://formsubmit.co/administrativo1@starpark.com.co" method="POST" class="work-form">
            <!-- Configuración FormSubmit -->
            <input type="hidden" name="_subject" value="Nueva aplicación de trabajo - Star Park">
            <input type="hidden" name="_next" value="http://localhost/starpark/trabaja.php?status=success">
            <input type="hidden" name="_captcha" value="true">
            <input type="hidden" name="_template" value="box">
            
            <div class="form-grid">
                <div class="form-row">
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre Completo" required>

                    <select name="sede" required>
                        <option value="" disabled selected>Selecciona una sede</option>
                        <option value="Hayuelos">Hayuelos</option>
                        <option value="Ecoplaza">Ecoplaza</option>
                        <option value="Bulevar">Bulevar</option>
                        <option value="Altavista">Altavista</option>
                        <option value="Paseo Villa del Río">Paseo Villa del Río</option>
                        <option value="Puerta del Norte">Puerta del Norte</option>
                        <option value="San Pedro Plaza">San Pedro Plaza</option>
                        <option value="Cosmocentro">Cosmocentro</option>
                    </select>
                </div>

                <div class="form-row">
                    <input type="text" name="cargo" placeholder="Cargo al que Aspira" required>
                    <input type="tel" name="telefono" placeholder="Número de Contacto" required>
                </div>

                <div class="form-row full-width">
                    <input type="email" name="email" placeholder="Correo Electrónico" required>
                </div>

                <div class="form-row file-row">
                    <div class="file-input-container">
                        <span class="file-label">Adjunta tu Hoja de Vida</span>
                        <label class="file-button">
                            Seleccionar Archivo
                            <input type="file" name="attachment" accept=".pdf,.doc,.docx" required>
                        </label>
                    </div>
                </div>

                <button type="submit" class="submit-button">ENVIAR APLICACIÓN</button>
            </div>

            <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
                <div class="success-message">
                    <p>¡Tu aplicación ha sido enviada con éxito! Revisaremos tu información y nos pondremos en contacto contigo.</p>
                </div>
            <?php endif; ?>
        </form>
    </div>
</div>

<style>
.space-background {
    background: #010b1a;
    min-height: 100vh;
    padding: 40px 20px;
}

.work-container {
    max-width: 800px;
    margin: 0 auto;
    background: #001428;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 0 40px rgba(0,0,0,0.5);
}

h1 {
    color: #00f7ff;
    text-align: center;
    font-size: 2.5em;
    margin-bottom: 40px;
    text-shadow: 0 0 15px rgba(0,247,255,0.5);
}

.form-grid {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.form-row.full-width {
    grid-template-columns: 1fr;
}

input, select {
    width: 100%;
    padding: 12px 15px;
    background: rgba(0, 20, 40, 0.5);
    border: 1px solid rgba(0, 247, 255, 0.2);
    border-radius: 8px;
    color: white;
    font-size: 1em;
}

input::placeholder {
    color: rgba(255, 255, 255, 0.6);
}

select {
    appearance: none;
    background-image: url('data:image/svg+xml;utf8,<svg fill="white" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>');
    background-repeat: no-repeat;
    background-position: right 10px center;
}

.file-input-container {
    display: flex;
    align-items: center;
    gap: 20px;
    width: 100%;
}

.file-label {
    color: rgba(255, 255, 255, 0.6);
}

.file-button {
    background: #00333d;
    color: #00f7ff;
    padding: 8px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.file-button:hover {
    background: #004a57;
}

.file-button input[type="file"] {
    display: none;
}

.submit-button {
    width: 100%;
    padding: 15px;
    background: transparent;
    border: 2px solid #00f7ff;
    color: #00f7ff;
    font-size: 1.2em;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 20px;
}

.submit-button:hover {
    background: rgba(0, 247, 255, 0.1);
    box-shadow: 0 0 20px rgba(0, 247, 255, 0.2);
}

input:focus, select:focus {
    outline: none;
    border-color: #00f7ff;
    box-shadow: 0 0 10px rgba(0, 247, 255, 0.2);
}

.success-message {
    margin-top: 20px;
    padding: 15px;
    background: rgba(0, 255, 0, 0.1);
    border: 1px solid #00ff00;
    color: #00ff00;
    border-radius: 5px;
    text-align: center;
}

@media (max-width: 768px) {
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .work-container {
        padding: 20px;
    }
}
</style>


<section class="de-interes">
    <h2>De Interés</h2>
    <ul>
        <li>
            <a href="preguntasfrecuentes.php">Preguntas Frecuentes</a>
        </li>
        <li>
            <a href="nuestraempresa.php">Nuestra Empresa</a>
        </li>
        <li>
            <a href="servicio-cliente.php">Servicio al Cliente</a>
        </li>
        <li>
            <a href="blog.php">Blog</a>
        </li>
    </ul>
</section>