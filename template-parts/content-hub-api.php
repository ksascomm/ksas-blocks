<?php
/**
 * Template part for displaying HUB feed on front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

if ( get_field( 'hub_topic_keywords', 'option' ) == 'keyword' ) {
	$keywords = get_field( 'hub_keywords', 'option' );
	$hub_url  = 'https://api.hub.jhu.edu/articles?v=1&key=bed3238d428c2c710a65d813ebfb2baa664a2fef&tags=' . $keywords . '&per_page=3';
	// print_r( $hub_url );.
} elseif ( get_field( 'hub_topic_keywords', 'option' ) == 'topic' ) {
	$topic   = get_field( 'hub_topics', 'option' );
	$hub_url = 'https://api.hub.jhu.edu/topics/' . $topic . '/articles?v=1&key=bed3238d428c2c710a65d813ebfb2baa664a2fef&per_page=3&source=all';
	// print_r( $hub_url );.
}
	$hub_call = wp_remote_get( $hub_url );
if ( is_array( $hub_call ) && ! empty( $hub_call['body'] ) ) {
	$hub_results = json_decode( $hub_call['body'], true );
} else {
	return false; // wp_remote_get failed somehow.
}
	$hub_articles = $hub_results['_embedded'];
if ( is_array( $hub_articles ) ) {
	foreach ( $hub_articles['articles'] as $hub_article ) {
		?>


<article <?php post_class( 'article-excerpt prose sm:prose lg:prose-lg xl:prose-xl mx-auto border-b border-solid border-grey pt-4 mb-4' ); ?> aria-labelledby="post-<?php echo esc_html( $hub_article['id'] ); ?>">
	<header class="entry-header">
		<?php
		$date = $hub_article['publish_date'];
		?>
		<div class="entry-meta text-grey-darkest">
			<span class="posted-on">
				<time class="entry-date published" datetime="<?php echo esc_html( $hub_article['publish_date'] ); ?>"><?php echo gmdate( 'F d, Y', $date ); ?></time>
			</span>
		</div>
		<h3 class="entry-title">
			<a href="<?php echo esc_url( $hub_article['url'] ); ?>" id="post-<?php echo esc_html( $hub_article['id'] ); ?>"><?php echo esc_html( $hub_article['headline'] ); ?></a>
		</h3>
	</header>
	<!-- .entry-header -->
	<div class="h-full flex sm:flex-row flex-col items-start sm:justify-start justify-center text-left">
		<img src="<?php echo esc_url( $hub_article['_embedded']['image_thumbnail'][0]['sizes']['thumbnail'] ); ?>" alt="From The Hub: <?php echo esc_html( $hub_article['headline'] ); ?>" />
		<div class="entry-content flex-grow sm:pl-8">
			<p>
				<?php
				echo esc_html( $hub_article['subheadline'] );
				if ( empty( $hub_article['subheadline'] ) ) {
					echo esc_html( $hub_article['excerpt'] );
				}
				?>
			</p>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
<?php }
} ?>
