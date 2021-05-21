<?php
  defined( 'ABSPATH' ) || exit;
/**
 * Google fonts Settings
 *
 * @package Simple Days
 */

    
    $wp_customize->add_section('simple_days_font_setting',array(
      'title' => esc_html__('Fonts','simple-days'),
      'panel' => 'simple_days_site_setting',
    ));


    $normal_fonts = array(
      'none' => '',
      'Arial, Helvetica, sans-serif' => esc_html('Arial, Helvetica, sans-serif'),
      '"Arial Black", Gadget, sans-serif' => esc_html('Arial Black, Gadget, sans-serif'),
      '"Comic Sans MS", cursive, sans-serif' => esc_html('Comic Sans MS, cursive, sans-serif'),
      '"Courier New", Courier, monospace' => esc_html('Courier New, Courier, monospace'),
      'Georgia, serif' => esc_html('Georgia, Helvetica, serif'),
      'Impact, Charcoal, sans-serif' => esc_html('Impact, Charcoal, sans-serif'),
      '"Lucida Console", Monaco, monospace' => esc_html('Lucida Console, Monaco, monospace'),
      '"Palatino Linotype", "Book Antiqua", Palatino, serif' => esc_html('Palatino Linotype, Book Antiqua, Palatino, serif'),
      '"Times New Roman", Times, serif' => esc_html('Times New Roman, Times, serif'),
      '"Trebuchet MS", Helvetica, sans-serif' => esc_html('Trebuchet MS, Helvetica, sans-serif'),
      'Verdana, Geneva, sans-serif' => esc_html('Verdana, Geneva, sans-serif'),
    );

    $google_font_effects = array(
      'none' => '',
      'anaglyph' => esc_html__('Anaglyph', 'simple-days'),
      'brick-sign' => esc_html__('Brick Sign', 'simple-days'),
      'canvas-print' => esc_html__('Canvas Print', 'simple-days'),
      'crackle' => esc_html__('Crackle', 'simple-days'),
      'decaying' => esc_html__('Decaying', 'simple-days'),
      'destruction' => esc_html__('Destruction', 'simple-days'),
      'distressed' => esc_html__('Distressed', 'simple-days'),
      'distressed-wood' => esc_html__('Distressed Wood', 'simple-days'),
      'emboss' => esc_html__('Emboss', 'simple-days'),
      'fire' => esc_html__('Fire', 'simple-days'),
      'fire-animation' => esc_html__('Fire Animation', 'simple-days'),
      'fragile' => esc_html__('Fragile', 'simple-days'),
      'grass' => esc_html__('Grass', 'simple-days'),
      'ice' => esc_html__('Ice', 'simple-days'),
      'mitosis' => esc_html__('Mitosis', 'simple-days'),
      'neon' => esc_html__('Neon', 'simple-days'),
      'outline' => esc_html__('Outline', 'simple-days'),
      'putting-green' => esc_html__('Putting Green', 'simple-days'),
      'scuffed-steel' => esc_html__('Scuffed Steel', 'simple-days'),
      'shadow-multiple' => esc_html__('Shadow Multiple', 'simple-days'),
      'splintered' => esc_html__('Splintered', 'simple-days'),
      'static' => esc_html__('Static', 'simple-days'),
      'stonewash' => esc_html__('Stonewash', 'simple-days'),
      '3d' => esc_html__('Three Dimensional', 'simple-days'),
      '3d-float' => esc_html__('Three Dimensional Float', 'simple-days'),
      'vintage' => esc_html__('Vintage', 'simple-days'),
      'wallpaper' => esc_html__('Wallpaper', 'simple-days'),
    );


  $customize_font_section = array();
  $customize_font = array();
  get_template_part( 'inc/googlefonts' );
  $googlefonts = simple_days_google_fonts_list();

  $customize_font_slug = 'simple_days_web_safe_fonts_info';
  $customize_font_section[$customize_font_slug] = array(
    'slug' => $customize_font_slug,
    'title' => esc_html__('Web Safe Fonts', 'simple-days'),
    'content' => '',
    'fonts' => 'normal_fonts',
  );
  $customize_font[$customize_font_slug][] = array(
    'slug' => 'simple_days_font_body',
    'label' => esc_html_x( 'Body', 'font' , 'simple-days'),
  );
  $customize_font[$customize_font_slug][] = array(
    'slug' => 'simple_days_font_headings',
    'label' => esc_html_x( 'Headings', 'font' , 'simple-days'),
  );
  $customize_font[$customize_font_slug][] = array(
    'slug' => 'simple_days_font_site_title',
    'label' => esc_html_x( 'Site title', 'font' , 'simple-days'),
  );
  $customize_font[$customize_font_slug][] = array(
    'slug' => 'simple_days_font_post_title',
    'label' => esc_html_x( 'Post title', 'font' , 'simple-days'),
  );

  $customize_font_slug = 'simple_days_google_fonts_info';
  $customize_font_section[$customize_font_slug] = array(
    'slug' => $customize_font_slug,
    'title' => esc_html__('Google Fonts', 'simple-days'),
    
    'content' => sprintf(esc_html__('This selection overrides %s.', 'simple-days'),esc_html__( 'Web Safe Fonts', 'simple-days')),
    'fonts' => 'googlefonts',
  );
  $customize_font[$customize_font_slug][] = array(
    'slug' => 'simple_days_font_body_google',
    'label' => esc_html_x( 'Body', 'font' , 'simple-days'),
  );
  $customize_font[$customize_font_slug][] = array(
    'slug' => 'simple_days_font_headings_google',
    'label' => esc_html_x( 'Headings', 'font' , 'simple-days'),
  );
  $customize_font[$customize_font_slug][] = array(
    'slug' => 'simple_days_font_site_title_google',
    'label' => esc_html_x( 'Site title', 'font' , 'simple-days'),
  );
  $customize_font[$customize_font_slug][] = array(
    'slug' => 'simple_days_font_post_title_google',
    'label' => esc_html_x( 'Post title', 'font' , 'simple-days'),
  );
  $customize_font[$customize_font_slug][] = array(
    'slug' => 'simple_days_font_site_title_google_effects_1',
    'label' => esc_html_x( 'Site title', 'font' , 'simple-days').esc_html__( '(Effect)', 'simple-days'),
    'fonts' => 'google_font_effects',
  );
  $customize_font[$customize_font_slug][] = array(
    'slug' => 'simple_days_font_site_title_google_effects_2',
    'label' => esc_html_x( 'Post title', 'font' , 'simple-days').esc_html__( '(Effect)', 'simple-days'),
    'fonts' => 'google_font_effects',
  );

    if( get_locale() == 'ja' ) {
      $normal_jp_fonts = array(
        'none' => '',
        esc_html__('Verdana, "YuGothic", YuGothic, "Hiragino Kaku Gothic ProN W3", "Hiragino Kaku Gothic ProN", "Meiryo", Meiryo, sans-serif', 'simple-days') => esc_html__('Verdana, "YuGothic", YuGothic, "Hiragino Kaku Gothic ProN W3", "Hiragino Kaku Gothic ProN", "Meiryo", Meiryo, sans-serif', 'simple-days'),
        esc_html__('"Times New Roman", "YuMincho", YuMincho, "Hiragino Mincho ProN W3", "Hiragino Mincho ProN", "Meiryo", Meiryo, serif', 'simple-days') => esc_html__('"Times New Roman", "YuMincho", YuMincho, "Hiragino Mincho ProN W3", "Hiragino Mincho ProN", "Meiryo", Meiryo, serif', 'simple-days'),
        esc_html__('"Osaka", Osaka-mono, "MS Gothic", "MS Gothic", monospace', 'simple-days') => esc_html__('"Osaka", Osaka-mono, "MS Gothic", "MS Gothic", monospace', 'simple-days'),
        esc_html__('Verdana, Roboto, "Droid Sans", "YuGothic", YuGothic, "Hiragino Kaku Gothic ProN W3", "Hiragino Kaku Gothic ProN", "Meiryo", Meiryo, sans-serif', 'simple-days') => esc_html__('Verdana, Roboto, "Droid Sans", "YuGothic", YuGothic, "Hiragino Kaku Gothic ProN W3", "Hiragino Kaku Gothic ProN", "Meiryo", Meiryo, sans-serif', 'simple-days'),
      );
      $google_jp_fonts = array(
        'none' => '',
        'M PLUS 1p' => esc_html('M PLUS 1p'),
        'M PLUS Rounded 1c' => esc_html('M PLUS Rounded 1c'),
        'Sawarabi Mincho' => esc_html__('Sawarabi Mincho', 'simple-days'),
        'Sawarabi Gothic' => esc_html__('Sawarabi Gothic', 'simple-days'),
        'Kosugi' => esc_html('Kosugi'),
        'Kosugi Maru' => esc_html('Kosugi Maru'),
        'Hannari' => esc_html__('Hannari', 'simple-days'),
        'Kokoro' => esc_html__('Kokoro', 'simple-days'),
        'Nikukyu' => esc_html__('Nikukyu', 'simple-days'),
        'Nico Moji' => esc_html__('Nico Moji', 'simple-days'),
        'Noto Sans Japanese' => esc_html('Noto Sans Japanese'),
        'Noto Sans JP' => esc_html('Noto Sans JP'),
      );

      $customize_font_slug = 'simple_days_local_fonts_japanese_info';
      $customize_font_section[$customize_font_slug] = array(
       'slug' => $customize_font_slug,
        'title' => esc_html__('Local Fonts', 'simple-days').esc_html__( '(Japanese)', 'simple-days' ),
        
        'content' => sprintf(esc_html__('This selection overrides %s.', 'simple-days'),esc_html__( 'Google Fonts', 'simple-days')),
        'fonts' => 'normal_jp_fonts',
      );
      $customize_font[$customize_font_slug][] = array(
        'slug' => 'simple_days_font_body_jp',
        'label' => esc_html_x( 'Body', 'font' , 'simple-days'),
      );
      $customize_font[$customize_font_slug][] = array(
        'slug' => 'simple_days_font_headings_jp',
        'label' => esc_html_x( 'Headings', 'font' , 'simple-days'),
      );
      $customize_font[$customize_font_slug][] = array(
        'slug' => 'simple_days_font_site_title_jp',
        'label' => esc_html_x( 'Site title', 'font' , 'simple-days'),
      );
      $customize_font[$customize_font_slug][] = array(
        'slug' => 'simple_days_font_post_title_jp',
        'label' => esc_html_x( 'Post title', 'font' , 'simple-days'),
      );

      $customize_font_slug = 'simple_days_google_fonts_japanese_info';
      $customize_font_section[$customize_font_slug] = array(
       'slug' => $customize_font_slug,
        'title' => esc_html__('Google Fonts', 'simple-days').esc_html__( '(Japanese)', 'simple-days' ),
        
        'content' => sprintf(esc_html__('This selection overrides %s.', 'simple-days'),esc_html__('Local Fonts', 'simple-days').esc_html__( '(Japanese)', 'simple-days' )),
        'fonts' => 'google_jp_fonts',
      );
      $customize_font[$customize_font_slug][] = array(
        'slug' => 'simple_days_font_body_google_jp',
        'label' => esc_html_x( 'Body', 'font' , 'simple-days'),
      );
      $customize_font[$customize_font_slug][] = array(
        'slug' => 'simple_days_font_headings_google_jp',
        'label' => esc_html_x( 'Headings', 'font' , 'simple-days'),
      );
      $customize_font[$customize_font_slug][] = array(
        'slug' => 'simple_days_font_site_title_google_jp',
        'label' => esc_html_x( 'Site title', 'font' , 'simple-days'),
      );
      $customize_font[$customize_font_slug][] = array(
        'slug' => 'simple_days_font_post_title_google_jp',
        'label' => esc_html_x( 'Post title', 'font' , 'simple-days'),
      );
      $customize_font[$customize_font_slug][] = array(
        'slug' => 'simple_days_font_site_title_google_jp_effects_1',
        'label' => esc_html_x( 'Site title', 'font' , 'simple-days').esc_html__( '(Effect)', 'simple-days'),
        'fonts' => 'google_font_effects',
      );
      $customize_font[$customize_font_slug][] = array(
        'slug' => 'simple_days_font_site_title_google_jp_effects_2',
        'label' => esc_html_x( 'Post title', 'font' , 'simple-days').esc_html__( '(Effect)', 'simple-days'),
        'fonts' => 'google_font_effects',
      );
    }// Japanese only






  foreach( $customize_font_section as $section_value ) {
    $wp_customize->add_setting( $section_value['slug'], array(
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, $section_value['slug'], array(
      'section' => 'simple_days_font_setting',
      'label' => $section_value['title'],
      'content' => $section_value['content'],
    )));

    foreach( $customize_font[$section_value['slug']] as $setting_value ) {
      if(isset($setting_value['fonts']))$section_value['fonts'] = $setting_value['fonts'];
      $wp_customize->add_setting( $setting_value['slug'],array(
        'default'           => 'none',
        'sanitize_callback' => 'wp_kses_post',
        //'transport' => 'postMessage',
      ));
      $wp_customize->add_control( $setting_value['slug'],array(
        'label'      => $setting_value['label'],
        'section'    => 'simple_days_font_setting',
        'type' => 'select',
        'choices' => ${$section_value['fonts']},
      ));
    }
  }

