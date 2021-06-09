<?php
defined( 'ABSPATH' ) || exit;
/**
 * The page template file.
 * @package bengal
 */
get_header(); 
global $ctpress; 

?>
      </header>

      <main class="page_main_wrapper mb-5">

         <?php get_template_part( 'template-parts/breadcrumb/single', 'page' ); ?>
         
         <div class="container">
            <div class="row">
                  <?php 
                     if ( have_posts() ) : 
                        while (have_posts()) : 
                           the_post();
                           switch ( $ctpress['page-screen'] ) {
                              case '1':
                                 get_template_part( 'template-parts/page/right', 'sidebar' );
                                 break;
                              case '2':
                                 get_template_part( 'template-parts/page/left', 'sidebar' );
                                 break;
                              case '3':
                                 get_template_part( 'template-parts/page/no', 'sidebar' );
                                 break;
                              case '4':
                                 get_template_part( 'template-parts/page/fullwidth' );
                                 break;
                              
                              default:
                                 echo "string";
                                 break;
                           }
                           
                        endwhile; 
                     else :
                        get_template_part( 'template-parts/content/no', 'content' );
                     endif; 
                  ?>
            </div>
         </div>
        
      </main>

<?php get_footer(); ?>
<script>
   jQuery('.img-layer-thumb').css('width',jQuery(".rounded")[0].clientWidth);
</script>
