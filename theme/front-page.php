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

<section class="wrapper stack py-xl text-step">
        <h1>Complete Exterior Cleaning Solutions</h1>
        <p>Alba Pro Services, LLC is your go-to for expert exterior cleaning and maintenance. From power washing and gutter cleaning to fence staining, window washing, and comprehensive residential and commercial cleaning services, we deliver eco-friendly solutions with exceptional customer care and competitive pricing. Book your appointment today to see the difference we can make for your property!</p>
        <a href="https://www.lebronconsulting.tech" class="btn bg-foreground text-background">Lebron Consulting</a>
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

<?php get_footer(); ?>