<?php
// procesar_cotizacion.php
require_once '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger los datos del formulario
    $tipo_evento = $_POST['tipo_evento'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $sede = $_POST['sede'] ?? '';
    $fecha = $_POST['fecha'] ?? '';
    $invitados = $_POST['invitados'] ?? '';
    $comentarios = $_POST['comentarios'] ?? '';

    // Aquí puedes agregar el código para:
    // 1. Guardar en base de datos
    // 2. Enviar email de confirmación
    // 3. Enviar email al administrador
    
    // Redireccionar con mensaje de éxito
    header('Location: ../source/cotizar.php?status=success');
    exit;
}