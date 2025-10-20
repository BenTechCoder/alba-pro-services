<?php
function mytheme_customize_register($wp_customize)
{

    // Business Info Section
    $wp_customize->add_section('business_info_section', array(
        'title'    => __('Business Information', 'mytheme'),
        'priority' => 30,
    ));

    // Business Name
    $wp_customize->add_setting('business_name', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_name', array(
        'label'   => __('Legal Business Name', 'mytheme'),
        'section' => 'business_info_section',
        'type'    => 'text',
    ));

    // Business Email
    $wp_customize->add_setting('business_email', [
        'default'   => '',
        'transport' => 'refresh',
    ]);

    $wp_customize->add_control('business_email', [
        'label'   => __('Business Email', 'mytheme'),
        'section' => 'business_info_section',
        'type'    => 'email',
    ]);


    // Phone
    $wp_customize->add_setting('business_phone', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_phone', array(
        'label'   => __('Phone Number', 'mytheme'),
        'section' => 'business_info_section',
        'type'    => 'text',
    ));

    // Hours
    $wp_customize->add_setting('business_hours', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_hours', array(
        'label'   => __('Hours of Operation', 'mytheme'),
        'section' => 'business_info_section',
        'type'    => 'textarea',
    ));
}
add_action('customize_register', 'mytheme_customize_register');

/**
 * Sanitize background-position option
 */
function mytheme_sanitize_bg_position($input)
{
    $valid = array(
        'left top',
        'left center',
        'left bottom',
        'center top',
        'center center',
        'center bottom',
        'right top',
        'right center',
        'right bottom',
    );

    if (in_array($input, $valid, true)) {
        return $input;
    }

    return 'center center';
}

function mytheme_sanitize_bg_position_x($input)
{
    $valid = array('left', 'center', 'right');
    return in_array($input, $valid, true) ? $input : 'center';
}

function mytheme_sanitize_bg_position_y($input)
{
    $valid = array('top', 'center', 'bottom');
    return in_array($input, $valid, true) ? $input : 'center';
}

/**
 * Sanitize image URL
 */
function mytheme_sanitize_image_url($url)
{
    return esc_url_raw($url);
}

/**
 * Sanitize attachment id (store IDs for media controls)
 */
function mytheme_sanitize_attachment_id($id)
{
    return absint($id);
}

/**
 * Add front page settings and controls (panel -> section -> settings)
 */
function mytheme_customize_frontpage($wp_customize)
{
    // Create a panel specifically for front page options
    $wp_customize->add_panel('frontpage_panel', array(
        'title'       => __('Front Page', 'mytheme'),
        'description' => __('Settings for the Homepage', 'mytheme'),
        'priority'    => 160,
    ));

    // Section inside the panel
    $wp_customize->add_section('frontpage_hero_section', array(
        'title'    => __('Hero Background', 'mytheme'),
        'panel'    => 'frontpage_panel',
        'priority' => 10,
    ));

    // Separate section for the "Why Choose Alba" image
    $wp_customize->add_section('frontpage_why_section', array(
        'title'    => __('Why Choose - Image', 'mytheme'),
        'panel'    => 'frontpage_panel',
        'priority' => 20,
    ));

    // Background image (stores attachment ID)
    $wp_customize->add_setting('frontpage_bg_image', array(
        'default'           => 0,
        'sanitize_callback' => 'mytheme_sanitize_attachment_id',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'frontpage_bg_image_control', array(
        'label'    => __('Hero background image', 'mytheme'),
        'section'  => 'frontpage_hero_section',
        'settings' => 'frontpage_bg_image',
        'mime_type' => 'image',
    )));

    // Background position split into horizontal and vertical controls

    $wp_customize->add_setting('frontpage_bg_position_x', array(
        'default'           => 'center',
        'sanitize_callback' => 'mytheme_sanitize_bg_position_x',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('frontpage_bg_position_x_control', array(
        'label'    => __('Background horizontal position', 'mytheme'),
        'section'  => 'frontpage_hero_section',
        'settings' => 'frontpage_bg_position_x',
        'type'     => 'select',
        'choices'  => array(
            'left'   => __('Left', 'mytheme'),
            'center' => __('Center', 'mytheme'),
            'right'  => __('Right', 'mytheme'),
        ),
    ));

    $wp_customize->add_setting('frontpage_bg_position_y', array(
        'default'           => 'center',
        'sanitize_callback' => 'mytheme_sanitize_bg_position_y',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('frontpage_bg_position_y_control', array(
        'label'    => __('Background vertical position', 'mytheme'),
        'section'  => 'frontpage_hero_section',
        'settings' => 'frontpage_bg_position_y',
        'type'     => 'select',
        'choices'  => array(
            'top'    => __('Top', 'mytheme'),
            'center' => __('Center', 'mytheme'),
            'bottom' => __('Bottom', 'mytheme'),
        ),
    ));

    // "Why Choose" image
    $wp_customize->add_setting('frontpage_why_image', array(
        'default'           => 0,
        'sanitize_callback' => 'mytheme_sanitize_attachment_id',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'frontpage_why_image_control', array(
        'label'    => __('Why Choose Alba Pro Services Image', 'mytheme'),
        'section'  => 'frontpage_why_section',
        'settings' => 'frontpage_why_image',
        'mime_type' => 'image',
    )));
}
add_action('customize_register', 'mytheme_customize_frontpage');

/**
 * Output inline CSS for front page hero using the selected Customizer values
 */
function mytheme_frontpage_hero_css()
{
    if (! is_front_page()) {
        return;
    }

    $image_id = get_theme_mod('frontpage_bg_image', 0);
    $image = $image_id ? wp_get_attachment_image_url($image_id, 'large') : '';
    $position_x = get_theme_mod('frontpage_bg_position_x', 'center');
    $position_y = get_theme_mod('frontpage_bg_position_y', 'center');
    $position = $position_x . ' ' . $position_y;

    if (! $image) {
        return;
    }

    // Target an element with class .front-page-hero in your front-page template
    $css = sprintf(
        '.hero-background-customizer { background-image: url("%s"); background-position: %s; }',
        esc_url($image),
        esc_attr($position)
    );

    echo "\n<style id=\"front-page-hero\">" . $css . "</style>\n";
}
add_action('wp_head', 'mytheme_frontpage_hero_css', 11);
