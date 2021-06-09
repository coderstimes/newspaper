<?php
/**
 * Site Branding
 *
 * @version 1.0
 * @package Dynamico
 */
?>

<?php get_template_part( 'template-parts/sidebar/latest', 'popular' ); ?>

<?php 

if (is_active_sidebar('category_sidebar')) {
    dynamic_sidebar('category_sidebar');
}

if (is_active_sidebar('common_sidebar')) {
    dynamic_sidebar('common_sidebar');
}

?>