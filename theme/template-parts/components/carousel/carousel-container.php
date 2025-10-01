<carousel-component>
    <div class="carousel" tabindex="0" aria-live="polite" style="--carousel-img-height: auto;">
        <?php
        $args = array(
            'post_type'  => 'before_after',
            'posts_per_page' => 8,
            // Several more arguments could go here. Last one without a comma.
        );

        // Query the posts:
        $before_after_query = new WP_Query($args);

        // Loop through the Service:
        while ($before_after_query->have_posts()) :
            $before_after_query->the_post();
            // Echo some markup
            $ba_service = get_post_meta($post->ID, 'ba_service')[0];
            $ba_before_image = (get_post_meta($post->ID, 'ba_before_image')) ? get_post_meta($post->ID, 'ba_before_image')[0] : "";
            $ba_after_image = (get_post_meta($post->ID, 'ba_after_image')) ? get_post_meta($post->ID, 'ba_after_image')[0] : "";
            $carousel_config = array(
                'type' => 'before_after',
                'service' => $ba_service,
                'before_image' => $ba_before_image,
                'after_image' => $ba_after_image,
            );


            get_template_part('template-parts/components/carousel/carousel-item', null, $carousel_config);

        endwhile;

        // Reset Post Data
        wp_reset_postdata();
        ?>
        <div class="carousel-controls">
            <button class="carousel-prev" aria-label="Previous slide">❮</button>
            <button class="carousel-next" aria-label="Next slide">❯</button>
        </div>
    </div>
</carousel-component>