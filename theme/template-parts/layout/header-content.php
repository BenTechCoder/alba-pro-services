<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */

?>
<header id="masthead" class="bg-foreground text-background py-s">

	<div class="wrapper">
		<div class="nav__inner flex">
			
			<?php the_custom_logo(); ?>
			

			<burger-menu max-width="600">
				<nav id="site-navigation"
					aria-label="<?php esc_attr_e('Main Navigation', 'alba-pro-services'); ?>"
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