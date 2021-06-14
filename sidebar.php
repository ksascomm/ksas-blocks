<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package KSAS_Blocks
 */

if ( function_exists( 'get_field' ) && get_field( 'custom_sidebar' ) ) :
	?>
<aside id="secondary" class="sidebar widget-area w-full lg:w-1/4 mt-4 lg:mt-8">

		<!-- ACF Custom Widget Sidebar -->
	<?php
	$custom_sidebar_widget = get_field( 'custom_sidebar', false, false );
	if ( is_active_sidebar( $custom_sidebar_widget ) ) {
		dynamic_sidebar( $custom_sidebar_widget );
	}
	?>
</aside><!-- #secondary -->
	<?php
	endif;
?>
