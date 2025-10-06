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
