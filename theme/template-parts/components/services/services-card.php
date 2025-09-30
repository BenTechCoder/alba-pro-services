<li class="card outline outline-dark stack" data-card="services">
    <?php echo wp_get_attachment_image($args['thumbnail']); ?>
   <article class="p-m stack">
        <h3><?php echo $args['title']; ?></h3>
        <p><?php echo $args['description']; ?></p>
        <a class="btn bg-primary" href="/contact/">Contact us</a>
   </article>
</li>