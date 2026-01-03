<?php

/**
 * Plantilla personalizada para Download Monitor
 * Muestra imagen y enlace de descarga
 */

if (! defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

/** @var DLM_Download $download */
?>

<div class="descarga-personalizada">
    <?php if ($download->has_version()) :?>
        <?php

        // Obtener la imagen destacada si existe
        $thumbnail = get_the_post_thumbnail($download->get_id(), 'medium', array( 'class' => 'imagen-descarga'));
        ?>
        
        <?php if ($thumbnail) : ?>
            <div class="descarga-simple">
            <?php if ($download->has_version()) :?>
        <a href="<?php $download->the_download_link(); ?>" rel="nofollow" class="enlace-descarga-imagen"><?php
            // Mostrar imagen destacada
        if (has_post_thumbnail($download->get_id())) {
                echo get_the_post_thumbnail($download->get_id(), 'large', array(
                    'class' => 'imagen-para-descargar',
                    'alt' => 'Descargar ' . $download->get_title()
                ));
        }
        ?>
        </a>
        
            <?php endif; ?>
</div>
        <?php endif; ?>
        
    <?php endif; ?>
</div>