<?php
/**
 * Site Branding
 *
 * @version 1.0
 * @package Dynamico
 */
$mobile = wp_is_mobile();
// $img_size = $mobile ? 'medium' : 'medium_large';
$img_size = $mobile ? 'medium' : 'medium';
$margin_bottom = $mobile ? 'mb-5' : '';

   $row_num = 0;
   while( have_posts()) : the_post();
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

<?php $row_num++; endwhile;  
echo ( $row_num & 1 ) ? '</div>' : '';