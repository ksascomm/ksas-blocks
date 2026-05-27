<?php
/**
 * The template for displaying front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

get_header();
?>

	<main id="site-content" class="prose site-main front lg:prose-lg">

		<?php
		while ( have_posts() ) :
			the_post()
			?>
			<?php
			// AGHI website conditional.
			$aghi_site_id  = get_current_blog_id();
			$aghi_site_url = get_blog_details( '82' )->path;
			// Double check Site ID #82 == "/humanities-institute/" slug!
			if ( '/humanities-institute/' === $aghi_site_url && 82 === $aghi_site_id ) :
				get_template_part( 'template-parts/content', 'front-aghi' );
			else :
				get_template_part( 'template-parts/content', 'front' );
			endif;
		endwhile; // End of the loop.
		?>

		<?php

		if ( get_field( 'show_homepage_news_feed', 'option' ) ) :
			// If Show Homepage News Feed Conditional is YES, display news feed.

			$heading       = get_field( 'homepage_news_header', 'option' );
			$news_quantity = get_field( 'homepage_news_posts', 'option' );
			?>

		<div class="divider div-transparent div-dot"></div>

		<div class="container px-2 py-12 news-section section-inner md:px-0">
			<div class="flex flex-wrap justify-between px-4 pb-4 lg:px-0 2xl:max-w-450 2xl:mx-auto">
				<div>
					<h2 class="pb-4 md:pb-0 my-0!"><?php echo esc_html( $heading ); ?>
				</div>
				<div>
					<a class="inline-flex items-center text-base button" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>">
						View All Posts&nbsp;<span class="fa-solid fa-circle-chevron-right" aria-hidden="true"></span></a>
				</div>
			</div>
			
			<?php
			$news_query = new WP_Query(
				array(
					'post_type'           => 'post',
					'posts_per_page'      => (int) $news_quantity,
					'ignore_sticky_posts' => 1,
				)
			);
			if ( $news_query->have_posts() ) :
				?>
			<div class="grid grid-cols-1 gap-8 lg:grid-cols-2 xl:grid-cols-3 2xl:max-w-450 2xl:mx-auto ">
				<?php
				while ( $news_query->have_posts() ) :
					$news_query->the_post();
					get_template_part( 'template-parts/content', 'front-post-excerpt' );
					endwhile;
				?>
			</div>
				<?php
				wp_reset_postdata(); // Reset the loop.
			endif;
			?>
		</div>
	<?php endif; // end of if  show_homepage_news_feed logic. ?>
	</main><!-- #main -->

<?php
get_footer();
