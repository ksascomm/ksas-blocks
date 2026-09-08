<?php
/**
 * Template part for displaying full single post content in single-ksasresearchprojects.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

$ksas_current_id = get_the_ID(); // Cached ID for better readability and performance.
?>

<article id="post-<?php echo esc_attr( $ksas_current_id ); ?>" <?php post_class( '' ); ?>>
	<div class="alignfull mt-0!">
		<div class="flex h-auto bg-white lg:bg-grey-cool front-featured-image-area lg:h-40">
			<div class="flex w-full px-4 mx-auto prose lg:prose-lg lg:items-center">
				<h1 class=" leading-10 sm:leading-none text-4xl! py-8 mb-0! pl-6 pr-5 md:pl-10 md:pr-4 2xl:pl-4 max-w-[65ch]">
					<?php the_title(); ?>
				</h1>
			</div>
		</div>
	</div>
	
	<?php if ( function_exists( 'bcn_display' ) ) : ?>
		<nav class="ml-8 wayfinding xl:pl-0 lg:ml-14 2xl:ml-[2%]" aria-label="Breadcrumb Navigation">
			<div class="ml-0! breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
				<?php bcn_display(); ?>
			</div>
		</nav>
	<?php endif; ?>

	<div class="entry-content pl-6 pr-5 md:pl-10 md:pr-4 lg:pl-14 lg:pr-12 2xl:pl-[2%] 2xl:pr-0">
		<div class="grid gap-8 mb-6 toolkit-meta lg:grid-cols-3">
			<?php if ( has_post_thumbnail() ) : ?>
				<div>
					<?php the_post_thumbnail( 'large' ); ?>
				</div>
			<?php endif; ?>
			
			<div class="lg:col-span-2">
				<dl class="pt-2 not-prose">
					<?php if ( get_field( 'author' ) ) : ?>
						<dt class="text-base lg:-mb-2">Author</dt>
						<dd class="pb-6 text-lg font-bold font-heavy"><?php the_field( 'author' ); ?></dd>
					<?php endif; ?>
				
					<dt class="text-base lg:-mb-2">Published</dt>
					<dd class="pb-6 text-lg font-bold font-heavy"><?php echo get_the_date(); ?></dd>
					
					<dt class="text-base lg:-mb-2">Category</dt>
					<dd class="pb-6 text-lg font-bold font-heavy">
					<?php
					$terms = get_the_terms( $ksas_current_id, 'project_type' );
					if ( $terms && ! is_wp_error( $terms ) ) :
						$term_links = array();
						foreach ( $terms as $project_term ) {
							$term_links[] = '<a href="' . esc_attr( get_term_link( $project_term->slug, 'project_type' ) ) . '">' . esc_html( $project_term->name ) . '</a>';
						}
						$all_terms = join( ', ', $term_links );
						echo '<span class="terms-' . esc_attr( $project_term->slug ) . '">' . wp_kses_post( $all_terms ) . '</span>';
					endif;
					?>
					</dd>
				</dl>
				
				<?php if ( ! empty( get_post_meta( $ksas_current_id, 'ecpt_associate_name', true ) ) ) : ?>
					<ul>
						<?php if ( get_post_meta( $ksas_current_id, 'ecpt_associate_name', true ) ) : ?>
							<li><strong><?php echo esc_html( get_post_meta( $ksas_current_id, 'ecpt_associate_name', true ) ); ?></strong></li>
						<?php endif; ?>
						<?php if ( get_post_meta( $ksas_current_id, 'ecpt_dates', true ) ) : ?>
							<li><strong><?php echo esc_html( get_post_meta( $ksas_current_id, 'ecpt_dates', true ) ); ?></strong></li>
						<?php endif; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	
		<div class="prose lg:prose-lg max-w-none">
			<?php
			the_content();
			?>

			<?php if ( get_field( 'endnotes' ) ) : ?>
				<h2>Course Documents</h2>
				<?php the_field( 'endnotes' ); ?>
			<?php endif; ?>
		</div>

		<?php
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
		</footer>
	<?php endif; ?>
	</article>