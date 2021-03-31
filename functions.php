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

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

// if( function_exists('acf_add_options_page') ) {
	
// 	acf_add_options_page(array(
// 		'page_title' 	=> 'Theme General Settings',
// 		'menu_title'	=> 'Theme Settings',
// 		'menu_slug' 	=> 'theme-general-settings',
// 		'capability'	=> 'edit_posts',
// 		'redirect'		=> 'false'
//     ));
    
	
// }

add_action('acf/init', 'tristanlaug_acf_sub_init');
function tristanlaug_acf_sub_init() {

    // Check function exists.
    if( function_exists('acf_add_options_sub_page') ) {

        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('Theme General Settings'),
            'menu_title'  => __('Theme Settings'),
            'redirect'    => false,
        ));

        // Add sub page.
        $child = acf_add_options_sub_page(array(
            'page_title'  => __('Header'),
            'menu_title'  => __('Header'),
            'parent_slug' => $parent['menu_slug'],
        ));

          // Add sub page.
          $child = acf_add_options_sub_page(array(
            'page_title'  => __('Footer'),
            'menu_title'  => __('Footer'),
            'parent_slug' => $parent['menu_slug'],
        ));
    }
}

class acf_field_gravity_forms extends acf_field {
    /*
    *  __construct
    *  This function will setup the field type data
    */
    function __construct() {
        // vars
        $this->name = 'gravity_forms_field';
        $this->label = __('Gravity Forms');
        $this->category = __("Relational", 'aventus'); // Basic, Content, Choice, etc
        $this->defaults = array(
        'allow_multiple' => 0,
        'allow_null' => 0
        );
        // do not delete!
        parent::__construct();
    }
  
    /*
    *  render_field_settings()
    *  Create extra settings for your field. These are visible when editing a field
    */
    function render_field_settings( $field ) {
        
        /*
        *  acf_render_field_setting
        */
        acf_render_field_setting( $field, 
            array(
                'label' => 'Allow Null?',
                'type'  =>  'radio',
                'name'  =>  'allow_null',
                'choices' =>  array(
                1 =>  __("Yes", 'aventus'),
                0 =>  __("No", 'aventus'),
                ),
                'layout'  =>  'horizontal'
            )
        );

        acf_render_field_setting( $field, 
            array(
                'label' => 'Allow Multiple?',
                'type'  =>  'radio',
                'name'  =>  'allow_multiple',
                'choices' =>  array(
                    1 =>  __("Yes", 'aventus'),
                    0 =>  __("No", 'aventus'),
                ),
                'layout'  =>  'horizontal'
            )
        );
    }
  
    /*
    *  render_field()
    *  Create the HTML interface for your field
    *  @param $field (array) the $field being rendered
    */
      
    function render_field( $field ) {

        /*
        *  Review the data of $field.
        *  This will show what data is available
        */
        $field = array_merge($this->defaults, $field);
        $choices = array();

        //Show notice if Gravity Forms is not activated
        if (class_exists('RGFormsModel')) 
        {
            $forms = RGFormsModel::get_forms(1);
        }   
        else 
        {
            echo "<font style='color:red;font-weight:bold;'>Warning: Gravity Forms is not installed or activated. This field does not function without Gravity Forms!</font>";
        }
        
        //Prevent undefined variable notice
        if(isset($forms)){
          foreach( $forms as $form ){
            $choices[ intval($form->id) ] = ucfirst($form->title);
          }
        }
        // override field settings and render
        $field['choices'] = $choices;
        $field['type']    = 'select';
            if ( $field['allow_multiple'] ) {
                $multiple = 'multiple="multiple" data-multiple="1"';
                echo "<input type=\"hidden\" name=\"{$field['name']}\">";
            }
            else $multiple = '';
        ?>
        <select id="<?php echo str_replace(array('[',']'), array('-',''), $field['name']);?>" name="<?php echo $field['name']; if( $field['allow_multiple'] ) echo "[]"; ?>"<?php echo $multiple; ?>>
            <?php
            if ( $field['allow_null'] ) 
                echo '<option value="">- Select -</option>';
                
            foreach ($field['choices'] as $key => $value){
                $selected = '';
                if ( (is_array($field['value']) && in_array($key, $field['value'])) || $field['value'] == $key )
                    $selected = ' selected="selected"';
            ?>
                <option value="<?php echo $key; ?>"<?php echo $selected;?>><?php echo $value; ?></option>
            <?php } ?>
        </select>
        <?php
    }

    /*
    *  format_value()
    *  This filter is applied to the $value after it is loaded from the db and before it is returned to the template
    */
    function format_value( $value, $post_id, $field ) {
            
        //Return false if value is false, null or empty
        if( !$value || empty($value) ){
            return false;
        }
            
        //If there are multiple forms, construct and return an array of form objects
        if( is_array($value) && !empty($value) ) 
        {
            $form_objects = array();
            foreach($value as $k => $v)
            {
                $form = GFAPI::get_form( $v );
                //Add it if it's not an error object
                if( !is_wp_error($form) )
                {
                    $form_objects[$k] = $form;
                }
            }

            //Return false if the array is empty
            if( !empty($form_objects) )
            {
                return $form_objects;   
            }
            else
            {
                return false;
            }
        }
        else
        {
            $form = GFAPI::get_form(intval($value));
            //Return the form object if it's not an error object. Otherwise return false. 
            if( !is_wp_error($form) )
            {
                return $form;   
            }
            else
            {
                return false;
            }
        }
    }
}

// create field
new acf_field_gravity_forms();



?>