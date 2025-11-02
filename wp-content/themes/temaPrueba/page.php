<?php get_header('page'); ?> 
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
                  <header>
                     <h2><?php the_content(); ?></h2>
                  </header>
                    <?php
                    if (has_post_thumbnail()) {
                           the_post_thumbnail('category-square');
                    }
                    ?>   
               </article>
                  </a>
                    <?php
                endwhile;
            endif;
            ?>
         </div>
      </section>

      <!-- Footer -->
      <?php get_footer(); ?>
