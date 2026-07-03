<?php get_header('page'); ?>
      <!-- Main -->
      <section id="main" role="main">
         <div class="container">

            <!-- Content -->
            <article class="box post-404">
               <div>
                  <h2 class="title-404">404 - Página no encontrada</h2>
                  <img class="img-404" src="<?php echo get_template_directory_uri(); ?>/images/404.webp" alt="404 - Página no encontrada - Scraplion"/>
                  <p>Lo sentimos, la página que buscas no existe.</p>
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Volver al inicio</a>
               </div>
            </article>

         </div>
      </section>

      <!-- Footer -->
      <?php get_footer(); ?>