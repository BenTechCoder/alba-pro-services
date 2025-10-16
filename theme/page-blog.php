<?php

/**
 * The Homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _tw
 */

get_header();


?>

<header class="wrapper py-xl switcher items-center">
        <h1><?php echo get_the_title(); ?></h1>
      <?php echo get_search_form(); ?>
</header>

<section class="wrapper py-2xl grid" data-layout="50-50">
        <?php
        $args = array(
                'post_type'  => 'post',
                'posts_per_page' => 5,
                // Several more arguments could go here. Last one without a comma.
        );

        // Query the posts:
        $blog_query = new WP_Query($args);

        if ($blog_query->have_posts()) {
                // Start the Loop.
                while ($blog_query->have_posts()) :
                        $blog_query->the_post();
                        get_template_part('template-parts/content/content', 'excerpt');

                // End the loop.
                endwhile;

                // Previous/next page navigation.
                _tw_the_posts_navigation();
        } else {

                // If no content, include the "No posts found" template.
                get_template_part('template-parts/content/content', 'none');
        }
        wp_reset_postdata();
        ?>
</section>

<?php get_footer(); ?>