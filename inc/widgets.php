<?php
/**
 * Custom functions for widgets
 *
 * @package Flagship_Tailwind
 * @since  Flagship_Tailwind 1.2.0
 */

/**
 * Count the number of widgets in a sidebar
 * Works for up to ten widgets
 * Usage <?php ksas_blocks_sidebar_class( 'sidebar-footer' ); ?> where sidebar-footer is the name of the sidebar
 */
function ksas_blocks_sidebar_class( $sidebar_name ) {
	global $sidebars_widgets;
	$count = count( $sidebars_widgets[ $sidebar_name ] );
	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
		case '4':
			$class = 'four';
			break;
		case '5':
			$class = 'five';
			break;
		case '6':
			$class = 'six';
			break;
		case '7':
			$class = 'seven';
			break;
		case '8':
			$class = 'eight';
			break;
		case '9':
			$class = 'nine';
			break;
		case '10':
			$class = 'ten';
			break;
		default:
			$class = '';
			break;
	}
	if ( $class ) :
			echo esc_html( $class );
	endif;
}


/**
 * Programmatically add Tailwind prose classes to WordPress Text and Custom HTML widgets.
 */
function ksas_add_prose_to_text_widgets( $instance, $widget, $args ) {
	// Target both core text widgets and custom HTML widgets.
	if ( $widget->id_base === 'text' || $widget->id_base === 'custom_html' ) {

		// Tailwind typography configuration classes.
		$prose_classes = 'prose prose-slate max-w-none dark:prose-invert';

		// Check if a custom class is already defined in the theme sidebar configuration.
		if ( isset( $args['before_widget'] ) ) {
			// Inject our prose classes directly into the class attribute of the opening widget tag.
			$args['before_widget'] = preg_replace(
				'/class=["\']([^"\']*)["\']/',
				'class="$1 ' . esc_attr( $prose_classes ) . '"',
				$args['before_widget']
			);

			// Re-register the modified arguments back into the active global widget render cycle.
			global $wp_registered_widgets;
			if ( isset( $wp_registered_widgets[ $widget->id ]['callback'] ) ) {
				$original_callback = $wp_registered_widgets[ $widget->id ]['callback'];

				// Override the display logic parameters on the fly.
				$widget->widget( $args, $instance );
				return false; // Tells WordPress to skip running the default unstyled widget output.
			}
		}
	}
	return $instance;
}
add_filter( 'widget_display_callback', 'ksas_add_prose_to_text_widgets', 10, 3 );
