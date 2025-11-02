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
                  <h2><?php the_title(); ?></h2>
               </header>
                    <?php echo do_shortcode('[metaslider id="176"]'); ?>
                    <?php the_content(); ?>
            </article>
                    <?php
                endwhile;
            endif;
            ?>
      </div>
   </section>

   <!-- Footer -->
   <?php get_footer(); ?>