<?php
namespace CodeMirror_Blocks;

include_once 'class-settings.php';

defined('ABSPATH') || die;

/**
 * @package CodeMirror_Blocks/CodeMirror_Blocks
 *
 */
class CodeMirror_Blocks {

    /**
     * @since 1.0.0
     * @access private
     * @static @var boolean
     *
     */
    private static $instance = null;

    /**
     * @since 1.0.0
     * @access private
     * @var array
     *
     */
    private $notice = [];

    /**
     * @since 1.1.0
     * @access private
     * @var string
     *
     */
    private static $suffix;

    /**
     * @since 1.0.0
     * @access private
     * @var string
     *
     */
    private static $plugin_version;

    /**
     * @since 1.0.0
     * @access private
     * @var const CODEMIRROR_VERSION
     *
     */
    const CODEMIRROR_VERSION = '5.40.5';

    /**
     * Constructor.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        add_action( 'init', array($this, 'init') );

        // enqueue styles and scripts

        // load after admin enqueue script
        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));
        add_action('enqueue_block_editor_assets', array($this, 'enqueue_block_editor_assets'), 10);

        add_action('wp_enqueue_scripts', array($this, 'wp_enqueue_scripts'));

        // Add custom block category
        add_action('block_categories', array($this, 'block_categories'), 10, 2);

        self::$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

        new Settings();
    }

    /**
     * Create Instance of class
     *
     * @since 1.0.0
     *
     */
    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self( );
        }
        return self::$instance;
    }

    /**
     * Get Plugin Version
     *
     * @since 1.1.0
     *
     */
    public static function get_version() {
        return self::$plugin_version;
    }

    /**
     * @since 1.0.0
     */
    public function init() {
        $plugin_data = get_file_data(CODEMIRROR_BLOCKS_PLUGIN, array('Version' => 'Version'), false);
        self::$plugin_version = $plugin_data['Version'];

        if (function_exists('register_block_type')) {
            $options = Settings::get_options();
            $attributes = $options['editor'];

            register_block_type( 'codemirror-blocks/code-block', array(
                'editor_script' => 'codemirror-blocks-blocks',
                'render_callback' => array( $this, 'render_code_block'),
                // no need to set default attributes
                'attributes' => [
                    // 'mode' => [
                    //     'type' => 'string',
                    //     'default' => 'htmlmixed'
                    // ],
                    // 'mime' => [
                    //     'type' => 'string',
                    //     'default' => 'text/html'
                    // ],
                    // 'lineNumbers' => [
                    //     'type' => 'boolean',
			        //     'default' => false
                    // ],
                    // 'lineWrapping' => [
                    //     'type' => 'boolean',
			        //     'default' => false
                    // ],
                    // 'readOnly' => [
                    //     'type' => 'boolean',
			        //     'default' => false
                    // ],
                    // 'styleActiveLine' => [
                    //     'type' => 'boolean',
			        //     'default' => false
                    // ],
                    // 'disableCopy' => [
                    //     'type' => 'boolean',
			        //     'default' => false
                    // ],
                    // 'theme' => [
                    //     'type' => 'string',
                    //     'default' => 'material'
                    // ],
                    // 'language' => [
                    //     'type' => 'string',
			        //     'default' => 'HTML'
                    // ],
                    // 'file' => [
                    //     'type' => 'string',
			        //     'default' => 'index.html'
                    // ],
                ]
            ) );
        }
    }

    /**
     * Renders CodeMirror Block.
     *
     * @since 1.1.0
     *
     * @param array $attributes CodeMirror Block attributes.
     * @param string $content   CodeMirror Block Content.
     * @return html             Modified CodeMirror Block.
     */
    public function render_code_block( $attributes, $content ) {

        $editor_option = Settings::get_options();

        $attributes = wp_parse_args($attributes, $editor_option['editor'] );
        $modes = Settings::modes();

        $attributes['language'] = '';
        foreach ($modes as $key => $mode) {
            if($mode['mime'] == $attributes['mime']) {
                // $attributes['language'] = $mode['label'];

                // addred fallback if fileName is not available.
                $attributes['language'] = preg_replace('/ \([\s\S]*?\)/', '', $mode['label']);
                $attributes['modeName'] = $mode['name'];
            break;
            }
        }

        if( !empty( $content ) ) {

            $is_new_block = \strpos($content, '<pre>');

            // add extra %, to fix issue cause by sprintf, which escape single '%' symbol.
            $content = \str_ireplace('%', '%%', $content);

            if( !empty($is_new_block) ) {
                // add class and data attribute.
                $content = \str_ireplace('<pre', '<pre class="CodeMirror" data-setting="%1$s"', $content);
            } else {
                // for backward compatibility.
                $content = preg_replace('/ data-setting="[\s\S]*?"/', ' data-setting="%1$s"', $content);
            }
            $content = sprintf( $content, esc_attr( wp_json_encode($attributes, JSON_UNESCAPED_SLASHES) ) );

        } else if(!empty($attributes['content'])) {
            $content = $attributes['content'];
            unset($attributes['content']);
        }
        return $content;
    }

    /**
     * Adds a notice for updating or Instal Gutenberg.
     *
     * Prints an update notice after an activating plugin
     *
     * @since 1.0.0
     */
    public function show_upgrade_notice() {
        printf( '<div class="error"><p>%s</p></div>', $this->notice['message']);
    }

    /**
     * Enqueue block editor assets.
     *
     * @since 1.0.0
     */
    public function enqueue_block_editor_assets() {

        $plugin_version = self::get_version();

        $suffix = self::$suffix;

        wp_enqueue_script( 'codemirror', plugin_dir_url( CODEMIRROR_BLOCKS_PLUGIN ) . 'vendor/codemirror/lib/codemirror.min.js', array(), self::CODEMIRROR_VERSION, true );

        wp_enqueue_style( 'codemirror', plugin_dir_url( CODEMIRROR_BLOCKS_PLUGIN ) . 'vendor/codemirror/lib/codemirror.min.css', array(), self::CODEMIRROR_VERSION );

        $version = filemtime(plugin_dir_path( CODEMIRROR_BLOCKS_PLUGIN ). '/assets/js/autoLoadAssets' . $suffix . '.js');
        wp_enqueue_script( 'codemirror-autoload-assets', plugin_dir_url( CODEMIRROR_BLOCKS_PLUGIN ) . 'assets/js/autoLoadAssets' . $suffix . '.js', array(), $version, true );

        wp_add_inline_script(
            'codemirror-autoload-assets',
            self::inline_script('admin'),
            'before'
        );

        $build_version = filemtime(plugin_dir_path( CODEMIRROR_BLOCKS_PLUGIN ). '/assets/blocks/blocks.build.js');
        wp_enqueue_script(
            'codemirror-blocks-blocks', // Handle.
            plugins_url( '/assets/blocks/blocks.build.js',  CODEMIRROR_BLOCKS_PLUGIN ), // Block.build.js: We register the block here. Built with Webpack.
            array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components',  'wp-compose', 'underscore', 'codemirror-autoload-assets' ),  // Dependencies, defined above.
            $build_version,
            true // Enqueue the script in the footer.
        );

        // Styles. only use for editor
        wp_enqueue_style(
            'codemirror-blocks-blocks-editor', // Handle.
            plugins_url( 'assets/blocks/blocks.editor.build' . $suffix . '.css',  CODEMIRROR_BLOCKS_PLUGIN ), // Block editor CSS.
            array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
            $plugin_version
        );
    }

    /**
     * Enqueue admin styles and scripts.
     *
     * @since 1.0.0
     */
    public function admin_enqueue_scripts() {}

    /**
     * Enqueue Frontend styles and scripts.
     *
     * @since 1.0.0
     */
    public function wp_enqueue_scripts() {

        $content = get_post();

        if( empty($content) ) {
            // if content is empty just simply return. no needs to enqueue anything.
            return;
        }

        $suffix = self::$suffix;

        $regex = "#wp-block-codemirror-blocks#";
        preg_match( $regex, $content->post_content, $matches );

        if( is_home() || is_front_page() ) {
            $enable_on_home = get_option( 'wpcm_setting_misc_enableOnHome');
            if($enable_on_home == 'no')
                $matches = false;
        }
        // if( is_single() || is_page() ) {
        //     // $matches = false;
        //     // return;
        // }

        if(!empty($matches) ) {

            // $plugin_version = self::get_version();

            // it is necessary to load codemirror first.
            wp_enqueue_script( 'codemirror', plugin_dir_url( CODEMIRROR_BLOCKS_PLUGIN ) . 'vendor/codemirror/lib/codemirror.min.js', array(), self::CODEMIRROR_VERSION, true );

            wp_enqueue_style( 'codemirror', plugin_dir_url( CODEMIRROR_BLOCKS_PLUGIN ) . 'vendor/codemirror/lib/codemirror.min.css', array(), self::CODEMIRROR_VERSION );

            $version = filemtime(plugin_dir_path( CODEMIRROR_BLOCKS_PLUGIN ). '/assets/js/autoLoadAssets' . $suffix . '.js');
            wp_enqueue_script( 'codemirror-autoload-assets', plugin_dir_url( CODEMIRROR_BLOCKS_PLUGIN ) . 'assets/js/autoLoadAssets' . $suffix . '.js', array('jquery'), $version, true );

            wp_add_inline_script(
                'codemirror-autoload-assets',
                self::inline_script('frontend'),
                'before'
            );

            $init_version = filemtime(plugin_dir_path( CODEMIRROR_BLOCKS_PLUGIN ). '/assets/js/init' . $suffix . '.js');
            wp_enqueue_script( 'codemirror-init', plugin_dir_url( CODEMIRROR_BLOCKS_PLUGIN ) . 'assets/js/init' . $suffix . '.js', array('jquery', 'codemirror-autoload-assets'), $init_version, true );
        }

        // Styles. only use for editor
        $css_version = filemtime(plugin_dir_path( CODEMIRROR_BLOCKS_PLUGIN ). '/assets/blocks/blocks.style.build' . $suffix . '.css');
        wp_enqueue_style(
            'codemirror-blocks-', // Handle.
            plugins_url( 'assets/blocks/blocks.style.build' . $suffix . '.css',  CODEMIRROR_BLOCKS_PLUGIN ), // Block editor CSS.
            array(), // Dependency to include the CSS after it.
            $css_version
        );

    }

    /**
     * Add inline_script
     *
     * @since 1.1.0
     *
     * @return string Inline Script
     */
    public static function inline_script($view) {

        $options = Settings::get_options();
        $suffix = self::$suffix;

        $wpcm = [
            'plugin_url' => plugins_url("", CODEMIRROR_BLOCKS_PLUGIN),
            'assets' => [] //initializes empty array.
        ];

        if($view == 'admin') {
            $wpcm['themes'] = Settings::themes();
            $wpcm['defaults'] = $options['editor'];
            $wpcm['panelOptions'] = $options['panel'];
            $wpcm['view'] = 'admin';
        }
        if($view == 'frontend') {
            // $wpcm['options']['output'] = $options['output'];
            // $wpcm['options']['panel'] = $options['panel'];
            $wpcm['panelOptions'] = $options['panel'];

            // for lazy loading
            // $wpcm['assets'][] = [
            //     'dir' => plugins_url("", CODEMIRROR_BLOCKS_PLUGIN) . '/vendor/codemirror/lib/',
            //     // 'js'  => 'codemirror.min.js',
            //     // 'css' => 'codemirror.min.css',
            //     'async' => true
            // ];
            // $js_version = filemtime(plugin_dir_path( CODEMIRROR_BLOCKS_PLUGIN ). '/assets/js/init' . $suffix . '.js');
            // $wpcm['assets'][] = [
            //     'dir' => plugins_url("", CODEMIRROR_BLOCKS_PLUGIN) . '/assets/',
            //     'js'  => 'js/init' . $suffix . '.js?v='.$js_version,
            //     // 'css' => 'blocks/blocks.style.build' . $suffix . '.css?v='.$css_version,
            //     'differ' => true
            // ];
            $wpcm['view'] = 'public';
        }

        $inline_script = 'var wpcm = '. \wp_json_encode($wpcm, JSON_UNESCAPED_SLASHES);

        return $inline_script;
    }

    /**
     * Add custom block category
     *
     * @since 1.0.0
     *
     * @param array $categories Gutenberg Block Categories.
     * @param object $post.
     * @return array $categories Modified Categories
     */
    public function block_categories( $categories, $post ) {
        return array_merge(
            $categories,
            array(
                array(
                    'slug' => 'codemirror-blocks',
                    'title' => __( 'CodeMirror Blocks', 'codemirror-blocks' ),
                ),
            )
        );
    }
}
