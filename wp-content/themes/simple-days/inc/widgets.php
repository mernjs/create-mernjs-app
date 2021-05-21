<?php
defined( 'ABSPATH' ) || exit;

register_sidebar(array(
  'name' => esc_html__( 'Right Sidebar', 'simple-days' ),
  'id' => 'sidebar-1',
  'description' => sprintf(esc_html__('Widgets in this area will be displayed in %s.', 'simple-days'),esc_html__( 'the right sidebar', 'simple-days' ) ).esc_html__('When using both the left and right sidebars, it is recommended to adjust the width with the customizer.', 'simple-days'),
  'before_widget' => '<aside id="%1$s" class="widget s_widget sr_widget %2$s shadow_box">',
  'after_widget' => '</aside>',
  'before_title' => '<h3 class="widget_title sw_title">',
  'after_title' => '</h3>'
));
register_sidebar(array(
  'name' => esc_html__( 'Left Sidebar', 'simple-days' ),
  'id' => 'sidebar-2',
  'description' => sprintf(esc_html__('Widgets in this area will be displayed in %s.', 'simple-days'),esc_html__( 'the left sidebar', 'simple-days' ) ).esc_html__('When using both the left and right sidebars, it is recommended to adjust the width with the customizer.', 'simple-days'),
  'before_widget' => '<aside id="%1$s" class="widget s_widget sl_widget %2$s shadow_box">',
  'after_widget' => '</aside>',
  'before_title' => '<h3 class="widget_title sw_title">',
  'after_title' => '</h3>'
));
register_sidebar(array(
  'name' => esc_html__( 'Left of footer', 'simple-days' ),
  'id' => 'footer-1',
  'description' => sprintf(esc_html__('Widgets in this area will be displayed in %s.', 'simple-days'),esc_html__( 'the first column in the footer', 'simple-days' ) ),
  'before_widget' => '<aside id="%1$s" class="widget f_widget f_widget_l %2$s shadow_box">',
  'after_widget' => '</aside>',
  'before_title' => '<h3 class="widget_title fw_title">',
  'after_title' => '</h3>'
));
register_sidebar(array(
  'name' => esc_html__( 'Center of footer', 'simple-days' ),
  'id' => 'footer-2',
  'description' => sprintf(esc_html__('Widgets in this area will be displayed in %s.', 'simple-days'),esc_html__( 'the second column in the footer', 'simple-days' ) ),
  'before_widget' => '<aside id="%1$s" class="widget f_widget f_widget_c %2$s shadow_box">',
  'after_widget' => '</aside>',
  'before_title' => '<h3 class="widget_title fw_title">',
  'after_title' => '</h3>'
));
register_sidebar(array(
  'name' => esc_html__( 'Right of footer', 'simple-days' ),
  'id' => 'footer-3',
  'description' => sprintf(esc_html__('Widgets in this area will be displayed in %s.', 'simple-days'),esc_html__( 'the third column in the footer', 'simple-days' ) ),
  'before_widget' => '<aside id="%1$s" class="widget f_widget f_widget_r %2$s shadow_box">',
  'after_widget' => '</aside>',
  'before_title' => '<h3 class="widget_title fw_title">',
  'after_title' => '</h3>'
));

register_sidebar(array(
  'name' => esc_html__( 'Custom Homepage', 'simple-days' ),
  'id' => 'custom_homepage',
  'description' => sprintf(esc_html__('Widgets in this area will be displayed in %s.', 'simple-days'),esc_html__( 'Homepage', 'simple-days' ) ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget' => '</div>',
  'before_title' => '<h3 class="widget_title ch_title">',
  'after_title' => '</h3>'
));

register_sidebar(array(
  'name' => esc_html__( 'On the pagination', 'simple-days' ),
  'id' => 'on_pagination',
  'description' => sprintf(esc_html__('Widgets in this area will be displayed in %s.', 'simple-days'),esc_html__( 'upper the pagination', 'simple-days' ) ),
  'before_widget' => '<aside id="%1$s" class="widget %2$s shadow_box">',
  'after_widget' => '</aside>',
  'before_title' => '<h3 class="widget_title">',
  'after_title' => '</h3>'
));



register_sidebar(array(
  'name' => esc_html__( 'Over Header', 'simple-days' ),
  'id' => 'over_header',
  'description' => sprintf(esc_html__('Widgets in this area will be displayed in %s.', 'simple-days'),esc_html__( 'over header', 'simple-days' ) ),
  'before_widget' => '<aside id="%1$s" class="widget oh_widget %2$s">',
  'after_widget' => '</aside>',
  'before_title' => '<h3 class="widget_title oh_title">',
  'after_title' => '</h3>'
));
/*
  register_sidebar(array(
    'name' => esc_html__( 'Over Header Left', 'simple-days' ),
    'id' => 'over_header_left',
    'description' => esc_html__( 'Add widgets here to over header left.', 'simple-days' ),
    'before_widget' => '<div id="%1$s" class="widget oh_widget oh_widget_l %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget_title oh_title">',
    'after_title' => '</h3>'
  ));

  register_sidebar(array(
    'name' => esc_html__( 'Over Header Right', 'simple-days' ),
    'id' => 'over_header_right',
    'description' => esc_html__( 'Add widgets here to over header right.', 'simple-days' ),
    'before_widget' => '<div id="%1$s" class="widget oh_widget oh_widget_r %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget_title oh_title">',
    'after_title' => '</h3>'
  ));
*/
  register_sidebar(array(
    'name' => esc_html__( 'Header', 'simple-days' ),
    'id' => 'header_widget',
    'description' => sprintf(esc_html__('Widgets in this area will be displayed in %s.', 'simple-days'),esc_html__( 'header', 'simple-days' ) ),
    'before_widget' => '<aside id="%1$s" class="widget h_widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget_title hw_title">',
    'after_title' => '</h3>'
  ));

  register_sidebar(array(
    'name' => esc_html__( 'Under Header', 'simple-days' ),
    'id' => 'under_header',
    'description' => sprintf(esc_html__('Widgets in this area will be displayed in %s.', 'simple-days'),esc_html__( 'under header', 'simple-days' ) ),
    'before_widget' => '<aside id="%1$s" class="widget uh_widget m0 %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget_title hw_title">',
    'after_title' => '</h3>'
  ));
      //global $hook_suffix;
      //if( 'customize.php' == $hook_suffix ){
      //  $setting_url = esc_js('javascript:wp.customize.section(\"simple_days_index_page_setting\").focus();' );
      //}else{
  $setting_url = esc_url(admin_url('customize.php?autofocus[section]=simple_days_index_page_setting'));
      //}

  register_sidebar(array(
    'name' => esc_html__( 'Index List', 'simple-days' ),
    'id' => 'index_list',
    'description' => sprintf(esc_html__('Widgets in this area will be displayed in %s.', 'simple-days'),esc_html__( 'index list', 'simple-days' ) ).' <a href="'.$setting_url.'">'.esc_html__( 'change the number of insert widget area.', 'simple-days' ).'</a>',
    'before_widget' => '<aside id="%1$s" class="widget %2$s i_widget shadow_box">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));

  register_sidebar(array(
    'name' => esc_html__( 'Fixed Right Sidebar for Laptop', 'simple-days' ),
    'id' => 'sidebar-right-fixed',
    'description' => sprintf(esc_html__('Widgets in this area will be displayed in %s.', 'simple-days'),esc_html__( 'right sidebar and fix in bottom', 'simple-days' ) ),
    'before_widget' => '<aside id="%1$s" class="widget s_widget %2$s shadow_box">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget_title sw_title">',
    'after_title' => '</h3>'
  ));
  register_sidebar(array(
    'name' => esc_html__( 'Fixed Left Sidebar for Laptop', 'simple-days' ),
    'id' => 'sidebar-left-fixed',
    'description' => sprintf(esc_html__('Widgets in this area will be displayed in %s.', 'simple-days'),esc_html__( 'left sidebar and fix in bottom', 'simple-days' ) ),
    'before_widget' => '<aside id="%1$s" class="widget s_widget %2$s shadow_box">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget_title sw_title">',
    'after_title' => '</h3>'
  ));

  register_sidebar(array(
    'name' => esc_html__( 'Search', 'simple-days' ),
    'id' => 'search_widget',
    'description' => sprintf(esc_html__('Widgets in this area will be displayed in %s.', 'simple-days'),esc_html__( 'header', 'simple-days' ) ),
    'before_widget' => '<aside id="%1$s" class="widget search_widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget_title search_widget_title">',
    'after_title' => '</h3>'
  ));

  $i = 1;
  while($i<6){
    register_sidebar(array(
      'name' => esc_html__( 'Post widget', 'simple-days' ).' '.$i,
      'id' => 'post_widget_'.$i,
      'description' => sprintf(esc_html__('Widgets in this area will be displayed in %s.', 'simple-days'),esc_html__( 'the contents of the post', 'simple-days' ) ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s shadow_box">',
      'after_widget' => '</aside>',
      'before_title' => '<h3 class="widget_title">',
      'after_title' => '</h3>'
    ));
    ++$i;
  }

  $i = 1;
  while($i<6){
    register_sidebar(array(
      'name' => esc_html__( 'Page widget', 'simple-days' ).' '.$i,
      'id' => 'page_widget_'.$i,
      'description' => sprintf(esc_html__('Widgets in this area will be displayed in %s.', 'simple-days'),esc_html__( 'the contents of the page', 'simple-days' ) ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s shadow_box">',
      'after_widget' => '</aside>',
      'before_title' => '<h3 class="widget_title">',
      'after_title' => '</h3>'
    ));
    ++$i;
  }
