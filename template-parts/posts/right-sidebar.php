<?php
/**
 * Site Branding
 *
 * @version 1.0
 * @package Dynamico
 */
?>

<div class="col-md-8">
   <div class="single-post-content">
      <div class="title-holder text-center">
         <h1> <?php the_title(); ?> </h1>
      </div>

      <div class="post_info bg-light p-3 mb-3">
         <?php ctpress_entry_meta(); ?>
      </div> 
    
      <!-- get featured image if exist -->
      <?php get_template_part( 'template-parts/content/featured', 'image' ); ?>

      <div class="content_area">
         <?php the_content(); ?>
      </div>
      
      <div class="post-tags-alt my-4" style="width:fit-content;margin-left: auto; margin-right: auto;">
         <?php $tags=get_the_tags(); if($tags): ?>
            <div class="tags-wrap">
               <i class="fa fa-tags" style="font-size:1.3em"></i>
               <?php foreach($tags as $tag): ?>
                  <a class="cat-world" href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo ucwords($tag->slug);?></a>
               <?php endforeach; ?>
            </div>
         <?php endif; ?>
      </div>

      <?php ctpress_post_navigation(); ?>
      <?php get_template_part( 'template-parts/comments/comment'); ?>  
   </div>
</div>

<div class="col-md-4">
   <?php get_template_part( 'template-parts/sidebar/post', 'sidebar' ); ?>
</div>