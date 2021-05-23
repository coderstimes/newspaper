<?php
defined( 'ABSPATH' ) || exit;
/**
 * The page template file.
 * @package bengal
 */
get_header(); 
global $tdc;

?>
      </header>

      <main class="page_main_wrapper">
         <div class="container"></div>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="top-large-ad p-t-10 hidden-md-down">
                      
                  </div>
               </div>
            </div>
         </div>
         <div class="container">
            <ul class="breadcrumb">
               <li class="breadcrumb-item"> <a href="#"> <i class="fa fa-home"></i>&nbsp; </a></li>
               <?php 
                  $categories = get_the_category();
                  foreach ($categories as $category ) {
                     echo sprintf('<li class="breadcrumb-item"> <a href="%s"> %s </a></li>', get_category_link( $category->cat_ID ), $category->name );
                  }
               ?>
               <li class="breadcrumb-item"> 
                  <a href="#"> <?php echo the_title(); ?> </a> 
               </li>
               
            </ul>
         </div>
         <div class="container">
            <div class="row three-col-layout p-b-20 no-margin">
               <?php 
                        if (have_posts()) : 
                           while (have_posts()) : 
                              the_post();
                              setPostViews(get_the_ID()); 
                      ?>
               <div class="col-left col-left hidden-xs hidden-sm p-t-20">
                  <div class="post-metas">
                     <div class="items bg-grey edited-item">
                        <div class="item">

                           <time datetime="<?php echo  get_the_date('c'); ?>" itemprop="datePublished"><?php echo date('d F, Y | m:s a', get_post_time()); ?></time>
                           
                        </div>
                        <div class="item">
                           <div class="author_name">

                             <?php 
                              $post_author_id = get_the_author_meta( 'ID' );
                              $author         = get_the_author_meta('nickname');
                             ?>

                             <a href="<?php echo  esc_url( get_author_posts_url( $post_author_id ) ); ?>" title="<?php echo  esc_attr( $author ); ?>">
                                 <?php echo ucwords($author); ?>                                 
                              </a>

                           </div>
                        </div>
                        <div class="item hidden">
                           <ul>
                              <li class="incFont">
                                 A
                              </li>
                              <li class="decFont">
                                 a
                              </li>
                           </ul>
                        </div>
                        <div class="item">
                           <div class="fb-save-btn">
                               <div class="fb-save" data-uri="<?php the_permalink()?>" data-size="large"></div>
                           </div>
                        </div>
                        <div class="item">
                           <div class="fb-share-button" data-href="<?php the_permalink()?>" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" class="fb-xfbml-parse-ignore">Share</a></div>
                        </div>
                        
                     </div>
                  </div>
               </div>
               <div class="col-middle p-10">
                  <div class="single-post-content">
                     <div class="title-holder m-b-20">
                        <h1 class="title m-b-20"> <?php echo the_title(); ?> </h1>
                     </div>
                     <div class="m-top-meta">
                        <div class="col-sm-7 p-l-0">
                           <div class="item">
                              <time datetime="<?php echo  get_the_date('c'); ?>" itemprop="datePublished"><?php echo date('d F, Y | m:s a', get_post_time()); ?></time>
                           </div>
                           <div class="item">
                              <div class="author_name">
                                 <a href="<?php echo  esc_url( get_author_posts_url( $post_author_id ) ); ?>" title="<?php echo  esc_attr( $author ); ?>"><?php echo ucwords($author); ?></a>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-5 no-padding">
                           <div class="item addthis-share">
                              <div class="addthis_inline_share_toolbox"></div>
                           </div>
                        </div>
                     </div>
                     <figure class="img-holder">
                        <?php the_post_thumbnail('', ['class' => 'img-responsive', 'title' => get_the_title(),'alt' => get_the_title()  ]); ?>
                        <p class="img-caption img-layer-thumb m-b-0"> 
                           <?php the_post_thumbnail_caption(); ?>
                        </p>
                     </figure>
                     <div class="m-bottom-meta">
                        <div class="item">
                           <ul>
                              <li class="incFont"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/increase-font.jpg" alt="Font increase" title="Increase Font Size"></li>
                              <li class="decFont"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/decrease-font.jpg" alt="Font Decrease" title="Decrease Font Size"></li>
                           </ul>
                        </div>
                        
                       
                     </div>
                     <div class="entry-content">
                        
                        <?php the_content(); ?>
                        
                     </div>
                     <div class="post-tags-alt u-margin-t-20" style="display:block">
                        <?php $tags=get_the_tags(); if($tags): ?>
                           <div class="tags-wrap">
                              <i class="fa fa-tags" style="font-size:1.3em"></i>
                              <?php foreach($tags as $tag): ?>
                                 <a class="cat-world" href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo ucwords($tag->slug);?></a>
                              <?php endforeach; ?>
                           </div>
                        <?php endif; ?>
                     </div>
                     <div class="fb-comment m-t-20 m-b-20" style="border:1px solid #e3e3e3;">
                        <h4 style="background: #2e303a;padding: 15px;color: #fff;margin:-1px -1px 0;"> Type your comment :</h4>
                        <div class="fb-comments" data-href="<?php the_permalink()?>" data-numposts="5" data-width="100%"></div>
                     </div>
                  </div>                  
               </div>
               <?php endwhile; endif; ?>


               <div class="col-right no-padding">
                  <div class="p-t-20">
                      <div class="col-md-12">
                        <div class="code_custom">
                           <ins data-purplepatch-slotid="11" data-purplepatch-id="53126d71827fcba70ff68055b9a73ca1"></ins>
                        </div>
                     </div>
                      <div class="col-md-12">
                        <div class="code_custom">
                           <ins data-purplepatch-slotid="11" data-purplepatch-id="53126d71827fcba70ff68055b9a73ca1"></ins>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-12">
                     <div class="tabs-container p-t-20" style="height: 410px;">
                        <div class="tabs-wrapper">
                           <ul class="nav nav-tabs" role="tablist">
                              <li role="presentation" class="active">
                                 <a class="p-5" href="#latest" aria-controls="latest" role="tab" data-toggle="tab">
                                    <h3 class="no-margin no-padding">Latest</h3>
                                 </a>
                              </li>
                              <li role="presentation">
                                 <a class="p-5" href="#popular" aria-controls="popular" role="tab" data-toggle="tab">
                                    <h3 class="no-margin no-padding">Popular</h3>
                                 </a>
                              </li>
                           </ul>
                           <div class="tab-content" style="overflow: scroll; height: 345px">
                              <div role="tabpanel" class="tab-pane fade in active" id="latest">
                                 <div class="most-viewed" id="latest">
                                    <div class="row mobile_list_simple ">
                                       <?php 
                                       $latest_article= new WP_Query(array(
                                          'post_type'    =>'post',
                                          'posts_per_page'=>25,
                                          'category__in'=>$tdc['latestpostcat'],
                                       ));
                                       while($latest_article->have_posts()) : $latest_article->the_post(); 
                                       ?>
                                       <div class="col-xs-12 p-t-10 p-b-10 br-bottom item">
                                          <a href="<?php the_permalink(); ?>">
                                             <div class="title-holder">
                                                <h3 class="post-title no-margin"> <?php the_title(); ?> </h3>
                                             </div>
                                          </a>
                                       </div>
                                       <?php endwhile; ?>

                                    </div>
                                 </div>
                              </div>
                              <div role="tabpanel" class="tab-pane fade" id="popular">
                                 <div class="most-viewed" id="most-today">
                                    <div class="row mobile_list_simple ">
                                       <?php 
                                          $popular_article= new WP_Query(array(
                                             'post_type'    =>'post',
                                             'posts_per_page'=>25,
                                             'meta_key' => 'post_views_count', 
                                             'orderby' => 'meta_value_num', 
                                             'order' => 'DESC', 
                                             'category__in'=>$tdc['popularpostcat'],
                                          ));
                                          while($popular_article->have_posts()) : $popular_article->the_post(); 
                                       ?>
                                       <div class="col-xs-12 p-t-10 p-b-10 br-bottom item">
                                          <a href="<?php the_permalink(); ?>">
                                             <div class="title-holder">
                                                <h3 class="post-title no-margin"> <?php the_title(); ?> </h3>
                                             </div>
                                          </a>
                                       </div>
                                       <?php endwhile; ?>                                    
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="p-t-20">
                      <div class="col-md-12">
                        <div class="code_custom">
                           <ins data-purplepatch-slotid="11" data-purplepatch-id="53126d71827fcba70ff68055b9a73ca1"></ins>
                        </div>
                     </div>
                      <div class="col-md-12">
                        <div class="code_custom">
                           <ins data-purplepatch-slotid="11" data-purplepatch-id="53126d71827fcba70ff68055b9a73ca1"></ins>
                        </div>
                     </div>
                  </div>




               </div>
            </div>
         </div>
        
      </main>

<?php get_footer(); ?>