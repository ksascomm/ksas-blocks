<?php
/**
 * Block Name: Testimonials
 *
 * This is the template that displays the testimonials loop block.
 */

$arg_type = get_field( 'loop_argument_type' );
if ( $arg_type == 'count' ) :
	$args = array(
		'orderby'        => 'rand',
		'post_type'      => 'testimonial',
		'posts_per_page' => get_field( 'testimonial_count' ),
	);
else :
	$testimonials = get_field( 'select_testimonials' );
	$args         = array(
		'orderby'   => 'title',
		'post_type' => 'testimonial',
		'post__in'  => $testimonials,
	);
endif;

$class_name = 'testimonial';

if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}
if ( $is_preview ) {
	$class_name .= ' is-admin';
}

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) : ?>
<div class="flex justify-between <?php echo esc_attr( $class_name ); ?>">
	<?php
	while ( $the_query->have_posts() ) :
		$the_query->the_post();
	?>
	<div class="max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-20">
		<div class="flex justify-center md:justify-end -mt-16">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail(
					'large',
					array(
						'class' => 'w-20 h-20 object-cover rounded-full border-2 border-indigo-500 testimonial-image',
						'alt'   => esc_html( get_the_title() ),
					)
				);
			}
			?>
		</div>
		<div>
			<h3 class="text-gray-800 text-3xl font-semibold"><?php the_title(); ?></h3>
			<div class="mt-2 text-gray-600"><?php the_excerpt(); ?></div>
		</div>
		<div class="flex justify-end mt-4">
			<a href="<?php the_permalink(); ?>" class="text-xl font-medium text-indigo-500">Read More</a>
		</div>
	</div>
	<?php endwhile; ?>
</div>
<?php endif; ?>
