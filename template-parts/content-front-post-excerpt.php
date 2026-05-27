<?php
/**
 * Template part for displaying page content in front-blog.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'article-excerpt blog-excerpt prose lg:prose-lg xl:prose-xl mx-auto mb-4 w-full' ); ?> aria-label="<?php the_title(); ?>">
<?php
	/**
	 * This differs from theme's post_thumbnail()
	 *
	 * See inc/template-tags.php for that function
	 */
if ( has_post_thumbnail() ) :
	?>
	<?php
	$thumbnail_id    = get_post_thumbnail_id( $post->ID );
	$img_alt         = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
	$container_class = $img_alt ? '' : 'no-alt';
	?>
		<div class="news-thumb hidden lg:block lg:h-84 xl:h-100 <?php echo esc_attr( $container_class ); ?>">
		<?php
			the_post_thumbnail(
				'large',
				array(
					'class'   => 'w-full h-0 lg:h-full object-cover pr-0',
					'loading' => 'lazy',
				)
			);
		?>
		</div>
	<?php endif; ?>
		<header class="px-4 pt-4 xl:px-6 xl:pt-8 entry-header">
			<?php
			ksas_blocks_posted_on();
			?>
		<?php if ( get_post_meta( $post->ID, 'ecpt_external_link', true ) ) : ?>
			<?php the_title( '<h3 class="entry-title external-link text-2xl!"><a class="front-post" href="' . esc_url( get_post_meta( $post->ID, 'ecpt_external_link', true ) ) . '" rel="bookmark" target="_blank" rel="noopener">', '</a></h3>' ); ?>
		<?php else : ?>
			<?php the_title( '<h3 class="entry-title text-2xl!"><a class="front-post" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
		<?php endif; ?>
		</header><!-- .entry-header -->
		<div class="px-4 pb-4 text-lg leading-normal xl:px-6 entry-content">
			<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 40, '...' ) ); ?></p>
		</div><!-- .entry-content -->
	</article><!-- #post-<?php the_ID(); ?> -->
