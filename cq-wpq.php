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
    $matrix_paged = get_query_var( "paged" ) ? get_query_var("paged") : 1;
    $matrix_posts_per_page = 3;
    $matrix_post_ids = array(128,125,122);
    $_p = new WP_Query( array(
        'posts_per_page'=>$matrix_posts_per_page,
        'paged' => $matrix_paged,
        'tax_query' => array(
            'relation' => 'OR',
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => array('new')
            ),            
            array(
                'taxonomy' => 'post_tag',
                'field' => 'slug',
                'terms' => array('spacial')
            ),
        ),
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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                    echo paginate_links( 
                        array(
                            "total" => $_p ->max_num_pages,
                            'current' => $matrix_paged,
                            'prev_next' => false
                        ),
                    );
                ?>
            </div>
        </div>
    </div>
<?php get_footer(  ); ?>