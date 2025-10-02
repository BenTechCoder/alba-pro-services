<section class="reviews-snippet py-2xl text-foreground" style="--spacing: var(--spacing-m);">
    <div class="wrapper stack">
        <h2>Happy Customers</h2>
        <ul class="grid" style="--grid-placement: auto-fit;">
            <?php
            $args = array(
                'post_type'  => 'reviews',
                'posts_per_page' => 6,
                // Several more arguments could go here. Last one without a comma.
            );

            // Query the posts:
            $reviews_query = new WP_Query($args);

            // Loop through the Service:
            while ($reviews_query->have_posts()) :
                $reviews_query->the_post();
                // Echo some markup
                $stars = get_post_meta($post->ID, 'review_stars')[0];
                $header = get_post_meta($post->ID, 'review_header')[0];
                $quote = get_post_meta($post->ID, 'review_quote')[0];
                $reviewer = get_post_meta($post->ID, 'review_reviewer')[0];
                get_template_part('template-parts/components/reviews/review', null, array(
                    'stars' => $stars,
                    'header' => $reviewer,
                    'quote' => $quote,
                    'reviewer' => $reviewer
                ));


            endwhile;

            // Reset Post Data
            wp_reset_postdata();

            ?>
        </ul>
    </div>
</section>