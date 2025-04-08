<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package KSAS_Blocks
 */

?>


<!-- ACF Custom Widget Sidebar -->
<?php
$custom_sidebar_widget = get_field( 'custom_sidebar', false, false );
if ( is_active_sidebar( $custom_sidebar_widget ) ) :
	?>
	<aside id="secondary" class="w-full mt-4 sidebar widget-area lg:w-1/4 lg:mt-8">
		<?php dynamic_sidebar( $custom_sidebar_widget ); ?>
	</aside><!-- #secondary -->
<?php endif; ?>
