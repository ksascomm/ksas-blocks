<?php
/**
 * Custom Post Types functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package KSAS_Department_Tailwind
 */


/**
 * Deactivate Optimize critical images feature
 * introduced in WP Rocket v3.16
 *
 * @link https://docs.wp-rocket.me/article/1816-optimize-critical-images?utm_source=wp_plugin&utm_medium=wp_rocket
 */
add_filter( 'rocket_above_the_fold_optimization', '__return_false' );

add_action( 'wp_enqueue_scripts', 'ksas_blocks_custom_posts_scripts' );
	/**
	 * Conditionally add isotope scripts to Research Projects page
	 *
	 * Note that this function is hooked into the wp_enqueue_scripts
	 */
function ksas_blocks_custom_posts_scripts() {
	if ( is_page_template( 'page-templates/research-projects.php' ) || is_page_template( 'page-templates/people-directory-sort.php' ) ) :
		wp_enqueue_script( 'isotope-packaged', 'https://unpkg.com/isotope-layout@3.0.6/dist/isotope.pkgd.min.js', array(), '3.0.6', true );
		wp_enqueue_script( 'isotope-js', get_stylesheet_directory_uri() . '/dist/js/isotope.js', array( 'jquery' ), '1.0.0', true );
	endif;
	if ( is_page_template( 'page-templates/classroom-directory.php' ) ) :
		wp_enqueue_script( 'isotope-packaged', 'https://unpkg.com/isotope-layout@3.0.6/dist/isotope.pkgd.min.js', array(), '3.0.6', true );
		wp_enqueue_script( 'isotope-classroom-js', get_stylesheet_directory_uri() . '/dist/js/isotope-classroom.js', array( 'jquery' ), '1.0.0', true );
	endif;
	if ( is_singular( 'people' ) ) :
		wp_enqueue_script( 'people-tabs-js', get_stylesheet_directory_uri() . '/dist/js/people-tabs.js', array( 'jquery' ), '1.0.0', true );
	endif;
}


/**
 * Dequeue KSAS-SIS-Courses plugin assets on non-SIS Courses template
 *
 * Hooked to the wp_print_scripts action, with a late priority (100),
 * so that it is after the script was enqueued.
 */
function dequeue_sis_scripts() {
	if ( ! is_page_template( '../templates/courses-undergrad-ksasblocks.php' ) ) {
		wp_dequeue_style( 'data-tables' );
		wp_dequeue_style( 'data-tables-searchpanes' );
		wp_dequeue_style( 'courses-css' );
		wp_dequeue_script( 'data-tables' );
		wp_dequeue_script( 'data-tables-searchpanes' );
		wp_dequeue_script( 'data-tables-select' );
		wp_dequeue_script( 'courses-js' );
	}
}
add_action( 'wp_enqueue_scripts', 'dequeue_sis_scripts', 100 );


/**
 * Create function to print Role taxonomy on people-sort template part
 *
 * @param int/object $post ID or object of the post.
 */
function get_the_roles( $post ) {
	$roles = get_the_terms( $post->ID, 'role' );
	if ( $roles && ! is_wp_error( $roles ) ) :
		$role_names = array();
		foreach ( $roles as $role ) {
			$role_names[] = $role->slug;
		}
		$role_name = join( ' ', $role_names );

		endif;
		return $role_name;
}
/**
 * Create function to print Filter taxonomy on people-sort template part
 *
 * @param int/object $post ID or object of the post.
 */
function get_the_filters( $post ) {
	$directory_filters = get_the_terms( $post->ID, 'filter' );
	if ( ! empty( $directory_filters ) && ! is_wp_error( $directory_filters ) ) {
		$directory_filter_names = array();
		foreach ( $directory_filters as $directory_filter ) {
			$directory_filter_names[] = $directory_filter->slug;
		}
		$directory_filter_name = join( ' ', $directory_filter_names );
		return $directory_filter_name;
	}
}

/**
 * Create function to print Classroom Type taxonomy on classroom-cards template part
 *
 * @param int/object $post ID or object of the post.
 */
function get_the_classroom_type( $post ) {
	$directory_classroom_type = get_the_terms( $post->ID, 'classroom_type' );
	if ( ! empty( $directory_classroom_type ) && ! is_wp_error( $directory_classroom_type ) ) {
		$directory_classroom_type_names = array();
		foreach ( $directory_classroom_type as $directory_classroom_type ) {
			$directory_classroom_type_names[] = $directory_classroom_type->slug;
		}
		$directory_classroom_type_name = join( ' ', $directory_classroom_type_names );
		return $directory_classroom_type_name;
	}
}

/**
 * Redirect empty People CPT 'ecpt_bio' meta fields
 * to whats in 'ecpt_website' meta
 */
function redirect_empty_bios() {
	if ( is_singular( 'people' ) ) {
		global $post;
		$bio  = get_post_meta( $post->ID, 'ecpt_bio', true );
		$link = get_post_meta( $post->ID, 'ecpt_website', true );
		if ( has_term( array( 'faculty', 'tenured-and-tenure-track-faculty', 'joint-faculty', 'advisory-board' ), 'role' ) ) {
			if ( empty( $bio ) && isset( $link ) ) {
				wp_safe_redirect( esc_url( $link ), 301 );
				exit;
			}
		}
	}
}
add_action( 'template_redirect', 'redirect_empty_bios' );

/**
* Custom Events Calendar Hooks
*
* @link https://theeventscalendar.com/knowledgebase/
*/

add_filter( 'tribe_get_event_website_link_label', 'tribe_get_event_website_link_label_default' );

/**
 * Modern Tribe Events change the text from the URL to a “Visit Website”.
 */
function tribe_get_event_website_link_label_default( $label ) {
	if ( $label === tribe_get_event_website_url() ) {
		$label = 'Visit Website';
		return $label;
	}

	return $label;
}

/**
 * Inject the list of categories after the title.
 */
add_action(
	'tribe_template_before_include:events/v2/list/event/venue',
	function () {
		global $post;
		$event_categories = tribe_get_event_taxonomy( $post->ID );
		?>
		<?php if ( ! empty( $event_categories ) ) : ?>
		<ul class='tribe-event-categories'>
			<?php echo tribe_get_event_taxonomy( $post->ID ); ?>
		</ul>
	<?php endif; ?>
		<?php
	}
);

/**
* Change the Series View from Summary to List.
*/
add_filter(
	'tec_events_pro_custom_tables_v1_series_event_view_slug',
	function ( $view ) {
		return 'list';
	}
);