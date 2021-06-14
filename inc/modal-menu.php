<?php
/**
 * Displays the menu icon and modal
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<div class="menu-modal cover-modal header-footer-group" data-modal-target-string=".menu-modal">

	<div class="menu-modal-inner modal-inner">

		<div class="menu-wrapper section-inner">

			<div class="menu-top">

				<button class="toggle close-nav-toggle fill-children-current-color" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".menu-modal">
					<span class="toggle-text"><?php _e( 'Close Menu', 'ksas-blocks' ); ?></span>
					<?php twentytwenty_the_theme_svg( 'cross' ); ?>
				</button><!-- .nav-toggle -->


					<nav class="mobile-menu" aria-label="<?php echo esc_attr_x( 'Mobile', 'menu', 'ksas-blocks' ); ?>">

						<ul class="modal-menu reset-list-style">

						<?php
							wp_nav_menu(
								array(
									'container'      => '',
									'items_wrap'     => '%3$s',
									'show_toggles'   => true,
									'theme_location' => 'main-nav',
								)
							);
						?>

						</ul>

					</nav>


			</div><!-- .menu-top -->

		</div><!-- .menu-wrapper -->

	</div><!-- .menu-modal-inner -->

</div><!-- .menu-modal -->
