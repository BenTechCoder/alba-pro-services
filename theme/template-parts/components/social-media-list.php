<p>Follow us for results and tips</p>
<?php
$args = array(
    'post_type'  => 'social_media_link',
    'posts_per_page' => 5,
    // Several more arguments could go here. Last one without a comma.
);

// Query the posts:
$social_media_query = new WP_Query($args);

// Loop through the Service:
while ($social_media_query->have_posts()) :
    $social_media_query->the_post();
    // Echo some markup
    $social_link = get_post_meta($post->ID, 'social_media_link')[0];
    $social_icon = get_post_meta($post->ID, 'social_media_icon')[0];

?>
    <a href=<?php echo esc_url($social_link) ?>><i class="fab fa-<?php echo esc_textarea($social_icon); ?>"></i></a>
    <a href=<?php echo esc_url($social_link) ?> class="sr-only"><?php echo esc_textarea($social_icon); ?></a>

<?php
endwhile;

// Reset Post Data
wp_reset_postdata();
?>