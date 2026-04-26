<?php

//hay que poner wp_head en el header.php para que esta funcion sirva.
function recursos()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    //wp_enqueue_script($manejador,fuente);
    //hay que poner wp_footer en el footer.php para que esta funcion sirvan.
    wp_enqueue_script(
        'dropotron',
        get_template_directory_uri() . '/assets/js/jquery.dropotron.min.js',
        array('jquery'),
        '3.3.1',
        true
    );
    //wp_enqueue_script($manejador,$fuente);
    //$en_footer
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

// phpcs:ignore PSR1.Files.SideEffects.FoundWithSymbols
register_nav_menus(
    array(
      'principal' => 'Menu principal'
    )
);

// crea el tamaño de las imagenes

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(150, 150, true); //true para que la recorte
    add_image_size('category-thumb', 260, 260, true);
    add_image_size('category-thumb-blog', 535, 251, true);
    add_image_size('category-full', 783, 450, true);
    add_image_size('category-square', 500, 500, true);
}

// Activando el soporte para los sidebar

if (function_exists('register_sidebar')) {
       /**
        * Creates a sidebar
        * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
        */
        // $args = array(
        //     'name'          => __( 'Ultimas Entradas Footer'),
        //     'id'            => 'ultimas_entradas_footer',
        //     'description'   => '',
        //     'class'         => '',
        //     'before_widget' => '',
        //     'after_widget'  => '',
        //     'before_title'  => '',
        //     'after_title'   => ''
        // );
        // register_sidebar( $args );
       register_sidebar(array(
            'name' => 'footer ultimas entradas'
            ));
       register_sidebar(array(
            'name' => 'categorias'
            ));
}



function custom_excerpt_length($length)
{
    return 25; // número de palabras que quieres mostrar
}
add_filter('excerpt_length', 'custom_excerpt_length');


// Precargar fuentes críticas
function mis_fuentes_css()
{
    wp_enqueue_style(
        'mis-fonts',
        get_template_directory_uri() . '/assets/css/fonts.css',
        [],
        null
    );
}
add_action('wp_enqueue_scripts', 'mis_fuentes_css', 1);


function mis_fuentes_preload()
{
    $uri = get_template_directory_uri();

    echo '<link rel="preload" href="' . $uri . '/images/jungle.webp" as="image" type="image/webp" fetchpriority="high" media="(min-width: 1024px)">' . "\n";
    echo '<link rel="preload" href="' . $uri . '/assets/fonts/Raleway-Medium.woff2" as="font" type="font/woff2" crossorigin>' . "\n";
    echo '<link rel="preload" href="' . $uri . '/assets/fonts/Raleway-Bold.woff2" as="font" type="font/woff2" crossorigin>' . "\n";
    echo '<link rel="preload" href="' . $uri . '/assets/fonts/SansitaSwashed-Medium.woff2" as="font" type="font/woff2" crossorigin fetchpriority="high">' . "\n";
    echo '<link rel="preload" href="' . $uri . '/assets/fonts/SansitaSwashed-Bold.woff2" as="font" type="font/woff2" crossorigin>' . "\n";
}
add_action('wp_head', 'mis_fuentes_preload', -9999);

// Mover jQuery al footer para que no bloquee el render
add_action('wp_enqueue_scripts', function() {
    wp_scripts()->add_data('jquery', 'group', 1);
    wp_scripts()->add_data('jquery-core', 'group', 1);
    wp_scripts()->add_data('jquery-migrate', 'group', 1);
}, 999);

// eliminar estilos de bloques Gutenberg que no usas en un tema clásico
add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'global-styles' );
}, 100 );



// Forzar que el logo (ID 730) sirva solo la versión 300x270 en el contenido
add_filter('wp_content_img_tag', function($filtered_image, $context, $attachment_id) {
    if ((int) $attachment_id !== 730) {
        return $filtered_image;
    }
    $src_300 = wp_get_upload_dir()['baseurl'] . '/logo3-300x270.webp';
    $filtered_image = preg_replace('/\ssrc="[^"]*"/', ' src="' . $src_300 . '"', $filtered_image);
    $filtered_image = preg_replace('/\ssrcset="[^"]*"/', ' srcset="' . $src_300 . ' 300w"', $filtered_image);
    $filtered_image = preg_replace('/\ssizes="[^"]*"/', ' sizes="300px"', $filtered_image);
    return $filtered_image;
}, 10, 3);