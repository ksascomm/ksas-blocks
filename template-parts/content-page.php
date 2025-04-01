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
<?php
if ( has_post_thumbnail() ) :
	?>
	<div class="alignfull featured-image-area front-featured-image-area" role="banner">
		<div class="flex bg-white h-auto lg:h-80">
			<div class="flex lg:items-center lg:justify-start xl:justify-center text-left px-6 sm:w-full lg:w-2/5">
				<h1 class="entry-title">
					<?php the_title(); ?>
				</h1>
			</div>
			<div class="hidden lg:block lg:w-3/5" style="clip-path:polygon(5% 0, 100% 0%, 100% 100%, 0 100%)">
				<?php
				the_post_thumbnail(
					'full',
					array(
						'class' => 'h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full',
						'title' => 'Feature image',
					)
				);
				?>
			</div>
		</div>
	</div>
	<?php else : ?>
	<!-- Put conditional here to print page title when no featured image -->
	<div class="alignfull mt-0!" role="banner">
		<div class="flex bg-white lg:bg-grey-cool front-featured-image-area h-auto lg:h-40">
			<div class="flex lg:items-center px-6 xl:ml-32">
				<h1 class="entry-title">
					<?php the_title(); ?>
				</h1>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<div class="wayfinding md:mb-8 ml-4 xl:ml-0">
		<?php get_template_part( 'template-parts/sidebar-menu' ); ?>
		<?php
		if ( function_exists( 'bcn_display' ) ) :
			?>
			<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
				<?php bcn_display(); ?>
			</div>
		<?php endif; ?>
	</div>

	<div class="entry-content pl-4 pr-2 lg:pr-12 xl:pl-0 xl:pr-0">
		<?php
		the_content();

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
