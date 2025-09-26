<?php
/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */

?>

<article id="post-<?php the_ID(); ?>">

	<header class="entry-header">
		<?php
		if ( ! is_front_page() ) {
			the_title( '<h1>', '</h1>' );
		} else {
			the_title( '<h2>', '</h2>' );
		}
		?>
	</header><!-- .entry-header -->

	<?php _tw_post_thumbnail(); ?>

	<div class="wrapper prose">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div>' . __( 'Pages:', '_tw' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
