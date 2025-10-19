<?php

/**
 * Template Name: About Page
 *
 * @package _tw
 */

get_header();


?>

<section class="wrapper py-xl">
    <div class="stack text-center center">
        <h1><?php echo get_the_title(); ?></h1>
        <p><?php echo get_the_excerpt(); ?></p>
    </div>
</section>


<div class="about switcher wrapper items-center py-xl">
    <?php echo wp_get_attachment_image(120, 'large'); ?>
    <article>
        <?php the_content(); ?>
    </article>
</div>

<?php get_template_part("template-parts/components/service-area-cta", null, array('layout' => 'stack center text-center')); ?>

<section>
    <div class="contact mx-auto p-s" data-color="light"><?php get_template_part('template-parts/components/contact-form'); ?></div>
</section>

<?php get_footer(); ?>