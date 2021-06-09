<?php
/**
 * Site Branding
 *
 * @version 1.0
 * @package Dynamico
 */
?>

<div class="col-md-4">
  <?php get_template_part( 'template-parts/sidebar/page', 'sidebar' ); ?>
</div>

<div class="col-md-8">
  <div class="single-page-content">
     <div class="title-holder my-4 text-center">
        <h1> <?php echo the_title(); ?> </h1>
     </div>

     <!-- get featured image if exist -->
     <?php get_template_part( 'template-parts/content/featured', 'image' ); ?>
     
     <div class="entry-content">
        <?php the_content(); ?>
     </div>                   
  </div>
</div>