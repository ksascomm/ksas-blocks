<?php
/**
 * Advanced Custom Fields Compatibility File
 *
 * @package KSAS_Blocks
 */

/**
 * ACF Options Page
 */
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page(
		array(
			'page_title' => 'Theme General Settings',
			'menu_title' => 'Theme Settings',
			'menu_slug'  => 'theme-general-settings',
			'capability' => 'edit_posts',
			'redirect'   => false,
		)
	);

	acf_add_options_sub_page(
		array(
			'page_title'  => 'Theme Header Settings',
			'menu_title'  => 'Header',
			'parent_slug' => 'theme-general-settings',
		)
	);

	acf_add_options_sub_page(
		array(
			'page_title'  => 'Theme Footer Settings',
			'menu_title'  => 'Footer',
			'parent_slug' => 'theme-general-settings',
		)
	);

}
add_action( 'acf/init', 'my_register_blocks' );
/**
 * Register a custom block using ACF Pro.
 */
function my_register_blocks() {
	// check function exists.
	if ( function_exists( 'acf_register_block_type' ) ) {

		acf_register_block_type(
			array(
				'name'            => 'testimonials',
				'title'           => __( 'Testimonials' ),
				'description'     => __( 'A custom testimonial block.' ),
				'render_template' => 'template-parts/blocks/testimonials/testimonial.php',
				'category'        => 'formatting',
				'icon'            => 'admin-comments',
				'keywords'        => array( 'testimonials' ),
				'mode'            => 'edit',
				'enqueue_style'   => get_template_directory_uri() . '/template-parts/blocks/testimonials/testimonials.css',
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'horizontal-card',
				'title'           => __( 'Horizontal Card', 'ksas-office' ),
				'description'     => __( 'A custom horizontal card with image overlay.', 'ksas-office' ),
				'render_template' => '/template-parts/blocks/horizontal-card/horizontal-card.php',
				'category'        => 'ksas-office',
				'supports'        => array(
					'align' => false, // Disables alignment toolbar and classes.
				),
				'icon'            => 'businessperson',
				'keywords'        => array( 'horizontal', 'card', 'ksas' ),
				'mode'            => 'edit',
				'enqueue_style'   => get_template_directory_uri() . '/template-parts/blocks/horizontal-card/horizontal-card.css',
			)
		);
	}
}

function ksas_blocks_editor_styles() {
	// Tells Gutenberg to inject this CSS file into the editor iframe canvas.
	add_editor_style( '/template-parts/blocks/horizontal-card/horizontal-card.css' );
}
add_action( 'admin_init', 'ksas_blocks_editor_styles' );
