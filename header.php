<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package KSAS_Blocks
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="date" content="<?php the_modified_date(); ?>" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-PDL5K37');</script>
	<!-- End Google Tag Manager -->
	<?php
	if ( get_field( 'siteimprove', 'option' ) ) :
		?>
	<!-- Siteimprove Analytics -->
	<script async src="https://siteimproveanalytics.com/js/siteanalyze_11464.js"></script>
	<!-- End Siteimprove Analytics -->
	<?php endif; ?>
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PDL5K37"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<a class="skip-link screen-reader-text" href="#site-content"><?php esc_html_e( 'Skip to content', 'ksas-blocks' ); ?></a>
<?php wp_body_open(); ?>
	<header id="site-header" class="w-full shadow-sm header-footer-group sm:justify-between sm:items-baseline bg-blue" role="banner">
		<div class="header-titles-wrapper">
			<div class="header-inner section-inner">
				<div class="grid grid-cols-1 header-titles lg:grid-cols-3 gap-x-12">
					<div class="h-auto mx-auto shield">
					<?php if ( get_field( 'shield', 'option' ) == 'jhu' ) : ?>
						<a href="https://www.jhu.edu/" title="Johns Hopkins University">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/university.shield.svg" class="w-full h-auto p-2 hover:opacity-75" alt="JHU Shield, to the JHU homepage" role="img">
						</a>
					<?php else : ?>
						<a href="https://krieger.jhu.edu" rel="home">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/krieger.shield.svg" class="w-full h-auto p-2 hover:opacity-75" alt="KSAS Shield, to the KSAS homepage" role="img">
						</a>	
					<?php endif; ?>
					</div>
					<div class="content-center mt-4 mb-12 lg:col-span-2 lg:mt-0 md:mb-0">
						<h1 class="text-2xl site-title sm:text-xl md:text-2xl lg:text-4xl ">
							<a class="text-white hover:text-grey no-underline hover:underline! hover:underline-offset-2!" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php
									$ksas_blocks_description = get_bloginfo( 'description', 'display' );
								if (
									$ksas_blocks_description || is_customize_preview() ) :
									echo '<span class="block pt-2 text-xl font-normal">' . $ksas_blocks_description . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
									?>
								<?php endif; ?>
									<?php bloginfo( 'name' ); ?>
							</a>
						</h1>
					</div>
				</div><!-- .header-titles -->
				<button class="toggle search-toggle mobile-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false" type="button">
					<span class="toggle-inner">
						<span class="toggle-icon">
							<?php twentytwenty_the_theme_svg( 'search' ); ?>
						</span>
						<span class="toggle-text"><?php _ex( 'Search', 'toggle text', 'ksas-blocks' ); ?></span>
					</span>
				</button><!-- .search-toggle -->
				<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle" type="button">
					<span class="toggle-inner">
						<span class="toggle-icon">
							<?php twentytwenty_the_theme_svg( 'ellipsis' ); ?>
						</span>
						<span class="toggle-text"><?php _e( 'Menu', 'ksas-blocks' ); ?></span>
					</span>
				</button><!-- .nav-toggle -->
			</div><!-- .header-inner -->
		</div><!-- .header-titles-wrapper -->
		<div class="bg-white header-navigation-wrapper">
			<div class="flex justify-between header-inner section-inner">
				<div class="menu-container">
					<button class="menu-button" aria-controls="site-header-menu" type="button"><span class="screen-reader-text"><?php esc_html_e( 'Menu', 'rwc' ); ?></span></button>
					<div id="site-header-menu" class="site-header-menu text-primary">
						<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'rwc' ); ?>">
						<?php
							wp_nav_menu(
								array(
									'theme_location'  => 'main-nav',
									'menu_id'         => 'primary-menu',
									'container_class' => 'nav-primary',
									'depth'           => 3,
								)
							);
							?>
						</nav>
					</div>
				</div><!-- .primary-menu-wrapper -->
				<div class="header-toggles hide-no-js">

					<div class="toggle-wrapper search-toggle-wrapper">

						<button class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false" type="button">
							<span class="toggle-inner">
							<?php twentytwenty_the_theme_svg( 'search' ); ?>
								<span class="toggle-text hover:underline hover:decoration-blue hover:decoration-2 hover:underline-offset-4"><?php _ex( 'Search', 'toggle text', 'ksas-blocks' ); ?></span>
							</span>
						</button><!-- .search-toggle -->

					</div>

				</div><!-- .header-toggles -->
			</div><!-- .header-inner -->

		</div><!-- .header-navigation-wrapper -->

		<?php
			get_template_part( 'inc/modal-search' );
		?>
	</header><!-- #site-header -->
	<?php
	get_template_part( 'inc/modal-menu' );
