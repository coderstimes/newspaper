<?php
defined( 'ABSPATH' ) || exit;
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after
 * @package beautinhealth
 */
global $ctpress;
?>

      <footer>
         <div class="container">
            <div class="row">
               <div class="col-sm-4 footer-box">
                  <div class="about-inner">
                     <img src="<?php echo $ctpress['logo']['url'] ?>" class="img-responsive" alt="The Daily Campus logo" />
                     <ul>
                        <?php echo $ctpress['footer_logo_bottom'];?>
                     </ul>
                  </div>
               </div>
               <div class="col-sm-4 footer-box">
                  <div class="about-inner address">
                     <ul>
                        <li>
                          <?php echo $ctpress['site_office_info'];?>                           
                        </li>
                     </ul>                     
                  </div>
               </div>
               <div class="col-sm-4 footer-box">
                  <div class="social-connect">
                        <ul class="social--redius social--color text-center">
                           <li><a data-fb="fb_link" class="social__facebook" title="Facebook" href="<?php echo $ctpress['facebook'];?>"><i class="fa fa-facebook"></i></a></li>
                           <li><a data-twitter="twitter_link" class="social__twitter" title="Twitter" href="<?php echo $ctpress['twitter'];?>"><i class="fa fa-twitter"></i></a></li>
                           <li><a data-youtube="youtube_link" class="social__youtube" title="Youtube" href="<?php echo $ctpress['youtube'];?>"><i class="fa fa-youtube"></i></a></li>
                           <li><a data-linkedin="linkedin_link" class="social__linkedin" title="Linkedin" href="<?php echo $ctpress['linkedin'];?>"><i class="fa fa-linkedin"></i></a></li>
                           <li><a data-instagram="instagram_link" class="social__instagram" title="Instagram" href="<?php echo $ctpress['instagram'];?>"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                     </div>
               </div>
            </div>
         </div>
         <div class="sub-footer">
            <div class="container">
               <div class="row">
                  <div class="col-xs-12 col-sm-5 col-md-5">
                     <div class="copy"> <?php echo $ctpress['copyright_text'];?> </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      
      <script async >
         (function( $ ){
          $(document).ready( function(){ 
               
                /*add class on ul li has ul*/
                $('ul .menu-item-has-children').addClass('dropdown');
                $('.menu-item-has-children').css('display','block');
                $('.sub-menu').addClass('dropdown-menu megamenu-content megamenu-others animated');

                $(".search_btn").click(function(){
                  $(".searchform input").removeClass('d-none');
                });

                $(".searchform input").keydown(function(){
                  if ( this.value.length > 2 ) {
                     $('.search_btn').attr("type", 'submit');
                  } else {
                     $('.search_btn').attr("type", 'button');
                  }               
                });

                $("#menu-main-menu .dropdown-menu .nav-link").each(function(){
                  $(this).addClass('dropdown-item').removeClass('nav-link');
                  // console.log(this);
                })

            });
         })(jQuery);         
      </script>
      <?php wp_footer(); ?>
   </body>
</html>