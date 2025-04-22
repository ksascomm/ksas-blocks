<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header pl-4 pr-4 xl:pl-0 xl:pr-0 flex flex-wrap flex-col md:flex-row my-4">
		<div class="flex-initial">
		<?php
			the_post_thumbnail(
				'medium',
				array(
					'class' => 'mr-6',
					'alt'   => the_title_attribute(
						array(
							'echo' => false,
						)
					),
				)
			);
			?>
			</div>
			<div class="flex-1">
			<?php the_title( '<h1 class="entry-title mt-0! pb-4">', '</h1>' ); ?>
		<?php if ( have_rows( 'custom_profile_fields' ) ) : ?>
			<?php
			while ( have_rows( 'custom_profile_fields' ) ) :
				the_row();
				?>
			<h2>
				<span class="custom-title text-2xl">
					<?php the_sub_field( 'custom_title' ); ?>
				</span>
				<span class="custom-content text-2xl">
					<?php the_sub_field( 'custom_content' ); ?>
				</span>
			</h2>
			<?php endwhile; ?>

		<?php endif; ?>
			</div>
		</div><!-- .entry-header -->

	<div class="entry-content py-2 pl-4 pr-4 lg:pr-12 xl:pl-0 xl:pr-0 xl:max-w-[85ch]">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="sr-only">%s</span>', 'ksas-department-tailwind' ),
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
</article><!-- #post-<?php the_ID(); ?> -->
