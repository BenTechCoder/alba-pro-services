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

<section class="wrapper py-xl">
    <div class="hero-header stack">
        <h1><?php echo get_the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
</section>

<section class="py-xl bg-tertiary">
    <div class="gallery grid wrapper intersect-once intersect:motion-preset-slide-up">
        <?php
        $args = array(
            'post_type'  => 'gallery',
            // Several more arguments could go here. Last one without a comma.
        );

        // Query the posts:
        $gallery_query = new WP_Query($args);

        // Loop through the Service:
        while ($gallery_query->have_posts()) :
            $gallery_query->the_post();
            $gallery_is_single_image = (int) get_post_meta($post->ID, 'is_single_image')[0];
            $gallery_service = get_post_meta($post->ID, 'gallery_service')[0];
            $gallery_single_image = (get_post_meta($post->ID, 'gallery_single_image')) ? get_post_meta($post->ID, 'gallery_single_image')[0] : "";
            $gallery_before_image = (get_post_meta($post->ID, 'gallery_before_image')) ? get_post_meta($post->ID, 'gallery_before_image')[0] : "";
            $gallery_after_image = (get_post_meta($post->ID, 'gallery_after_image')) ? get_post_meta($post->ID, 'gallery_after_image')[0] : "";

            $before_after_config = array(
                'type' => 'before_after',
                'service' => $gallery_service,
                'before_image' => $gallery_before_image,
                'after_image' => $gallery_after_image,
            );
            if ($gallery_is_single_image === 0) {
                get_template_part("template-parts/components/gallery/gallery-item", null, array(
                    'title' => 'Before ' . $gallery_service,
                    'image' => $gallery_before_image,
                ));
                get_template_part("template-parts/components/gallery/gallery-item", null, array(
                    'title' => 'After ' . $gallery_service,
                    'image' => $gallery_after_image,
                ));
            } else {
                get_template_part("template-parts/components/gallery/gallery-item", null, array(
                    'title' => $gallery_service,
                    'image' => $gallery_single_image,
                ));
            }

        endwhile;

        // Reset Post Data
        wp_reset_postdata();
        ?>
        <dialog class="lightbox" closedby="none" autofocus>
            <form method="dialog" class="lightbox-grid bg-light/70">
                <div class="lightbox-controls stack p-m">
                    <span class="lightbox-alt text-step-3 font-display"></span>
                    <div class="lightbox-controls__interior">
                        <button type="submit" class="lightbox-close btn bg-dark text-light">
                            <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                            <span class="sr-only">Close dialog</span>
                        </button>
                        <button type="button" class="lightbox-fullscreen btn bg-dark text-light">
                            <span class="sr-only">Fullscreen</span>
                            <span aria-hidden="true"><i class="fa-solid fa-expand"></i></span>
                        </button>
                        <button type="button" class="lightbox-backwards btn bg-dark text-light">
                            <span class="sr-only">Previous</span>
                            <span aria-hidden="true"><i class="fa-solid fa-arrow-left"></i></span>
                        </button>
                        <button type="button" class="lightbox-forward btn bg-dark text-light">
                            <span class="sr-only">Next</span>
                            <span aria-hidden="true"><i class="fa-solid fa-arrow-right"></i></span>
                        </button>
                    </div>
                </div>
            </form>
        </dialog>
    </div>
</section>


<?php get_footer(); ?>