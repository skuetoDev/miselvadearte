<?php

/**
 * ============================================================
 * TAMAÑOS DE IMAGEN Y SOPORTE DEL TEMA
 * ============================================================
 */

// crea el tamaño de las imagenes
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(150, 150, true); //true para que la recorte
    add_image_size('category-thumb', 260, 260, true);
    add_image_size('category-thumb-blog', 535, 251, true);
    add_image_size('category-full', 783, 450, true);
    add_image_size('category-square', 500, 500, true);

    // Tamaño retina para el logo (2x de 300x270)
    add_image_size('logo-2x', 600, 540, true);
}

// Desactivar el tamaño "medium_large" (768px) que WordPress genera por defecto.
// Se ejecuta una sola vez: el if evita escrituras innecesarias en BD.
if (get_option('medium_large_size_w') != 0) {
    update_option('medium_large_size_w', 0);
    update_option('medium_large_size_h', 0);
}

// No incluir en srcset imágenes mayores de 600px de ancho
add_filter('max_srcset_image_width', function () {
    return 600;
});

// Fuerza la calidad de compresión WebP para TODOS los tamaños generados
// (thumbnail, medium, large, 1536, 2048, scaled...)
add_filter('wp_editor_set_quality', function ($quality, $mime_type) {
    if ($mime_type === 'image/webp') {
        return 60;
    }
    return $quality;
}, 10, 2);

// Logo (ID 730): servir la versión 300x270 como src y ofrecer la 600x540
// (logo-2x) solo para pantallas retina vía srcset.
add_filter('wp_content_img_tag', function ($filtered_image, $context, $attachment_id) {
    if ((int) $attachment_id !== 730) {
        return $filtered_image;
    }

    $src_300 = wp_get_attachment_image_url(730, 'medium');
    if (!$src_300) {
        return $filtered_image;
    }

    $srcset = $src_300 . ' 300w';

    // Añadir la versión retina solo si el tamaño intermedio existe de verdad
    // (wp_get_attachment_image_url hace fallback al original si no existe).
    $meta_2x = image_get_intermediate_size(730, 'logo-2x');
    if ($meta_2x && !empty($meta_2x['url'])) {
        $srcset .= ', ' . $meta_2x['url'] . ' 600w';
    }

    $filtered_image = preg_replace('/\ssrc="[^"]*"/', ' src="' . esc_url($src_300) . '"', $filtered_image);
    $filtered_image = preg_replace('/\ssrcset="[^"]*"/', ' srcset="' . esc_attr($srcset) . '"', $filtered_image);
    $filtered_image = preg_replace('/\ssizes="[^"]*"/', ' sizes="300px"', $filtered_image);

    return $filtered_image;
}, 10, 3);


/**
 * ============================================================
 * SCRIPTS Y ESTILOS DEL TEMA
 * ============================================================
 */

//hay que poner wp_head en el header.php para que esta funcion sirva.
function recursos()
{
    wp_enqueue_style('style', get_stylesheet_uri());

    //hay que poner wp_footer en el footer.php para que esta funcion sirvan.
    wp_enqueue_script(
        'dropotron',
        get_template_directory_uri() . '/assets/js/jquery.dropotron.min.js',
        array('jquery'),
        '3.3.1',
        true
    );
    wp_enqueue_script(
        'browser',
        get_template_directory_uri() . '/assets/js/browser.min.js',
        array('jquery'),
        '3.3.1',
        true
    );
    wp_enqueue_script(
        'breakpoints',
        get_template_directory_uri() . '/assets/js/breakpoints.min.js',
        array('jquery'),
        '3.3.1',
        true
    );
    wp_enqueue_script(
        'util',
        get_template_directory_uri() . '/assets/js/util.js',
        array('jquery'),
        '3.3.1',
        true
    );
    wp_enqueue_script(
        'main',
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        '3.3.1',
        true
    );
}
// phpcs:ignore PSR1.Files.SideEffects.FoundWithSymbols
add_action('wp_enqueue_scripts', 'recursos');


/**
 * ============================================================
 * MENÚS Y SIDEBARS
 * ============================================================
 */

// phpcs:ignore PSR1.Files.SideEffects.FoundWithSymbols
register_nav_menus(
    array(
        'principal' => 'Menu principal'
    )
);

// Activando el soporte para los sidebar
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'footer ultimas entradas'
    ));
    register_sidebar(array(
        'name' => 'categorias'
    ));
}


/**
 * ============================================================
 * CONTENIDO
 * ============================================================
 */

function custom_excerpt_length($length)
{
    return 25; // número de palabras que quieres mostrar
}
add_filter('excerpt_length', 'custom_excerpt_length');


/**
 * ============================================================
 * FUENTES (inline + preload)
 * ============================================================
 */

// fonts.css es tan pequeño (0,8 KiB) que se inserta inline en el <head>
// y así eliminamos una petición que bloquea el render.
function mis_fuentes_inline()
{
    $css = file_get_contents(get_template_directory() . '/assets/css/fonts.css');
    if ($css) {
        echo '<style id="mis-fonts">' . $css . '</style>' . "\n";
    }
}
add_action('wp_head', 'mis_fuentes_inline', 1);

// Precargar fuentes críticas e imagen hero
function mis_fuentes_preload()
{
    $uri = get_template_directory_uri();

    echo '<link rel="preload" href="' . $uri . '/images/jungle.webp" as="image" type="image/webp" fetchpriority="high">' . "\n";
    echo '<link rel="preload" href="' . $uri . '/assets/fonts/Raleway-Medium.woff2" as="font" type="font/woff2" crossorigin>' . "\n";
    echo '<link rel="preload" href="' . $uri . '/assets/fonts/Raleway-Bold.woff2" as="font" type="font/woff2" crossorigin>' . "\n";
    echo '<link rel="preload" href="' . $uri . '/assets/fonts/SansitaSwashed-Bold.woff2" as="font" type="font/woff2" crossorigin fetchpriority="high">' . "\n";
    echo '<link rel="preload" href="' . $uri . '/assets/fonts/SansitaSwashed-Medium.woff2" as="font" type="font/woff2" crossorigin>' . "\n";
}
add_action('wp_head', 'mis_fuentes_preload', -9999);


/**
 * ============================================================
 * JQUERY (footer + sin migrate)
 * ============================================================
 */

// Mover jQuery al footer para que no bloquee el render
add_action('wp_enqueue_scripts', function () {
    wp_scripts()->add_data('jquery', 'group', 1);
    wp_scripts()->add_data('jquery-core', 'group', 1);
    wp_scripts()->add_data('jquery-migrate', 'group', 1);
}, 999);

// Eliminar jQuery Migrate (no necesario en sitios modernos)
function quitar_jquery_migrate($scripts)
{
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff(
            $scripts->registered['jquery']->deps,
            array('jquery-migrate')
        );
    }
}
add_filter('wp_default_scripts', 'quitar_jquery_migrate');


/**
 * ============================================================
 * LIMPIEZA DEL HEAD Y PLUGINS
 * ============================================================
 */

// Favicon canónico desde la raíz del dominio
add_action('wp_head', function () {
    echo '<link rel="icon" href="' . esc_url(home_url('/favicon.ico')) . '" type="image/x-icon">' . "\n";
    echo '<link rel="shortcut icon" href="' . esc_url(home_url('/favicon.ico')) . '" type="image/x-icon">' . "\n";
}, 0);
remove_action('wp_head', 'wp_site_icon', 99);

// Bloquear Google Tag (gtag.js) - no usado, guardado en BD de produccion
add_action('template_redirect', function () {
    if (is_admin()) {
        return;
    }
    ob_start(function ($html) {
        // Eliminar el script externo de googletagmanager
        $html = preg_replace(
            '/<script\b[^>]*src=["\'][^"\']*googletagmanager\.com[^"\']*["\'][^>]*>\s*<\/script>/i',
            '',
            $html
        );
        // Eliminar el snippet inline de configuracion de gtag (dataLayer)
        $html = preg_replace(
            '/<script\b[^>]*>\s*window\.dataLayer\s*=[\s\S]*?<\/script>/i',
            '',
            $html
        );
        return $html;
    });
});

// eliminar estilos de bloques Gutenberg que no usas en un tema clásico
add_action('wp_enqueue_scripts', function () {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('global-styles');
}, 100);

// Download Monitor: cargar sus assets solo donde se usan.
// AJUSTA la condición a las páginas donde SÍ uses Download Monitor.
add_action('wp_enqueue_scripts', function () {
    if (!is_page('descargas') && !is_singular('dlm_download')) {
        wp_dequeue_style('dlm-frontend-general');
        wp_dequeue_script('dlm-xhr');
    }
}, 200);

