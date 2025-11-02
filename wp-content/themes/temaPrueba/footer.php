
<section id="footer">
   <div class="container">
      <div class="row">
         <div class="col-4 col-12-medium">
            <section>
               <!-- para llamar a las register_sidebar en functions.php -->
               <ul class="divided">
                     <?php
                     dynamic_sidebar('footer ultimas entradas');
                        ?>
               </ul>
            </section>
         </div>
         <div class="col-4 col-6-medium col-12-small">
            <section>
               <ul class="divided">
                  <?php
                        dynamic_sidebar('categorias');
                    ?>
               </ul>
            </section>
         </div>
         <div class="col-4 col-12-medium">
            <section >
               <header class="social-media-header">
                  <h2>Redes Sociales</h2>
               </header>
               <ul class="social">
                  <li>
                     <a class="icon fa-facebook" 
                        href="https://www.facebook.com/profile.php?id=100080465887995" target="_blank"
                        ><span class="label">Facebook</span></a
                     >
                  </li>
                  <li>
                     <a class="icon fa-instagram" href="https://www.instagram.com/scrap.lion/" target="_blank"
                        ><span class="label">Instagram</span></a
                     >
                  </li>
                  <li>
                    <a class="icon icon-tiktok" href="https://www.tiktok.com/@scrap.lion" target="_blank">
                       <span class="label">TikTok</span>
                       <img class="tiktok" src="<?php echo get_template_directory_uri();
                        ?>/images/tiktok1.svg" alt="TikTok" />
                    </a>
                  </li>
                  <li>
                     <a class="icon fa-youtube" href="https://www.youtube.com/@scraplion2758" target="_blank"
                        ><span class="label">YouTube</span></a
                     >
                  </li>
                  <li>
                    <a class="icon icon-twitch" href="https://www.twitch.tv/scraplion" target="_blank">
                       <span class="label">Twitch</span>
                       <img class="twitch" src="<?php echo get_template_directory_uri();
                        ?>/images/twitch.svg" alt="Twitch" />
                    </a>
                  </li>
               </ul>
            </section>
         </div>
         <div class="col-12">
            <!-- Copyright -->
            <div id="copyright">
               <ul class="links">
                  <li>Developed by  <a href='https://www.linkedin.com/in/skuetoDev/' target="_blank">
                     SkuetoDev.</a> 
                  </li>
                  <li></a>&copy;2025 
                     <a href='https://www.instagram.com/scrap.lion/' target="_blank">
                     Scraplion
                     </a>.All rights reserved.</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
</div>
<!-- para importar funciones desde functions.php -->
<?php wp_footer(); ?>


