<?php
namespace CodeMirror_Blocks;

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * CodeMirror Block Option Settings
 *
 * @since 1.1.0
 * @package CodeMirror_Blocks/Settings
 */
class Settings {

    /**
     * Use as option page slug
     *
     * @since 1.1.0
     * @var string
     */
	public static $option_page_slug = 'wpcm-options';

    /**
     * Use as prefix to store values in wp_options table
     *
     * @since 1.1.0
     * @var string
     */
	public static $option_prefix = 'wpcm_setting_';

    /**
     * Holds all the fields in array
     *
     * @since 1.1.0
     * @var array
     */
	public static $fields = [];

    /**
     * Constructor.
     *
     * @since 1.1.0
     */
    public function __construct() {

		self::fields();

		add_action( 'init', array(__CLASS__, 'init') );

		add_action( 'init', array( __CLASS__, 'register_fields' ) );
		add_action( 'admin_menu', array( __CLASS__, 'add_menu' ) );
		add_action( 'admin_init', array( __CLASS__, 'setup_sections' ) );
		add_action( 'admin_init', array( __CLASS__, 'setup_fields' ) );

		if(!empty($_REQUEST['page']) && $_REQUEST['page'] == self::$option_page_slug) {
			add_action( 'admin_print_scripts', array( __CLASS__, 'style' ) );
			add_action( 'admin_footer_text', array(__CLASS__, 'admin_footer_text' ) );
		}
	}

	/**
     * Initialize plugin links
     *
     * @since 1.1.0
     */
    public static function init() {
		add_action( 'plugin_action_links_' . plugin_basename( CODEMIRROR_BLOCKS_PLUGIN ), array(__CLASS__, 'plugin_action_links') );
	}

	/**
     * Add menu to admin menu
     *
     * @since 1.1.0
     */
	public static function add_menu() {
		$page_title = 'CodeMirror Blocks Settings';
		$menu_title = 'CodeMirror Blocks';
		$capability = 'manage_options';
		$slug = self::$option_page_slug;
		$callback = array(__CLASS__, 'plugin_settings_page');
		$icon = 'dashicons-editor-code';
		$position = 80;
		add_menu_page($page_title, $menu_title, $capability, $slug, $callback, $icon, $position);
		// add_options_page($page_title, $menu_title, $capability, $slug, $callback, $icon, $position);
    }

    /**
     * Render/Display setting page.
     *
     * @since 1.1.0
     */
	public static function plugin_settings_page() {
		if(!current_user_can('manage_options')) {
			wp_die(__('You do not have sufficient permissions to access this page.'));
		}
	 ?>
		<div class="wrap wpcm-options">
			<h1>CodeMirror Blocks Options</h1>
			<?php settings_errors(); ?>
			<div class="wpcm">
                <div class="wrap wpcm-setting">
                    <form method="POST" action="options.php">
                    <?php
                        settings_fields( 'wpcm-options' );
                        do_settings_sections( 'wpcm-options' );

                        submit_button();
                    ?>
                    </form>
                </div>
                <div class="wpcm-support">
                    <h2>Support CodeMirror Blocks</h2>
                    <h3>Rate</h3>
                    <?php
                    echo self::admin_footer_text('') ?>
                    <h3>Any Questions?</h3>
                        <p><a href="https://wordpress.org/support/plugin/wp-codemirror-block/" target="_blank">Ask on support forum</a> You can also ask us to add new feature!</p>
                    <h3>Donate</h3>
                        <p><a href="https://paypal.me/VikeshAgravat" target="_blank">Cup of Coffee</a> to Support Continue Development.</p>
                </div>
            </div>
		</div>
        <?php
	}

    /**
     * Render/Display section in setting page.
     *
     * @since 1.1.0
     */
	public static function setup_sections() {
		add_settings_section( 'editor', 'Editor Default Settings', array(__CLASS__, 'editor_section'), 'wpcm-options' );
		// add_settings_section( 'output', 'Output Block', array(), 'wpcm-options' );
        add_settings_section( 'panel', 'Control Panel', array(), 'wpcm-options' );
		add_settings_section( 'misc', 'Other Options', array(), 'wpcm-options' );
	}

    /**
     * Render/Display edit section in setting page.
     *
     * @since 1.1.0
     */
	public static function editor_section() {
		?>
		<h4>This is default setting for New Code Blocks. you can override theme on (Block Editor)</h4>
		<h5>Don't worry, It will not affect your existing Code Blocks.</h5>
		<?php
	}

	/**
     * Setup All fields to Render/Display in setting page.
     *
     * @since 1.1.0
     */
	public static function fields() {
		$fields = array(
			array(
				'label' => 'Language / Mode',
				'id' => 'mode',
				'type' => 'select',
                'options' => self::modes(),
				'section' => 'editor',
				'description' => 'Language Mode.',
                'placeholder' => 'Select Language Mode',
                'default' => 'htmlmixed,text/html'
			),
			array(
				'label' => 'Theme',
				'id' => 'theme',
                'type' => 'select',
                'options' => self::themes(),
				'section' => 'editor',
				'description' => 'Select Theme.',
                'placeholder' => 'Select Theme',
                'default' => 'material'
			),
			array(
				'label' => 'Show Line Number?',
				'id' => 'lineNumbers',
                'type' => 'radio',
                'options' => array(
                    'no' => 'No',
                    'yes' => 'Yes',
                ),
				'section' => 'editor',
                'description' => 'Show Line Number?',
                'default' => 'no'
			),
			array(
				'label' => 'Highlight Active Line?',
				'id' => 'styleActiveLine',
                'type' => 'radio',
                'options' => array(
                    'no' => 'No',
                    'yes' => 'Yes',
                ),
				'section' => 'editor',
                'description' => 'Highlight Active Line?',
                'default' => 'no'
			),
			array(
				'label' => 'Wrap Long Line?',
				'id' => 'lineWrapping',
                'type' => 'radio',
                'options' => array(
                    'no' => 'No',
                    'yes' => 'Yes',
                ),
				'section' => 'editor',
				'description' => 'Wrap Long Line?',
                'default' => 'no'
			),
			array(
				'label' => 'Editable on Frontend?',
				'id' => 'readOnly',
                'type' => 'radio',
                'options' => array(
                    'yes' => 'No',
                    'no' => 'Yes',
                    // 'nocursor' => 'Disable Copy on Frontend ',
                ),
				'section' => 'editor',
                'description' => 'Editable on Frontend?',
                'default' => 'yes'
            ),
			// array(
			// 	'label' => 'Enable Execution Button?',
			// 	'id' => 'button',
            //     'type' => 'radio',
            //     'options' => array(
            //         'no' => 'No',
            //         'yes' => 'Yes',
            //     ),
			// 	'section' => 'output',
            //     'description' => 'It will display Execute Button after Code Block on Front End (Only for HTML, CSS and JS mode type) if "Editable on front end" is enabled, for that block.',
            //     'default' => 'no'
			// ),
            // array(
			// 	'label' => 'Button Text',
			// 	'id' => 'button_text',
            //     'type' => 'input',
            //     'class' => 'regular-text',
			// 	'section' => 'output',
            //     'description' => 'Text on Execute Button.',
            //     'placeholder' => 'Execute, Run',
            //     'default' => 'Execute'
            // ),
            array(
				'label' => 'Enable Code Block on Home Page?',
				'id' => 'enableOnHome',
                'type' => 'radio',
                'options' => array(
                    'no' => 'No',
                    'yes' => 'Yes',
                ),
				'section' => 'misc',
                'description' => 'Code Block will also load on Home page.',
                'default' => 'no'
			),
			array(
				'label' => 'Enable Control Panel?',
				'id' => 'showPanel',
                'type' => 'radio',
                'options' => array(
                    'no' => 'No',
                    'yes' => 'Yes',
                ),
				'section' => 'panel',
                'description' => 'It will display Control Panel on top of the Code Block on front end.',
                'default' => 'yes'
			),
			array(
				'label' => 'Language Label',
				'id' => 'languageLabel',
                'type' => 'select',
                'placeholder' => 'Select Language label',
                'options' => array(
                    [ 'value' => 'no' , 'label' => 'No Label'],
                    [ 'value' => 'language' , 'label' => 'Language Name'],
                    [ 'value' => 'file' , 'label' => 'File Name'],
                ),

				'section' => 'panel',
                'description' => 'It will display Language label on Control Panel.',
                'default' => 'language'
			),
			array(
				'label' => 'Enable Execute Button?',
				'id' => 'runButton',
                'type' => 'radio',
                'options' => array(
                    'no' => 'No',
                    'yes' => 'Yes',
                ),
				'section' => 'panel',
                'description' => 'It will display Execute Button on Control panel. It will only display on HTML, CSS or JS type blocks.',
                'default' => 'yes'
            ),
            array(
				'label' => 'Enable Full Screen Button?',
				'id' => 'fullScreenButton',
                'type' => 'radio',
                'options' => array(
                    'no' => 'No',
                    'yes' => 'Yes',
                ),
				'section' => 'panel',
                'description' => 'It will display Full Screen Button on Control panel.',
                'default' => 'yes'
            ),
            array(
				'label' => 'Enable Copy Button?',
				'id' => 'copyButton',
                'type' => 'radio',
                'options' => array(
                    'no' => 'No',
                    'yes' => 'Yes',
                ),
				'section' => 'panel',
                'description' => 'It will display Copy Button on Control panel. It will not display if disable copy on frontend is enable!',
                'default' => 'yes'
			),
		);
		foreach( $fields as &$field ){
			$field['id'] = self::$option_prefix . $field['section']. '_'. $field['id'];
		}
		self::$fields = $fields;
	}

    /**
     * Register field to Render/Display in setting page.
     *
     * @since 1.1.0
     */
	public static function register_fields() {
		$fields = self::$fields;
		foreach( $fields as $field ){
			$id = $field['id'];
			register_setting( 'wpcm-options', $id, $field );
		}
	}

    /**
     * Render/Display setting page.
     *
     * @since 1.1.0
     */
	public static function setup_fields() {
		$fields = self::$fields;
		foreach( $fields as $field ){

			$id = $field['id'];
			add_settings_field(
				$id,
				$field['label'],
				array( __CLASS__, 'render_field' ),
				self::$option_page_slug,
				$field['section'],
				$field
			);
		}
	}

	/**
     * Get options from option table.
     *
     * @since 1.1.0
     */
	public static function get_options($filtered = true) {
		$options = [];
		$fields = self::$fields;
		foreach( $fields as $field ){
			$id = $field['id'];
			$name = str_replace(self::$option_prefix . $field['section']. '_', '', $field['id']);

			$value = get_option( $id, $field['default'] );
            if($filtered) {
                if($value == 'yes') {
                    $value = true;
                } else if($value == 'no' ) {
                    $value = false;
                }
                if($name == 'mode') {
                    $v = \explode(',', $value);
                    $options[$field['section']]['mode'] = $v[0];
                    $options[$field['section']]['mime'] = $v[1];
                    continue;
                }
            }
			$options[$field['section']][$name] = $value;
		}
		return $options;
    }

	/**
     * Render form field depends on its type.
     *
     * @since 1.1.0
     */
	public static function render_field( $field ) {
		$id = $field['id'];
		$default = !empty($field['default']) ? $field['default'] : '';
		$class = !empty($field['class']) ? $field['class'] : '';
		$value = get_option( $id );

		switch ( $field['type'] ) {
            case 'select':
                if( ! empty ( $field['options'] ) && is_array( $field['options'] ) ) {
                    $options = $field['options'];
                } else {
                    $options = [
                        [
                            'key' => '',
                            'label' => 'No Options Provided.'
                        ]
                    ];
                }

                $options_markup = '';
                foreach($options as $key => $option) {
                    $label = !empty($option['label']) ? $option['label'] : ucfirst($option['value']);
                    $current_value = !empty($option['value']) ? $option['value'] : $key;
                    $data = '';
                    if(!empty($option['mime'])) {
                        $current_value .= ','.$option['mime'];
                    }
                    $selected = !empty($value) && $value == $current_value ? 'selected' : '';
                    $options_markup .= sprintf('<option value="%1$s"%4$s%3$s>%2$s</option>', $current_value, $label, $selected, $data);
                }
                printf( '<select name="%1$s" id="%1$s" placeholder="%2$s">%3$s</select>',
                    $id,
                    $field['placeholder'],
                    $options_markup
                );
                break;
            case 'textarea':
                printf( '<textarea name="%1$s" id="%1$s" placeholder="%2$s" rows="5" cols="50">%3$s</textarea>',
                    $id,
                    $field['placeholder'],
                    $value
                );
                break;
            case 'number':
                printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" min="%5$s" max="%6$s" step="%7$s" autocomplete="off" />',
                    $id,
                    $field['type'],
                    $field['placeholder'],
                    $value,
                    $field['min'],
                    $field['max'],
                    $field['step']
                );
                break;
            case 'radio':
            case 'checkbox':
                if( ! empty ( $field['options'] ) && is_array( $field['options'] ) ) {
                    $options_markup = '';
                    $iterator = 0;
                    foreach( $field['options'] as $key => $label ) {
                        $iterator++;
                        $options_markup .= sprintf(
                            '<label for="%1$s_%6$s"><input id="%1$s_%6$s" name="%1$s" type="%2$s" value="%3$s" %4$s />%5$s</label>',
                            $id,
                            $field['type'],
                            $key,
                            checked($value, $key, false),
                            $label,
                            $iterator
                        );
                    }
                    printf( '<fieldset>%s</fieldset>',
                        $options_markup
                    );
                }
                break;
			default:
				printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" class="%5$s" />',
					$id,
					$field['type'],
					$field['placeholder'],
                    $value,
                    $class
				);
		}
		if( $desc = $field['description'] ) {
			printf( '<p class="description">%s </p>', $desc );
		}
	}

	/**
     * Add custom css for current setting page only.
     *
     * @since 1.1.0
     */
	public static function style() {
	?>
	<style>
	.wpcm {
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    .wpcm-support {
        background-color: #fff;
        padding: 1em;
    }
    .wpcm-support h3 {
        margin-bottom: .5em;
        font-size: 1.3em;
    }
	.form-table {
        /* background-color: #fff; */
        border-bottom: 1px solid #ccc;
	}
	.wpcm input[type='text'],
    .wpcm select,
	.wpcm textarea {
        width: 100%;
    }
    .wpcm fieldset label {
		padding-right: 2em;
	}
    @media screen and (min-width: 782px) {
        .wpcm {
            flex-direction: row;
        }
       .wpcm-setting {
            width: 75%;
        }
        .wpcm-support {
            width: 25%;
        }
    }
    </style>
	<?php
	}

	/**
     * Add plugin action links.
     *
     * Add a link to the settings page on the plugins.php page.
     *
     * @since 1.1.0
     *
     * @param  array  $links List of existing plugin action links.
     * @return array         List of modified plugin action links.
     */
    public static function plugin_action_links( $links ) {
        $links = array_merge( array(
            '<a href="' . esc_url( admin_url( '/admin.php?page=wpcm-options' ) ) . '">' . __( 'Settings', 'codemirror-blocks' ) . '</a>'
        ), $links );
        return $links;
    }

	/**
     * Add admin footer rate-the-plugin.
     *
     * @since 1.1.0
     *
     * @param  string $text Footer html string
     * @return string 		Modified Footer html string
     */
    public static function admin_footer_text($text) {
		$text = 'If you like <strong>CodeMirror Block</strong> please leave us a <a href="https://wordpress.org/support/plugin/wp-codemirror-block/reviews?rate=5#new-post" target="_blank" class="wc-rating-link" aria-label="five star" data-rated="Thanks :)">★★★★★</a> rating. A huge thanks in advance!';
        return $text;
	}

	/**
     * Return Language/Modes in array.
     *
     * @since 1.1.0
     *
     * @return array All Modes
     */
	public static function modes() {

        $modes = [
            ["name" => "apl", "value" => "apl", "mime" => "text/apl", "label" => "APL"],

            ["name" => "pgp", "value" => "asciiarmor", "mime" => "application/pgp", "label" => "PGP (application/pgp)"],
            ["name" => "pgp", "value" => "asciiarmor", "mime" => "application/pgp-encrypted", "label" => "PGP (application/pgp-encrypted)"],
            ["name" => "pgp", "value" => "asciiarmor", "mime" => "application/pgp-keys", "label" => "PGP (application/pgp-keys)"],
            ["name" => "pgp", "value" => "asciiarmor", "mime" => "application/pgp-signature", "label" => "PGP (application/pgp-signature)"],

            ["name" => "asn", "value" => "asn.1", "mime" => "text/x-ttcn-asn", "label" => "ASN.1"],
            // ["name" => "brainfuck", "value" => "brainfuck", "mime" => "text/x-brainfuck", "label" => "Brainfuck"],
            ["name" => "c", "value" => "clike", "mime" => "text/x-csrc", "label" => "C"],
            ["name" => "cpp", "value" => "clike", "mime" => "text/x-c++src", "label" => "C++"],
            ["name" => "cobol", "value" => "cobol", "mime" => "text/x-cobol", "label" => "Cobol"],
            ["name" => "csharp", "value" => "clike", "mime" => "text/x-csharp", "label" => "C#"],
            ["name" => "clojure", "value" => "clojure", "mime" => "text/x-clojure", "label" => "Clojure"],
            ["name" => "clojure", "value" => "clojure", "mime" => "text/x-clojurescript", "label" => "ClojureScript"],
            ["name" => "gss", "value" => "css", "mime" => "text/x-gss", "label" => "Closure Stylesheets (GSS)"],
            ["name" => "cmake", "value" => "cmake", "mime" => "text/x-cmake", "label" => "CMake"],

            ["name" => "coffeescript", "value" => "coffeescript", "mime" => "text/coffeescript", "label" => "CoffeeScript"],
            ["name" => "coffeescript", "value" => "coffeescript", "mime" => "application/vnd.coffeescript", "label" => "CoffeeScript (application/vnd.coffeescript)"],
            ["name" => "coffeescript", "value" => "coffeescript", "mime" => "text/x-coffeescript", "label" => "CoffeeScript (text/x-coffeescript)"],

            ["name" => "lisp", "value" => "commonlisp", "mime" => "text/x-common-lisp", "label" => "Common Lisp"],
            ["name" => "css", "value" => "css", "mime" => "text/css", "label" => "CSS"],
            ["name" => "cql", "value" => "sql", "mime" => "text/x-cassandra", "label" => "CQL"],
            ["name" => "d", "value" => "d", "mime" => "text/x-d", "label" => "D"],

            ["name" => "dart", "value" => "dart", "mime" => "application/dart", "label" => "Dart (application/dart)"],
            ["name" => "dart", "value" => "dart", "mime" => "text/x-dart", "label" => "Dart (text/x-dart)"],

            ["name" => "diff", "value" => "diff", "mime" => "text/x-diff", "label" => "diff"],
            ["name" => "django", "value" => "django", "mime" => "text/x-django", "label" => "Django"],
            ["name" => "docker", "value" => "dockerfile", "mime" => "text/x-dockerfile", "label" => "Dockerfile"],
            ["name" => "dtd", "value" => "dtd", "mime" => "application/xml-dtd", "label" => "DTD"],
            ["name" => "dylan", "value" => "dylan", "mime" => "text/x-dylan", "label" => "Dylan"],
            ["name" => "ebnf", "value" => "ebnf", "mime" => "text/x-ebnf", "label" => "EBNF"],
            ["name" => "ecl", "value" => "ecl", "mime" => "text/x-ecl", "label" => "ECL"],
            ["name" => "clojure", "value" => "clojure", "mime" => "application/edn", "label" => "edn"],
            ["name" => "eiffel", "value" => "eiffel", "mime" => "text/x-eiffel", "label" => "Eiffel"],
            ["name" => "elm", "value" => "elm", "mime" => "text/x-elm", "label" => "Elm"],
            // ["name" => "", "value" => "htmlembedded", "mime" => "application/x-ejs", "label" => "Embedded Javascript"],
            // ["name" => "", "value" => "htmlembedded", "mime" => "application/x-erb", "label" => "Embedded Ruby"],
            ["name" => "erlang", "value" => "erlang", "mime" => "text/x-erlang", "label" => "Erlang"],
            ["name" => "esper", "value" => "sql", "mime" => "text/x-esper", "label" => "Esper"],
            ["name" => "factor", "value" => "factor", "mime" => "text/x-factor", "label" => "Factor"],
            ["name" => "fcl", "value" => "fcl", "mime" => "text/x-fcl", "label" => "FCL"],
            ["name" => "fortran", "value" => "fortran", "mime" => "text/x-fortran", "label" => "Fortran"],
            ["name" => "fsharp", "value" => "mllike", "mime" => "text/x-fsharp", "label" => "F#"],
            ["name" => "gas", "value" => "gas", "mime" => "text/x-gas", "label" => "Gas"],
            ["name" => "gherkin", "value" => "gherkin", "mime" => "text/x-feature", "label" => "Gherkin"],
            ["name" => "git", "value" => "gfm", "mime" => "text/x-gfm", "label" => "GitHub Flavored Markdown"],
            ["name" => "go", "value" => "go", "mime" => "text/x-go", "label" => "Go"],
            ["name" => "groovy", "value" => "groovy", "mime" => "text/x-groovy", "label" => "Groovy"],
            ["name" => "haml", "value" => "haml", "mime" => "text/x-haml", "label" => "HAML"],
            ["name" => "haskell", "value" => "haskell", "mime" => "text/x-haskell", "label" => "Haskell"],
            ["name" => "aspx", "value" => "htmlembedded", "mime" => "application/x-aspx", "label" => "ASP.NET"],
            ["name" => "html", "value" => "htmlmixed", "mime" => "text/html", "label" => "HTML"],
            ["name" => "http", "value" => "http", "mime" => "message/http", "label" => "HTTP"],
            ["name" => "idl", "value" => "idl", "mime" => "text/x-idl", "label" => "IDL"],

            ["name" => "java", "value" => "clike", "mime" => "text/x-java", "label" => "Java"],
            ["name" => "jsp", "value" => "htmlembedded", "mime" => "application/x-jsp", "label" => "Java Server Pages"],

            ["name" => "js", "value" => "javascript", "mime" => "text/javascript", "label" => "JavaScript"],
            ["name" => "js", "value" => "javascript", "mime" => "text/ecmascript", "label" => "JavaScript (text/ecmascript)"],
            ["name" => "js", "value" => "javascript", "mime" => "application/javascript", "label" => "JavaScript (application/javascript)"],
            ["name" => "js", "value" => "javascript", "mime" => "application/x-javascript", "label" => "JavaScript (application/x-javascript)"],
            ["name" => "js", "value" => "javascript", "mime" => "application/ecmascript", "label" => "JavaScript (application/ecmascript)"],

            ["name" => "json", "value" => "javascript", "mime" => "application/json", "label" => "JSON (application/json)"],
            ["name" => "json", "value" => "javascript", "mime" => "application/x-json", "label" => "JSON (application/x-json)"],

            ["name" => "jsonld", "value" => "javascript", "mime" => "application/ld+json", "label" => "JSON-LD"],
            ["name" => "jsx", "value" => "jsx", "mime" => "text/jsx", "label" => "JSX"],
            ["name" => "kotlin", "value" => "clike", "mime" => "text/x-kotlin", "label" => "Kotlin"],
            ["name" => "less", "value" => "css", "mime" => "text/x-less", "label" => "LESS"],
            ["name" => "livescript", "value" => "livescript", "mime" => "text/x-livescript", "label" => "LiveScript"],
            ["name" => "lua", "value" => "lua", "mime" => "text/x-lua", "label" => "Lua"],
            ["name" => "markdown", "value" => "markdown", "mime" => "text/x-markdown", "label" => "Markdown"],
            ["name" => "mariadb", "value" => "sql", "mime" => "text/x-mariadb", "label" => "MariaDB SQL"],
            ["name" => "modelica", "value" => "modelica", "mime" => "text/x-modelica", "label" => "Modelica"],
            ["name" => "mumps", "value" => "mumps", "mime" => "text/x-mumps", "label" => "MUMPS"],
            ["name" => "mssql", "value" => "sql", "mime" => "text/x-mssql", "label" => "MS SQL"],
            ["name" => "mysql", "value" => "sql", "mime" => "text/x-mysql", "label" => "MySQL"],
            ["name" => "nginx", "value" => "nginx", "mime" => "text/x-nginx-conf", "label" => "Nginx"],
            ["name" => "objectivec", "value" => "clike", "mime" => "text/x-objectivec", "label" => "Objective-C"],
            ["name" => "octave", "value" => "octave", "mime" => "text/x-octave", "label" => "Octave"],
            ["name" => "oz", "value" => "oz", "mime" => "text/x-oz", "label" => "Oz"],
            ["name" => "pascal", "value" => "pascal", "mime" => "text/x-pascal", "label" => "Pascal"],
            ["name" => "perl", "value" => "perl", "mime" => "text/x-perl", "label" => "Perl"],

            ["name" => "php", "value" => "php", "mime" => "text/x-php", "label" => "PHP"],
            ["name" => "php", "value" => "php", "mime" => "application/x-httpd-php", "label" => "PHP (application/x-httpd-php)"],
            ["name" => "php", "value" => "php", "mime" => "application/x-httpd-php-open", "label" => "PHP (application/x-httpd-php-open)"],

            ["name" => "pig", "value" => "pig", "mime" => "text/x-pig", "label" => "Pig"],
            ["name" => "plsql", "value" => "sql", "mime" => "text/x-plsql", "label" => "PLSQL"],
            ["name" => "powershell", "value" => "powershell", "mime" => "application/x-powershell", "label" => "PowerShell"],
            ["name" => "properties", "value" => "properties", "mime" => "text/x-properties", "label" => "Properties files"],
            ["name" => "protobuf", "value" => "protobuf", "mime" => "text/x-protobuf", "label" => "ProtoBuf"],
            ["name" => "puppet", "value" => "puppet", "mime" => "text/x-puppet", "label" => "Puppet"],
            ["name" => "pug", "value" => "pug", "mime" => "text/x-pug", "label" => "Pug"],
            ["name" => "python", "value" => "python", "mime" => "text/x-python", "label" => "Python"],
            ["name" => "q", "value" => "q", "mime" => "text/x-q", "label" => "Q"],
            ["name" => "r", "value" => "r", "mime" => "text/x-rsrc", "label" => "R"],
            ["name" => "ruby", "value" => "ruby", "mime" => "text/x-ruby", "label" => "Ruby"],
            ["name" => "rust", "value" => "rust", "mime" => "text/x-rustsrc", "label" => "Rust"],
            ["name" => "sas", "value" => "sas", "mime" => "text/x-sas", "label" => "SAS"],
            ["name" => "scala", "value" => "clike", "mime" => "text/x-scala", "label" => "Scala"],
            ["name" => "scheme", "value" => "scheme", "mime" => "text/x-scheme", "label" => "Scheme"],
            ["name" => "scss", "value" => "css", "mime" => "text/x-scss", "label" => "SCSS"],

            ["name" => "shell", "value" => "shell", "mime" => "text/x-sh", "label" => "Shell (text/x-sh)"],
            ["name" => "shell", "value" => "shell", "mime" => "application/x-sh", "label" => "Shell (application/x-sh)"],

            ["name" => "slim", "value" => "slim", "mime" => "text/x-slim", "label" => "Slim (text/x-slim)"],
            ["name" => "slim", "value" => "slim", "mime" => "application/x-slim", "label" => "Slim (application/x-slim)"],

            ["name" => "smalltalk", "value" => "smalltalk", "mime" => "text/x-stsrc", "label" => "Smalltalk"],
            ["name" => "smarty", "value" => "smarty", "mime" => "text/x-smarty", "label" => "Smarty"],
            ["name" => "solr", "value" => "solr", "mime" => "text/x-solr", "label" => "Solr"],
            ["name" => "mllike", "value" => "mllike", "mime" => "text/x-sml", "label" => "SML"],
            ["name" => "soy", "value" => "soy", "mime" => "text/x-soy", "label" => "Soy"],
            ["name" => "sparql", "value" => "sparql", "mime" => "application/sparql-query", "label" => "SPARQL"],
            ["name" => "spreadsheet", "value" => "spreadsheet", "mime" => "text/x-spreadsheet", "label" => "Spreadsheet"],
            ["name" => "sql", "value" => "sql", "mime" => "text/x-sql", "label" => "SQL"],
            ["name" => "sqlite", "value" => "sql", "mime" => "text/x-sqlite", "label" => "SQLite"],
            ["name" => "squirrel", "value" => "clike", "mime" => "text/x-squirrel", "label" => "Squirrel"],
            ["name" => "stylus", "value" => "stylus", "mime" => "text/x-styl", "label" => "Stylus"],
            ["name" => "swift", "value" => "swift", "mime" => "text/x-swift", "label" => "Swift"],
            ["name" => "stex", "value" => "stex", "mime" => "text/x-stex", "label" => "sTeX"],
            ["name" => "stex", "value" => "stex", "mime" => "text/x-latex", "label" => "LaTeX"],
            ["name" => "tcl", "value" => "tcl", "mime" => "text/x-tcl", "label" => "Tcl"],
            ["name" => "text", "value" => "null", "mime" => "text/plain", "label" => "Plain Text"],
            ["name" => "textile", "value" => "textile", "mime" => "text/x-textile", "label" => "Textile"],
            ["name" => "tiddlywiki", "value" => "tiddlywiki", "mime" => "text/x-tiddlywiki", "label" => "TiddlyWiki "],
            ["name" => "tiki", "value" => "tiki", "mime" => "text/tiki", "label" => "Tiki wiki"],
            ["name" => "toml", "value" => "toml", "mime" => "text/x-toml", "label" => "TOML"],
            ["name" => "tornado", "value" => "tornado", "mime" => "text/x-tornado", "label" => "Tornado"],
            ["name" => "troff", "value" => "troff", "mime" => "text/troff", "label" => "troff"],
            ["name" => "ttcn", "value" => "ttcn", "mime" => "text/x-ttcn", "label" => "TTCN"],
            ["name" => "ttcn", "value" => "ttcn-cfg", "mime" => "text/x-ttcn-cfg", "label" => "TTCN_CFG"],
            ["name" => "turtle", "value" => "turtle", "mime" => "text/turtle", "label" => "Turtle"],
            ["name" => "twig", "value" => "twig", "mime" => "text/x-twig", "label" => "Twig"],
            ["name" => "typescript", "value" => "javascript", "mime" => "application/typescript", "label" => "TypeScript"],
            ["name" => "typescript", "value" => "jsx", "mime" => "text/typescript-jsx", "label" => "TypeScript-JSX"],
            ["name" => "webidl", "value" => "webidl", "mime" => "text/x-webidl", "label" => "Web IDL"],
            ["name" => "vb", "value" => "vb", "mime" => "text/x-vb", "label" => "VB.NET"],
            ["name" => "vb", "value" => "vbscript", "mime" => "text/vbscript", "label" => "VBScript"],
            ["name" => "velocity", "value" => "velocity", "mime" => "text/velocity", "label" => "Velocity"],
            ["name" => "verilog", "value" => "verilog", "mime" => "text/x-verilog", "label" => "Verilog"],
            ["name" => "verilog", "value" => "verilog", "mime" => "text/x-systemverilog", "label" => "SystemVerilog"],
            ["name" => "vhdl", "value" => "vhdl", "mime" => "text/x-vhdl", "label" => "VHDL"],

            ["name" => "vue", "value" => "vue", "mime" => "text/x-vue", "label" => "Vue.js Component (text/x-vue)"],
            ["name" => "vue", "value" => "vue", "mime" => "script/x-vue", "label" => "Vue.js Component (script/x-vue)"],


            ["name" => "xml", "value" => "xml", "mime" => "text/xml", "label" => "XML"],
            ["name" => "xml", "value" => "xml", "mime" => "application/xml", "label" => "XML (application/xml)"],

            ["name" => "xquery", "value" => "xquery", "mime" => "application/xquery", "label" => "XQuery"],
            // ["name" => "yacas", "value" => "yacas", "mime" => "text/x-yacas", "label" => "Yacas"],

            ["name" => "yaml", "value" => "yaml", "mime" => "text/yaml", "label" => "YAML"],
            ["name" => "yaml", "value" => "yaml", "mime" => "text/x-yaml", "label" => "YAML (text/x-yaml)"],

            // ["name" => "z80", "value" => "z80", "mime" => "text/x-z80", "label" => "Z80"],
            // ["name" => "mscgen", "value" => "mscgen", "mime" => "text/x-mscgen", "label" => "mscgen"],
            // ["name" => "mscgen", "value" => "mscgen", "mime" => "text/x-xu", "label" => "xu"],
            // ["name" => "mscgen", "value" => "mscgen", "mime" => "text/x-msgenny", "label" => "msgenny"]
        ];
        return $modes;
    }

    /**
     * Return all Themes in array.
     *
     * @since 1.1.0
     *
     * @return array All Themes
     */
    public static function themes() {

        $themes = [
            ["value" => "default", "label" => "Codemirror Default"],
            ["value" => "3024-day", "label" => "3024-day"],
            ["value" => "3024-night", "label" => "3024-night"],
            ["value" => "abcdef", "label" => "Abcdef"],
            ["value" => "ambiance", "label" => "Ambiance"],
            // ["value" => "ambiance-mobile", "label" => "Ambiance Mobile"],
            ["value" => "base16-dark", "label" => "Base16-dark"],
            ["value" => "base16-light", "label" => "Base16-light"],
            ["value" => "bespin", "label" => "Bespin"],
            ["value" => "blackboard", "label" => "Blackboard"],
            ["value" => "cobalt", "label" => "Cobalt"],
            ["value" => "colorforth", "label" => "Colorforth"],
            ["value" => "darcula", "label" => "Darcula"],
            ["value" => "dracula", "label" => "Dracula"],
            ["value" => "duotone-dark", "label" => "Duotone-dark"],
            ["value" => "duotone-light", "label" => "Duotone-light"],
            ["value" => "eclipse", "label" => "Eclipse"],
            ["value" => "elegant", "label" => "Elegant"],
            ["value" => "erlang-dark", "label" => "Erlang-dark"],
            ["value" => "gruvbox-dark", "label" => "Gruvbox-dark"],
            ["value" => "hopscotch", "label" => "Hopscotch"],
            ["value" => "icecoder", "label" => "Icecoder"],
            ["value" => "idea", "label" => "Idea"],
            ["value" => "isotope", "label" => "Isotope"],
            ["value" => "lesser-dark", "label" => "Lesser-dark"],
            ["value" => "liquibyte", "label" => "Liquibyte"],
            ["value" => "lucario", "label" => "Lucario"],
            ["value" => "material", "label" => "Material"],
            ["value" => "mbo", "label" => "Mbo"],
            ["value" => "mdn-like", "label" => "Mdn-like"],
            ["value" => "midnight", "label" => "Midnight"],
            ["value" => "monokai", "label" => "Monokai"],
            ["value" => "neat", "label" => "Neat"],
            ["value" => "neo", "label" => "Neo"],
            ["value" => "night", "label" => "Night"],
            ["value" => "oceanic-next", "label" => "Oceanic-next"],
            ["value" => "panda-syntax", "label" => "Panda-syntax"],
            ["value" => "paraiso-dark", "label" => "Paraiso-dark"],
            ["value" => "paraiso-light", "label" => "Paraiso-light"],
            ["value" => "pastel-on-dark", "label" => "Pastel-on-dark"],
            ["value" => "railscasts", "label" => "Railscasts"],
            ["value" => "react", "label" => "Reactjs.org Doc Theme"],
            ["value" => "rubyblue", "label" => "Rubyblue"],
            ["value" => "seti", "label" => "Seti"],
            ["value" => "shadowfox", "label" => "Shadowfox"],
            ["value" => "solarized", "label" => "Solarized"],
            ["value" => "the-matrix", "label" => "The-matrix"],
            ["value" => "tomorrow-night-bright", "label" => "Tomorrow-night-bright"],
            ["value" => "tomorrow-night-eighties", "label" => "Tomorrow-night-eighties"],
            ["value" => "ttcn", "label" => "Ttcn"],
            ["value" => "twilight", "label" => "Twilight"],
            ["value" => "vibrant-ink", "label" => "Vibrant-ink"],
            ["value" => "xq-dark", "label" => "Xq-dark"],
            ["value" => "xq-light", "label" => "Xq-light"],
            ["value" => "yeti", "label" => "Yeti"],
            ["value" => "zenburn", "label" => "Zenburn"]
        ];
        return $themes;
    }
}
