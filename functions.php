<?php 
/**
 * Beautinhealth and definitions
 *
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since CodersTime publications 1.0
 */

global $ctpress;

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'ctpress_theme_functions' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Fifteen 1.0
*/


function ctpress_theme_functions ( ) {

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
    add_theme_support('custom-background');
    add_theme_support('post-thumbnails');

    function more_excerpt( $limit ){
    	$full_content= explode(' ', preg_replace('/<img[^>]+./','',get_the_excerpt()));
    	$less_content= array_slice($full_content, 0, $limit);
    	$show_conent= implode(' ', $less_content);
    	return $show_conent;
    }

    function more_content( $limit ){
        $full_content= explode(' ', preg_replace('/<img[^>]+./','',get_the_excerpt()));
        $less_content= array_slice($full_content, 0, $limit);
        $show_conent= implode(' ', $less_content);
        return $show_conent;
    }

    function title_more( $limit ){
    	$full_content= explode(' ', get_the_title());
    	$less_content= array_slice($full_content, 0, $limit);
    	$show_conent= implode(' ', $less_content);
    	return $show_conent;
    }

    function get_content_with_adv ( ) {
        return ( wp_is_mobile() ) ? preg_replace_callback('/(<p[^>]*>.{5,}<\/p>)/', 'callback_func_adv', get_the_content() ) :  preg_replace_callback('/(<p[^>]*>.{5,}<\/p>)/', 'callback_func_desk_ad', get_the_content() );
    }

    function callback_func_adv( $m ) {
      static $c = 0; $c++;
      $content = $m[1];
      if ( $c > 1 && $c%5 == 0 ) {
         $content .='<div style="margin:20px auto;width:fit-content;"><amp-ad width=300 height=250 type="doubleclick" data-slot="/21854276714/inarticlepp" json={"targeting":{"hb_pb":[".50"]}}> <div placeholder></div><div fallback></div></amp-ad></div>';
      }
      return $content;
    }

    function callback_func_desk_ad( $m ) {
      static $c = 0; $c++;
      $content = $m[1];
      if ( $c > 1 && $c % 5 == 0 ) {
         $content .='<div style="margin:20px auto;width:fit-content;"><ins data-purplepatch-slotid="239" data-purplepatch-id="53126d71827fcba70ff68055b9a73ca1"></ins></div>';
      }
      return $content;
    }


	if ( function_exists('register_nav_menus')) {
			register_nav_menus([
		    'main_menu'=>'Main menu',
			'main_bottom_menu'=>'Main Bottom menu',
			'footer_menu'=>'Footer menu'
		]);
	}

	add_filter('widget_text','do_shortcode');

}
endif;
add_action('after_setup_theme', 'ctpress_theme_functions');

final class codersTimePress {

    public function __construct ( ) {
        add_action( 'init', [ $this, 'tdc_common_enqueue_register_files' ] );
        add_action( 'wp_enqueue_scripts',[ $this,'tdc_public_assets' ] );
    }

    public function tdc_public_assets ( $screen ) {
        
        wp_enqueue_style( 'bootstrap' );
        // wp_enqueue_style( 'animate_style' );
        wp_enqueue_style( 'bootsnav_style' );
        wp_enqueue_style( 'font-awesome' );
        // wp_enqueue_style( 'themify-icon' );
        // wp_enqueue_style( 'flaticon' );
        wp_enqueue_style( 'style-inews' );
        wp_enqueue_style( 'style' );
        wp_enqueue_style( 'styles' );

        wp_enqueue_script( 'bootstrap' );
    }



    public function tdc_common_enqueue_register_files ( ) 
    {
        $asset_file_link = get_template_directory_uri() . '/';
        $folder_path= __DIR__ . '/';

        wp_register_style( 'bootstrap', $asset_file_link . 'assets/bootstrap/bootstrap.min.css', [], '5.0.0' );
        // wp_register_style( 'animate_style', $asset_file_link . 'assets/css/animate.min.css', [], filemtime($folder_path.'assets/css/animate.min.css') );
        wp_register_style( 'bootsnav_style', $asset_file_link . 'assets/bootsnav/bootsnav.css', [], filemtime($folder_path.'assets/bootsnav/bootsnav.css') );
        wp_register_style( 'font-awesome', $asset_file_link . 'assets/font-awesome/font-awesome.min.css', [], filemtime($folder_path.'assets/font-awesome/font-awesome.min.css') );
        // wp_register_style( 'themify-icon', $asset_file_link . 'assets/themify-icons/themify-icons.css', [], filemtime($folder_path.'assets/themify-icons/themify-icons.css') );
        // wp_register_style( 'flaticon', $asset_file_link . 'assets/css/flaticon.css', [], filemtime($folder_path.'assets/css/flaticon.css') );
        wp_register_style( 'style-inews', $asset_file_link . 'assets/css/style.css', [], filemtime($folder_path.'assets/css/style.css') );
        wp_register_style( 'style', $asset_file_link . 'style.css', [], filemtime($folder_path.'style.css') );
        wp_register_style( 'styles', $asset_file_link . 'assets/css/styles.css', [], filemtime($folder_path.'assets/css/styles.css') );
        
        wp_register_script( 'bootstrap', $asset_file_link . 'assets/bootstrap/bootstrap.min.js', [ 'jquery' ], '5.0.0',true );
    }

}

new codersTimePress();

// most view post function
function getPostViews( $postID ) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true) ? : 1;
    return $count;
}

function setPostViews ( $postID ) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true) ? : 0;
    update_post_meta( $postID, $count_key, $count += 1 ); 
}


function tdc_sidebar ( ) {
    register_sidebar(array(
        'name'          =>'Right Sidebar',
        'description'   =>'You can add right sidebar from here',
        'id'            =>'right_sidebar',
        'before_title'  =>'<h3>',
        'after_title'   =>'</h3>',
        'before_widget' =>'',
        'after_widget' =>'',

    ));
}
add_action('widgets_init','tdc_sidebar');

/* Hide help menus and .wp-pointers pop-up dialogs that inform about
 * new features after WordPress upgrade */
function wp_debranding_admin_css_hide(){
    ?>
    <style type="text/css">
        #contextual-help-link-wrap,
        .wp-pointer{
            display: none !important;
        }
		#wp-admin-bar-wp-logo{
			 display: none !important;
		}
    </style>
    <?php
	global $current_user;
      wp_get_current_user();
	
	if( $current_user->user_login != 'thedailycampus'){
		?>
		<style type="text/css">
        .menu-icon-appearance, .menu-icon-plugins, .toplevel_page_simple-author-box-options, .toplevel_page_simple-social-buttons, .menu-icon-tools, .menu-icon-settings{
            display: none !important;
        }
    </style>
    <?php
	}
 
}
// add_action('admin_print_styles', 'wp_debranding_admin_css_hide');


/*ad class on ul li*/
add_filter( 'nav_menu_css_class', function( $classes ) {
    $classes[] = 'nav-item';
    return $classes;
}, 10, 1 );

add_filter( 'nav_menu_submenu_css_class', function( $subclass ) {
    return ['dropdown-menu'];
} );

/*ad class on ul li a*/
add_filter( 'nav_menu_link_attributes', 'add_additional_class_on_li', 10, 4 );
function add_additional_class_on_li( $atts, $item, $args, $depth ) {
    
    if ( in_array('menu-item-has-children', $item->classes )) {
        $item->classes[] = 'dropdown';
        // print_r($args);
        $atts['class'] = 'nav-link dropdown-toggle';
        $atts['id'] = 'navbarDropdown_' . $item->ID;
        $atts['href'] = '#';
        $atts['role'] = 'button';
        $atts['data-bs-toggle'] = 'dropdown';
        $atts['aria-expanded'] = 'false';

    }else {
        $atts['class'] = 'nav-link';
    }
    
    return $atts;
}




/*Include Template Tags.*/
require get_template_directory() . '/inc/template-tags.php';

/*Redux framework configuration*/
include('lib/ReduxCore/framework.php');
include('lib/sample/config.php');

function get_the_post_image ( $size = 'medium' ) {
    $image_id = get_post_thumbnail_id();
    $medium_img = wp_get_attachment_image_src( $image_id, $size );
    $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true) ?: get_the_title();
    
    if ( $medium_img ) :
        return sprintf('<img class="img-responsive" src="%s" alt="%s">', $medium_img[0], $image_alt );
    else:
        return;
    endif;
}

