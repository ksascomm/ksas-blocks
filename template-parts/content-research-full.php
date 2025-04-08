<?php
/**
 * Template part for displaying full single post content in single-ksasresearchprojects.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="pl-4 pr-2 entry-content lg:pr-12 xl:pl-0 xl:pr-0">
		<div class="grid gap-8 mb-6 toolkit-meta lg:grid-cols-3">
			<?php if ( has_post_thumbnail() ) : ?>
			<div>
				<?php
				the_post_thumbnail(
					'large',
				);
				?>
			</div>
			<?php endif; ?>
			<div class="lg:col-span-2">
				<dl class="pt-2 not-prose">
					<?php
					if ( get_field( 'author' ) ) :
						?>
						<dt class="text-base lg:-mb-2">Author</dt>
						<dd class="pb-6 text-lg font-bold font-heavy"><?php the_field( 'author' ); ?></dd>
					<?php endif; ?>
				
					<dt class="text-base lg:-mb-2">Published</dt>
					<dd class="pb-6 text-lg font-bold font-heavy"><?php echo get_the_date(); ?></dd>
					
					<dt class="text-base lg:-mb-2">Category</dt>
					<dd class="pb-6 text-lg font-bold font-heavy">
					<?php
						$terms = get_the_terms( get_the_ID(), 'project_type' );
					if ( $terms && ! is_wp_error( $terms ) ) :
						$term_links = array();
						foreach ( $terms as $term ) {
							$term_links[] = '<a href="' . esc_attr( get_term_link( $term->slug, 'project_type' ) ) . '">' . __( $term->name ) . '</a>';
						}
						$all_terms = join( ', ', $term_links );
						echo '<span class="terms-' . esc_attr( $term->slug ) . '">' . __( $all_terms ) . '</span>';
						endif;
					?>
					</dd>
				</dl>
				<?php if ( ! empty( get_post_meta( $post->ID, 'ecpt_associate_name', true ) ) ) : ?>
				<ul>
					<?php if ( get_post_meta( $post->ID, 'ecpt_associate_name', true ) ) : ?>
					<li><strong><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_associate_name', true ) ); ?></strong></li>
				<?php endif; ?>
					<?php if ( get_post_meta( $post->ID, 'ecpt_dates', true ) ) : ?>
					<li><strong><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_dates', true ) ); ?></strong></li>
				<?php endif; ?>
				</ul>
			<?php endif; ?>
			</div>
		</div>
	
			

		<?php
		the_content();
		?>

		<?php
		if ( get_field( 'endnotes' ) ) :
			?>
			<h2>Course Documents</h2>
			<?php the_field( 'endnotes' ); ?>
		<?php endif; ?>
		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ksas-blocks' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

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
</article><!-- #post-<?php the_ID(); ?> -->
