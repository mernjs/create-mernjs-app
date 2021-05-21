<?php
defined( 'ABSPATH' ) || exit;
/**
 * SideBar Settings
 *
 * @package Simple Days
 */

/*
  // Add Settings and Controls for Layout.
    $wp_customize->add_setting( 'simple_days_sidebar_layout', array(
      'default'           => '3',
      'sanitize_callback' => 'sanitize_key',
      //'transport'=>'postMessage',
    ) );
    $wp_customize->add_control( new Simple_Days_Image_Select_Control( $wp_customize, 'simple_days_sidebar_layout', array(
      'label'       => esc_html__( 'Sidebar Layout', 'simple-days' ),
      'section'     => 'simple_days_sidebar_setting',
      'choices'     => array(
        '1' => array(
          'label' => esc_html__( 'Left Sidebar', 'simple-days' ),
          'url'   => '%ssidebar_left.png'
        ),
        '3'    => array(
          'label' => esc_html__( 'Right Sidebar', 'simple-days' ),
          'url'   => '%ssidebar_right.png'
        ),
        '0'    => array(
          'label' => esc_html__( 'No Sidebar', 'simple-days' ),
          'url'   => '%ssidebar_no.png'
        ),
      ),
    )));
*/


    $is_name = array(
      'is_author'   => esc_html_x( 'Author' , 'no_sidebar' , 'simple-days'),
      'is_category' => esc_html_x( 'Category' , 'no_sidebar' , 'simple-days'),
      'is_tag'      => esc_html_x( 'Tag' , 'no_sidebar' , 'simple-days'),
      'is_date'     => esc_html_x( 'Date' , 'no_sidebar' , 'simple-days'),
      'is_search'   => esc_html_x( 'Search' , 'no_sidebar' , 'simple-days'),
      'is_404'      => esc_html_x( '404' , 'no_sidebar' , 'simple-days'),
    );

    $wp_customize->add_setting( 'simple_days_no_sidebar_info', array(
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_no_sidebar_info', array(
      'section' => 'simple_days_sidebar_setting',
      
      'label' => esc_html__( 'Without sidebar',  'simple-days'),

    )));

    foreach ($is_name as $key => $value) {
      $wp_customize->add_setting( 'simple_days_'.$key.'_no_sidebar',array(
        'default'    => false,
        'sanitize_callback' => 'sanitize_text_field',
      ));
      $wp_customize->add_control( 'simple_days_'.$key.'_no_sidebar',array(
        'label'   => sprintf( esc_html_x('%s page' , 'no_sidebar' , 'simple-days') , esc_html( $value ) ),
        'section' => 'simple_days_sidebar_setting',
        'type' => 'checkbox',
      ));
    }

    $wp_customize->add_setting( 'simple_days_one_column_post', array(
      'default'           => '',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
    $wp_customize->add_control( 'simple_days_one_column_post', array(
      'label'    => esc_html__( 'Enter the post ID without using the sidebar', 'simple-days' ),
      'description' => esc_html__('Multiple id must be separated by a comma.', 'simple-days'),
      'section'  => 'simple_days_sidebar_setting',
      'type'    => 'text',
    )
  );
