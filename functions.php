<?php
function matrix_bootstraping(){
    load_theme_textdomain( "matrix" );
    add_theme_support( "title-tag" );
    add_theme_support( "post-thumbnails" );
}
add_action( "after_setup_theme", "matrix_bootstraping");

function matrix_assets() {
    wp_enqueue_style( 'bootstrap', "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" );
    wp_enqueue_style( 'matrix-style', get_stylesheet_uri() );
    // wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'matrix_assets' );