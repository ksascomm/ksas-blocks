<?php
/**
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'slider-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'slider';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}
if ( $is_preview ) {
	$class_name .= ' is-admin';
}

?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?> swiper swiper-container">
	<?php if ( have_rows( 'slides' ) ) : ?>
		<div class="swiper-wrapper">
			<?php
			while ( have_rows( 'slides' ) ) :
				the_row();
				$image = get_sub_field( 'image' );
				?>
				<div class="swiper-slide grid grid-cols-1 lg:grid-cols-3 gap-4">
					<div class="slide-image col-span-2">
						<?php echo wp_get_attachment_image( $image['id'], 'full', '', array( 'class' => 'swiper-lazy' ) ); ?>
						<div class="swiper-lazy-preloader"></div>
					</div>
					<div class="slide-caption">
						<h3><?php the_sub_field( 'title' ); ?></h3>
						<p><?php the_sub_field( 'caption' ); ?></p>
						<?php
						if ( get_sub_field( 'link' ) ) :
							?>
							<a class="button p-4 bg-blue hover:bg-blue-light hover:text-primary transform" href="<?php the_sub_field( 'link' ); ?>" aria-label="Find Out More <?php the_sub_field( 'title' ); ?>">Find Out More <span class="sr-only"><?php the_sub_field( 'title' ); ?></span><span class="far fa-arrow-alt-circle-right"></span></a>
						<?php endif; ?>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
	<?php else : ?>
		<p>Please add some slides by clicking the pencil icon.</p>
	<?php endif; ?>
</div>
