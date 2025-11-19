<!DOCTYPE HTML>
<!--
    Dopetrope by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html <?php language_attributes(); ?>>
      <head>
        <title><?php echo bloginfo('name'); ?></title>
        <meta charset="<?php bloginfo('charset'); ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
        <!-- para importar estilos desde functions.php -->
        <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon"/>
        <?php wp_head(); ?>
      </head>
      <div id="page-wrapper">
         <!-- Header -->
         <section id="header">
            <!-- Logo -->
            <h1><a href="<?php echo home_url(); ?>"><?php echo bloginfo('name'); ?></a></h1>
            <h2><?php echo bloginfo('description'); ?></h2>
               <!-- Nav -->
               <section id="nav">
                  <?php
                     $arg = array(
                        'theme_location' => 'principal',
                        'container' => 'nav',
                        'container_id' => 'nav'
                     );
                     wp_nav_menu($arg);
                        ?>
               </section>
            </section>
         </div>