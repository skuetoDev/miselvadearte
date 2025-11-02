<?php get_header('page'); ?> <!-- header -->

<!-- Main -->
<div id="main-wrapper">
   <div class="container">
      <div class="row">
            <div class="12u">
               <!-- Portfolio -->
                  <section>
                        <header class="major">
                           <h2>
                              <?php
                                if (is_category()) {
                                    single_cat_title();
                                } else {
                                    echo wp_get_document_title();
                                }
                                ?>
                           </h2>
                        </header>
                        <div class="row">
                        <?php $id_categoria = get_query_var('cat');?>
                              <?php
                                query_posts(array(
                                    "showposts" => 6,
                                    "category__in" => $id_categoria
                                    ));
                                ?>
                           <?php if (have_posts()) :
                                while (have_posts()) :
                                    the_post(); ?>
                           <div class="col-4 col-6-medium col-12-small">
                              <!-- post -->
                              <section class="box-index">
                                       <?php
                                       // check if the post has a Post Thumbnail assigned to it.
                                        if (has_post_thumbnail()) {
                                            the_post_thumbnail('category-thumb');
                                        }
                                        ?>
                                    <header>
                                       <h3><?php the_title(); ?></h3>
                                    </header>
                                    <?php the_excerpt(); ?>
                                    <footer>
                                       <a href="<?php the_permalink(); ?>"
                                       class="button alt">Leer Más</a>
                                    </footer>
                              </section>
                           </div>
                                <?php endwhile; ?>
                           <!-- post navigation -->
                           <?php else : ?>
                           <!-- no posts found -->
                           <p>Ups!! no existe nada para esta categoria</p>
                           <?php endif; ?>
                           <?php wp_reset_query(); ?>
                        </div>
                  </section>
            </div>
      </div>
   </div>
</div>

<?php get_footer(); ?>