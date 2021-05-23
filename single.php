<?php
defined( 'ABSPATH' ) || exit;
/**
 * The main template file.
 * @package bengal
 */
get_header(); 
global $ctpress;
$img_size = wp_is_mobile() ? 'medium_large' : 'full';

?>
      </header>

      <main class="page_main_wrapper">

         <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"> <i class="fa fa-home"></i>&nbsp; </a></li>
                <?php 
                  $categories = get_the_category();
                  foreach ($categories as $category ) {
                     echo sprintf('<li class="breadcrumb-item" aria-current="page"> <a href="%s">%s</a> </li>', get_category_link( $category->cat_ID ), $category->name );
                  }
               ?>
               <li class="breadcrumb-item active"> 
                  <a href="#"> <?php echo the_title(); ?> </a> 
               </li>
              </ol>
            </nav>
         </div>

         <div class="container">
            <div class="row my-5">

               <?php get_template_part( 'template-parts/content/full', 'page' ); ?>
              
            </div>
         </div>
        
      </main>

<?php get_footer(); ?>
<script>
   jQuery('.img-layer-thumb').css('width',jQuery(".rounded")[0].clientWidth);
</script>
