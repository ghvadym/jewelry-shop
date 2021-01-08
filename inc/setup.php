<?php


add_action(  'wp_enqueue_scripts', 'rotersand_styles' );
function rotersand_styles() {

    wp_enqueue_style( 'styles', get_stylesheet_uri() );
    wp_enqueue_style('global-style', get_template_directory_uri() . '/assets/css/main.css');
}

add_action('wp_enqueue_scripts', 'rotersand_scripts');
function rotersand_scripts() {
    wp_deregister_script( 'jquery-core' );
    wp_register_script( 'jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
    wp_enqueue_script( 'jquery' );

    wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/min/main.js');
}

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Options',
        'menu_title' => 'Options',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}

add_action( 'after_setup_theme', function() {

    register_nav_menus([
        'main_header' => 'Main header'
    ]);

    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );

} );
