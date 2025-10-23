<section class="bg-dark text-light p-xl intersect-once intersect:motion-preset-slide-up">
    <article class="stack center text-center">
        <a href="/contact" class="btn bg-tertiary/50 hover:bg-secondary/50 py-s text-primary text-dark motion-translate-y-loop-[-20%] motion-duration-[2s] motion-ease-spring-smooth">
            <h2 class="text-step-6">Schedule Today!</h2>
        </a>

      <div class="switcher">
            <?php if ($phone = get_theme_mod('business_phone')) : ?>
                <div>
                    <i class="fa fa-phone motion-preset-seesaw"></i>
                    <a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $phone); ?>" class="text-step-1">
                        <?php echo esc_html($phone); ?>
                    </a>
                </div>
    
            <?php endif; ?>
    
            <?php if ($email = get_theme_mod('business_email')) : ?>
                <div>
                    <i class="fa fa-envelope motion-preset-seesaw"></i>
                    <a href="mailto:<?php echo antispambot(esc_attr($email)); ?>" class="text-step-1">
                        <?php echo esc_html($email); ?>
                    </a>
                </div>
            <?php endif; ?>
      </div>
    </article>
</section>