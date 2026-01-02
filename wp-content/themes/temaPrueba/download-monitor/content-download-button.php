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
                <a href="<?php $download->the_download_link(); ?>" rel="nofollow">
                    <?php echo $thumbnail; ?>
                </a>
            </div>
        <?php endif; ?>
        
        <div>
            <p>
                Haz clic en la imagen para descargarla <br>
                <span class="titulo-descarga"><?php $download->the_title(); ?></span>.
                <span class="formato-descarga"><?php echo esc_html($download->get_version()->get_filetype()); ?></span>
                <span class="tamano-descarga"><?php echo esc_html($download->get_version()->get_filesize_formatted());
                ?></span>
            </p>                            
        </div>
        
    <?php endif; ?>
</div>