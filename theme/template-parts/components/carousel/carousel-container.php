<carousel-component>
    <div class="carousel" tabindex="0" aria-live="polite">
        <?php for ($i = 0; $i < 3; $i++) {
        ?>
            <div class="carousel-item grid text-center" aria-hidden="true" data-layout="50-50">
                <figure>
                    <figcaption>
                        <a>Before</a>
                    </figcaption>
                    <img loading="lazy" width="1280" height="720" src="https://picsum.photos/seed/this/1280/720.webp"
                        alt="Blue ocean with a large wave">
                </figure>
                <figure>
                    <figcaption>
                        <a>After</a>
                    </figcaption>
                    <img loading="lazy" width="1280" height="720" src="https://picsum.photos/seed/this/1280/720.webp"
                        alt="Blue ocean with a large wave">
                </figure>
            </div>
        <?php
        } ?>
        <div class="carousel-controls">
            <button class="carousel-prev" aria-label="Previous slide">❮</button>
            <button class="carousel-next" aria-label="Next slide">❯</button>
        </div>
    </div>
</carousel-component>