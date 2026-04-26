<?php get_header('page'); ?>
   <body class="no-sidebar is-preload">
      <!-- Main -->
      <section id="main" role="main">
         <div class="container">

            <!-- Content -->
            <article class="box post">
               <div class="post-content" style="text-align: center; padding: 60px 20px;">
                  <h1>404 - Página no encontrada</h1>
                  <img class="img-404" src="<?php echo get_template_directory_uri(); ?>/images/404.webp" alt="404 - Página no encontrada - Scraplion"/>
                  <p>Lo sentimos, la página que buscas no existe.</p>
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Volver al inicio</a>
               </div>
            </article>

         </div>
      </section>

      <!-- Footer -->
      <?php get_footer(); ?>