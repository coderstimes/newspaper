<?php
/**
 * Site Branding
 *
 * @version 1.0
 * @package Dynamico
 */
global $ctpress;
?>

<div class="logo">
  <a href="<?php echo  home_url(); ?>">
     <img src="<?php echo $ctpress['logo']['url'] ?>" class="logo" alt="<?php echo get_bloginfo( 'name' ) . ' logo'; ?>">
  </a>
  <p class="p-t-5"> <?php echo date('l, d F Y'); ?> </p>
</div> <!-- site logo -->

 