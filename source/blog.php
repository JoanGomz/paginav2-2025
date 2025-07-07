<?php
require_once '../includes/config.php';
$use_carousel = false;
include_once '../includes/head.php';
?>
<div class="blog-space-background">
   <!-- barra navegacion -->
   <?php
   include_once '../includes/navbar.php';
   ?>
   <section class="blog-img-container">
      <img src="../images/fotos/blog/imagenes/blog.png" alt="Título blog">
   </section>
   <!-- Grid de posts -->
   <div class="posts-grid">
      <!-- Post con imagen -->
      <article class="post-card">
         <img src="../images/fotos/blog/imagenes/blog.png" alt="Mundial Star Park">
         <div class="post-content">
            <h2>El mundial también se siente en Star Park!</h2>
            <p>Reúnete en nuestra sede Star Park Neiva, y sumérgete en la emoción de Star Park y el mundial...</p>
            <div class="post-actions">
               <a href="#" class="read-more">Leer más</a>
            </div>
         </div>
      </article>

      <!-- Post con video -->
      <article class="post-card">
         <div class="video-container">
            <iframe src="VIDEO_URL" frameborder="0" allowfullscreen></iframe>
         </div>
         <div class="post-content">
            <h2>Nuevo Star Park C.C. Mayorca</h2>
            <p>Porque tú lo has pedido ahora nuestra diversión aterriza en CC Mayorca...</p>
            <div class="post-actions">
               <a href="#" class="read-more">Leer más</a>
            </div>
         </div>
      </article>

      <!-- Post con imagen -->
      <article class="post-card">
         <img src="../images/fotos/blog/imagenes/blog.png" alt="Mundial Star Park">
         <div class="post-content">
            <h2>El mundial también se siente en Star Park!</h2>
            <p>Reúnete en nuestra sede Star Park Neiva, y sumérgete en la emoción de Star Park y el mundial...</p>
            <div class="post-actions">
               <a href="#" class="read-more">Leer más</a>
            </div>
         </div>
      </article>

      <!-- Post con video -->
      <article class="post-card">
         <div class="video-container">
            <iframe src="VIDEO_URL" frameborder="0" allowfullscreen></iframe>
         </div>
         <div class="post-content">
            <h2>Nuevo Star Park C.C. Mayorca</h2>
            <p>Porque tú lo has pedido ahora nuestra diversión aterriza en CC Mayorca...</p>
            <div class="post-actions">
               <a href="#" class="read-more">Leer más</a>
            </div>
         </div>
      </article>
   </div>
</div>
<!-- Footer de la pagina -->
<?php
// Incluye el footer
include_once '../includes/footer.php';
?>