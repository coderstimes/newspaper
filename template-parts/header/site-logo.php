<?php
/**
 * Site Branding
 *
 * @version 1.0
 * @package Dynamico
 */
global $ctpress;
$date_time = isset( $ctpress['date-show'] ) && $ctpress['date-show'] == 0 ? '' : date('l, d F Y') ;
?>

<div class="logo">
  <a href="<?php echo  home_url(); ?>">
     <img src="<?php echo $ctpress['logo']['url'] ?>" class="logo" alt="<?php echo get_bloginfo( 'name' ) . ' logo'; ?>">
  </a>


  <p class="p-t-5"> <?php echo $date_time; ?> </p>
</div> <!-- site logo -->

 