<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to = 'sistemasjoangomez@gmail.com';
    $subject = 'Nuevo mensaje de Servicio al Cliente - Star Park';
    
    $message = "Nombre: " . $_POST['nombre'] . "\n";
    $message .= "Email: " . $_POST['email'] . "\n";
    $message .= "Teléfono: " . $_POST['telefono'] . "\n";
    $message .= "Sede: " . $_POST['ubicacion'] . "\n";
    $message .= "Descripción: " . $_POST['descripcion'];
    
    $headers = 'From: ' . $_POST['email'];

    mail($to, $subject, $message, $headers);
    
    header('Location: ../source/servicio.php?status=success');
    exit;
}
?>