<?php
/**
 * Clean up WordPress defaults
 *
 * @package KSAS_Blocks
 */

if ( ! function_exists( 'ksas_blocks_start_cleanup' ) ) :
	/**
	 * Hooks up core cleanup actions and filters to streamline head and feeds.
	 */
	function ksas_blocks_start_cleanup() {

		// Launching operation cleanup.
		add_action( 'init', 'ksas_blocks_cleanup_head' );

		// Remove WP version from RSS.
		add_filter( 'the_generator', 'ksas_blocks_remove_rss_version' );

		// Remove pesky injected css for recent comments widget.
		add_filter( 'wp_head', 'ksas_blocks_remove_wp_widget_recent_comments_style', 1 );

		// Clean up comment styles in the head.
		add_action( 'wp_head', 'ksas_blocks_remove_recent_comments_style', 1 );
	}
	add_action( 'after_setup_theme', 'ksas_blocks_start_cleanup' );
endif;
/**
 * Clean up head
 * ----------------------------------------------------------------------------
 */

if ( ! function_exists( 'ksas_blocks_cleanup_head' ) ) :
	/**
	 * Removes redundant, legacy, or unneeded structural link tags generated in wp_head.
	 */
	function ksas_blocks_cleanup_head() {

		// EditURI link.
		remove_action( 'wp_head', 'rsd_link' );

		// Category feed links.
		remove_action( 'wp_head', 'feed_links_extra', 3 );

		// Post and comment feed links.
		remove_action( 'wp_head', 'feed_links', 2 );

		// Windows Live Writer.
		remove_action( 'wp_head', 'wlwmanifest_link' );

		// Index link.
		remove_action( 'wp_head', 'index_rel_link' );

		// Previous link.
		remove_action( 'wp_head', 'parent_post_rel_link', 10 );

		// Start link.
		remove_action( 'wp_head', 'start_post_rel_link', 10 );

		// Canonical.
		remove_action( 'wp_head', 'rel_canonical', 10 );

		// Shortlink.
		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );

		// Links for adjacent posts.
		remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );

		// WP version.
		remove_action( 'wp_head', 'wp_generator' );

		// Emoji detection script.
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

		// Emoji styles.
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
	}
endif;

if ( ! function_exists( 'ksas_blocks_remove_rss_version' ) ) :
	/**
	 * Strips the version tag generator suffix from RSS markup.
	 *
	 * @return string Empty string to clear version footprint.
	 */
	function ksas_blocks_remove_rss_version() {
		return '';
	}
endif;

if ( ! function_exists( 'ksas_blocks_remove_wp_widget_recent_comments_style' ) ) :
	/**
	 * Removes the legacy core injected style block for the recent comments widget from the wp_head output.
	 */
	function ksas_blocks_remove_wp_widget_recent_comments_style() {
		if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
			remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
		}
	}
endif;

if ( ! function_exists( 'ksas_blocks_remove_recent_comments_style' ) ) :
	/**
	 * Clears recent comment style tags utilizing the active global widget factory instance.
	 */
	function ksas_blocks_remove_recent_comments_style() {
		global $wp_widget_factory;
		if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
			remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
		}
	}
endif;

/**
 * Strips out redundant menu asset classes from nav items to keep DOM footprints lean.
 *
 * @param array $classes The CSS classes assigned to the menu item.
 * @return array Modified array of clean string classes.
 */
function special_nav_class( $classes ) {
	// Separate assignment block from control statements to avoid multiple assignment errors.
	$key = array_search( 'menu-item-object-page', $classes, true );
	if ( false !== $key ) {
		unset( $classes[ $key ] );
	}

	$key = array_search( 'menu-item-type-post_type', $classes, true );
	if ( false !== $key ) {
		unset( $classes[ $key ] );
	}

	$key = array_search( 'page_item', $classes, true );
	if ( false !== $key ) {
		unset( $classes[ $key ] );
	}

	return $classes;
}
add_filter( 'nav_menu_css_class', 'special_nav_class', 10, 2 );


if ( ! function_exists( 'ksas_blocks__sticky_posts' ) ) :
	/**
	 * Swaps the default core 'sticky' post class name to prevent styling overrides with Tailwind utilities.
	 *
	 * @param array $classes Array of default post class targets.
	 * @return array Processed array handling explicit unique sticky flags.
	 */
	function ksas_blocks__sticky_posts( $classes ) {
		if ( in_array( 'sticky', $classes, true ) ) {
			$classes   = array_diff( $classes, array( 'sticky' ) );
			$classes[] = 'wp-sticky';
		}
		return $classes;
	}
	add_filter( 'post_class', 'ksas_blocks__sticky_posts' );

endif;

/**
 * Scrubs inline font styling attributes, spans, and empty markup nodes from incoming post content wrappers.
 *
 * @param string $content Unsanitized post text blocks.
 * @return string Filtered and sanitized markup.
 */
function clean_post_content( $content ) {
	// Remove inline styling.
	$content = preg_replace( '/(<[span>]+) style=".*?"/i', '$1', $content );
	$content = preg_replace( '/font-family\:.+?;/i', '', $content );
	$content = preg_replace( '/color\:.+?;/i', '', $content );

	// Remove font tag.
	$content = preg_replace( '/<font[^>]+>/', '', $content );

	// Remove empty tags.
	$post_cleaners = array(
		'<p></p>'             => '',
		'<p> </p>'            => '',
		'<p>&nbsp;</p>'       => '',
		'<span></span>'       => '',
		'<span> </span>'      => '',
		'<span>&nbsp;</span>' => '',
		'<font>'              => '',
		'</font>'             => '',
	);
	$content       = strtr( $content, $post_cleaners );

	return $content;
}
add_filter( 'the_content', 'clean_post_content' );

/**
 * Minifies the customizer raw CSS block output added into wp_head.
 */
function tn_minify_customizer_css_head() {

	remove_action( 'wp_head', 'wp_custom_css_cb', 101 );

	$buffer = wp_get_custom_css();

	$buffer = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer );
	$buffer = str_replace( ': ', ':', $buffer );
	$buffer = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $buffer );
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- CSS is safe due to wp_strip_all_tags().
	echo '<style id="wp-custom-css">' . wp_strip_all_tags( $buffer ) . '</style>';
}
add_action( 'wp_head', 'tn_minify_customizer_css_head' );

/**
 * Strips raw Unicode emojis and variation selectors from post content and titles before saving.
 *
 * @param array $data An array of sanitized post data flags.
 * @return array The processed post data array with emojis stripped out.
 */
function ksas_strip_emojis_before_save( $data ) {
	if ( 'inherit' === $data['post_status'] ) {
		return $data;
	}

	$emoji_regex = '/[\x{1F600}-\x{1F64F}]|[\x{1F300}-\x{1F5FF}]|[\x{1F680}-\x{1F6FF}]|[\x{2600}-\x{27BF}]|[\x{1F900}-\x{1F9FF}]|[\x{1FA00}-\x{1FAFF}]|\x{FE0F}/u';

	if ( ! empty( $data['post_content'] ) ) {
		$data['post_content'] = preg_replace( $emoji_regex, '', $data['post_content'] );
	}

	if ( ! empty( $data['post_title'] ) ) {
		$data['post_title'] = preg_replace( $emoji_regex, '', $data['post_title'] );
	}

	return $data;
}

/**
 * Strips exclamation points from post titles before saving to the database.
 *
 * @param array $data An array of sanitized post data flags.
 * @return array The processed post data array with exclamation points removed.
 */
function ksas_strip_exclamation_points_before_save( $data ) {
	// Skip checking on revisions to avoid unnecessary processing bloat.
	if ( 'inherit' === $data['post_status'] ) {
		return $data;
	}

	// Strip exclamation points from the post title.
	if ( ! empty( $data['post_title'] ) ) {
		$data['post_title'] = str_replace( '!', '', $data['post_title'] );
	}

	return $data;
}
add_filter( 'wp_insert_post_data', 'ksas_strip_exclamation_points_before_save', 99, 1 );
