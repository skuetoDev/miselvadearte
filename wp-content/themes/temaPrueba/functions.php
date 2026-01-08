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

// para añadir la fuentes/iconos del tema
function add_fontawesome()
{
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css');
}
add_action('wp_enqueue_scripts', 'add_fontawesome');

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

    echo '<link rel="preload" href="' . $uri . '/assets/fonts/Raleway-Medium.woff2" as="font" type="font/woff2" crossorigin>' . "\n";
    echo '<link rel="preload" href="' . $uri . '/assets/fonts/Raleway-Bold.woff2" as="font" type="font/woff2" crossorigin>' . "\n";
    echo '<link rel="preload" href="' . $uri . '/assets/fonts/SansitaSwashed-Medium.woff2" as="font" type="font/woff2" crossorigin>' . "\n";
    echo '<link rel="preload" href="' . $uri . '/assets/fonts/SansitaSwashed-Bold.woff2" as="font" type="font/woff2" crossorigin>' . "\n";
}
add_action('wp_head', 'mis_fuentes_preload', -9999);
