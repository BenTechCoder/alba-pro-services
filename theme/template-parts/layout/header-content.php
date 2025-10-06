<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */

?>
<header id="masthead" class="">

	<section class="bg-dark/90 text-light py-xs">
		<script src="https://kit.fontawesome.com/ffa42396d3.js" crossorigin="anonymous"></script>
		<div class="wrapper switcher text-center">
			<?php if ($phone = get_theme_mod('business_phone')) : ?>
				<div>
					<i class="fa fa-phone"></i>
					<a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $phone); ?>">
						<?php echo esc_html($phone); ?>
					</a>
				</div>

			<?php endif; ?>

			<?php if ($email = get_theme_mod('business_email')) : ?>
				<div>
					<i class="fa fa-envelope"></i>
					<a href="mailto:<?php echo antispambot(esc_attr($email)); ?>">
						<?php echo esc_html($email); ?>
					</a>
				</div>
			<?php endif; ?>
		</div>

	</section>
<div class="bg-foreground text-background py-xs">
	
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
</div>
</header><!-- #masthead -->