<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

get_header();
?>

	<main id="site-content" class="mx-auto prose site-main lg:prose-lg">
		<?php
		if ( function_exists( 'bcn_display' ) ) :
			?>
		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
			<?php bcn_display(); ?>
		</div>
		<?php endif; ?>
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="sr-only entry-title"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			if ( function_exists( 'ksas_blocks_pagination' ) ) :

				ksas_blocks_pagination();

			else :

				the_posts_navigation();

			endif;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
