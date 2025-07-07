<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?></title>

    <!-- Usa SITE_URL para todas las rutas -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="<?php echo SITE_URL; ?>js/hamburgMenu.js"></script>
    <script defer src="<?php echo SITE_URL; ?>js/contactoToggle.js"></script>

    <?php if (isset($use_carousel) && $use_carousel): ?>
        <script defer src="<?php echo SITE_URL; ?>js/carousel.js"></script>
    <?php endif; ?>
    <?php if (isset($use_carouselParque) && $use_carouselParque): ?>
        <script defer src="<?php echo SITE_URL; ?>js/carouselParque.js"></script>
    <?php endif; ?>
    <meta name="theme-color" content="#314c9c">
</head>

<body>