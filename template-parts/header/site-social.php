<?php
/**
 * Site Branding
 *
 * @version 1.0
 * @package Ctpress
 */

if ( ! ctpress_get_option('header_social') || is_customize_preview() ) {
   ?>
   <div class="header-social">
       <ul>
          <li><a href="<?php echo ctpress_get_option('facebook') ?>"><i class="fa fa-facebook"></i></a></li>
          <li><a href="<?php echo ctpress_get_option('twitter') ?>"><i class="fa fa-twitter"></i></a></li>
          <li><a href="<?php echo ctpress_get_option('instagram') ?>"><i class="fa fa-instagram"></i></a></li>
          <li class="hidden-xs"><a href="<?php echo ctpress_get_option('linkedin') ?>"><i class="fa fa-linkedin"></i></a></li>
          <li class="hidden-xs"><a href="<?php echo ctpress_get_option('youtube') ?>"><i class="fa fa-youtube-play"></i></a></li>
       </ul>
   </div> 
    <!-- site social links -->
   <?php
}