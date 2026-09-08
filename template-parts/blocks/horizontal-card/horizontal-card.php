<?php
/**
 * Block Template: Horizontal Card
 *
 * @package KSAS_Blocks
 */

$card_title      = ! empty( get_field( 'title' ) ) ? get_field( 'title' ) : 'Lorem Ipsum';
$card_body_text  = ! empty( get_field( 'body_text' ) ) ? get_field( 'body_text' ) : 'Lorem ipsum dolor sit amet...';
$card_button_txt = ! empty( get_field( 'button_text' ) ) ? get_field( 'button_text' ) : 'Lorem Ipsum';
$card_button_url = get_field( 'button_url' );

$bg_image     = get_field( 'background_image' );
$bg_image_url = get_template_directory_uri() . '/resources/images/campus1.jpg';
if ( is_array( $bg_image ) && ! empty( $bg_image['url'] ) ) {
	$bg_image_url = $bg_image['url'];
} elseif ( is_string( $bg_image ) && ! empty( $bg_image ) ) {
	$bg_image_url = $bg_image;
}
?>

<div class="ksas-card-container">
	<div class="ksas-horizontal-card">
		<!-- Image Container -->
		<div class="ksas-card-image-wrap">
			<div class="ksas-card-bg-image" style="background-image: url('<?php echo esc_url( $bg_image_url ); ?>');"></div>

			<svg class="ksas-card-chevron" viewBox="0 0 100 100" preserveAspectRatio="none">
				<polygon points="50,0 100,0 50,100 0,100" />
			</svg>
		</div>

		<!-- Content Container -->
		<div class="ksas-card-content-wrap">
			<div class="ksas-card-content">
				<h2 class="ksas-card-title"><?php echo esc_html( $card_title ); ?></h2>
				<p class="ksas-card-body"><?php echo esc_html( $card_body_text ); ?></p>
				<?php if ( ! empty( $card_button_url ) ) : ?>
					<a class="ksas-card-button button" href="<?php echo esc_url( $card_button_url ); ?>">
						<span><?php echo esc_html( $card_button_txt ); ?>&nbsp;</span>
						<span class="fa-solid fa-circle-chevron-right" aria-hidden="true"></span>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>