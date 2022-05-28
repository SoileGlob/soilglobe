<?php
/**
 * SoilGlobe functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SoilGlobe
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
function soilglobe_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on SoilGlobe, use a find and replace
		* to change 'soilglobe' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'soilglobe', get_template_directory() . '/languages' );

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
			'Main-Menu' => esc_html__( 'Main-Menu', 'soilglobe' ),
			'Nav-Menu' => esc_html__( 'Nav-Menu', 'soilglobe' ),
			'Service-Menu' => esc_html__( 'Service-Menu', 'soilglobe' ),
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
			'soilglobe_custom_background_args',
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
add_action( 'after_setup_theme', 'soilglobe_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function soilglobe_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'soilglobe_content_width', 640 );
}
add_action( 'after_setup_theme', 'soilglobe_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function soilglobe_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'soilglobe' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'soilglobe' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'soilglobe_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function soilglobe_scripts() {
	wp_enqueue_style( 'soilglobe-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'soilglobe-style', 'rtl', 'replace' );

	wp_enqueue_script( 'soilglobe-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'soilglobe_scripts' );

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
 
// Posts menu Hide code
add_action('admin_menu', 'remove_posts_menu');
function remove_posts_menu() 
{
    remove_menu_page('edit.php');
}

// Register Custom Post Type Blog
function create_blog_cpt() {

	$labels = array(
		'name' => _x( 'Blog', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Blog', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Blog', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Blog', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Blog Archives', 'textdomain' ),
		'attributes' => __( 'Blog Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Blog:', 'textdomain' ),
		'all_items' => __( 'All Blog', 'textdomain' ),
		'add_new_item' => __( 'Add New Blog', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Blog', 'textdomain' ),
		'edit_item' => __( 'Edit Blog', 'textdomain' ),
		'update_item' => __( 'Update Blog', 'textdomain' ),
		'view_item' => __( 'View Blog', 'textdomain' ),
		'view_items' => __( 'View Blog', 'textdomain' ),
		'search_items' => __( 'Search Blog', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Blog', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Blog', 'textdomain' ),
		'items_list' => __( 'Blog list', 'textdomain' ),
		'items_list_navigation' => __( 'Blog list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Blog list', 'textdomain' ),
	);
	$rewrite = array(
		'slug' => 'blog',
		'with_front' => true,
		'pages' => true,
		'feeds' => true,
	);
	$args = array(
		'label' => __( 'Blog', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-format-status',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'comments', 'trackbacks', 'page-attributes', 'post-formats'),
		'taxonomies' => array('category'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 2,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'rewrite' => $rewrite,
	);
	register_post_type( 'blog', $args );

}
add_action( 'init', 'create_blog_cpt', 0 );


// Register Custom Post Type Field Test
function create_fieldtest_cpt() {

	$labels = array(
		'name' => _x( 'Field Test', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Field Test', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Field Test', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Field Test', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Field Test Archives', 'textdomain' ),
		'attributes' => __( 'Field Test Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Field Test:', 'textdomain' ),
		'all_items' => __( 'All Field Test', 'textdomain' ),
		'add_new_item' => __( 'Add New Field Test', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Field Test', 'textdomain' ),
		'edit_item' => __( 'Edit Field Test', 'textdomain' ),
		'update_item' => __( 'Update Field Test', 'textdomain' ),
		'view_item' => __( 'View Field Test', 'textdomain' ),
		'view_items' => __( 'View Field Test', 'textdomain' ),
		'search_items' => __( 'Search Field Test', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Field Test', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Field Test', 'textdomain' ),
		'items_list' => __( 'Field Test list', 'textdomain' ),
		'items_list_navigation' => __( 'Field Test list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Field Test list', 'textdomain' ),
	);
	$rewrite = array(
		'slug' => 'field-test',
		'with_front' => true,
		'pages' => true,
		'feeds' => true,
	);
	$args = array(
		'label' => __( 'Field Test', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-site-alt3',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'comments', 'trackbacks', 'page-attributes', 'post-formats'),
		'taxonomies' => array('category'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 3,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => true,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'rewrite' => $rewrite,
	);
	register_post_type( 'fieldtest', $args );

}
add_action( 'init', 'create_fieldtest_cpt', 0 );

// Register Custom Post Type Laboratory Test
function create_laboratorytest_cpt() {

	$labels = array(
		'name' => _x( 'Laboratory Test', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Laboratory Test', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Laboratory Test', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Laboratory Test', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Laboratory Test Archives', 'textdomain' ),
		'attributes' => __( 'Laboratory Test Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Laboratory Test:', 'textdomain' ),
		'all_items' => __( 'All Laboratory Test', 'textdomain' ),
		'add_new_item' => __( 'Add New Laboratory Test', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Laboratory Test', 'textdomain' ),
		'edit_item' => __( 'Edit Laboratory Test', 'textdomain' ),
		'update_item' => __( 'Update Laboratory Test', 'textdomain' ),
		'view_item' => __( 'View Laboratory Test', 'textdomain' ),
		'view_items' => __( 'View Laboratory Test', 'textdomain' ),
		'search_items' => __( 'Search Laboratory Test', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Laboratory Test', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Laboratory Test', 'textdomain' ),
		'items_list' => __( 'Laboratory Test list', 'textdomain' ),
		'items_list_navigation' => __( 'Laboratory Test list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Laboratory Test list', 'textdomain' ),
	);
	$rewrite = array(
		'slug' => 'laboratory-test',
		'with_front' => true,
		'pages' => true,
		'feeds' => true,
	);
	$args = array(
		'label' => __( 'Laboratory Test', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-filter',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'comments', 'trackbacks', 'page-attributes', 'post-formats'),
		'taxonomies' => array('category'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 4,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => true,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'rewrite' => $rewrite,
	);
	register_post_type( 'laboratorytest', $args );

}
add_action( 'init', 'create_laboratorytest_cpt', 0 );


// Register Custom Post Type Our Projects
function create_ourprojects_cpt() {

	$labels = array(
		'name' => _x( 'Our Projects', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Our Projects', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Our Projects', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Our Projects', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Our Projects Archives', 'textdomain' ),
		'attributes' => __( 'Our Projects Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Our Projects:', 'textdomain' ),
		'all_items' => __( 'All Our Projects', 'textdomain' ),
		'add_new_item' => __( 'Add New Our Projects', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Our Projects', 'textdomain' ),
		'edit_item' => __( 'Edit Our Projects', 'textdomain' ),
		'update_item' => __( 'Update Our Projects', 'textdomain' ),
		'view_item' => __( 'View Our Projects', 'textdomain' ),
		'view_items' => __( 'View Our Projects', 'textdomain' ),
		'search_items' => __( 'Search Our Projects', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Our Projects', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Our Projects', 'textdomain' ),
		'items_list' => __( 'Our Projects list', 'textdomain' ),
		'items_list_navigation' => __( 'Our Projects list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Our Projects list', 'textdomain' ),
	);
	$rewrite = array(
		'slug' => 'our-project-in-india',
		'with_front' => true,
		'pages' => true,
		'feeds' => true,
	);
	$args = array(
		'label' => __( 'Our Projects', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-location-alt',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'comments', 'trackbacks', 'page-attributes', 'post-formats'),
		'taxonomies' => array('category'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => true,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'rewrite' => $rewrite,
	);
	register_post_type( 'ourprojects', $args );

}
add_action( 'init', 'create_ourprojects_cpt', 0 );

/* webp extension code */
function webp_upload_mimes( $existing_mimes ) {
	// add webp to the list of mime types
	$existing_mimes['webp'] = 'image/webp';

	// return the array back to the function with our added mime type
	return $existing_mimes;
}
add_filter( 'mime_types', 'webp_upload_mimes' );