<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
      <head>
         <title><?php echo bloginfo('name'); ?></title>
         <meta charset="<?php bloginfo('charset'); ?>"/>
         <meta name="viewport" content="width=device-width, initial-scale=1"/>

         <?php $fonts = get_template_directory_uri() . '/assets/fonts'; ?>
         <?php $img = get_template_directory_uri() . '/images'; ?>

         <!-- Preload del fondo del header (LCP): cada dispositivo descarga SOLO su versión -->
         <link rel="preload" href="<?php echo $img; ?>/jungle-mobile.webp" as="image" type="image/webp" fetchpriority="high" media="(max-width: 1023px)">
         <link rel="preload" href="<?php echo $img; ?>/jungle.webp" as="image" type="image/webp" fetchpriority="high" media="(min-width: 1024px)">

         <!-- Preload de fuentes críticas (las URLs coinciden 1:1 con los @font-face de abajo) -->
         <link rel="preload" href="<?php echo $fonts; ?>/SansitaSwashed-Bold.woff2" as="font" type="font/woff2" crossorigin>
         <link rel="preload" href="<?php echo $fonts; ?>/Raleway-Medium.woff2" as="font" type="font/woff2" crossorigin>
         <link rel="preload" href="<?php echo $fonts; ?>/Raleway-Bold.woff2" as="font" type="font/woff2" crossorigin>
         <link rel="preload" href="<?php echo $fonts; ?>/SansitaSwashed-Medium.woff2" as="font" type="font/woff2" crossorigin>

         <!-- Favicons (archivos en la raíz del dominio) -->
         <link rel="icon" type="image/png" href="<?php echo esc_url(home_url('/favicon-96x96.png')); ?>" sizes="96x96">
         <link rel="icon" type="image/svg+xml" href="<?php echo esc_url(home_url('/favicon.svg')); ?>">
         <link rel="shortcut icon" href="<?php echo esc_url(home_url('/favicon.ico')); ?>">
         <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(home_url('/apple-touch-icon.png')); ?>">
         <link rel="manifest" href="<?php echo esc_url(home_url('/site.webmanifest')); ?>">

         <!-- Declaración de fuentes inline: 0 peticiones CSS bloqueantes. -->
         <style id="mis-fonts">
            @font-face {
               font-family: 'Raleway';
               src: url('<?php echo $fonts; ?>/Raleway-Medium.woff2') format('woff2');
               font-weight: 100 500;
               font-style: normal;
               font-display: swap;
            }
            @font-face {
               font-family: 'Raleway';
               src: url('<?php echo $fonts; ?>/Raleway-Bold.woff2') format('woff2');
               font-weight: 501 900;
               font-style: normal;
               font-display: swap;
            }
            @font-face {
               font-family: 'Sansita Swashed';
               src: url('<?php echo $fonts; ?>/SansitaSwashed-Medium.woff2') format('woff2');
               font-weight: 100 500;
               font-style: normal;
               font-display: swap;
            }
            @font-face {
               font-family: 'Sansita Swashed';
               src: url('<?php echo $fonts; ?>/SansitaSwashed-Bold.woff2') format('woff2');
               font-weight: 501 900;
               font-style: normal;
               font-display: swap;
            }
         </style>

         <!-- para importar estilos desde functions.php -->
         <?php wp_head(); ?>
      </head>
      <body <?php body_class('is-preload'); ?>>
      <div id="page-wrapper">
         <!-- Header -->
         <section id="header">
            <!-- Logo -->
            <a class="main-title" href="<?php echo home_url(); ?>"><?php echo bloginfo('name'); ?></a><br>
            <span class="second-title"><?php echo bloginfo('description'); ?></span>
               <!-- Nav -->
               <?php
                  $arg = array(
                     'theme_location' => 'principal',
                     'container' => 'nav',
                     'container_id' => 'nav'
                  );
                  wp_nav_menu($arg);
                     ?>
         </section>