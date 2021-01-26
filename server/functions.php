<?php
/**
 * rapportdigital functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rapportdigital
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'rapportdigital_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rapportdigital_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on rapportdigital, use a find and replace
		 * to change 'rapportdigital' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'rapportdigital', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'rapportdigital' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'rapportdigital_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'editor-styles' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'rapportdigital_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rapportdigital_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rapportdigital_content_width', 640 );
}
add_action( 'after_setup_theme', 'rapportdigital_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rapportdigital_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'rapportdigital' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'rapportdigital' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'rapportdigital_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rapportdigital_scripts() {
	wp_enqueue_style( 'rapportdigital-style',  get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'rapportdigital-dot-nav-style', get_template_directory_uri() . '/css/dot-nav-min.css',array(), _S_VERSION );
	wp_style_add_data( 'rapportdigital-style', 'rtl', 'replace' );

	wp_enqueue_script( 'rapportdigital-navigation', get_template_directory_uri() . '/js/navigation.js',  array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'rapportdigital-dot-nav-script',  get_template_directory_uri() . '/js/dot-nav.js', array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rapportdigital_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Add full width blocks
 */
add_theme_support('align-wide');

function google_fonts() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'google_fonts' );

/** Register blocks **/

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a speech bubble block.
        acf_register_block_type(array(
            'name'              => 'speech-bubbles',
            'align'             => 'full',
            'title'             => __('Speech bubbles and text'),
            'description'       => __('A two column block with text on the left and speech bubbles on the right.'),
            'render_template'   => 'template-parts/blocks/speech-bubbles-text.php',
            'enqueue_style' => get_template_directory_uri() . '/sass/components/blocks/speech-bubbles.css',
            'enqueue_script' => get_template_directory_uri() . '/dist/js/tilt.jquery.min.js',
            'category'          => 'common',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'speech bubbles', 'rapport digital' ),
            //'mode' => 'edit',
            'example'           => array(
                    'attributes' => array(
                        'mode' => 'preview',
                        'data' => array(
                            'main-text'   					=> "Marketing doesn’t have to be complicated",
                            'strapline'        			=> "but it does have to be worth talking about",
                            'speech-bubble-text_1'  => "Marketing",
                            'speech-bubble-text_1'	=> "Worth talking about",
                            'is_preview'    => true
                        )
                    )
                )
        ));


        // register spiral background block.
        acf_register_block_type(array(
            'name'              => 'full-width-spirals',
            'title'             => __('Full width block with spirals'),
            'description'       => __('A simple background with spirals.'),
            'render_template'   => 'template-parts/blocks/spiral-backgrounds.php',
            'enqueue_style' => get_template_directory_uri() . '/sass/components/blocks/spiral-backgrounds.css',
            //'enqueue_script' => get_template_directory_uri() . '/template-parts/blocks/testimonial/testimonial.js',
            'category'          => 'common',
            'icon'              => 'archive',
            'keywords'          => array( 'full width', 'background', 'spiral', 'rapportdigital' ),
            //'mode' => 'edit',
            'align' => 'full',
        ));

        // register spiral background block.
        acf_register_block_type(array(
            'name'              => 'link arrow',
            'title'             => __('Link arrow'),
            'description'       => __('A link with arrow'),
            'render_template'   => 'template-parts/blocks/linked-arrow.php',
            //'enqueue_script' => get_template_directory_uri() . '/template-parts/blocks/testimonial/testimonial.js',
            'category'          => 'common',
            'icon'              => 'admin-links',
            'keywords'          => array( 'link', 'arrow','rapportdigital' ),
            //'mode' => 'edit',
        ));

        // register spiral background block.
        acf_register_block_type(array(
            'name'              => 'spiral text',
            'title'             => __('Text with Spiral background'),
            'description'       => __('A simple text block with spiral text background'),
            'render_template'   => 'template-parts/blocks/spirals-text.php',
            'enqueue_style' => get_template_directory_uri() . '/sass/components/blocks/spiral-text.css',
            //'enqueue_script' => get_template_directory_uri() . '/template-parts/blocks/testimonial/testimonial.js',
            'category'          => 'common',
            'icon'              => 'editor-textcolor',
            'keywords'          => array( 'spiral', 'text', 'rapportdigital' ),
            //'mode' => 'edit',
        ));

        // register services bubbles
        acf_register_block_type(array(
            'name'              => 'services bubbles',
            'title'             => __('Services bubbles'),
            'description'       => __('List of services displayed in speech bubbles'),
            'render_template'   => 'template-parts/blocks/service-bubbles.php',
            'enqueue_style' => get_template_directory_uri() . '/sass/components/blocks/services-bubbles.css',
            //'enqueue_script' => get_template_directory_uri() . '/template-parts/blocks/testimonial/testimonial.js',
            'category'          => 'common',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'services', 'bubbles', 'rapportdigital' ),
            //'mode' => 'edit',
        ));

        // register download cta
        acf_register_block_type(array(
            'name'              => 'download cta',
            'title'             => __('Download CTA'),
            'description'       => __('A block with a download call to action'),
            'render_template'   => 'template-parts/blocks/download-cta.php',
            'enqueue_style' => get_template_directory_uri() . '/sass/components/blocks/download-cta.css',
            //'enqueue_script' => get_template_directory_uri() . '/template-parts/blocks/testimonial/testimonial.js',
            'category'          => 'common',
            'icon'              => 'download',
            'keywords'          => array( 'download', 'cta', 'rapportdigital' ),
            //'mode' => 'edit',
        ));

        // Register Small cta block
        		acf_register_block_type( array(
        			'name' 					=> 'small-cta',
        			'title' 				=> __( 'Small cta' ),
        			'description' 			=> __( 'A custom Small cta block.' ),
        			'category' 				=> 'common',
        			'icon'					=> 'admin-links',
        			'keywords'				=> array( 'small', 'cta', 'rapportdigital' ),
        			//'post_types'			=> array( 'post', 'page' ),
        			'mode'					=> 'auto',
        			'align'				=> 'full',
        			'render_template'		=> 'template-parts/blocks/small-cta.php',
        			// 'render_callback'	=> 'small_cta_block_render_callback',
        			'enqueue_style' 		=> get_template_directory_uri() . '/sass/components/blocks/small-cta.css',
        			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/small-cta/small-cta.js',
        			// 'enqueue_assets' 	=> 'small_cta_block_enqueue_assets',
        		));

        // Register team block
        		acf_register_block_type( array(
        			'name' 					=> 'team',
        			'title' 				=> __( 'team' ),
        			'description' 			=> __( 'A custom team block.' ),
        			'category' 				=> 'common',
        			'icon'					=> 'nametag',
        			'keywords'				=> array( 'team', 'rapportdigital' ),
        			'post_types'			=> array( 'post', 'page' ),
        			'mode'					=> 'auto',
        			'align'				=> 'full',
        			'render_template'		=> 'template-parts/blocks/team.php',
        			// 'render_callback'	=> 'team_block_render_callback',
        			'enqueue_style' 		=> get_template_directory_uri() . '/sass/components/blocks/team.css',
        			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/team/team.js',
        			// 'enqueue_assets' 	=> 'team_block_enqueue_assets',
        		));

        // Register featured_post block
        		acf_register_block_type( array(
        			'name' 					=> 'featured-post',
        			'title' 				=> __( 'featured_post' ),
        			'description' 			=> __( 'A block featuring a post from the blog with breif description taking from the post.' ),
        			'category' 				=> 'common',
        			'icon'					=> 'admin-post',
        			'keywords'				=> array( 'featured', 'post' ),
        			'post_types'			=> array( 'post', 'page' ),
        			'mode'					=> 'auto',
        			'align'				=> 'full',
        			'render_template'		=> 'template-parts/blocks/featured-post.php',
        			// 'render_callback'	=> 'featured_post_block_render_callback',
        			'enqueue_style' 		=> get_template_directory_uri() . '/sass/components/blocks/featured-post.css',
        			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/featured-post/featured-post.js',
        			// 'enqueue_assets' 	=> 'featured_post_block_enqueue_assets',
				));
				
		// Register banner block
		acf_register_block_type( array(
			'name' 					=> 'Page-Banner',
			'title' 				=> __( 'Page Banner' ),
			'description' 			=> __( 'A custom banner block' ),
			'category' 				=> 'common',
			'icon'					=> 'format-video',
			'keywords'				=> array( 'banner', 'post' ),
			'post_types'			=> array( 'banner', 'page' ),
			'mode'					=> 'auto',
			'align'				=> 'full',
			'render_template'		=> 'template-parts/blocks/page-banner.php',
			// 'render_callback'	=> 'featured_post_block_render_callback',
			'enqueue_style' 		=> get_template_directory_uri() . '/sass/components/blocks/page-banner.css',
			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/featured-post/featured-post.js',
			// 'enqueue_assets' 	=> 'featured_post_block_enqueue_assets',
		));

		// Register download-book block
		acf_register_block_type( array(
			'name' 					=> 'Download-Book',
			'title' 				=> __( 'Download Book' ),
			'description' 			=> __( 'A custom download book block' ),
			'category' 				=> 'common',
			'icon'					=> 'format-video',
			'keywords'				=> array( 'download', 'post' ),
			'post_types'			=> array( 'download', 'page' ),
			'mode'					=> 'auto',
			'align'				=> 'full',
			'render_template'		=> 'template-parts/blocks/download-book.php',
			// 'render_callback'	=> 'featured_post_block_render_callback',
			'enqueue_style' 		=> get_template_directory_uri() . '/sass/components/blocks/download-book.css',
			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/featured-post/featured-post.js',
			// 'enqueue_assets' 	=> 'featured_post_block_enqueue_assets',
		));

		// Register advertise block
		acf_register_block_type( array(
			'name' 					=> 'Content-Advertise',
			'title' 				=> __( 'Content Advertise' ),
			'description' 			=> __( 'A custom content advertise block' ),
			'category' 				=> 'common',
			'icon'					=> 'format-video',
			'keywords'				=> array( 'advertise', 'post' ),
			'post_types'			=> array( 'advertise', 'page' ),
			'mode'					=> 'auto',
			'align'				=> 'full',
			'render_template'		=> 'template-parts/blocks/content-advertise.php',
			// 'render_callback'	=> 'featured_post_block_render_callback',
			'enqueue_style' 		=> get_template_directory_uri() . '/sass/components/blocks/content-advertise.css',
			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/featured-post/featured-post.js',
			// 'enqueue_assets' 	=> 'featured_post_block_enqueue_assets',
		));

    }
}

/*Wider Gutenberg Blocks*/
add_action('admin_head', 'wp_blocks_fullwidth');

function wp_blocks_fullwidth() {
    echo '<style>
        .wp-block {
            max-width: 80% !important;
         }
        .wp-block[data-align=full] {
        		max-width: 100% !important;
        }
    </style>';
}


// Add custom colors to the block editor
function rapportdigital_add_custom_gutenberg_color_palette() {
	add_theme_support(
		'editor-color-palette',
		[
			[
				'name'  => esc_html__( 'Black', 'rapportdigital' ),
				'slug'  => 'black',
				'color' => '#4A4A49',
			],
			[
				'name'  => esc_html__( 'Green', 'rapportdigital' ),
				'slug'  => 'green',
				'color' => '#6FB74D',
			],
			[
				'name'  => esc_html__( 'Purple', 'rapportdigital' ),
				'slug'  => 'purple',
				'color' => '#8E4895',
			],
			[
				'name'  => esc_html__( 'Blue', 'rapportdigital' ),
				'slug'  => 'blue',
				'color' => '#0097CE',
			],
			[
				'name'  => esc_html__( 'Yellow', 'rapportdigital' ),
				'slug'  => 'yellow',
				'color' => '#FFCC03',
			],
			[
				'name'  => esc_html__( 'Orange', 'rapportdigital' ),
				'slug'  => 'orange',
				'color' => '#F59E5D',
			],
			[
				'name'  => esc_html__( 'Pink', 'rapportdigital' ),
				'slug'  => 'pink',
				'color' => '#EA5398',
			],
			[
				'name'  => esc_html__( 'White', 'rapportdigital' ),
				'slug'  => 'white',
				'color' => '#fffff',
			],

		]
	);
}
add_action( 'after_setup_theme', 'rapportdigital_add_custom_gutenberg_color_palette' );
// add_action('init', )

add_action('rest_api_init', function () {           
	$auth_controller = new Auth_Controller();
	$auth_controller->tms_register_routes();
});


function add_cors_http_header(){
    header("Access-Control-Allow-Origin: *");
}
add_action('init','add_cors_http_header');


class Auth_Controller extends WP_REST_Controller {


    public function tms_register_routes() {
        $namespace = 'tms/v1';

        register_rest_route( $namespace, '/' . 'auth/login', [
          array(
            'methods'             => 'POST',
            'callback'            => array( $this, 'tms_login' ),
            'permission_callback' => array( $this, 'tms_auth_permissions_check' )
                ),

            ]);    
	}

	/**
     * Authentication Login
     * @param username & password
     * @return WP_Response
    */
    public function tms_login($request) {
        global $wp_json_basic_auth_error;

        $wp_json_basic_auth_error = null;
        
		if (empty($request['token'])) {
			return new WP_Error( 'required_auth_info', 'Required login credential', array('status' => 404) );
		}
		$token = $request['token'];
		$user_id = wp_validate_auth_cookie($token, 'logged_in');
		$response = new WP_REST_Response($user_id);
        $response->set_status(200);

        return $response;
	}
	/**
     * Check Authentication Cookie
    */
    public function tms_auth_permissions_check() {
        return true;
    }
}