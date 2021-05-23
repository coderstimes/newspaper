<?php
defined( 'ABSPATH' ) || exit;
/**
 * The main template file.
 * @package bengal
 */
get_header(); 
global $tdc;

$category = get_queried_object();

?>

<nav class="navbar navbar-default navbar-subcat hidden-sm hidden-xs">
   <div class="container no-padding">
      <div class="no-padding" id="navbar-menu">
         <ul class="nav navbar-nav navbar-left" data-in="" data-out="">
            <li class="cat_name">
                <a href="<?php echo get_category_link($category->cat_ID);?>"><?php echo $category->name;?></a>
            </li>
            
         </ul>
      </div>
   </div>
</nav>
<nav class="navbar navbar-default navbar-subcat nav-subcat-mobile">
   <div class="container no-padding">
      <div class="no-padding" id="navbar-menu">
         <ul class="nav navbar-nav navbar-left" data-in="" data-out="">
            <li class="cat_name" style="position: absolute; z-index: 1">
               <a href="<?php echo get_category_link($category->cat_ID);?>"> <?php echo $category->name;?> </a>
            </li>

         </ul>
      </div>
   </div>
</nav>


      </header>

   <main class="page_main_wrapper">

      <div class="container"></div>
      <div class="container p-b-20 br-bottom">
         <div class="row two-col-layout">
            <div class="col-left br-right hide-section-title p-t-20 category-news">
               <div class="row p-r-20 p-20">

                <?php 
                      $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                      $cat_news_id = [];

                      $cat_page = new WP_Query(array(
                           'post_type'=>'post',
                           'posts_per_page'=>5,
                           'category__in'  => $category->cat_ID,
                           'paged'         => $paged
                       ));
                      if ( $cat_page->have_posts() ) :
                ?>

                  <div class="col-xs-12 col-sm-12 p-t-10">

                    <?php 
                    while($cat_page->have_posts()) : $cat_page->the_post();
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
                                    <p class="brief m-b-10 p-b-10"> <?php echo  more_content(30); ?> </p>
                                    <a href="<?php the_permalink();?>"> 
                                       <button style="font-size: 18px;font-weight: bold;width: 200px;" type="button" class="readmore btn btn-warning pull-right m-b-10"> Read more </button>
                                    </a>
                                    
                                 </div>
                              </div>
                           </a>
                        <?php endwhile; ?>
                  </div>

                   <div class="col-xs-12">
                        <div class="pagination_links">
                           <nav class="pagination">
                              <?php 

                            if ( $cat_page->max_num_pages > 1 ) {
                                echo paginate_links( array(
                                        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                                        'total'        => $cat_page->max_num_pages,
                                        'current'      => $paged,
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

                     <?php wp_reset_postdata();  endif; ?>



               </div>
               
               
            </div>
            <div class="col-right no-padding">
               <div class="col-xs-12">
                  <div class="p-t-20">
                     <div class="row video">
                        <div class="col-xs-12 p-t-20">
                           <div class="code_custom p-t-10">
                              <ins data-purplepatch-slotid="11" data-purplepatch-id="53126d71827fcba70ff68055b9a73ca1"></ins>
                           </div>
                        </div>
                        <div class="col-xs-12 p-t-20">
                           <div class="code_custom">
                              <ins data-purplepatch-slotid="11" data-purplepatch-id="53126d71827fcba70ff68055b9a73ca1"></ins>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="section-title">
                     <h3> <?php echo $category->name; ?> videos </h3>
                  </div>
                  <div class="br-bottom">

                     <?php 
                        $cat_video_news = new WP_Query(array(
                           'post_type'    =>'post',
                           'posts_per_page'=>2,
                           'meta_key' => 'post_views_count', 
                           'orderby' => 'meta_value_num', 
                           'order' => 'DESC', 
                           'category__in'=>$category->cat_ID
                        ));
                        while($cat_video_news->have_posts()) : 
                           $cat_video_news->the_post(); 
                     ?>

                     <div class="row video">
                        <div class="col-xs-12 p-t-10">
                           <a class="post-item" href="<?php the_permalink(); ?>">
                              <figure class="img-holder">
                                 <?php the_post_thumbnail('', ['class' => 'img-responsive category_img', 'title' => get_the_title(),'alt' => get_the_title() ]); ?>
                                 <div class="link-icon"><i class="fa fa-play"></i></div>
                              </figure>
                              <div class="p-b-10">
                                 <div class="title-holder p-t-10">
                                    <h3 class="post-title no-margin p-b-10">
                                       <?php the_title(); ?>
                                    </h3>
                                 </div>
                              </div>
                           </a>
                        </div>
                     </div>

                     <?php endwhile; ?>

                     
                  </div>
               </div>
               <div class="col-xs-12">
                   <!-- add space -->
               </div>
               <div class="col-xs-12">
                  <div class="section-title">
                     <h3 class="text-danger"> Popular Article of <?php echo $category->name; ?> </h3>
                  </div>

                  <div class="row mobile_list_simple ">

                     <?php
                        $popular_first = 1;
                        $cat_popular_news = new WP_Query(array(
                           'post_type'    =>'post',
                           'posts_per_page'=>6,
                           'meta_key' => 'post_views_count', 
                           'orderby' => 'meta_value_num', 
                           'order' => 'DESC', 
                           'category__in'=>$category->cat_ID
                        ));
                        while($cat_popular_news->have_posts()) : 
                           $cat_popular_news->the_post(); 
                     ?>
                     <div class="col-xs-12 p-t-10 p-b-10 br-bottom item">
                        <a href="<?php the_permalink(); ?>">
                           <?php if( $popular_first ): $popular_first = 0; ?>

                              <figure class="img-holder">
                                 <?php the_post_thumbnail('', ['class' => 'img-responsive category_img', 'title' => get_the_title(),'alt' => get_the_title() ]); ?>
                              </figure>
                              <div class="p-b-10">
                                 <div class="title-holder p-t-10">
                                    <h3 class="post-title no-margin p-b-10">
                                       <?php the_title(); ?>
                                    </h3>
                                    <p class="brief">
                                       <?php echo  more_content(200); ?>
                                    </p>
                                 </div>
                              </div>
                           <?php else: ?>
                           <div class="title-holder">
                              <h3 class="post-title no-margin">
                                 <?php the_title(); ?>
                              </h3>
                           </div>  
                           <?php endif; ?>                         
                        </a>
                     </div>
                     <?php endwhile; ?>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>

<?php get_footer(); ?>

