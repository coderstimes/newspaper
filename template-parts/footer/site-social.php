<?php
/**
 * Site Branding
 *
 * @version 1.0
 * @package Ctpress
 */

if ( !ctpress_get_option('footer_social') || is_customize_preview() ) {
   ?>
   <div class="social-connect">
      <ul class="social--redius social--color text-center">
         <li><a data-fb="fb_link" class="social__facebook" title="Facebook" href="<?php echo ctpress_get_option('facebook');?>"><i class="fa fa-facebook"></i></a></li>
         <li><a data-twitter="twitter_link" class="social__twitter" title="Twitter" href="<?php echo ctpress_get_option('twitter');?>"><i class="fa fa-twitter"></i></a></li>
         <li><a data-youtube="youtube_link" class="social__youtube" title="Youtube" href="<?php echo ctpress_get_option('youtube');?>"><i class="fa fa-youtube"></i></a></li>
         <li><a data-linkedin="linkedin_link" class="social__linkedin" title="Linkedin" href="<?php echo ctpress_get_option('linkedin');?>"><i class="fa fa-linkedin"></i></a></li>
         <li><a data-instagram="instagram_link" class="social__instagram" title="Instagram" href="<?php echo ctpress_get_option('instagram');?>"><i class="fa fa-instagram"></i></a></li>
      </ul>
   </div>
   <?php
}

