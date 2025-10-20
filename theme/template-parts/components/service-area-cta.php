<section class="bg-secondary py-3xl">
    <div class="wrapper <?php echo $args["layout"] ?>">
        <div class="stack text-light" style="--stack-spacing: var(--spacing-l);">
            <article class="stack">
                <h2>Our Service Area</h2>
                <p>At Alba Pro Services, LLC, we proudly serve the Raleigh, NC area and surrounding communities. Our service area includes but is not limited to, Cary, Durham, Apex, Chapel Hill, Mooresville, Raleigh, and Hillsborough. Whether you’re in the heart of Raleigh or a nearby town, we’re here to provide exceptional exterior cleaning and maintenance services for your home or business.</p>
            </article>
            <a class="btn bg-tertiary text-dark max-w-full" href="/contact">Get A Quote</a>
        </div>
        <?php get_template_part("template-parts/components/maps-embed", null, array(
            "type" => $args["layout"]
        )) ?>
    </div>
</section>