<?php
/**
 * Template part for displaying posts on front page
 *
 * @package KSAS_Blocks
 */

$is_external     = get_post_meta( get_the_ID(), 'ecpt_external_link', true );
$link_url        = $is_external ? esc_url( $is_external ) : esc_url( get_permalink() );
$article_classes = 'article-excerpt py-4 pl-6 pr-5 md:pl-10 md:pr-4 lg:pl-14 lg:pr-12 2xl:pl-[2%] 2xl:pr-0';

// Add specific classes based on sticky status.
$article_classes .= is_sticky() ? ' wp-sticky' : ' border-b border-solid border-grey';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $article_classes ); ?> aria-label="<?php echo esc_attr( get_the_title() ); ?>">
	
	<header class="entry-header">
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta text-grey-darkest">
				<?php ksas_blocks_posted_on(); ?>
			</div>
		<?php endif; ?>

		<h2 class="entry-title text-3xl!">
			<a href="<?php echo esc_url( $link_url ); ?>" rel="bookmark">
				<?php the_title(); ?>
				<?php if ( $is_external ) : ?>
					<i class="fa-regular fa-square-arrow-up-right" aria-hidden="true"></i>
				<?php endif; ?>
			</a>
		</h2>
	</header>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="flex flex-col items-start justify-center h-full mt-8 text-left sm:flex-row sm:justify-start">
			<?php
			the_post_thumbnail(
				'medium',
				array(
					'class' => 'shrink object-cover object-top sm:mb-0 mb-4 mt-0 sm:mr-8 mr-0',
				)
			);
			?>
			<div class="entry-content grow">
				<p class="mt-0! max-w-[60ch]">
					<?php echo esc_html( wp_trim_words( get_the_excerpt(), 55, '...' ) ); ?>
				</p>
			</div>
		</div>
	<?php else : ?>
		<div class="entry-content">
			<p class="max-w-[90ch]">
				<?php echo esc_html( wp_trim_words( get_the_excerpt(), 55, '...' ) ); ?>
			</p>
		</div>
	<?php endif; ?>

</article>