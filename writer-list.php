<?php
defined( 'ABSPATH' ) || exit;
/**
 * The main template file.
 * @package bengal
 * Template Name: Author
 */
get_header(); 
global $tdc;

$img_size = 'medium';
$category = get_queried_object();

?>

</header>

   <main class="page_main_wrapper">

      <div class="container"></div>
      <div class="container p-b-20 br-bottom">
         <div class="row two-col-layout">
            <div class="col-left br-right hide-section-title p-t-20 category-news">
               <div class="row p-r-20 p-20">

                <?php if (have_posts()) : ?>
                  <div class="col-xs-12 col-sm-12 p-t-10">

                    <?php 
                      while(have_posts()) : the_post();
                        $cat_news_id[] = get_the_ID();
                    ?>                           
                    <a class="post-item" href="<?php the_permalink(); ?>">
                        <figure class="img-holder">
                           <?php the_post_thumbnail('', ['class' => 'img-responsive category_img', 'title' => get_the_title(),'alt' => get_the_title() ]); ?>
                           
                        </figure>
                        <div class="p-b-10 p-t-10 m-t-10" style="margin-bottom: 70px;">
                           <div class="title-holder p-t-10">
                              <h2 class="post-title no-margin p-b-10">
                                 <strong><?php the_title(); ?></strong>
                              </h2>
                              <p class="brief m-b-10 p-b-10"> <?php the_content(); ?> </p>                              
                           </div>
                        </div>
                    </a>
                    <?php endwhile; ?>
                        
                  </div>

                   <div class="col-xs-12">
                      <div class="pagination_links">
                        <nav class="pagination">
                          <?php 

                            global $wp_query;

                            if ( $wp_query->max_num_pages > 1 ) 
                            {
                                echo paginate_links( array(
                                        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                                        'total'        => $wp_query->max_num_pages,
                                        'current'      => max(1,get_query_var('paged')),
                                        'format'       => '?paged=%#%',
                                        'show_all'     => false,
                                        'type'         => 'list',
                                        'end_size'     => 2,
                                        'mid_size'     => 1,
                                        'prev_next'    => true,
                                        'add_args'     => false,
                                        'add_fragment' => '',
                                    ) );
                            }
                              
                          ?>
                           </nav>
                        </div>
                     </div>

                     <?php wp_reset_postdata(); endif;  ?>
               </div>              
               
            </div>
            
         </div>
      </div>
   </main>
      
<?php get_footer(); ?>