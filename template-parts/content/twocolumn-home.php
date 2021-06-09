<?php
/**
 * Site Branding
 *
 * @version 1.0
 * @package Dynamico
 */
   $mobile = wp_is_mobile();
   $img_size = $mobile ? 'medium' : 'medium';
   $margin_bottom = $mobile ? 'mb-5' : '';

?>

   <div class="col-md-12 mt-5 br-bottom">

        <?php 
           $topleft_lead =0;
           $toplead= new WP_Query(array(
                'post_type'=>'post',
                'posts_per_page' => 1,
                // 'post__in' => get_option( 'sticky_posts' ),
                // 'category__in'=> $ctpress['topleft']
            ));
           while( $toplead->have_posts() ) : $toplead->the_post(); 
        ?>

         <figure class="img-holder text-center">
            <?php echo get_the_post_image( 'full' ); ?>
         </figure>

            <a href="<?php the_permalink()?>">
               <div class="post-content pt-4">
                  <?php $topleft_lead=get_the_ID(); ?>
                  <div class="title-holder">
                     <h1 class="post-title no-margin"> <?php echo the_title(); ?> </h1>
                  </div>
                  <div class="post_desc p-t-10">
                     <p> <?php echo more_excerpt(50); ?> </p>
                  </div>
               </div>
             </a>

        <?php endwhile; ?>
      </div>


<?php

   $row_num = 0;
   $home_news = new WP_Query(array( 
      'post_type'=>'post',
      'post__not_in' => [$topleft_lead]
   ));
   if ( $home_news->have_posts()) :
      while( $home_news->have_posts()) : $home_news->the_post();
?>

<?php echo ( $row_num % 2 == 0 ) ? '<div class="row py-5 br-bottom">' : '';  ?>

   <div class="col-md-6 <?php echo ( $row_num % 2 == 0 ) ? $margin_bottom : '' ; ?>">
      <figure class="img-holder text-center">
         <?php echo get_the_post_image( $img_size ); ?>
      </figure>

      <div class="mt-3">
         <div class="title-holder">
            <strong>
               <h2 class="post-title no-margin p-b-10">
                  <?php the_title(); ?>
               </h2>
            </strong>
            <p class="brief my-3"> <?php echo  more_content(30); ?> </p>
            <a href="<?php the_permalink();?>" class="text-center"> 
               <button style="font-size: 18px;font-weight: bold;width: 200px;" type="button" class="readmore btn"> 
                  <?php esc_html_e( 'Read More', 'ctpress' ); ?> 
               </button>
            </a>
         </div>
      </div>
      
   </div>
<?php echo ( $row_num % 2 == 0 ) ? '' : '</div>';  ?>

<?php 
   $row_num++; endwhile;  
   echo ( $row_num & 1 ) ? '</div>' : ''; 
      
   ctpress_pagination();
   else :
      get_template_part( 'template-parts/content/no', 'content' );
   endif; 
?> 