<?php

/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */

?>

<article id="post-<?php the_ID(); ?>" class="card outline outline-dark grid" data-card="blog">

	<?php _tw_post_thumbnail(); ?>
	<div class="prose p-s">
		<header class="entry-header not-prose">
			<div class="entry-meta flex justify-between">
				<div class="flex gap-s items-center py-m text-xs">
					<?php echo get_avatar(get_the_author_meta('ID')); ?>
					<div class="stack" style="--stack-spacing: 0.5em"><?php _tw_entry_meta(); ?></div>
				</div>
				<?php get_template_part('template-parts/components/post-share', null, array(
					"link" => get_the_permalink()
				)); ?>
			</div><!-- .entry-meta -->
			<?php
			if (is_sticky() && is_home() && ! is_paged()) {
				printf('%s', esc_html_x('Featured', 'post', '_tw'));
			}
			the_title(sprintf('<h2 class="entry-title underline decoration-primary"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
			?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-${ID} -->