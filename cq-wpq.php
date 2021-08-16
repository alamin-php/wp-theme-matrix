<?php 
    /*
    * Template Name: Custom Query WPQuery
    */
?>
<?php get_header(  ); ?>
<body <?php body_class( ); ?>>
<?php get_template_part( "/template-parts/common/hero" ); ?>
<div class="posts text-center">
    <?php 
    $matrix_posts_per_page = 2;
    $matrix_post_ids = array(18,15,12);
    $_p = new WP_Query( array(
        'posts_per_page'=>$matrix_posts_per_page,
        'post__in' => $matrix_post_ids,
        'orderby' => 'post__in'
        ),
    );
    ?>
    <?php while($_p->have_posts(  )) : $_p->the_post(  ) ; ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_query(  ); ?>
    <?php get_template_part( "template-parts/posts-pagination" ); ?>
<?php get_footer(  ); ?>