<?php
/**
 * Clean up WordPress defaults
 *
 * @package KSAS_Blocks
 */

if ( ! function_exists( 'ksas_blocks_start_cleanup' ) ) :
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

// Remove WP version from RSS.
if ( ! function_exists( 'ksas_blocks_remove_rss_version' ) ) :
	function ksas_blocks_remove_rss_version() {
		return '';
	}
endif;

// Remove injected CSS for recent comments widget.
if ( ! function_exists( 'ksas_blocks_remove_wp_widget_recent_comments_style' ) ) :
	function ksas_blocks_remove_wp_widget_recent_comments_style() {
		if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
			remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
		}
	}
endif;

// Remove injected CSS from recent comments widget.
if ( ! function_exists( 'ksas_blocks_remove_recent_comments_style' ) ) :
	function ksas_blocks_remove_recent_comments_style() {
		global $wp_widget_factory;
		if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
			remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
		}
	}
endif;

// Remove extraneous menu classes.
add_filter( 'nav_menu_css_class', 'special_nav_class', 10, 2 );
function special_nav_class( $classes, $item ) {
	if ( ( $key = array_search( 'menu-item-object-page', $classes ) ) !== false ) {
		unset( $classes[ $key ] );
	}
	if ( ( $key = array_search( 'menu-item-type-post_type', $classes ) ) !== false ) {
		unset( $classes[ $key ] );
	}
	if ( ( $key = array_search( 'page_item', $classes ) ) !== false ) {
		unset( $classes[ $key ] );
	}
	return $classes;
}

// Change the class for sticky posts to .wp-sticky to avoid conflicts with Tailwind's sticky class.
if ( ! function_exists( 'ksas_blocks__sticky_posts' ) ) :
	function ksas_blocks__sticky_posts( $classes ) {
		if ( in_array( 'sticky', $classes, true ) ) {
			$classes   = array_diff( $classes, array( 'sticky' ) );
			$classes[] = 'wp-sticky';
		}
		return $classes;
	}
	add_filter( 'post_class', 'ksas_blocks__sticky_posts' );

endif;

/** Disable/Clean Inline Styles */
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
