<?php
  defined( 'ABSPATH' ) || exit;
/**
 * Alert Settings
 *
 * @package Simple Days
 */

     
    $wp_customize->add_section('simple_days_alert_box_setting',array(
      'title' => esc_html__('Alert Box','simple-days'),
      'panel' => 'simple_days_header_setting',
    ));
    $wp_customize->add_setting( 'simple_days_alert_box',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_alert_box',array(
      'label'   => esc_html__( 'Display', 'simple-days'),
        //'description' => esc_html__('Current name', 'simple-days'),
      'section' => 'simple_days_alert_box_setting',
      'type' => 'checkbox',
    ));

    $wp_customize->add_setting( 'simple_days_alert_box_text',array(
      'default'           => '',
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control('simple_days_alert_box_text',array(
      'label'   => esc_html__( 'Text', 'simple-days'),
        //'description' => esc_html__('e.g.&nbsp;', 'simple-days').esc_html('1234567890'),
      'section' => 'simple_days_alert_box_setting',
      'type'    => 'text',
    ));

    $wp_customize->add_setting( 'simple_days_alert_box_text_position', array(
      'default'           => 'center',
      'sanitize_callback' => 'simple_days_sanitize_radio',
      'transport' => 'postMessage',
    ));
    $wp_customize->add_control( 'simple_days_alert_box_text_position', array(
      'label'    => esc_html__( 'Text display position', 'simple-days' ),
      'section'  => 'simple_days_alert_box_setting',
      'type'     => 'select',
      'choices'  => array(
        'left' => esc_html__( 'Left', 'simple-days' ),
        'center' => esc_html__( 'Center', 'simple-days' ),
        'right' => esc_html__( 'Right', 'simple-days' ),
      ),
    ));
    $wp_customize->add_setting( 'simple_days_alert_box_text_size', array(
      'default' => 16,
      'sanitize_callback' => 'absint',
      'transport' => 'postMessage',
    ));
    $wp_customize->add_control( 'simple_days_alert_box_text_size', array(
      'label' => esc_html__( 'Text Size', 'simple-days' ),
    //'description' => esc_html__('default&#58;', 'simple-days').esc_html('1'),
      'section' => 'simple_days_alert_box_setting',
      'type' => 'number',
      'input_attrs' => array(
        'min' => 1, 'step' => 1, 'max' => 64,),
    ));


    $alert_box_icon = array(
     '&nbsp;' => esc_html('&nbsp;'),
     'fa-info-circle' => '&#xf05a; info-circle',
     'fa-info' => '&#xf129; info',
     'fa-question-circle' => '&#xf059; question-circle',
     'fa-times-circle' => '&#xf057; times-circle',
     'fa-times-circle-o' => '&#xf05c; times-circle-o',
     'fa-warning' => '&#xf071; warning',
     'fa-exclamation-circle' => '&#xf06a; exclamation-circle',
     'fa-search' => '&#xf002; search',
     'fa-envelope-o' => '&#xf003; envelope-o',
     'fa-heart-o' => '&#xf08a; fa-heart-o',
     'fa-heart' => '&#xf004; fa-heart',
     'fa-star-o' => '&#xf006; fa-star-o',
     'fa-star' => '&#xf005; fa-star',
     'fa-user' => '&#xf007; fa-user',
     'fa-user-o' => '&#xf2c0; fa-user-o',
     'fa-user-circle' => '&#xf2bd; fa-user-circle',
     'fa-user-circle-o' => '&#xf2be; fa-user-circle-o',
     'fa-users' => '&#xf0c0; fa-users',
     'fa-user-secret' => '&#xf21b; fa-user-secret',
     'fa-female' => '&#xf182; fa-female',
     'fa-male' => '&#xf183; fa-male',
     'fa-child' => '&#xf1ae; fa-child',
     'fa-id-badge' => '&#xf2c1; fa-id-badge',
     'fa-smile-o' => '&#xf118; fa-smile-o',
     'fa-frown-o' => '&#xf119; fa-frown-o',
     'fa-meh-o' => '&#xf11a; fa-meh-o',
     'fa-check' => '&#xf00c; check',
     'fa-close' => '&#xf00d; close',
     'fa-signal' => '&#xf012; fa-signal',
     'fa-cog' => '&#xf013; cog',
     'fa-trash-o' => '&#xf014; trash-o',
     'fa-home' => '&#xf015; home',
     'fa-file-o' => '&#xf016; file-o',
     'fa-clock-o' => '&#xf017; clock-o',
     'fa-play-circle-o' => '&#xf01d; play-circle-o',
     'fa-repeat' => '&#xf01e; repeat',
     'fa-refresh' => '&#xf021; fa-refresh',
     'fa-lock' => '&#xf023; fa-lock',



     'fa-arrow-circle-o-up' => '&#xf01b; arrow-circle-o-up',
     'fa-arrow-circle-o-down' => '&#xf01a; arrow-circle-o-down',
     'fa-arrow-circle-o-right' => '&#xf18e; arrow-circle-o-right',
     'fa-arrow-circle-o-left' => '&#xf190; arrow-circle-o-left',
     'fa-arrow-up' => '&#xf062; arrow-up',
     'fa-arrow-down' => '&#xf063; arrow-down',
     'fa-arrow-right' => '&#xf061; arrow-right',
     'fa-arrow-left' => '&#xf060; arrow-left',
     'fa-chevron-up' => '&#xf077; chevron-up',
     'fa-chevron-down' => '&#xf078; chevron-down',
     'fa-chevron-right' => '&#xf054; chevron-right',
     'fa-chevron-left' => '&#xf053; chevron-left',
     'fa-arrow-circle-up' => '&#xf0aa; arrow-circle-up',
     'fa-arrow-circle-down' => '&#xf0ab; arrow-circle-down',
     'fa-arrow-circle-right' => '&#xf0a9; arrow-circle-right',
     'fa-arrow-circle-left' => '&#xf0a8; arrow-circle-left',
     'fa-angle-up' => '&#xf106; angle-up',
     'fa-angle-down' => '&#xf107; angle-down',
     'fa-angle-right' => '&#xf105; angle-right',
     'fa-angle-left' => '&#xf104; angle-left',
     'fa-angle-double-up' => '&#xf102; angle-double-up',
     'fa-angle-double-down' => '&#xf103; angle-double-down',
     'fa-angle-double-right' => '&#xf101; angle-double-right',
     'fa-angle-double-left' => '&#xf100; angle-double-left',



     'fa-area-chart' => '&#xf1fe; fa-area-chart',
     'fa-line-chart' => '&#xf201; fa-line-chart',


     'fa-history' => '&#xf1da; fa-history',


     'fa-bolt' => '&#xf0e7; fa-bolt',
     'fa-lightbulb-o' => '&#xf0eb; fa-lightbulb-o',

     'fa-rocket' => '&#xf135; fa-rocket',
     'fa-location-arrow' => '&#xf124; fa-location-arrow',

     'fa-paw' => '&#xf1b0; fa-paw',
     'fa-bomb' => '&#xf1e2; fa-bomb',
     'fa-birthday-cake' => '&#xf1fd; fa-birthday-cake',
     'fa-fort-awesome' => '&#xf286; fa-fort-awesome',
     'fa-gamepad' => '&#xf11b; fa-gamepad',
   );






    $wp_customize->add_setting( 'simple_days_alert_box_start_icon',array(
      'default'    => 'fa-info-circle',
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control( 'simple_days_alert_box_start_icon',array(
      'label'   => esc_html__( 'Heading icon', 'simple-days'),
      'section' => 'simple_days_alert_box_setting',
      'type' => 'select',
      'choices' => $alert_box_icon,
    ));
    $wp_customize->add_setting( 'simple_days_alert_box_end_icon',array(
      'default'    => '',
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control( 'simple_days_alert_box_end_icon',array(
      'label'   => esc_html__( 'Ending icon', 'simple-days'),
      'section' => 'simple_days_alert_box_setting',
      'type' => 'select',
      'choices' => $alert_box_icon,
    ));

    $wp_customize->add_setting( 'simple_days_alert_box_color',array(
      'default'    => define("simple_days_alert_box_color", ""),
      'sanitize_callback' => 'sanitize_text_field',
      'transport' => 'postMessage',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_days_alert_box_color', array(
      'label'      => esc_html__( 'Text Color', 'simple-days' ),
      'section'    => 'simple_days_alert_box_setting',
    )));

    $wp_customize->add_setting( 'simple_days_alert_box_bg_color',array(
      'default'    => define("simple_days_alert_box_bg_color", ""),
      'sanitize_callback' => 'sanitize_text_field',
      'transport' => 'postMessage',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_days_alert_box_bg_color', array(
      'label'      => esc_html__( 'Background Color', 'simple-days' ),
      'section'    => 'simple_days_alert_box_setting',
    )));



    $wp_customize->add_setting( 'simple_days_alert_box_border_type', array(
      'default'           => 'none',
      'sanitize_callback' => 'simple_days_sanitize_radio',
      'transport' => 'postMessage',
    ));
    $wp_customize->add_control( 'simple_days_alert_box_border_type', array(
      'label'    => esc_html__( 'Border Type', 'simple-days' ),
      'section'  => 'simple_days_alert_box_setting',
      'type'     => 'select',
      'choices'  => $heading_border_style,
    ));
    $wp_customize->add_setting( 'simple_days_alert_box_border_width', array(
      'default' => 1,
      'sanitize_callback' => 'absint',
      'transport' => 'postMessage',
    ));
    $wp_customize->add_control( 'simple_days_alert_box_border_width', array(
      'label' => esc_html__( 'Border width', 'simple-days' ),
    //'description' => esc_html__('default&#58;', 'simple-days').esc_html('1'),
      'section' => 'simple_days_alert_box_setting',
      'type' => 'number',
      'input_attrs' => array(
        'min' => 1, 'step' => 1, 'max' => 50,),
    ));

    $wp_customize->add_setting( 'simple_days_alert_box_border_color',array(
      'default'    => define("simple_days_alert_box_border_color", ""),
      'sanitize_callback' => 'sanitize_text_field',
      'transport' => 'postMessage',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_days_alert_box_border_color', array(
      'label'      => esc_html__( 'Border Color', 'simple-days' ),
      'section'    => 'simple_days_alert_box_setting',
    )));
    $wp_customize->add_setting( 'simple_days_alert_box_border_inside',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
      'transport' => 'postMessage',
    ));
    $wp_customize->add_control( 'simple_days_alert_box_border_inside',array(
      'label'   => esc_html__( 'Border is inside', 'simple-days'),
      'section' => 'simple_days_alert_box_setting',
      'type' => 'checkbox',
    ));
