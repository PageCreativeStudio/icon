<?php
/**
 * pagecreative functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pagecreative
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pagecreative_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on pagecreative, use a find and replace
	 * to change 'pagecreative' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('pagecreative', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'pagecreative'),
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
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'pagecreative_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pagecreative_content_width()
{
	$GLOBALS['content_width'] = apply_filters('pagecreative_content_width', 640);
}
add_action('after_setup_theme', 'pagecreative_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pagecreative_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'pagecreative'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'pagecreative'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'pagecreative_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function pagecreative_scripts()
{
	wp_enqueue_style('pagecreative-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('pagecreative-style', 'rtl', 'replace');

	wp_enqueue_script('pagecreative-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'pagecreative_scripts');

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


// Custom functions start here
function my_custom_gutenberg_blocks()
{
	if (function_exists('acf_register_block_type')) {

		acf_register_block_type(array(
			'name' => 'hero_section',
			'title' => __('Hero Section', 'text-domain'),
			'description' => __('Hero title with image.', 'text-domain'),
			'render_template' => get_template_directory() . '/template-parts/blocks/hero-section.php',
			'category' => 'layout',
			'icon' => 'admin-site',
			'keywords' => array('hero', 'banner'),
		));

		acf_register_block_type(array(
			'name' => 'social_proof',
			'title' => __('Social Proof Section', 'text-domain'),
			'description' => __('Social proof logo list', 'text-domain'),
			'render_template' => get_template_directory() . '/template-parts/blocks/social-logos.php',
			'category' => 'layout',
			'icon' => 'admin-users',
			'keywords' => array('logos', 'social'),
		));

		acf_register_block_type(array(
			'name' => 'case-studies',
			'title' => __('Case studies slider', 'text-domain'),
			'description' => __('Case studies slider with all case studies', 'text-domain'),
			'render_template' => get_template_directory() . '/template-parts/blocks/case-studies.php',
			'category' => 'layout',
			'icon' => 'admin-users',
			'keywords' => array('case studies', 'slider'),
		));

		acf_register_block_type(array(
			'name' => 'testimonials',
			'title' => __('Testimonial Slider', 'text-domain'),
			'description' => __('Google reviews with testimonials', 'text-domain'),
			'render_template' => get_template_directory() . '/template-parts/blocks/testimonials.php',
			'category' => 'layout',
			'icon' => 'admin-users',
			'keywords' => array('reviews', 'testimonials'),
		));

		acf_register_block_type(array(
			'name' => 'hero-header',
			'title' => __('Hero header two column', 'text-domain'),
			'description' => __('Hero header with two columns', 'text-domain'),
			'render_template' => get_template_directory() . '/template-parts/blocks/hero-header.php',
			'category' => 'layout',
			'icon' => 'admin-users',
			'keywords' => array('two columns', 'hero'),
		));

		acf_register_block_type(array(
			'name' => 'hero-vertical',
			'title' => __('Hero vertical', 'text-domain'),
			'description' => __('Hero vertical column', 'text-domain'),
			'render_template' => get_template_directory() . '/template-parts/blocks/vertical-hero.php',
			'category' => 'layout',
			'icon' => 'admin-users',
			'keywords' => array('two columns', 'hero vertical'),
		));

		
		acf_register_block_type(array(
			'name' => 'accordion-tabs',
			'title' => __('Accordion tabs', 'text-domain'),
			'description' => __('Collapsible faqs repeater', 'text-domain'),
			'render_template' => get_template_directory() . '/template-parts/blocks/faqs.php',
			'category' => 'layout',
			'icon' => 'admin-users',
			'keywords' => array('faqs', 'accordion'),
		));

		acf_register_block_type(array(
			'name' => 'cta',
			'title' => __('Call to action', 'text-domain'),
			'description' => __('Call to action', 'text-domain'),
			'render_template' => get_template_directory() . '/template-parts/blocks/cta.php',
			'category' => 'layout',
			'icon' => 'admin-users',
			'keywords' => array('cta', 'call to action'),
		));

		acf_register_block_type(array(
			'name' => 'btn-dark',
			'title' => __('Button dark', 'text-domain'),
			'description' => __('Button with dark background', 'text-domain'),
			'render_template' => get_template_directory() . '/template-parts/blocks/btn-dark.php',
			'category' => 'layout',
			'icon' => 'admin-users',
			'keywords' => array('btn dark', 'button'),
		));

		acf_register_block_type(array(
			'name' => 'btn-light',
			'title' => __('Button light', 'text-domain'),
			'description' => __('Button with white backgdound', 'text-domain'),
			'render_template' => get_template_directory() . '/template-parts/blocks/btn-light.php',
			'category' => 'layout',
			'icon' => 'admin-users',
			'keywords' => array('btn light', 'button'),
		));
	}
}
add_action('acf/init', 'my_custom_gutenberg_blocks');

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug' => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect' => false
	));

	acf_add_options_sub_page(array(
		'page_title' => 'Header',
		'menu_title' => 'Header',
		'parent_slug' => 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' => 'Footer',
		'menu_title' => 'Footer',
		'parent_slug' => 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' => 'Testimonials',
		'menu_title' => 'Testimonials',
		'parent_slug' => 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' => 'Social Component',
		'menu_title' => 'Social Component',
		'parent_slug' => 'theme-general-settings',
	));

}


function custom_cs_template($single_template)
{
	global $post;
	if ($post->post_type == 'case-studies') {
		$custom_template = dirname(__FILE__) . '/template-parts/single-cs.php';
		if (file_exists($custom_template)) {
			return $custom_template;
		}
	}
	return $single_template;
}
add_filter('single_template', 'custom_cs_template');

function custom_service_template($single_template)
{
	global $post;
	if ($post->post_type == 'services') {
		$custom_template = dirname(__FILE__) . '/template-parts/single-service.php';
		if (file_exists($custom_template)) {
			return $custom_template;
		}
	}
	return $single_template;
}
add_filter('single_template', 'custom_service_template');


add_filter('template_include', 'load_custom_single_product_template', 99);

function load_custom_single_product_template($template) {
    if (is_singular('product')) {
        $custom_template = get_stylesheet_directory() . '/woocommerce/single-product.php';
        if (file_exists($custom_template)) {
            return $custom_template;
        }
    }
    return $template;
}


function get_google_reviews_count()
{
	$api_key = 'AIzaSyAVTya-j7CmUz053hQr4O7KsaGcxrKb1bo';
	$place_id = 'ChIJ34vu87ocdkgR3OaqQhyJJus';
	$url = "https://maps.googleapis.com/maps/api/place/details/json?place_id=$place_id&fields=review,user_ratings_total&key=$api_key";

	$response = wp_remote_get($url);
	if (is_wp_error($response)) {
		return 'N/A';
	}

	$body = wp_remote_retrieve_body($response);
	$data = json_decode($body, true);

	if (!empty($data['result']['user_ratings_total'])) {
		return $data['result']['user_ratings_total'];
	}

	return 'N/A';
}

// Ajax for loading more case-studies
add_action('wp_ajax_load_more_posts', 'load_more_case_studies');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_case_studies');
function load_more_case_studies()
{
	$offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;

	$args = array(
		'post_type' => 'case-studies',
		'posts_per_page' => 4,
		'offset' => $offset,
	);

	$query = new WP_Query($args);

	if ($query->have_posts()):
		while ($query->have_posts()):
			$query->the_post(); ?>
			<div class="col-12 col-lg-6 px-2 mb-5 mb-lg-5">
				<a class="postarea__link" href="<?php the_permalink(); ?>">
					<div class="postarea__image-container">
						<img class="w-100" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
							alt="<?php the_title(); ?>">
					</div>
					<h2 class="text-dark font-30 font-mb-25 mt-2 pt-4 pb-0 mb-1 max-40">
						<?php the_title(); ?>
					</h2>
					<?php if (get_field("sub_title")): ?>
						<h3 class="text-dark font-20 font-mb-18 pt-3 pb-0 mb-3 px-0 mx-0 max-40">
							<?php echo get_field('sub_title'); ?>
						</h3>
					<?php endif; ?>
					<p class="font-15 font-mb-14 max-40 py-2">
						<?php echo wp_trim_words(get_the_excerpt(), 18); ?>
					</p>
					<span class="text-sec font-13 underline">Read more</span>
				</a>
			</div>
		<?php endwhile;
	endif;

	wp_reset_postdata();
	wp_die();
}


function mytheme_add_body_classes($classes)
{
	if (is_singular('case-studies')) { // Assuming your post type is 'cs'
		$classes[] = 'custom-cs-page';
	}
	return $classes;
}
add_filter('body_class', 'mytheme_add_body_classes');
