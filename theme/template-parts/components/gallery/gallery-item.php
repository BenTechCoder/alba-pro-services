<div class="gallery-item stack text-center" style="--stack-spacing: var(--spacing-s);">
    <button class="lightbox-button" aria-haspopup="dialog">
        <?php echo wp_get_attachment_image($args['image'], 'full'); ?>
    </button>
    <p class="gallery-item-title"><?php echo $args['title'] ?></p>
</div>