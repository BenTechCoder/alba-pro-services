<?php

/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */

?>

<article id="post-<?php the_ID(); ?>" class="blog wrapper py-xl prose">
	<a href="/blog" />All Posts</a>
	<div>

		<header class="entry-header py-s switcher items-start">
			<?php the_title('<h1>', '</h1>'); ?>

			<?php if (!is_page()) : ?>
				<div class="entry-meta flex gap-s items-center text-xs w-[30ch]">
					<?php echo get_avatar(get_the_author_meta('ID')); ?>
					<div class="stack" style="--stack-spacing: var(--spacing-xs)"><?php _tw_entry_meta(); ?></div>
				</div><!-- .entry-meta -->

			<?php endif; ?>
		</header><!-- .entry-header -->
		<?php _tw_post_thumbnail(); ?>
	</div>
	<?php the_content(); ?>
</article><!-- #post-${ID} -->