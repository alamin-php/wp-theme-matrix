<?php 
    /*
    * Template Name: Custom Query
    */
?>
<?php get_header(  ); ?>
<body <?php body_class( ); ?>>
<?php get_template_part( "/template-parts/common/hero" ); ?>
<div class="posts text-center">
    <?php 
        $_p = get_posts( array(
            'posts_per_page'=>2,
            'post__in' => array(71,70,68),
            'orderby' => 'post__in'
            ),
        );
    ?>
    <?php foreach($_p as $post) : setup_postdata( $post ); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php wp_reset_postdata(  ); ?>
    <?php get_template_part( "template-parts/posts-pagination" ); ?>
<?php get_footer(  ); ?>