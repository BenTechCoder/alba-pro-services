<carousel-component>
    <div class="carousel" tabindex="0" aria-live="polite" style="--carousel-img-height: auto;">
        <?php
        $args = array(
            'post_type'  => 'gallery',
            'posts_per_page' => 8,
            // Several more arguments could go here. Last one without a comma.
        );

        // Query the posts:
        $gallery_query = new WP_Query($args);

        // Loop through the Service:
        while ($gallery_query->have_posts()) :
            $gallery_query->the_post();

            $gallery_is_single_image = (int) get_post_meta($post->ID, 'is_single_image')[0];
            $gallery_service = get_post_meta($post->ID, 'gallery_service')[0];
            $gallery_before_image = (get_post_meta($post->ID, 'gallery_before_image')) ? get_post_meta($post->ID, 'gallery_before_image')[0] : "";
            $gallery_after_image = (get_post_meta($post->ID, 'gallery_after_image')) ? get_post_meta($post->ID, 'gallery_after_image')[0] : "";
            $carousel_config = array(
                'type' => 'before_after',
                'service' => $gallery_service,
                'before_image' => $gallery_before_image,
                'after_image' => $gallery_after_image,
            );

            if ($gallery_is_single_image === 0) {

                get_template_part('template-parts/components/carousel/before-after-item', null, $carousel_config);
            }

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