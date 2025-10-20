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
    <div class="hero-header stack text-center center">
        <h1><?php echo get_the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
</section>
<section class="contact-cta grid pt-s">
    <article class="stack bg-tertiary p-xl">
        <h2>Service Areas</h2>
        <p>

            Raleigh, Cary, Durham, Apex, Chapel Hill, Mooresville, and Hillsborough, North Carlina.

            If you are outside these areas, please contact us to see if we travel to your community.
        </p>
        <?php if ($phone = get_theme_mod('business_phone')) : ?>

            <a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $phone); ?>">
                <?php echo esc_html($phone); ?>
            </a>

        <?php endif; ?>

        <?php if ($email = get_theme_mod('business_email')) : ?>

            <a href="mailto:<?php echo antispambot(esc_attr($email)); ?>">
                <?php echo esc_html($email); ?>
            </a>

        <?php endif; ?>

        <?php get_template_part("template-parts/components/social-media-list"); ?>

    </article>
    <div class="contact bg-tertiary/80 p-s" data-color="light"><?php get_template_part("template-parts/components/contact-form"); ?></div>
     <span class="hidden md:block"><?php echo wp_get_attachment_image(get_theme_mod('frontpage_why_image'), 'large'); ?></span>
    </div>
</section>
<?php get_template_part("template-parts/components/maps-embed", null, array(
    "type" => "contact"
))?>
<?php get_footer(); ?>