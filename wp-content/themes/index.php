<!doctype html>
<html lang="es">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Tema Prueba</title>
   <link rel="stylesheet" href="<?php bloginfo("stylesheet_url"); ?>">
</head>
<body>
   <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            ?>
           <h2 class="tittle"><?php the_title(); ?></h2>
           <div class="paragraph"><?php the_content(); ?></div>
            <?php
        endwhile;
    endif;
    ?>
</body>
</html>
