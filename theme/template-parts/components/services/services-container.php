<?php if (is_front_page()) {
?>
    <section class="stack bg-secondary/80 text-light py-2xl">
        <div class="wrapper">
            <article class="center text-center stack intersect-once intersect:motion-preset-slide-up">
                <h2>Our Services</h2>
                <p>We are Alba Pro Services, LLC. Whether you need top-rated power washing, professional gutter cleaning, fence staining, window washing, or complete residential and commercial cleaning, we’ve got you covered. We are proud to offer our comprehensive services to Raleigh, NC, and the surrounding areas.</p>
            </article>
        </div>
    <?php
} ?>

    <ul class="grid py-xl wrapper intersect-once intersect:motion-preset-slide-up" role="list" style="--grid-min-item-size: 20em">

        <?php
        $args = array(
            'post_type'  => 'service',
            'posts_per_page' => 8,
            // Several more arguments could go here. Last one without a comma.
        );

        // Query the posts:
        $services_query = new WP_Query($args);

        // Loop through the Service:
        while ($services_query->have_posts()) :
            $services_query->the_post();
            // Echo some markup
            $service_title = get_the_title();
            $service_alt_title = get_post_meta($post->ID, 'service_alternative_title')[0];
            $service_description = get_post_meta($post->ID, 'service_description')[0];
            $service_thumbnail = (get_post_meta($post->ID, 'service_thumbnail')) ? get_post_meta($post->ID, 'service_thumbnail')[0] : "";
            $services_card_config = array(
                'title' => $service_title,
                'alt-title' => $service_alt_title,
                'description' => $service_description,
                'thumbnail' => $service_thumbnail
            );

            if (is_front_page()) {
                if ($service_alt_title) {
                    get_template_part('template-parts/components/services/services-card-home', null, $services_card_config);
                }
            } else {
                get_template_part('template-parts/components/services/services-card', null, $services_card_config);
            }


        endwhile;

        // Reset Post Data
        wp_reset_postdata();

        ?>

    </ul>
    </section>