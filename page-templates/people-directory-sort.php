<?php
/**
 * Template Name: People Directory (Sort)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

get_header();
?>

	<main id="site-content" class="mx-auto mb-12 prose site-main lg:prose-lg">
	
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>
		<form class="p-4 mx-2 my-4 border-2 border-solid isotope-to-sort bg-grey-lightest border-grey lg:mx-0" id="filters">
			<fieldset class="flex-col justify-start lg:flex-row">
				<legend class="mb-2">Filter by Position or Title:</legend>
				<?php
				$positions = get_terms(
					array(
						'taxonomy'   => 'role',
						'orderby'    => 'slug',
						'order'      => 'ASC',
						'hide_empty' => true,
					)
				);
				?>
				<?php foreach ( $positions as $position ) : ?>
					<button class="p-2 text-lg text-white all button bg-blue hover:bg-blue-light hover:text-primary" href="javascript:void(0)" data-filter=".<?php echo esc_html( $position->slug ); ?>">
						<?php echo esc_html( $position->name ); ?>
					</button>
				<?php endforeach; ?>
			</fieldset>
			<?php
			$filters = get_terms(
				array(
					'taxonomy'   => 'filter',
					'orderby'    => 'slug',
					'order'      => 'ASC',
					'hide_empty' => true,
				)
			);
			if ( ! empty( $filters ) && ! is_wp_error( $filters ) ) :
				?>
				<fieldset class="flex flex-col flex-wrap justify-start md:flex-row">
					<legend class="mt-6 mb-2">Filter by Area of Expertise:</legend>
					<?php foreach ( $filters as $filter ) : ?>
						<button class="p-2 text-lg text-white all button bg-blue hover:bg-blue-light hover:text-primary" href="javascript:void(0)" data-filter=".<?php echo esc_html( $filter->slug ); ?>"><?php echo esc_html( $filter->name ); ?></button>
					<?php endforeach; ?>
				</fieldset>
			<?php endif; ?>
			<fieldset class="w-auto px-2 my-2 search-form">
				<legend class="px-2 mt-4 mb-2 text-xl font-bold font-heavy">Search by name, title, or research interests:</legend>
				<label class="sr-only" for="id_search">Enter term</label>
				<input class="w-full p-2 mb-2 ml-2 quicksearch form-input md:w-1/2" type="text" name="search" id="id_search" aria-label="Search Form" placeholder="Enter description keyword"/>
			</fieldset>
		</form>
		<div class="mt-8 ml-4 mr-2" id="isotope-list" >
			<div class="flex flex-wrap">
		<?php
			$positions = get_terms(
				array(
					'taxonomy'   => 'role',
					'orderby'    => 'slug',
					'order'      => 'ASC',
					'hide_empty' => true,

				)
			);
			$position_slugs   = array();
			$position_classes = implode( ' ', $position_slugs );
			foreach ( $positions as $position ) :
				$position_slug = $position->slug;
				$position_name = $position->name;

				$people_query = new WP_Query(
					array(
						'post_type'      => 'people',
						'role'           => $position_slug,
						'meta_key'       => 'ecpt_people_alpha',
						'orderby'        => 'meta_value',
						'order'          => 'ASC',
						'posts_per_page' => 100,
					)
				);

				if ( $people_query->have_posts() ) :
					?>
					<div class="item pt-2 pl-4 lg:pl-0 w-full role-title quicksearch-match <?php echo esc_html( $position->slug ); ?>">
						<h2 class="uppercase">
							<?php echo esc_html( $position_name ); ?>
						</h2>
					</div>
					<?php
					while ( $people_query->have_posts() ) :
						$people_query->the_post();
						?>

						<?php get_template_part( 'template-parts/content', 'people-sort' ); ?>

						<?php
							endwhile;
				endif;
			endforeach;
			?>
			<div id="noResult">
				<span>No matching results</span>
			</div>
			<?php
			wp_reset_postdata();
			?>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
