<?php
namespace CodeMirror_Blocks;

defined('ABSPATH') || die;

/**
 * @package CodeMirror_Blocks/TinyMCE
 *
 * @since 1.1.0
 *
 */
class TinyMCE {

    /**
     * @since 1.1.0
     * @access private
     * @var array
     *
     */
    private static $enqueue = false;

    /**
     * @since 1.1.0
     * @access private
     * @var string
     *
     */
    private static $suffix;

    /**
     * @since 1.1.0
     * @access private
     * @var string
     *
     */
    private static $plugin_path;

    /**
     * Constructor.
     *
     * @since 1.1.0
     */
    public function __construct()
    {
        global $wp_version;

        self::$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

        self::$plugin_path = plugin_dir_path( CODEMIRROR_BLOCKS_PLUGIN );

        add_action( 'admin_init',  array(__CLASS__, 'admin_init' ));
    }

    /**
     * @since 1.1.0
     */
    public static function admin_init() {
        // it can be used to initialize tinymce button
        if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
            add_filter( 'mce_buttons', array(__CLASS__, 'register_tinymce_button' ));
            add_filter( 'mce_external_plugins', array(__CLASS__, 'add_tinymce_plugin' ));
        }

        // enqueue styles and scripts
        add_action('admin_enqueue_scripts', array(__CLASS__, 'admin_enqueue_scripts'));

    }

    /**
     * @since 1.1.0
     */
    public static function register_tinymce_button( $buttons ) {
        array_push( $buttons, "codemirror-block" );
        array_push( $buttons, "codemirror-block-edit" );
        return $buttons;
    }

    /**
     * @since 1.1.0
     */
    public static function add_tinymce_plugin( $plugin_array ) {
        if(self::$enqueue) {
            $version = filemtime(self::$plugin_path. '/tinymce/js/tinymce-plugin' . self::$suffix . '.js');
            $plugin_array['wpcm_plugin'] = plugins_url( '/tinymce/js/tinymce-plugin' . self::$suffix . '.js?v='.$version,  CODEMIRROR_BLOCKS_PLUGIN );
        }
        return $plugin_array;
    }

    /**
     * Enqueue admin styles and scripts.
     *
     * @since 1.1.0
     */
    public static function admin_enqueue_scripts() {
        global $wp_version;

        $plugin_version = CodeMirror_Blocks::get_version();

        $enqueue = false;

        $screen = get_current_screen();

        if(\version_compare($wp_version, '5.0', '>=')) {
            if($screen->base == 'post') {
                // check block editor is enabled as editor?
                // if not set, enqueue classic editor assets.
                if(empty($screen->is_block_editor)) {
                    self::$enqueue = true;
                }
            }
        } else {
            self::$enqueue = true;
        }

        if(self::$enqueue) {
            $version = filemtime(self::$plugin_path. '/tinymce/css/style-editor' . self::$suffix . '.css');
            add_editor_style(plugins_url( '/tinymce/css/style-editor' . self::$suffix . '.css?v='.$version,  CODEMIRROR_BLOCKS_PLUGIN ));

            wp_enqueue_style( 'wp-jquery-ui-dialog' );

            wp_enqueue_script( 'jquery-ui-dialog' );

            $options = Settings::get_options();
            $themes = Settings::themes();
            $_themes = [];
            foreach($themes as $key => $value) {
                $_themes[$value['value']] = $value['label'];
            }
            $modes = Settings::modes();
            $_modes = [];
            foreach($modes as $key => $value) {
                $_modes[$value['mime']] = $value['value'];
            }
            $_mime = [];
            foreach($modes as $key => $value) {
                $_mime[$value['mime']] = $value['label'];
            }
            $wpcm = [
                'defaults' => $options['editor'],
                'themes' => $_themes,
                'modes' => $_modes,
                'mimes' => $_mime
            ];

            $inline_script =
            'var wpcm = '. \json_encode($wpcm, JSON_UNESCAPED_SLASHES) ;

            wp_add_inline_script(
                'jquery-ui-dialog',
                $inline_script,
                'before'
            );
        }
    }
}

new TinyMCE();
