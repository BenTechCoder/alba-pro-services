<?php

/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */

?>

<footer id="colophon" class="footer bg-dark text-light py-m">
	<div class="wrapper switcher items-center py-xl">

		<div class="stack">
			<?php the_custom_logo(); ?>
			<a href="/contact/" class="btn bg-tertiary text-dark">Get a Free Quote</a>
		</div>

		<nav aria-label="<?php esc_attr_e('Footer Menu', '_tw'); ?>">
			<div class="stack">
				<h2 class="text-step-0 font-content">Legal</h2>
				<?php
				wp_nav_menu(
					array(
						'menu' => "footer-nav",
						'theme_location' => 'menu-2',
						'menu_class'     => 'footer-menu',
						'depth'          => 1,
					)
				);
				?>
			</div>
		</nav>

		<div class="stack">
			<h2 class="text-step-0 font-content">Operating Hours</h2>
			<div>
				<?php if ($hours = get_theme_mod('business_hours')) : ?>
					<p><?php echo nl2br(esc_html($hours)); ?></p>
				<?php endif; ?>
				<p>After Hours by Appointment</p>
			</div>
			<div>
				<p>Follow us for results and tips</p>
				<?php
				$args = array(
					'post_type'  => 'social_media_link',
					'posts_per_page' => 5,
					// Several more arguments could go here. Last one without a comma.
				);

				// Query the posts:
				$social_media_query = new WP_Query($args);

				// Loop through the Service:
				while ($social_media_query->have_posts()) :
					$social_media_query->the_post();
					// Echo some markup
					$social_link = get_post_meta($post->ID, 'social_media_link')[0];
					$social_icon = get_post_meta($post->ID, 'social_media_icon')[0];

				?>
					<a href=<?php echo esc_url($social_link) ?>><i class="fa fa-<?php echo esc_textarea($social_icon); ?>"></i></a>

				<?php
				endwhile;

				// Reset Post Data
				wp_reset_postdata();
				?>
			</div>
		</div>
		<div class="stack">
			<h2 class="text-step-0 font-content">Contact</h2>
			<?php if ($name = get_theme_mod('business_name')) : ?>
				<p><?php echo esc_html($name); ?></p>
			<?php endif; ?>

			<?php if ($phone = get_theme_mod('business_phone')) : ?>

				<a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $phone); ?>">
					<?php echo esc_html($phone); ?>
				</a>

			<?php endif; ?>

			<?php if ($email = get_theme_mod('business_email')) : ?>

				<a href="mailto:<?php echo antispambot(esc_attr($email)); ?>">
					<?php echo esc_html($email); ?>
				</a>

			<?php endif; ?>

		</div>
	</div>
	<p class="center">© <?php echo date("Y"); ?> <?php echo esc_html(get_option('business_details_legal_name')); ?> All Rights reserved.</p>
</footer><!-- #colophon -->