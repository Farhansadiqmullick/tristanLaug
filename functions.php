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

        // Add sub page.
        // $child = acf_add_options_sub_page(array(
        //     'page_title'  => __('Header'),
        //     'menu_title'  => __('Header'),
        //     'parent_slug' => $parent['menu_slug'],
        // ));

        //   // Add sub page.
        //   $child = acf_add_options_sub_page(array(
        //     'page_title'  => __('Footer'),
        //     'menu_title'  => __('Footer'),
        //     'parent_slug' => $parent['menu_slug'],
        // ));
        //  // Add sub page.
        //  $child = acf_add_options_sub_page(array(
        //     'page_title'  => __('404 Error'),
        //     'menu_title'  => __('404 Error'),
        //     'parent_slug' => $parent['menu_slug'],
        // ));
    }
}

add_filter('wp_nav_menu', 'add_classes_on_a');
function add_classes_on_a($ulclass) 
{ return preg_replace('/<a /', '<a class="scroll-trigger"', $ulclass);}



?>