<?php
require_once 'instagram_config.php';

function getInstagramEmbed($url) {
    $api_url = 'https://graph.facebook.com/v12.0/instagram_oembed';
    $params = array(
        'url' => $url,
        'access_token' => FB_APP_ID . '|' . FB_APP_SECRET,
        'maxwidth' => 320,
        'hidecaption' => false
    );
    
    $url = $api_url . '?' . http_build_query($params);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    if ($response) {
        $data = json_decode($response);
        return $data->html ?? '';
    }
    
    return '';
}
?>

<section class="novedades">
    <h2>Novedades</h2>
    <div class="instagram-feed">
        <?php
        // Array de URLs de Instagram que quieres mostrar
        $instagram_posts = [
            'https://www.instagram.com/reel/TU_ID_DEL_POST/',
            'https://www.instagram.com/p/TU_ID_DEL_POST/',
            // Agrega más URLs según necesites
        ];

        foreach($instagram_posts as $post) {
            echo '<div class="instagram-post">';
            echo getInstagramEmbed($post);
            echo '</div>';
        }
        ?>
    </div>
</section>

<style>
.novedades {
    background: rgba(0, 0, 0, 0.3);
    border-radius: 15px;
    padding: 30px;
    margin: 20px auto;
    max-width: 1200px;
}

.novedades h2 {
    color: #00f7ff;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 30px;
    text-align: center;
}

.instagram-feed {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 30px;
    justify-content: center;
}

.instagram-post {
    background: rgba(0, 0, 0, 0.4);
    border-radius: 15px;
    padding: 15px;
    transition: transform 0.3s ease;
}

.instagram-post:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 247, 255, 0.3);
}

/* Estilos responsivos */
@media (max-width: 768px) {
    .instagram-feed {
        grid-template-columns: 1fr;
    }
}
</style>