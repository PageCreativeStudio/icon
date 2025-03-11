<?php
/**
 * pagecreative functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pagecreative
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pagecreative_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on pagecreative, use a find and replace
		* to change 'pagecreative' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'pagecreative', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'pagecreative' ),
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
			'pagecreative_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

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
add_action( 'after_setup_theme', 'pagecreative_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pagecreative_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pagecreative_content_width', 640 );
}
add_action( 'after_setup_theme', 'pagecreative_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pagecreative_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'pagecreative' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'pagecreative' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'pagecreative_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pagecreative_scripts() {
	wp_enqueue_style( 'pagecreative-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'pagecreative-style', 'rtl', 'replace' );

	wp_enqueue_script( 'pagecreative-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pagecreative_scripts' );

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



function register_dynamic_blocks() {
    $blocks_dir = get_template_directory() . '/template-parts/';
    $block_folders = glob($blocks_dir . '*', GLOB_ONLYDIR);

    // Register shared assets
    wp_register_script(
        'pagecreative-blocks-js',
        get_template_directory_uri() . '/js/common.js',
        ['wp-blocks', 'wp-element', 'wp-editor', 'wp-components'],
        filemtime(get_template_directory() . '/js/common.js')
    );

    wp_register_style(
        'pagecreative-global-css',
        get_template_directory_uri() . '/include/style.css',
        [],
        filemtime(get_template_directory() . '/include/style.css')
    );

    foreach ($block_folders as $block_folder) {
        $block_name = basename($block_folder);
        $block_path = $block_folder . '/block.php';

        // Debugging: Check if file exists
        error_log("Checking block: {$block_name} at path: {$block_path}");

        if (file_exists($block_path)) {
            $block_namespace = 'pagecreative'; 
            $full_block_name = "{$block_namespace}/{$block_name}";
            
            register_block_type($full_block_name, [
                'render_callback' => function($attributes, $content) use ($block_path) {
                    ob_start();
                    include $block_path;
                    return ob_get_clean();
                },
                'editor_script' => 'pagecreative-blocks-js',
                'style' => 'pagecreative-global-css',
                'editor_style' => 'pagecreative-global-css',
                'category' => 'pagecreative-blocks', // Optional: Create custom category
            ]);

            error_log("Successfully registered block: {$full_block_name}");
        }
    }
}
add_action('init', 'register_dynamic_blocks', 10); // Increased priority

// Enqueue global styles
function enqueue_global_styles() {
    wp_enqueue_style('pagecreative-global-css');
}
add_action('wp_enqueue_scripts', 'enqueue_global_styles');