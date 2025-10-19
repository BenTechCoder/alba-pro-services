<?php
if ($args['type'] === 'before_after') {
?>
   <div class="carousel-item-container">
        <p class="carousel-service center text-center"><?php echo get_the_title($args['service']); ?></p>
        <div class="carousel-item grid text-center" aria-hidden="true" data-layout="50-50" style="--grid-min-item-size: 25rem;">    
        <figure class="stack" style="--stack-spacing: var(--spacing-s)">
                <figcaption>
                    <p class="underline decoration-primary">Before</p>
                </figcaption>
                <?php echo wp_get_attachment_image($args['before_image'], 'full'); ?>
            </figure>
            <figure class="stack" style="--stack-spacing: var(--spacing-s)">
                <figcaption>
                    <p class="underline decoration-primary">After</p>
                </figcaption>
                <?php echo wp_get_attachment_image($args['after_image'], 'full'); ?>
            </figure>
        </div>
   </div>
<?php
}
?>