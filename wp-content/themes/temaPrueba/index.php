<!DOCTYPE HTML>
<!--
    Dopetrope by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html <?php language_attributes(); ?>>
   
   <?php get_header('page'); ?> 
   <body class="homepage is-preload">
      <div id="page-wrapper">
         <!-- Header -->
         <!-- Main -->
         <section id="main">
            <div class="container">
               <div class="row">
                  <?php
                     // Obtener todas las categorías (puedes excluir las vacías si quieres)
                     $categories = get_categories(array(
                     'hide_empty' => false, // ponlo en true si no quieres categorías vacías
                     ));

                     if (!empty($categories)) :
                         foreach ($categories as $category) :
                        // Obtener la última entrada de esa categoría (opcional)
                             $latest_post = new WP_Query(array(
                             'posts_per_page' => 1,
                             'cat' => $category->term_id
                             ));
                                ?>
                        <div class="col-4 col-6-medium col-12-small">
                           <section class="box-index">
                             <?php
                           // Mostrar imagen destacada del último post de la categoría (si existe)
                                if ($latest_post->have_posts()) :
                                    while ($latest_post->have_posts()) :
                                        $latest_post->the_post();
                                        if (has_post_thumbnail()) {
                                            the_post_thumbnail('category-thumb');
                                        }
                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                                ?>
                           <header>
                              <!-- Nombre de la categoría con enlace -->
                              <h3>
                                 <?php echo esc_html($category->name); ?>                               
                              </h3>
                           </header>
                           <!-- Descripción de la categoría -->
                             <?php if (!empty($category->description)) : ?>
                              <p><?php echo esc_html($category->description); ?></p>
                             <?php endif; ?>

                           <footer>
                              <a href="<?php echo esc_url(get_category_link($category->term_id));
                                ?>" class="button alt">
                                 Ver publicaciones
                              </a>
                           </footer>
                           </section>
                        </div>
                             <?php
                         endforeach;
                     else :
                         echo '<p>No hay categorías disponibles.</p>';
                     endif;
                        ?>
               </div>
            </div>
         </section>
         <?php get_footer(); ?>
      </div>
   </body>
</html>

