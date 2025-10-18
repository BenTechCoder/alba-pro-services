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
    <div class="stack">
        <h1><?php echo get_the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
</section>

<section class="py-xl bg-tertiary">
    <div class="gallery grid wrapper">
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
                    'title' => 'Before ' . get_the_title(),
                    'image' => $gallery_before_image,
                ));
                get_template_part("template-parts/components/gallery/gallery-item", null, array(
                    'title' => 'After ' . get_the_title(),
                    'image' => $gallery_after_image,
                ));
            } else {
                get_template_part("template-parts/components/gallery/gallery-item", null, array(
                    'title' => get_the_title(),
                    'image' => $gallery_single_image,
                ));
            }

        endwhile;

        // Reset Post Data
        wp_reset_postdata();
        ?>
        <dialog class="lightbox" closedby="none" autofocus>
            <form method="dialog" class="lightbox-grid bg-light/70">
                <!-- <img width="662" height="632" src="http://localhost:10046/wp-content/uploads/2025/10/Patio-After_edited.avif" class="attachment-full size-full" alt="After: Patio with shiny and clean concrete" decoding="async" srcset="http://localhost:10046/wp-content/uploads/2025/10/Patio-After_edited.avif 662w, http://localhost:10046/wp-content/uploads/2025/10/Patio-After_edited-300x286.avif 300w" sizes="(max-width: 662px) 100vw, 662px">
                     -->
                <div class="lightbox-controls stack p-m">
                    <span aria-hidden="" class="lightbox-alt text-step-3 font-display"></span>
                    <div class="lightbox-controls__interior">
                        <button type="submit" class="lightbox-close btn bg-dark text-light">
                            <span aria-hidden="">Close</span>
                            <span class="sr-only">Close dialog</span>
                        </button>
                        <button type="button" class="lightbox-fullscreen btn bg-dark text-light">Fullscreen</button>
                        <button type="button" class="lightbox-forward btn bg-dark text-light">Next</button>
                        <button type="button" class="lightbox-backwards btn bg-dark text-light">Previous</button>
                    </div>
                </div>
            </form>
        </dialog>
    </div>
</section>


<?php get_footer(); ?>