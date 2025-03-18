<?php
/**
 * Template part for displaying page content on AGHI website
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>
<div class="mx-auto max-w-screen-xl" id="post-<?php the_ID(); ?>">
	<div class="container md:container md:mx-auto pb-2">
		<div class="flex flex-col w-full">
			<div class="text-xl font-medium text-primary">
				<?php if ( have_rows( 'homepage_hero_images' ) ) : ?>
				<div class="post-thumbnail alignfull relative">
					<?php
					$random_images = get_field( 'homepage_hero_images' );
					shuffle( $random_images );
					// print("<pre>".print_r($random_images,true)."</pre>");
					$random_img_url     = $random_images[0]['homepage_hero_image']['url'];
					$random_img_alt     = $random_images[0]['homepage_hero_image']['alt'];
					$random_img_title   = $random_images[0]['homepage_hero_image']['title'];
					$random_img_caption = $random_images[0]['homepage_hero_caption'];
					?>
					<img class="!mt-0 h-56 w-full object-cover sm:h-72 lg:w-full lg:h-full" src="<?php echo esc_url( $random_img_url ); ?>" alt="<?php echo esc_html( $random_img_alt ); ?>" />
					<div class="caption not-prose">
						<p><?php echo wp_kses_post( $random_img_caption ); ?></p>
					</div>
				</div><!-- .post-thumbnail -->
				<?php endif; ?>
				<div class="entry-content">
					<?php
					the_content();

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ksas-blocks' ),
							'after'  => '</div>',
						)
					);
					?>
				</div>
				<?php if ( get_edit_post_link() ) : ?>
					<footer class="entry-footer">
						<?php
						edit_post_link(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Edit <span class="sr-only">%s</span>', 'ksas-blocks' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post( get_the_title() )
							),
							'<span class="edit-link">',
							'</span>'
						);
						?>
					</footer><!-- .entry-footer -->
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
