<?php
/**
 * Template Name: Bulletin Board
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

get_header();
?>

<main id="site-content" class="pb-2 mx-auto prose site-main lg:prose-lg">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'page' );
	endwhile;
	?>

	<div class="pl-6 pr-2 lg:pr-12 xl:pl-0 xl:pr-0">
	<?php
	// RENAME: $terms to $bulletin_terms to avoid global collision.
	$bulletin_terms = get_terms(
		array(
			'taxonomy'   => 'bbtype',
			'hide_empty' => true,
		)
	);

	// Ensure we have terms and no errors before looping.
	if ( ! is_wp_error( $bulletin_terms ) && ! empty( $bulletin_terms ) ) :
		foreach ( $bulletin_terms as $bulletin_term ) :
			$bulletins_query = new WP_Query(
				array(
					'post_type'      => 'bulletinboard',
					'posts_per_page' => -1,
					'tax_query'      => array(
						array(
							'taxonomy' => 'bbtype',
							'field'    => 'slug',
							'terms'    => $bulletin_term->slug,
						),
					),
				)
			);

			if ( $bulletins_query->have_posts() ) :
				?>
				<h2 class="bulletin-category-title" id="<?php echo esc_attr( $bulletin_term->slug ); ?>">
					<?php echo esc_html( $bulletin_term->name ); ?>
				</h2>

				<?php
				while ( $bulletins_query->have_posts() ) :
					$bulletins_query->the_post();
					?>
					<div class="mb-4 border-b bulletin border-grey-light">
						<details class="group">
							<summary class="block p-5 font-bold leading-normal transition-colors cursor-pointer font-heavy hover:bg-grey-lightest">
								<?php the_title(); ?>
							</summary>
							
							<div class="px-5 pb-5">
								<ul class="entry-meta mbe-0! pl-0!">
									<li><strong>Posted:</strong> <?php the_time( 'F j, Y' ); ?></li>
									<?php if ( get_field( 'bulletin_deadline' ) ) : ?>
										<li><strong>Deadline:</strong> <?php the_field( 'bulletin_deadline' ); ?></li>
									<?php endif; ?>
								</ul>

								<p class="mb-4">
									<?php
									// Trim the words first, then escape the final string for output.
									echo esc_html( wp_trim_words( get_the_excerpt(), 65 ) );
									?>
									<a href="<?php the_permalink(); ?>" class="font-bold font-heavy text-blue hover:underline" aria-label="Read Full Posting of '<?php echo esc_attr( get_the_title() ); ?>'">
										Read Full Posting &raquo;
									</a>
								</p>
							</div>
						</details>
					</div>
					<?php
				endwhile;
				wp_reset_postdata(); // Reset inside the term loop.
				?>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>
	</div>
</main>

<?php
get_footer();
