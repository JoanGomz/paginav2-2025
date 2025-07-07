<?php
// Al inicio de procesar_contacto.php
if (empty($nombre) || empty($email) || empty($comentarios)) {
    header('Location: contacto.php?status=error&message=campos_requeridos');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: contacto.php?status=error&message=email_invalido');
    exit;
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'includes/phpmailer/language/src/Exception.php';
require 'includes/phpmailer/language/src/PHPMailer.php';
require 'includes/phpmailer/language/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos del formulario
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $comentarios = $_POST['comentarios'] ?? '';

    // Crear instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Cambia esto según tu servidor de correo
        $mail->SMTPAuth = true;
        $mail->Username = 'sistemasjoangomez@gmail.com'; // Tu correo
        $mail->Password = 'Sebas2025$'; // Tu contraseña
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del correo
        $mail->setFrom($email, $nombre . ' ' . $apellido);
        $mail->addAddress('sistemasjoangomez@starpark.com.co'); // Correo destino

        // Contenido
        $mail->isHTML(true);
        $mail->Subject = 'Nuevo mensaje de contacto desde la web';
        
        // Crear el cuerpo del correo
        $mensaje = "
        <h2>Nuevo mensaje de contacto</h2>
        <p><strong>Nombre:</strong> $nombre $apellido</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Teléfono:</strong> $telefono</p>
        <p><strong>Comentarios:</strong></p>
        <p>$comentarios</p>
        ";

        $mail->Body = $mensaje;
        $mail->AltBody = strip_tags($mensaje); // Versión texto plano

        $mail->send();
        
        // Enviar respuesta automática al usuario
        $autoresponder = new PHPMailer(true);
        $autoresponder->isSMTP();
        // ... (misma configuración SMTP que arriba)
        
        $autoresponder->setFrom('sistemasjoangomez@starpark.com.co', 'Star Park');
        $autoresponder->addAddress($email, $nombre . ' ' . $apellido);
        
        $autoresponder->isHTML(true);
        $autoresponder->Subject = 'Gracias por contactarnos';
        $autoresponder->Body = "
        <h2>¡Gracias por contactar con Star Park!</h2>
        <p>Hemos recibido tu mensaje y nos pondremos en contacto contigo pronto.</p>
        <p>Atentamente,<br>El equipo de Star Park</p>
        ";
        
        $autoresponder->send();

        // Redireccionar con mensaje de éxito
        header('Location: contacto.php?status=success');
        exit;

    } catch (Exception $e) {
        // Redireccionar con mensaje de error
        header('Location: contacto.php?status=error');
        exit;
    }
}
?>