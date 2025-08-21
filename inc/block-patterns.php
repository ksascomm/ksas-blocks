<?php
/**
 * Block Patterns
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_pattern/
 * @link https://developer.wordpress.org/reference/functions/register_block_pattern_category/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.5
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'ksas-office',
		array( 'label' => esc_html__( 'KSAS Blocks', 'ksas-office' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	// Simple Hero Section
	register_block_pattern(
		'ksasblocks/simple-hero',
		array(
			'title'         => esc_html__( 'Simple Hero', 'ksas-office' ),
			'categories'    => array( 'ksas-office' ),
			'viewportWidth' => 1400,
			'content'       => '
			<!-- wp:columns {"verticalAlignment":"center"} -->
			<div class="wp-block-columns are-vertically-aligned-center px-2"><!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"className":"mt-0"} -->
			<h2 class="mt-0">Study Living Systems from Unique Perspectives</h2>
			<!-- /wp:heading -->
			
			<!-- wp:paragraph -->
			<p>The&nbsp;Thomas C. Jenkins Department of Biophysics&nbsp;has a long tradition of excellence in research and teaching and of developing leaders in the scientific community.</p>
			<!-- /wp:paragraph -->
			
			<!-- wp:button {"backgroundColor":"heritage-blue","style":{"border":{"radius":2}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-heritage-blue-background-color has-background" style="border-radius:2px">Get Started</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:column -->
			
			<!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center"><!-- wp:cover {"url":"http://sites.krieger.jhu.edu/wp-content/themes/ksas-blocks/resources/images/campus3.jpg","id":1869,"dimRatio":0,"minHeight":500,"style":{"color":{}}} -->
			<div class="wp-block-cover" style="min-height:500px"><img class="wp-block-cover__image-background wp-image-1869" alt="" src="http://sites.krieger.jhu.edu/wp-content/themes/ksas-blocks/resources/images/campus3.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"></div></div>
			<!-- /wp:cover --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->',
		)
	);
	// Staff Listing Vertical.
	register_block_pattern(
		'ksasblocks/staff-listing',
		array(
			'title'         => esc_html__( 'Staff Listing Vertical', 'ksas-office' ),
			'categories'    => array( 'ksas-office' ),
			'viewportWidth' => 1400,
			'content'       => '
			<!-- wp:group {"className":"staff-listing"} --><div class="wp-block-group staff-listing"><div class="wp-block-group__inner-container"><!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column {"width":"33.33%"} -->
			<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:image {"sizeSlug":"medium","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/resources/images/johns_hopkins.jpg" alt="' . esc_attr__( 'Abstract Rectangles', 'ksas-office' ) . '"/></figure>
			<!-- /wp:image --></div>
			<!-- /wp:column -->
			<!-- wp:column {"width":"66.66%"} -->
			<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:heading -->
			<h2>Johns Hopkins</h2>
			<!-- /wp:heading -->
			<!-- wp:heading {"level":3} -->
			<h3>Founder</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p><a href="mailto:info@jhu.edu">info@jhu.edu</a></p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></div></div>
			<!-- /wp:group -->
			<!-- wp:group {"className":"staff-listing"} -->
			<div class="wp-block-group staff-listing"><div class="wp-block-group__inner-container"><!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column {"width":"33.33%"} -->
			<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:image {"sizeSlug":"medium","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/resources/images/johns_hopkins.jpg" alt="' . esc_attr__( 'Abstract Rectangles', 'ksas-office' ) . '"/></figure>
			<!-- /wp:image --></div>
			<!-- /wp:column -->
			<!-- wp:column {"width":"66.66%"} -->
			<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:heading -->
			<h2>Johns Hopkins</h2>
			<!-- /wp:heading -->
			<!-- wp:heading {"level":3} -->
			<h3>Founder</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p><a href="mailto:info@jhu.edu">info@jhu.edu</a></p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></div></div><!-- /wp:group -->',
		)
	);
	// Staff Listing Horizontal.
	register_block_pattern(
		'ksasblocks/staff-listing-horizontal',
		array(
			'title'         => esc_html__( 'Staff Listing Horizontal', 'ksas-office' ),
			'categories'    => array( 'ksas-office' ),
			'viewportWidth' => 1400,
			'content'       => '<!-- wp:columns -->
			<div class="wp-block-columns staff-listing-horizontal"><!-- wp:column -->
			<div class="wp-block-column staff-listing-heading"><!-- wp:heading -->
			<h2>Our Leadership</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->

			<!-- wp:columns -->
			<div class="wp-block-columns staff-listing-horizontal"><!-- wp:column -->
			<div class="wp-block-column"><!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column -->
			<div class="wp-block-column staff-listing-single"><!-- wp:image {"id":54,"sizeSlug":"large","linkDestination":"none"} -->
			<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/resources/images/johns_hopkins.jpg" alt="' . esc_attr__( 'Abstract Rectangles', 'ksas-office' ) . '"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":4} -->
			<h4>Johns Hopkins</h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Founder</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column staff-listing-single"><!-- wp:image {"id":54,"sizeSlug":"large","linkDestination":"none"} -->
			<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/resources/images/johns_hopkins.jpg" alt="' . esc_attr__( 'Abstract Rectangles', 'ksas-office' ) . '"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":4} -->
			<h4>Johns Hopkins</h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Founder</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column"><!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column -->
			<div class="wp-block-column staff-listing-single"><!-- wp:image {"id":54,"sizeSlug":"large","linkDestination":"none"} -->
			<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/resources/images/johns_hopkins.jpg" alt="' . esc_attr__( 'Abstract Rectangles', 'ksas-office' ) . '"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":4} -->
			<h4>Johns Hopkins</h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Founder</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column staff-listing-single"><!-- wp:image {"id":54,"sizeSlug":"large","linkDestination":"none"} -->
			<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/resources/images/johns_hopkins.jpg" alt="' . esc_attr__( 'Abstract Rectangles', 'ksas-office' ) . '"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":4} -->
			<h4>Johns Hopkins</h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Founder</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->',
		)
	);

	// Introduction.
	register_block_pattern(
		'ksasblocks/introduction',
		array(
			'title'         => esc_html__( 'Introduction', 'ksas-office' ),
			'categories'    => array( 'ksas-office' ),
			'viewportWidth' => 1400,
			'content'       => implode(
				'',
				array(
					'<!-- wp:heading {"align":"center"} -->',
					'<h2 class="has-text-align-center">' . esc_html__( 'The Premier Destination for Modern Art in Sweden', 'ksas-office' ) . '</h2>',
					'<!-- /wp:heading -->',
					'<!-- wp:paragraph {"dropCap":true} -->',
					'<p class="has-drop-cap">' . esc_html__( 'With seven floors of striking architecture, UMoMA shows exhibitions of international contemporary art, sometimes along with art historical retrospectives. Existential, political, and philosophical issues are intrinsic to our program. As visitor, you are invited to guided tours artist talks, lectures, film screenings, and other events with free admission.', 'ksas-office' ) . '</p>',
					'<!-- /wp:paragraph -->',
				)
			),
		)
	);

	// Three Column Feature.
	register_block_pattern(
		'ksasblocks/three-column-feature',
		array(
			'title'         => esc_html__( 'Thee Column Feature', 'ksas-office' ),
			'categories'    => array( 'ksas-office' ),
			'viewportWidth' => 1400,
			'content'       => '<!-- wp:columns -->
			<div class="wp-block-columns three-column-feature"><!-- wp:column {"width":"66.66%"} -->
			<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:heading -->
			<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</h2>
			<!-- /wp:heading --></div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"33.33%"} -->
			<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:paragraph -->
			<p class="has-text-align-right"><a href="#">Explore More</a></p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->

			<!-- wp:columns -->
			<div class="wp-block-columns three-column-feature"><!-- wp:column -->
			<div class="wp-block-column mb-4 px-6 py-8 overflow-hidden bg-white rounded-md shadow-md"><!-- wp:heading -->
			<h2>Explore</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing Ac aliquam ac volutpat, viverra magna risus aliquam massa.</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column mb-4 px-6 py-8 overflow-hidden bg-white rounded-md shadow-md"><!-- wp:heading -->
			<h2>Learn</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing Ac aliquam ac volutpat, viverra magna risus aliquam massa.</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column mb-4 px-6 py-8 overflow-hidden bg-white rounded-md shadow-md"><!-- wp:heading -->
			<h2>Discover</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing Ac aliquam ac volutpat, viverra magna risus aliquam massa.</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->',
		)
	);
}
