<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */

?>
<header id="masthead" class="bg-primary py-s-m text-background">

	<div class="wrapper pt-s-m">
		<div class="nav__inner flex">
			
			
				<p class="text-step-2"><a href="/">_tw_client_starter</a></p>
			

			<burger-menu max-width="600">
				<nav id="site-navigation"
					aria-label="<?php esc_attr_e('Main Navigation', 'ramirez-contractor'); ?>"
					class="nav">
					<!-- <button aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'ramirez-contractor'); ?></button> -->
					<?php
					wp_nav_menu(
						array(
							'menu' => 'main-nav',
							'theme_location' => 'Primary',
							'menu_class' => '',
							'menu_id'        => 'primary-menu',
							'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
						)
					);
					?>
				</nav><!-- #site-navigation -->

			</burger-menu>
		</div>
	</div>
</header><!-- #masthead -->