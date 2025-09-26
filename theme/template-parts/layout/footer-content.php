<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */

?>

<footer id="colophon" class="wrapper">

	<?php if ( has_nav_menu( 'menu-2' ) ) : ?>
		<nav aria-label="<?php esc_attr_e( 'Footer Menu', '_tw' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-2',
					'menu_class'     => 'footer-menu',
					'depth'          => 1,
				)
			);
			?>
		</nav>
	<?php endif; ?>

	<div>
	<p>Built By Lebron Consulting</p>
	</div>

</footer><!-- #colophon -->
