<?php
/**
 * Returns theme options
 *
 * Uses sane defaults in case the user has not configured any theme options yet.
 *
 * @package Ctpress
 */

/**
* Get a single theme option
*
* @return mixed
*/
function ctpress_get_option( $option_name = '' ) {

	// Get all Theme Options from Database.
	$theme_options = ctpress_theme_options();

	// Return single option.
	if ( isset( $theme_options[ $option_name ] ) ) {
		return $theme_options[ $option_name ];
	}

	return false;
}


/**
 * Get saved user settings from database or theme defaults
 *
 * @return array
 */
function ctpress_theme_options() {

	// Merge theme options array from database with default options array.
	$theme_options = wp_parse_args( get_option( 'ctpress_theme_options', array() ), ctpress_default_options() );

	// Return theme options.
	return apply_filters( 'ctpress_theme_options', $theme_options );
}


/**
 * Returns the default settings of the theme
 *
 * @return array
 */
function ctpress_default_options() {

	$default_options = array(
		'logo'            		 => get_theme_file_path( 'assets/images/logo.svg' ),
		'favicon'            	 => get_theme_file_path( 'assets/images/favicon.png' ),
		'date-show'              => true,
		'comment_option'         => false,
		'fb_appId'         		 => '492209628792946',
		'post-screen'         	 => 1,
		'page-screen'         	 => 1,
		'facebook'            	 => '#',
		'twitter'            	 => '#',
		'instagram'            	 => '#',
		'youtube'            	 => '#',
		'linkedin'            	 => '#',
		'footer_logo'            => false,
		'site_office_info'       => false,
		'footer_logo_bottom'     => '',
		'copyright_text'         => __( '&copy; 2021, All rights reserved by ', 'ctpress' ) . '<a href="#" style="display: inline-block;font-weight: bold;"> Coders Time </a>',
		'site_title'             => true,
		'site_description'       => true,
		'theme_layout'           => 'centered',
		'sidebar_position'       => 'right-sidebar',
		'box_shadow'             => false,
		'blog_layout'            => 'two-column-grid',
		'blog_image'             => 'ctpress-ultra-wide',
		'blog_content'           => 'excerpt',
		'excerpt_length'         => 25,
		'excerpt_more_text'      => '[...]',
		'read_more_link'         => esc_html__( 'Read more', 'ctpress' ),
		'meta_date'              => true,
		'meta_author'            => false,
		'meta_comments'          => false,
		'meta_categories'        => true,
		'single_meta_date'       => true,
		'single_meta_author'     => true,
		'single_meta_comments'   => true,
		'single_meta_categories' => true,
		'post_layout'            => 'above-title',
		'post_image'             => 'ctpress-ultra-wide',
		'meta_tags'              => true,
		'post_navigation'        => true,
		'post_image_archives'    => true,
		'post_image_single'      => true,
		'featured_posts'         => true,
		'featured_category'      => 0,
		'featured_layout'        => 1,
		'footer_text'            => '',
		'credit_link'            => true,
	);

	return apply_filters( 'ctpress_default_options', $default_options );
}
