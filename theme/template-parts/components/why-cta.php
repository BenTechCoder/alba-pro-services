<section class="py-2xl wrapper">
    <div class="sidebar why-cta" data-sidebar="flip" style="--sidebar-basis: 25rem; --sidebar-content: 30%;">
        <div class="why-cta-img">
            <?php echo wp_get_attachment_image(get_theme_mod('frontpage_why_image'), 'large'); ?>
        </div>
        <article class="why-cta-content stack" style="--stack-spacing: var(--spacing-l)">
            <h2>Why Choose Alba Pro Services</h2>
            <ul class="grid intersect-once intersect:motion-preset-slide-up" data-layout="50-50">
                <li>
                    <?php get_template_part("template-parts/svg/list-icon"); ?>
                    <div>
                        <h3>
                            Experienced Team
                        </h3>
                        <p>Our team of power washing professionals has the experience and expertise to handle any cleaning project with precision and care.</p>
                    </div>
                </li>
                <li>
                    <?php get_template_part("template-parts/svg/list-icon"); ?>
                    <div>
                        <h3>
                            Eco-Friendly Practices
                        </h3>
                        <p>We use environmentally friendly cleaning solutions and techniques to minimize our impact on the environment and ensure the safety of your property and surroundings.</p>
                    </div>
                </li>
                <li>
                    <?php get_template_part("template-parts/svg/list-icon"); ?>
                    <div>
                        <h3>
                            Exceptional Customer Service
                        </h3>
                        <p>We prioritize customer satisfaction and aim to provide the best service experience from start to finish.</p>
                    </div>
                </li>
                <li>
                    <?php get_template_part("template-parts/svg/list-icon"); ?>
                    <div>
                        <h3>
                            Book Your Appointment
                        </h3>
                        <p>Experience the difference with Alba Pro Services. Book your power washing appointment today and let our team revitalize the cleanliness and appearance of your property.</p>
                    </div>
                </li>
            </ul>
            <a href="/contact/" class="btn bg-primary intersect-once intersect:motion-preset-slide-up">Get a Quote</a>
        </article>
    </div>
</section>