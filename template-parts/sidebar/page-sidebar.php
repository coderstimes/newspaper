<?php
/**
 * Site Branding
 *
 * @version 1.0
 * @package Dynamico
 */
?>

<?php 

if (is_active_sidebar('page_sidebar')) {
    dynamic_sidebar('page_sidebar');
}

if (is_active_sidebar('common_sidebar')) {
    dynamic_sidebar('common_sidebar');
}

?>

