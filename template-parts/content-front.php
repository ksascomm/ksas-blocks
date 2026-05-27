<?php
/**
 * Template part for displaying page content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>

<div class="mx-auto max-w-[120ch]" id="post-<?php the_ID(); ?>">
			<div class="text-xl font-medium text-primary">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php ksas_blocks_post_thumbnail(); ?>
				<?php endif; ?>
				<div class="pl-4 pr-4 leading-normal entry-content lg:pr-12 xl:pl-0 xl:pr-0">
					<?php
					the_content();

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ksas-office' ),
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
									__( 'Edit <span class="sr-only">%s</span>', 'ksas-office' ),
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
