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

<section class="wrapper py-xl switcher">
        <div class="stack">
                <h1>Complete Exterior Cleaning Solutions</h1>
                <p>Alba Pro Services, LLC is your go-to for expert exterior cleaning and maintenance. From power washing and gutter cleaning to fence staining, window washing, and comprehensive residential and commercial cleaning services, we deliver eco-friendly solutions with exceptional customer care and competitive pricing. Book your appointment today to see the difference we can make for your property!</p>
                <a href="https://www.lebronconsulting.tech" class="btn bg-foreground text-background">Lebron Consulting</a>
        </div>
        <div class="contact p-m" data-color="dark"><?php get_template_part("template-parts/components/contact-form"); ?></div>
</section>

<?php get_template_part("template-parts/components/reviews/snippet"); ?>

<?php get_template_part("template-parts/components/services/services-container"); ?>

<section class="stack wrapper py-xl">
        <h2 class="center text-center">Before & After</h2>
        <div class="py-l"><?php get_template_part('template-parts/components/carousel/carousel-container'); ?></div>
</section>

<?php // get_template_part("template-parts/components/service-area-cta", null, array('layout' => 'stack center center__recursive text-center')); ?>

<?php get_template_part("template-parts/components/service-area-cta", null, array('layout' => 'sidebar')); ?> 

<?php get_template_part("template-parts/components/why-cta"); ?>

<section class="grid" style="--grid-placement: auto-fit; --gutter: 0;">
        <!-- <video src="http://localhost:10046/wp-content/uploads/2025/10/WhatsApp-Video-2025-09-29-at-12.00.56-PM.mp4"autoplay muted loop playsinline></video>
        <video src="http://localhost:10046/wp-content/uploads/2025/10/WhatsApp-Video-2025-09-29-at-12.00.56-PM.mp4"autoplay muted loop playsinline></video>
        <video src="http://localhost:10046/wp-content/uploads/2025/10/WhatsApp-Video-2025-09-29-at-12.00.56-PM.mp4"autoplay muted loop playsinline></video> -->
</section>

<?php get_footer(); ?>