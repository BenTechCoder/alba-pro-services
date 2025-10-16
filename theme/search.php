<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package _tw
 */

get_header();
?>

<section id="primary">
	<main id="main" class="wrapper py-xl">

		<?php if (have_posts()) : ?>

			<header class="stack center py-l">

				<?php
				printf(
					/* translators: 1: search result title. 2: search term. */
					'<h1 class="page-title">%1$s <span>%2$s</span></h1>',
					esc_html__('Search Results For:', '_tw'),
					get_search_query()
				);
				?>
				<?php echo get_search_form(); ?>
			</header><!-- .page-header -->

			<div class="grid" data-layout="50-50">
			<?php
			// Start the Loop.
			while (have_posts()) :
				the_post();
				get_template_part('template-parts/content/content', 'excerpt');

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			_tw_the_posts_navigation();

		else :

			// If no content is found, get the `content-none` template part.
			get_template_part('template-parts/content/content', 'none');

		endif;
			?>
			</div>
	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
