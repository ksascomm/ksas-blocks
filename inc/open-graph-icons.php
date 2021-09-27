<?php
/**
 * Add Open Graph Meta Info from the actual article data, or customize as necessary.
 *
 * @package KSAS_Blocks
 */
function facebook_open_graph() {
	global $post;
	if ( ! is_singular() ) { // if it is not a post or a page
		return;
	}
	if ( $excerpt = $post->post_content ) {
			$excerpt = strip_tags( $post->post_content );
			$excerpt = str_replace( '', "'", $excerpt );
			$excerpt = wp_trim_words( $post->post_content, 55, '...' );
	} else {
		$excerpt = get_bloginfo( 'title' );
	}

		echo '<meta property="og:title" content="' . esc_html( get_the_title() ) . ' | ' . esc_html( get_bloginfo( 'title' ) ) . '"/>';
		echo '<meta property="og:description" content="' . esc_html( $excerpt ) . '"/>';
		echo '<meta property="og:type" content="article"/>';
		echo '<meta property="og:url" content="' . esc_url( get_permalink() ) . '"/>';
		echo '<meta name="twitter:card" content="summary" />';
		echo '<meta name="twitter:site" content="@JHUArtsSciences" />';

		// Customize the below with the name of your site
		echo '<meta property="og:site_name" content="' . get_bloginfo( 'title' ) . '"/>';
	if ( ! has_post_thumbnail( $post->ID ) ) { // the post does not have featured image, use a default image
		// Create a default image on your server or an image in your media library, and insert it's URL here
		$default_image = get_template_directory_uri() . '/dist/images/favicons/android-icon-192x192.png';
		echo '<meta property="og:image" content="' . $default_image . '"/>';
	} else {
		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
		echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
	}

		echo '
	';
}
add_action( 'wp_head', 'facebook_open_graph', 5 );



/**
 * Create Site Icons using theme favicons.
 *
 * @package KSAS_Blocks
 */
function ksas_default_site_icon() {
	if ( ! has_site_icon() && ! is_customize_preview() ) {
		echo '<link rel="shortcut icon" type="image/png" href="' . get_template_directory_uri() . '/dist/images/favicons/favicon.ico" />';

		echo '<link rel="icon" type="image/png" sizes="16x16" href="' . get_template_directory_uri() . '/dist/images/favicons/favicon-16x16.png" />';
		echo '<link rel="icon" type="image/png" sizes="32x32" href="' . get_template_directory_uri() . '/dist/images/favicons/favicon-32x32.png" />';
		echo '<link rel="icon" type="image/png" sizes="96x96" href="' . get_template_directory_uri() . '/dist/images/favicons/favicon-96x96.png" />';
		echo '<link rel="apple-touch-icon" sizes="120x120" href="' . get_template_directory_uri() . '/dist/images/favicons/apple-touch-icon-120x120.png" />';
		echo '<link rel="apple-touch-icon" sizes="152x152" href="' . get_template_directory_uri() . '/dist/images/favicons/apple-touch-icon-152x152.png" />';
		echo '<link rel="apple-touch-icon" sizes="180x180" href="' . get_template_directory_uri() . '/dist/images/favicons/apple-touch-icon-180x180.png" />';
	}
}

add_action( 'wp_head', 'ksas_default_site_icon', 99 );
add_action( 'login_head', 'ksas_default_site_icon', 99 );