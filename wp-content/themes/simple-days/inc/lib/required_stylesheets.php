<?php
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'simple_days_required_stylesheets' ) ) :
	function simple_days_required_stylesheets(){

		
		$upload_dir = wp_upload_dir();
		$check_file = $upload_dir['basedir']. '/simple_days_cache/style.min.css';
		
		if ( file_exists ($check_file)) {
			$css_path = $check_file;
		}else{
			$css_path = SIMPLE_DAYS_THEME_DIR . 'assets/css/style.min.css';
		}

		
		if(get_theme_mod( 'simple_days_skin_style_random',false)){
			$skins_list = array('red_orange','orange','rose_peche','grape_juice','blue_yellow','blue_ocean','petrole','apple_green','yellow_mustard','brown_bread','gray_horse','black_coffee','moss_green','cinnamon');
		}else{
			$skins_list = 'none';
		}

		require_once ABSPATH . 'wp-admin/includes/file.php';
		WP_Filesystem();
		global $wp_filesystem;

		
		if(get_theme_mod( 'simple_days_inline_style_css',false)){

			wp_register_style( 'simple_days_style', false, array(), SIMPLE_DAYS_VERSION );
			wp_enqueue_style( 'simple_days_style' );
			wp_add_inline_style( 'simple_days_style', $wp_filesystem->get_contents( $css_path ) );

			wp_register_style( 'simple_days_keyframes', false, array(), SIMPLE_DAYS_VERSION );
			wp_enqueue_style( 'simple_days_keyframes' );
			wp_add_inline_style( 'simple_days_keyframes', $wp_filesystem->get_contents( SIMPLE_DAYS_THEME_DIR . 'assets/css/keyframes.min.css' ) );

		}else{
			
			if ( file_exists ($check_file)) {
				$css_url = $upload_dir['baseurl'] . '/simple_days_cache/style.min.css';
			}else{
				$css_url = SIMPLE_DAYS_THEME_URI . 'assets/css/style.min.css';
			}
			wp_enqueue_style('simple_days_style', $css_url, array(), SIMPLE_DAYS_VERSION);
			wp_enqueue_style( 'simple_days_keyframes', SIMPLE_DAYS_THEME_URI . 'assets/css/keyframes.min.css',array() );
		}
      //wp_enqueue_style('simple_days_style', SIMPLE_DAYS_THEME_URI . 'assets/css/style.min.css', array(), SIMPLE_DAYS_VERSION);

		if($skins_list != 'none'){
			$skins_list_key = array_rand($skins_list);
			wp_enqueue_style('simple_days_skin_style', SIMPLE_DAYS_THEME_URI . 'assets/skins/'.$skins_list[$skins_list_key].'.min.css', array('simple_days_style'));
		}

		
		if ( is_customize_preview() ) {
			if(get_theme_mod( 'simple_days_skin_style','none') != 'none'){
				wp_enqueue_style('simple_days_skin_style', SIMPLE_DAYS_THEME_URI . 'assets/skins/'.get_theme_mod( 'simple_days_skin_style').'.min.css', array('simple_days_style'));
			}
		}

		if (get_theme_file_path('style.css') !== SIMPLE_DAYS_THEME_DIR .'style.css'){
			
			$simple_days_plus_css = get_theme_mod( 'simple_days_plus_inline_style_css','none');
			if( $simple_days_plus_css !== 'none'){
				if( $simple_days_plus_css === 'min') $simple_days_plus_css = 'min.css';
				$simple_days_plus_css = $wp_filesystem->get_contents(get_theme_file_path('style.'.$simple_days_plus_css));
				if ($simple_days_plus_css != ''){
					add_action( 'wp_enqueue_scripts', 'simple_days_plus_delete_stylesheets', 10000000 );
					wp_register_style( 'simple_days_plus', false, array('simple_days_style'), SIMPLE_DAYS_VERSION );
					wp_enqueue_style( 'simple_days_plus' );
					wp_add_inline_style( 'simple_days_plus', $simple_days_plus_css );
				}
			}
		}

		
		wp_enqueue_style('font-awesome4', SIMPLE_DAYS_THEME_URI . 'assets/fonts/fontawesome/style.min.css', array(), null);

		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' )) {
			wp_enqueue_script( 'comment-reply' );
		}

		add_filter( 'style_loader_tag','simple_days_replace_style_type',9999999999);


	}
endif;

if ( ! function_exists( 'simple_days_plus_delete_stylesheets' ) ) :
	function simple_days_plus_delete_stylesheets() {
		wp_dequeue_style( 'simple_days_plus_style' );
		wp_deregister_style( 'simple_days_plus_style' );
	}
endif;

if ( ! function_exists( 'simple_days_replace_style_type' ) ) :
	function simple_days_replace_style_type($tag) {


		$judge = preg_match('/<link(.+?)id=["\'](font-awesome4-css|yahman_addons_social_icon-css|simple_days_block_front_styles-css|simple_days_keyframes-css)["\'](.+?)href=["\']([^"\']+?)["\'](.+?)\/?>/is', $tag, $value);

		if($judge){
//var_dump($value);
			$tag = simple_days_replace_preload($value);

		}

		return $tag;
	}
endif;

if ( ! function_exists( 'simple_days_replace_preload' ) ) :
	function simple_days_replace_preload($value) {
		$src = $value[0];
		$css_url = $value[4];
		return '<link rel="preload" href="'.$css_url.'" as="style" />'."\n".$src."\n";
	}
endif;
