<?php
/**
 * Template Name: People Directory
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

get_header();
?>

	<main id="site-content" class="site-main prose sm:prose lg:prose-lg mx-auto">
	
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>
		<?php
		$positions      = get_terms(
			'role',
			array(
				'orderby'    => 'slug',
				'order'      => 'ASC',
				'hide_empty' => true,
			)
		);
		$position_slugs = array();
		foreach ( $positions as $position ) {
			$position_slugs[] = $position->slug;
		}
		$position_classes = implode( ' ', $position_slugs );
		?>

		<?php foreach ( $positions as $position ) : ?>
			<?php
			$position_slug    = $position->slug;
			$position_name    = $position->name;
				$people_query = new WP_Query(
					array(
						'post_type'      => 'people',
						'role'           => $position_slug,
						'meta_key'       => 'ecpt_people_alpha',
						'orderby'        => 'meta_value',
						'order'          => 'ASC',
						'posts_per_page' => '250',
					)
				);

			if ( $people_query->have_posts() ) :
				?>
				<div class="pt-2 role-title <?php echo esc_html( $position->slug ); ?>">
					<h2 class="uppercase"><?php echo esc_html( $position_name ); ?></h2>
				</div>

				<?php
				while ( $people_query->have_posts() ) :
					$people_query->the_post();
					if ( get_post_meta( $post->ID, 'ecpt_bio', true ) ) :
						get_template_part( 'template-parts/content-people-full' );
					else :
						get_template_part( 'template-parts/content-people-excerpt' );
					endif;
				endwhile;
			endif;
		endforeach;
		wp_reset_postdata();
		?>

	</main><!-- #main -->

<?php
get_footer();
