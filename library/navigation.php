<?php
/**
 * Register Menus
 *
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

register_nav_menus(
	array(
		'top-bar-r'  => esc_html__( 'Right Top Bar', 'foundationpress' ),
		'mobile-nav' => esc_html__( 'Mobile', 'foundationpress' ),
	)
);


/**
 * Desktop navigation - right top bar
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
if ( ! function_exists( 'foundationpress_top_bar_r' ) ) {
	function foundationpress_top_bar_r() {

		?>
		<div class="nav-container">
            <div class="nav-section">
                <a href="tel:7345060630" class="nav-icon nav-phone">
                    <span class="fa fa-phone"></span>&nbsp;(734) 506-0630
                </a>
            </div>

			<div class="nav-section">

				<div class="site-search">
					<?php get_search_form(); ?>
				</div>

				<a href="https://facebook.com/napoleonbeesupply/" aria-label="Facebook" target="_blank" title="Facebook" class="nav-icon facebook-link">
					<span class="footer-social-icon fa fa-facebook"></span>
				</a>

				<a href="https://twitter.com/napoleonbeesupply/" aria-label="Twitter" target="_blank" title="Twitter" class="nav-icon twitter-link">
					<span class="footer-social-icon fa fa-twitter"></span>
				</a>
			</div>

			<div class="nav-section">
                <button aria-label="<?php _e( 'Main Menu', 'foundationpress' ); ?>" class="menu-icon" type="button"
                        data-toggle="<?php foundationpress_mobile_menu_id(); ?>"></button>

				<?php wp_nav_menu( array(
					'container'      => false,
					'menu_class'     => 'dropdown menu',
					'items_wrap'     => "<ul id=\"%1\$s\" class=\"%2\$s desktop-menu\" data-dropdown-menu>%3\$s</ul>",
					'theme_location' => 'top-bar-r',
					'depth'          => 3,
					'fallback_cb'    => false,
					'walker'         => new Foundationpress_Top_Bar_Walker(),
				) ); ?>
			</div>
		</div>
		<?php
	}
}


/**
 * Mobile navigation - topbar (default) or offcanvas
 */
if ( ! function_exists( 'foundationpress_mobile_nav' ) ) {
	function foundationpress_mobile_nav() {
		wp_nav_menu(
			array(
				'container'      => false,                         // Remove nav container
				'menu'           => __( 'mobile-nav', 'foundationpress' ),
				'menu_class'     => 'vertical menu',
				'theme_location' => 'mobile-nav',
				'items_wrap'     => '<ul id="%1$s" class="%2$s" data-accordion-menu data-submenu-toggle="true">%3$s</ul>',
				'fallback_cb'    => false,
				'walker'         => new Foundationpress_Mobile_Walker(),
			)
		);
	}
}


/**
 * Add support for buttons in the top-bar menu:
 * 1) In WordPress admin, go to Apperance -> Menus.
 * 2) Click 'Screen Options' from the top panel and enable 'CSS CLasses' and 'Link Relationship (XFN)'
 * 3) On your menu item, type 'has-form' in the CSS-classes field. Type 'button' in the XFN field
 * 4) Save Menu. Your menu item will now appear as a button in your top-menu
*/
if ( ! function_exists( 'foundationpress_add_menuclass' ) ) {
	function foundationpress_add_menuclass( $ulclass ) {
		$find    = array( '/<a rel="button"/', '/<a title=".*?" rel="button"/' );
		$replace = array( '<a rel="button" class="button"', '<a rel="button" class="button"' );

		return preg_replace( $find, $replace, $ulclass, 1 );
	}
	add_filter( 'wp_nav_menu', 'foundationpress_add_menuclass' );
}
