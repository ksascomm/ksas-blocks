<?php
/**
 * Template part for displaying posts on front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>
<?php if ( is_sticky() ) : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'article-excerpt prose lg:prose-lg xl:prose-xl mx-auto p-4 mb-4 wp-sticky' ); ?> aria-label="<?php the_title(); ?>">
	<?php else : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'article-excerpt prose lg:prose-lg xl:prose-xl mx-auto border-b border-solid border-grey p-4 mb-4' ); ?> aria-label="<?php the_title(); ?>">
	<?php endif; ?>
	<header class="entry-header">
		<?php

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta text-grey-darkest">
				<?php
				ksas_blocks_posted_on();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		<?php if ( get_post_meta( get_the_ID(), 'ecpt_external_link', true ) ) : ?>
			<?php the_title( '<h2 class="entry-title text-3xl!"><a href="' . esc_url( get_post_meta( $post->ID, 'ecpt_external_link', true ) ) . '" rel="bookmark">', ' <i class="fa-regular fa-square-arrow-up-right"></i></a></h2>' ); ?>
				</a>
			<?php else : ?>
				<?php the_title( '<h2 class="entry-title text-3xl!"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<?php endif; ?>
	</header><!-- .entry-header -->
	<?php
	/**
	 * This differs from theme's post_thumbnail()
	 *
	 * See inc/template-tags.php for that function
	 */
	if ( has_post_thumbnail() ) :
		?>
		<div class="flex flex-col items-start justify-center h-full text-left sm:flex-row sm:justify-start">
			<?php
				the_post_thumbnail(
					'medium',
					array(
						'class' => 'shrink object-cover object-top !sm:mb-0 mb-4! mt-0! sm:mr-8 mr-0',
					)
				);
			?>
			<div class="entry-content grow">
				<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 55, '...' ) ); ?></p>
			</div><!-- .entry-content -->
		</div>
	<?php else : ?>

			<div class="entry-content lg:pr-12 xl:pl-0">
				<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 55, '...' ) ); ?></p>
			</div><!-- .entry-content -->

	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
