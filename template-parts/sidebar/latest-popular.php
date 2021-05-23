<?php
/**
 * Site Branding
 *
 * @version 1.0
 * @package Dynamico
 */
global $ctpress;
?>

<div class="tabs-container p-t-10" style="height: 410px;">
   <div class="tabs-wrapper">
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-latest-tab" data-bs-toggle="tab" data-bs-target="#nav-latest" type="button" role="tab" aria-controls="nav-latest" aria-selected="true">Latest</button>
          <button class="nav-link" id="nav-popular-tab" data-bs-toggle="tab" data-bs-target="#nav-popular" type="button" role="tab" aria-controls="nav-popular" aria-selected="false">Popular</button>
        </div>
      </nav> 
      <div class="tab-content" style="overflow: scroll; height: 345px" id="nav-tabContent">
         <div role="tabpanel" class="tab-pane fade show active" id="nav-latest">
            <div class="most-viewed" id="latest">
               <div class="row mobile_list_simple ">
                  <ul class="list-group list-group-flush">
                  <?php 
                  $latest_article= new WP_Query(array(
                     'post_type'    =>'post',
                     'posts_per_page'=>25,
                     'category__in' => $ctpress['latestpostcat']
                  ));
                  while( $latest_article->have_posts() ) : $latest_article->the_post(); 
                  ?>
                      <li class="list-group-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    
                  <?php endwhile; ?>
                  </ul>

               </div>
            </div>
         </div>
         <div role="tabpanel" class="tab-pane fade" id="nav-popular">
            <div class="most-viewed" id="most-today">
               <div class="row mobile_list_simple ">
                <ul class="list-group list-group-flush">
                  <?php 
                     $popular_article= new WP_Query(array(
                        'post_type'    =>'post',
                        'posts_per_page'=>25,
                        'meta_key' => 'post_views_count', 
                        'orderby' => 'meta_value_num', 
                        'order' => 'DESC', 
                        'category__in'=>$ctpress['popularpostcat']
                     ));
                     while($popular_article->have_posts()) : $popular_article->the_post(); 
                  ?>
                  <li class="list-group-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                  <?php endwhile; ?>    
                  </ul>                                
               </div>
            </div>
         </div>
      </div>
   </div>
</div>