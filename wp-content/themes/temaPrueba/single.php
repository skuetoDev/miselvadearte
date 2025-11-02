<?php get_header("page"); ?> 
   <body class="no-sidebar is-preload">
      <!-- Main -->
      <section id="main">
         <div class="container">

            <!-- Content -->
            <?php
            if (have_posts()) :
                while (have_posts()) :
                     the_post();
                    ?>
               <article class="box post">
                  <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>                   
                  <h3><?php the_time('j F , Y'); ?></h3>
                  <footer class="comentarios">
                        <?php comments_template(); ?>
                    </footer>
               </article>
                    <?php
                endwhile;
            endif;
            ?>
         </div>
      </section>

      <!-- Footer -->
      <?php get_footer(); ?>
</body>
</html>
