<?php
if(site_url( ) == "http://themedev.com"){
    define("VERSION", time());
}else{
    define("VERSION", wp_get_theme() -> get("Version"));
}
function matrix_bootstraping(){
    load_theme_textdomain( "matrix" );
    add_theme_support( "title-tag" );
    $matrix_custom_header_details =  array(
        "header-text" => true,
        "default-custom-color" => "#222"
    );
    add_theme_support( "post-thumbnails" );
    add_theme_support( "custom-header", $matrix_custom_header_details);
    $matrix_custom_logo_default = array(
        'height' => 100,
        'width' => 100
    );
    add_theme_support( "custom-logo", $matrix_custom_logo_default );
    register_nav_menu( "topmenu", __("Top Menu", "matrix") );
    register_nav_menu( "footermenu", __("Social Link", "matrix") );
}
add_action( "after_setup_theme", "matrix_bootstraping");

function matrix_assets() {
    wp_enqueue_style( 'bootstrap', get_theme_file_uri( "assets/css/bootstrap.min.css"), null, VERSION );
    // wp_enqueue_style( 'bootstrap', "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" );
    wp_enqueue_style( 'featherlight-css', "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css" );
    wp_enqueue_style( 'matrix-style', get_stylesheet_uri() );
    wp_enqueue_script( 'fateher-light', '//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js', array('jquery'), VERSION, true );
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

function matrix_menu_item_css($classes, $item){
    $classes[] = "list-inline-item";
    return $classes;
}
add_filter( "nav_menu_css_class", "matrix_menu_item_css", 10, 2 );

function matrix_about_page_template_banner(){
    if(is_page(  )){
        $matrix_feat_image = get_the_post_thumbnail_url( null, "large" );
        ?>
            <style>
                .page-header{
                    background-image:url(<?php echo $matrix_feat_image ?>);
                }
            </style>
        <?php
    }
    if(is_front_page(  )){
        if(current_theme_supports( "custom-header" )){
            ?>
                <style>
                    .header{
                        background: url(<?php header_image(  ) ?>);
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: cover;
                        margin-bottom: 30px;
                    }
                    .header h1.heading a, .header h3.tagline{
                        color: #<?php echo get_header_textcolor(  ); ?>
                    }

                    .header-logo img{
                        border: 1px solid #<?php echo get_header_textcolor(  ); ?>
                    }
                </style>
            <?php
        }
    }
}
add_action( "wp_head", "matrix_about_page_template_banner", 11 );