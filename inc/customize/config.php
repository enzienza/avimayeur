<?php
/**
 * Name file:   confif
 *
 * Description: file that customizes the theme
 *
 * @package WordPress
 * @subpackage avimayeur
 * @version 1.0
 */

/**
 * *** INDEX ***
 *
 * 1 - Theme setup
 * 2 - custom css nav menu
 * 3 - Include Styles and script
 * 4 - Separator Title
 * 5 - Hiden Version WP
 */

/**
 * 1 - Theme setup
 *     Function for perform basic setup, registration and init actions for theme
 */

// fonction qui vérifie si le 'avimayeur_supports' exixte déjà avant de l'initialiser
if(!function_exists('avimayeur_supports')){
    function avimayeur_supports(){
        // active le titre => important pour le réferencement
        add_theme_support( "title-tag" );

        // Enable automatic feed links
        add_theme_support( 'automatic-feed-links' );

        // Enable featured image
        add_theme_support('post-thumbnails');

        // dimention image
        add_image_size('post-thumbnail', 350, 215, true);

        // Custom menu areas
        register_nav_menus( array(
            'header' => esc_html__( 'Header', 'En tête du menu' ),
            //'footer' => esc_html__( 'Footer', 'Pied de page' )
        ) );
    }
}
add_action('after_setup_theme','avimayeur_supports' );




/**
 * 2 - Custom css nav menu
 *     nav_menu_css_class: Filters the CSS classes applied to a menu item’s list item element.
 *     nav_menu_link_attributes: Filters the HTML attributes applied to a menu item’s anchor element.
 */
add_filter(
    "nav_menu_css_class",
    function($classes){
        $classes[] = 'nav-item';
        return $classes;
    }
);

add_filter(
    "nav_menu_link_attributes",
    function($attrs){
        $attrs['class'] = 'nav-link';
        return $attrs;
    }
);


//function avimayeur_menu_class($classes){
//    $classes[] = 'nav-item';
//    return $classes;
//}
//
//add_filter( "nav_menu_css_class", 'avimayeur_menu_class' );
//
//function avimayeur_menu_class_link($attrs){
//    $attrs['class'] = 'nav-link';
//    return $attrs;
//}
//
//add_filter( "nav_menu_link_attributes", "avimayeur_menu_class_link" );


/**
 * 3 - Include Styles and script
 *     Function for runs the scripts and css for theme
 */
// fonction qui vérifie si 'avimayeur_register_assets' exixte déjà avant de l'initialiser
if(!function_exists('avimayeur_register_assets')){
    function avimayeur_register_assets(){

        /* SCRIPT ---------------------------------- */
        // cdn JS bootstrap 4.0 
        wp_register_script(
            'bootstrap',
            'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js',
            ['popper', 'jquery'],
            '4.0.0', true
        );
        wp_register_script(
            'popper',
            'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js',
            [],
            '1.12.9', true
        );
        wp_enqueue_script('bootstrap');

        // JS theme 
//        wp_register_script(
//            'fontawesome',
//            get_template_directory_uri().'/assets/plugins/fontawesome/js/all.js',
//            [],
//            '5.13.0', true
//        );

        // MY JS 
        wp_enqueue_script(
            'scroll-top',
            get_template_directory_uri().'/assets/js/scrollTop.js',
            [],
            '1.0',
            true
        );
        wp_enqueue_script(
            'solid-navbar',
            get_template_directory_uri().'/assets/js/solid-navbar.js',
            [],
            '1.0',
            true
        );


        // cdn jQuery
        wp_deregister_script('jquery');
        wp_register_script(
            'jquery',
            'https://code.jquery.com/jquery-3.2.1.slim.min.js',
            [], '3.2.1', true
        );

        /* STYLE ----------------------------------- */
        // cdn CSS bootstrap 4.O
        wp_register_style(
            'bootstrap',
            'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
            [], '4.0.0'
        );
        wp_enqueue_style('bootstrap');

//        wp_enqueue_style(
//            'fontawesome',
//            get_template_directory_uri().'/assets/plugins/fontawesome/css/all.css',
//            [], '5.13.0'
//        );

        // css custem
        wp_enqueue_style(
            'style',
            get_template_directory_uri().'/style.css',
            [], '1.0.0'
        );
    }
}
add_action('wp_enqueue_scripts', 'avimayeur_register_assets');


/**
 * 4 - Separator Title
 *     Filters the separator for the document title
 */
if(!function_exists('avimayeur_title_separator')){
    function avimayeur_title_separator(){
        return '|';
    }
}
add_filter( 'document_title_separator', 'avimayeur_title_separator');


/**
 * 5 - Hiden Version WP
 */
//	Securité : Cacher la verion du WordPress utilisé
function avimayeur_remove_version_strings( $src ) {
    global $wp_version;
    parse_str(parse_url($src, PHP_URL_QUERY), $query);
    if ( !empty($query['ver']) && $query['ver'] === $wp_version ) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

add_filter( 'script_loader_src', 'avimayeur_remove_version_strings' );
add_filter( 'style_loader_src', 'avimayeur_remove_version_strings' );

// Hide WP version strings from generator meta tag
function avimayeur_remove_version() {
    return '';
}

add_filter('the_generator', 'avimayeur_remove_version');


