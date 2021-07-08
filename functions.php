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
	define( 'KSAS_BLOCKS_VERSION', '1.0.0' );
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
		//add_theme_support( 'title-tag' );

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
			$content_width = 640;
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
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar 2', 'ksas-blocks' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'ksas-blocks' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar 3', 'ksas-blocks' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Add widgets here.', 'ksas-blocks' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar 4', 'ksas-blocks' ),
			'id'            => 'sidebar-4',
			'description'   => esc_html__( 'Add widgets here.', 'ksas-blocks' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
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
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function twentytwenty_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'twentytwenty_skip_link_focus_fix' );

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

	wp_enqueue_script( 'ksas-blocks-script', get_template_directory_uri() . '/dist/js/bundle.min.js', array(), KSAS_BLOCKS_VERSION, false );
	wp_script_add_data( 'ksas-blocks-script', 'async', true );

	wp_enqueue_script( 'font-awesome', 'https://kit.fontawesome.com/ed22ca715b.js', array(), '5.15.1', false );

	wp_enqueue_script( 'google-tag-manager', 'https://www.googletagmanager.com/gtag/js?id=UA-40512757-1', array(), null, false );
}
add_action( 'wp_enqueue_scripts', 'ksas_blocks_scripts' );

/** Add defer attribute to specific scripts */
function add_defer_attribute( $tag, $handle ) {
	// add script handles to the array below
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
	// add script handles to the array below
	$scripts_to_async = array( 'google-tag-manager' );

	foreach ( $scripts_to_async as $async_script ) {
		if ( $async_script === $handle ) {
			return str_replace( ' src', ' async="async" src', $tag );
		}
	}
	return $tag;
}

add_filter( 'script_loader_tag', 'add_async_attribute', 10, 2 );


// Register a slider block.
add_action( 'acf/init', 'my_register_blocks' );
/**
 * Register a custom slider block using ACF Pro.
 */
function my_register_blocks() {

	// check function exists.
	if ( function_exists( 'acf_register_block_type' ) ) {

		// register a slider block.
		acf_register_block_type(
			array(
				'name'            => 'slider',
				'title'           => __( 'Slider' ),
				'description'     => __( 'A custom slider block.' ),
				'render_template' => 'template-parts/blocks/slider/slider.php',
				'category'        => 'formatting',
				'icon'            => 'images-alt2',
				'align'           => 'full',
				'mode'            => 'preview',
				'enqueue_assets'  => function() {
					wp_enqueue_style( 'swiper', 'https://unpkg.com/swiper/swiper-bundle.css', array(), '6.6.2' );
					wp_enqueue_script( 'swiper', 'https://unpkg.com/swiper/swiper-bundle.min.js', array( 'jquery' ), '6.6.2', true );
					wp_enqueue_style( 'block-slider', get_template_directory_uri() . '/template-parts/blocks/slider/slider.css', array(), '1.0.0' );
					wp_enqueue_script( 'block-slider', get_template_directory_uri() . '/template-parts/blocks/slider/slider.js', array(), '1.0.0', true );
				},
			)
		);
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
