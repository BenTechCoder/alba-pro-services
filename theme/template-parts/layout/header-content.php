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

	<!-- <section class="hidden bg-dark/90 text-light py-xs text-step-1">
		<div class="wrapper switcher text-center">
			<?php if ($phone = get_theme_mod('business_phone')) : ?>
				<div>
					<i class="fa fa-phone motion-preset-seesaw"></i>
					<a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $phone); ?>">
						<?php echo esc_html($phone); ?>
					</a>
				</div>

			<?php endif; ?>

			<?php if ($email = get_theme_mod('business_email')) : ?>
				<div class="hidden md:block">
					<i class="fa fa-envelope motion-preset-seesaw"></i>
					<a href="mailto:<?php echo antispambot(esc_attr($email)); ?>">
						<?php echo esc_html($email); ?>
					</a>
				</div>
			<?php endif; ?>
		</div>

	</section> -->

	<div class="bg-foreground text-background py-m">

		<div class="wrapper">
			<div class="nav__inner flex">

				<?php the_custom_logo(); ?>

					<?php if ($phone = get_theme_mod('business_phone')) : ?>
						<div>
							<i class="fa fa-phone motion-preset-seesaw"></i>
							<a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $phone); ?>" class="text-step-1">
								<?php echo esc_html($phone); ?>
							</a>
						</div>

					<?php endif; ?>

					<?php if ($email = get_theme_mod('business_email')) : ?>
						<div class="hidden lg:block">
							<i class="fa fa-envelope motion-preset-seesaw"></i>
							<a href="mailto:<?php echo antispambot(esc_attr($email)); ?>" class="text-step-1">
								<?php echo esc_html($email); ?>
							</a>
						</div>
					<?php endif; ?>

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