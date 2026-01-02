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
            <div class="descarga-imagen">
                <a href="<?php echo esc_url($download->get_download_link(array( 'ajax' => false))); ?>" rel="nofollow">
            <?php echo $thumbnail; ?>
</a>
            </div>
        <?php endif; ?>
        
    <?php endif; ?>
</div>