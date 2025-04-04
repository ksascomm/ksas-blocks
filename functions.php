<?php
/**
 * KSAS_Blocks functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package KSAS_Blocks
 */

if ( ! defined( 'KSAS_BLOCKS_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'KSAS_BLOCKS_VERSION', '8.0.0' );
}

if ( ! function_exists( 'ksas_blocks_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ksas_blocks_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on KSAS_Blocks, use a find and replace
		 * to change 'ksas-blocks' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ksas-blocks', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-nav' => esc_html__( 'The Main Menu', 'ksas-blocks' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Set content-width.
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1000;
		}

		/*
		* Adds `async` and `defer` support for scripts registered or enqueued
		* by the theme.
		*/
		$loader = new TwentyTwenty_Script_Loader();
		add_filter( 'script_loader_tag', array( $loader, 'filter_script_loader_tag' ), 10, 2 );
	}
endif;
add_action( 'after_setup_theme', 'ksas_blocks_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ksas_blocks_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar 1', 'ksas-blocks' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ksas-blocks' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar 2', 'ksas-blocks' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'ksas-blocks' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar 3', 'ksas-blocks' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Add widgets here.', 'ksas-blocks' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar 4', 'ksas-blocks' ),
			'id'            => 'sidebar-4',
			'description'   => esc_html__( 'Add widgets here.', 'ksas-blocks' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'ksas-blocks' ),
			'id'            => 'sidebar-footer',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'ksas-blocks' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ksas_blocks_widgets_init' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Pagination
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Block Patterns
 */
require get_template_directory() . '/inc/block-patterns.php';

/**
 * Gutenberg Editor
 */
require get_template_directory() . '/inc/gutenberg.php';

/**
 * Various clean up functions
 */
require get_template_directory() . '/inc/cleanup.php';

/**
 * Handle SVG icons
 */
require get_template_directory() . '/inc/class-twentytwenty-svg-icons.php';
require get_template_directory() . '/inc/svg-icons.php';

/**
 * Custom script loader class
 */
require get_template_directory() . '/inc/class-twentytwenty-script-loader.php';

/**
 * Open Graph Meta Tags
 */
require get_template_directory() . '/inc/open-graph-icons.php';

/**
 * Load ACF compatibility file.
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	require get_template_directory() . '/inc/acf-options.php';
}

/**
 * Include a skip to content link at the top of the page so that users can bypass the menu.
 */
function twentytwenty_skip_link() {
	echo '<div role="navigation" aria-label="Skip to main content"><a class="skip-link sr-only" href="#site-content">' . __( 'Skip to the content', 'ksas-blocks' ) . '</a></div>';
}

add_action( 'wp_body_open', 'twentytwenty_skip_link', 5 );

/**
 * Enqueue scripts and styles.
 */
function ksas_blocks_scripts() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'ksas-blocks-style', get_template_directory_uri() . '/dist/css/style.css', array(), filemtime( get_template_directory() . '/dist/css/style.css' ), false );
	wp_style_add_data( 'ksas-blocks-style', 'rtl', 'replace' );

	wp_enqueue_script( 'ksas-blocks-script', get_template_directory_uri() . '/dist/js/bundle.min.js', array( 'jquery' ), KSAS_BLOCKS_VERSION, true );
	wp_script_add_data( 'ksas-blocks-script', 'defer', true );

	wp_enqueue_script( 'navbar', get_template_directory_uri() . '/dist/js/navbar.min.js', array( 'jquery' ), KSAS_BLOCKS_VERSION, true );
	wp_script_add_data( 'navbar', 'defer', true );

	wp_enqueue_script( 'font-awesome', 'https://kit.fontawesome.com/72c92fef89.js', array(), '6.4.2', false );
	wp_script_add_data( 'fontawesome', array( 'crossorigin' ), array( 'anonymous' ) );

}
add_action( 'wp_enqueue_scripts', 'ksas_blocks_scripts' );

/** Add defer attribute to specific scripts */
function add_defer_attribute( $tag, $handle ) {
	// Add script handles to the array below.
	$scripts_to_defer = array( 'font-awesome' );

	foreach ( $scripts_to_defer as $defer_script ) {
		if ( $defer_script === $handle ) {
			return str_replace( ' src', ' defer="defer" src', $tag );
		}
	}
	return $tag;
}

add_filter( 'script_loader_tag', 'add_defer_attribute', 10, 2 );

/** Add async attribute to specific scripts */
function add_async_attribute( $tag, $handle ) {
	// Add script handles to the array below.
	$scripts_to_async = array( 'google-tag-manager' );

	foreach ( $scripts_to_async as $async_script ) {
		if ( $async_script === $handle ) {
			return str_replace( ' src', ' async="async" src', $tag );
		}
	}
	return $tag;
}

add_filter( 'script_loader_tag', 'add_async_attribute', 10, 2 );


/**
 * Register a custom slider block using ACF Pro.
 */
add_action( 'acf/init', 'my_register_blocks' );

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
	}
}

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
 * Get the top ancestor ID
 * Used to only show child & grandchild pages in sidebar dropdown menu
 */
function get_the_top_ancestor_id() {
	global $post;
	if ( $post->post_parent ) {
		$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
		return $ancestors[0];
	} else {
		return $post->ID;
	}
}

/**
 * WP_nav_menu separate submenu output.
 *
 * Optional $args contents:
 *
 * string theme_location - The menu that is desired.  Accepts (matching in order) id, slug, name. Defaults to blank.
 * string xpath - Optional. xPath syntax.
 * string before - Optional. Text before the menu tree.
 * string after - Optional. Text after the menu tree.
 * bool echo - Optional, default is TRUE. Whether to echo the menu or return it.
 *
 * @param array $args Arguments
 * @return String If $echo value is set to FALSE.
 *
 * @link https://www.isitwp.com/wp_nav_menu-separate-submenu-output/
 */
function internal_page_submenu( $args = array() ) {
	$defaults = array(
		'theme_location' => 'main-nav',
		'xpath'          => "./li[contains(@class,'current-menu-item') or contains(@class,'current-menu-ancestor')]/ul",
		'before'         => '',
		'after'          => '',
		'echo'           => true,
	);
	$args     = wp_parse_args( $args, $defaults );
	$args     = (object) $args;

	$output = array();

	$menu_tree     = wp_nav_menu(
		array(
			'theme_location' => $args->theme_location,
			'container'      => '',
			'echo'           => false,
		)
	);
	$menu_tree_XML = new SimpleXMLElement( $menu_tree );
	$path          = $menu_tree_XML->xpath( $args->xpath );

	$output[] = $args->before;

	if ( ! empty( $path ) ) {
		$output[] = $path[0]->asXML();
	}

	$output[] = $args->after;

	if ( $args->echo ) {
		echo implode( '', $output );
	} else {
		return implode( '', $output );
	}

}


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
 * Category and tag meta information for posts
 *
 * @package KSAS_Blocks
 * @since KSAS_Blocks 2.0.0
 */

if ( ! function_exists( 'ksas_blocks_blog_category_meta' ) ) :
	function ksas_blocks_blog_category_meta() {
		echo '<div class="post-taxonomies">';
		$categories = get_the_category();
		$separator  = ' | ';
		$output     = '';
		if ( ! empty( $categories ) ) {
			echo '<span class="cat-links">';
			foreach ( $categories as $category ) {
					$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
			}
			echo trim( $output, $separator );
			echo '</span>';
		}
		echo '</div>';
	}
	endif;

/**
 * Entry meta information for posts
 *
 * @package KSAS_Blocks
 * @since KSAS_Blocks 2.0.0
 */
if ( ! function_exists( 'ksas_blocks_blog_entry_meta' ) ) :
	function ksas_blocks_blog_entry_meta() {
		echo '<div class="entry-meta">';
		if ( ! is_author() ) :
			// Hide 'By...' field on author archive page.
			echo '<div class="posted-by">';
				// CEASE PublishPress Authors plugin conditional.
				// ADD Co-Authors Plus function conditional.
			if ( function_exists( 'coauthors_posts_links' ) ) {
				coauthors_posts_links();
			} else {
				// Revert to core functions if no plugin.
				printf(
					/* translators: %s author name. */
					esc_html__( 'By %s', 'ksasacademic' ),
					'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author">' . esc_html( get_the_author() ) . '</a><br>'
				);
			}
			if ( is_single() ) :
				// Show email address on single post.
				?>
				<span class="contact"><br><i class="fa-solid fa-at"></i> <a href="mailto:<?php echo esc_html( get_the_author_meta( 'user_email' ) ); ?>?subject=Response to: <?php the_title(); ?>">Contact the author</a></span>
			<?php endif; ?>
			<?php
			echo '</div>';
		endif;
		// Set up time variable and echo below.
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);
			echo '<div class="posted-on">';
				printf(
					/* translators: %s: publish date. */
					esc_html__( '%s', 'ksasacademic' ),
					$time_string // phpcs:ignore WordPress.Security.EscapeOutput
				);
			echo '</div>';
		echo '</div>';
	}
endif;

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
				wp_redirect( esc_url( $link ), 301 );
				exit;
			}
		}
	}
}
add_action( 'template_redirect', 'redirect_empty_bios' );
