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

function matrix_sindebar(){
        register_sidebar( 
            array(
            'name'          => __( 'Singel Post Sidebar', 'matrix' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Right Sidebar.', 'matrix' ),
            'before_widget' => '<section id="%1s" class="widget %2s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>',
        ) 
    );
        register_sidebar( 
            array(
            'name'          => __( 'Footer Left', 'matrix' ),
            'id'            => 'footer-left',
            'description'   => __( 'Widgets area on footer left-sidebar.', 'matrix' ),
            'before_widget' => '<div id="%1s" class="widget %2s">',
            'after_widget'  => '</div>',
            'before_title'  => '',
            'after_title'   => '',
        ) 
    );        
    register_sidebar( 
            array(
            'name'          => __( 'Footer Right', 'matrix' ),
            'id'            => 'footer-right',
            'description'   => __( 'Widgets area on footer right-sidebar.', 'matrix' ),
            'before_widget' => '<div id="%1s" class="widget %2s text-right">',
            'after_widget'  => '</div>',
            'before_title'  => '',
            'after_title'   => '',
        ) 
    );
}
add_action( "widgets_init", "matrix_sindebar" );