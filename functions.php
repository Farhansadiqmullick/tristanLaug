<?php

require_once('wp_bootstrap_navwalker.php');

function tristanlaug_setup(){
    load_theme_textdomain( 'tristanlaug', get_template_directory_uri( ).'/languages');
    add_theme_support( 'post-thumbnails',);
    add_image_size( 'blog', 600 , 400, true );
    add_image_size( 'logo', 70, 75, true );
    add_image_size( 'favicon', 30, 30, true );

    register_nav_menus( array(
        'menu' => esc_html(__('Primary Menu', 'tristanlaug')),
        'footer' => esc_html(__('Footer Menu', 'tristanlaug')),
    ),  );    
}
add_action( 'after_setup_theme', 'tristanlaug_setup');

function tristanlaug_scripts(){
    wp_enqueue_style('typekit-css', '//use.typekit.net/pwi7ael.css', array(), false, 'all');
    wp_enqueue_style('preconnect-css', '//fonts.gstatic.com', array(), false, 'all');
    wp_enqueue_style('google-api-css', '//fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap', array(), false, 'all');
    wp_enqueue_style('plugin-css', get_template_directory_uri().'/css/plugins.css', array(), date("ymd-Gis", filemtime( get_template_directory() . '/css/plugins.css' )), 'all');
    wp_enqueue_style('style-css', get_stylesheet_uri(), array(), date("ymd-Gis", filemtime( get_stylesheet_directory())));

    wp_enqueue_script( 'jquery-js', get_template_directory_uri().'/js/jquery.min.js', array(), date("ymd-Gis", filemtime( get_template_directory() . '/js/jquery.min.js' )), true);
    wp_enqueue_script('plugins-js', get_template_directory_uri() . '/js/plugins.js', array(), date("ymd-Gis", filemtime( get_template_directory() . '/js/plugins.js' )), true);
    wp_enqueue_script('scripts-js', get_template_directory_uri() . '/js/scripts.js', array(), date("ymd-Gis", filemtime( get_template_directory() . '/js/scripts.js' )), true);
}
add_action('wp_enqueue_scripts', 'tristanlaug_scripts');

function tristanlaug_custom_mime_types( $mimes ) {
	
	$mimes['svg'] = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';
	$mimes['doc'] = 'application/msword';
	 
	return $mimes;
}
add_filter( 'upload_mimes', 'tristanlaug_custom_mime_types' );

// if( function_exists('acf_add_options_page') ) {
// 	acf_add_options_page();
// }

/** Options Page Header Background */
function tristanlaug_dashboard_css() {
	echo '<style type="text/css">
		#acf-group_6064222376161 .hndle { flex-grow: initial; }
		#acf-group_6064222376161 .hndle img { max-width: 100px; max-height:80px; margin-right: 15px; }
		#acf-group_6064222376161 .hndle span { display: inline-flex; align-items: center; }
	</style>';
}
add_action('admin_head', 'tristanlaug_dashboard_css');


add_action('acf/init', 'tristanlaug_acf_sub_init');
function tristanlaug_acf_sub_init() {

    // Check function exists.
    if( function_exists('acf_add_options_sub_page') ) {

        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('Options'),
            'menu_title'  => __('Options'),
            'redirect'    => false,
        ));
    }
}

add_filter('wp_nav_menu', 'add_classes_on_a');
function add_classes_on_a($ulclass) 
{ return preg_replace('/<a /', '<a class="scroll-trigger"', $ulclass);}


/*** Reorder dashboard menu */
function aventus_reorder_admin_menu( $__return_true ) {
	return array(
		'index.php',                 	// Dashboard
		'separator1',                	// --Space--
        'acf-options-options',          //ACF Options
		'edit.php',   					// Posts 
        'edit.php?post_type=page',   	// Pages
        'edit.php?post_type=film',      //Film
        'edit.php?post_type=news',      //Film
		'edit.php?post_type=uber-grid',	// Uber Grid 
		'upload.php',                	// Media
		'gf_edit_forms',             	// Gravity Forms
		'themes.php',                	// Appearance
		'plugins.php',               	// Plugins
		'users.php',                 	// Users
		'tools.php',                 	// Tools
		'options-general.php',       	// Settings
	);
}
add_filter( 'custom_menu_order', 'aventus_reorder_admin_menu' );
add_filter( 'menu_order', 'aventus_reorder_admin_menu' );


/*Custom Post type start*/
function cw_post_type_films() {
    $supports = array(
    'title', // post title
    'editor', // post content
    'thumbnail', // featured images
    'custom-fields', // custom fields
    'revisions', // post revisions
    'post-formats', // post formats
    
    );
    $labels = array(
    'name' => _x('Films', 'plural'),
    'singular_name' => _x('Film', 'singular'),
    'menu_name' => _x('Films', 'admin menu'),
    'name_admin_bar' => _x('Films', 'admin bar'),
    'add_new' => _x('Add New', 'add new'),
    'add_new_item' => __('Add New Film'),
    'new_item' => __('New Film'),
    'edit_item' => __('Edit Film'),
    'view_item' => __('View Film'),
    'all_items' => __('All Films'),
    'search_items' => __('Search Film'),
    'not_found' => __('No Films found.'),
    );
    $args = array(
    'supports' => $supports,
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'film'),
    'has_archive' => true,
    'hierarchical' => false,
    'taxonomies' => array( 'category', 'post_tag' ),

    );
    register_post_type('film', $args);
    }
    add_action('init', 'cw_post_type_films');

?>