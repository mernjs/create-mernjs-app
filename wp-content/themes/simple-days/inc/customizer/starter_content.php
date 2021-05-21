<?php
  defined( 'ABSPATH' ) || exit;
/**
 * Starter Content
 *
 */
function simple_days_get_starter_content() {

 
  $admin_url = esc_url(admin_url());
  $starter_content = array(
    'widgets' => array(
      'sidebar-1' => array(
        'search',
        'calendar',
      ),
      'footer-1' => array(
        'text_about',
      ),
      'footer-2' => array(
        'text_business_info',
      ),
      'footer-3' => array(
        'meta',
      ),
      /*'under_post' => array(
        'my_text' => array(
            'text',
            array(
                'text'  => esc_attr__( 'how about ad area?', 'simple-days' )
            )
        )
      ),
      'on_pagination' => array(
        'my_text' => array(
            'text',
            array(
                'text'  => esc_attr__( 'how about ad area?', 'simple-days' )
            )
        )
      ),*/

    ),
    'theme_mods' => array(
      'simple_days_posts_title_over_thumbnail' => true,
      'simple_days_page_title_over_thumbnail' => true,
    ),

    'posts' => array(
      'about' => array(
        'thumbnail' => '{{image-1}}',
      ),
      'blog' => array(
        'post_type' => 'post',
        'thumbnail'  => '{{image-2}}',
        'post_title' => esc_html_x('Blog', 'customizer' ,'simple-days'),
        'post_content' => esc_html__( 'You only live once. Might as well enjoy it.' ,'simple-days' ).'<p>'.esc_html__( 'This is an example page.' ,'simple-days' ).'</p><p><a href="'.$admin_url.'">'.esc_html__( 'You should go to your dashboard to delete this page. Have fun!' ,'simple-days' ).'</a></p>',
      ),
      'services' => array(
        'post_type' => 'page',
        'thumbnail'  => '{{image-3}}',
        'post_title' => esc_html_x('Services', 'customizer' ,'simple-days'),
        'post_content' => esc_html__( 'I will skip work tomorrow.' ,'simple-days' ).'<p>'.esc_html__( 'This is an example page.' ,'simple-days' ).'</p><p><a href="'.$admin_url.'">'.esc_html__( 'You should go to your dashboard to delete this page. Have fun!' ,'simple-days' ).'</a></p>',
      ),
      'contact' => array(
        'thumbnail' => '{{image-1}}',
      ),

    ),
    'attachments' => array(
      'image-1' => array(
        'file' => 'assets/images/ogp.jpg',
      ),
      'image-2' => array(
        'file' => 'assets/images/404.jpg',
      ),
      'image-3' => array(
        'file' => 'assets/images/blog.jpg',
      ),
    ),

    'nav_menus' => array(
      'primary' => array(
        'name'  => esc_attr__( 'Primary Menu', 'simple-days' ),
        'items' => array(
          'page_about',
          'page_blog',
          'page_service' => array(
            'type' => 'post_type',
            'object' => 'page',
            'object_id' => '{{services}}',
          ),
          'page_contact',
        ),
      ),
    ),
    'options' => array(
      //'show_on_front' => 'page',
      //'page_on_front' => '{{home}}',
      //'page_for_posts' => '{{blog}}',
      //'blogdescription' => 'My Awesome Blog'
    ),
  );

  return apply_filters( 'simple_days_starter_content', $starter_content );

}
