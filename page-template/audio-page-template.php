<?php 
    /*
    * Template Name: Audio
    */
?>
<?php get_header(  ); ?>
<body <?php body_class( ); ?>>
<?php get_template_part( "/template-parts/common/hero" ); ?>
<div class="posts text-center">
    <?php 
    $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
    $post_per_page = 3;

    $the_query = new WP_Query(
        array(
            'posts_per_page' => $post_per_page,
            'paged' => $paged,
            
        ),
    );

    ?>
    <?php while($the_query->have_posts(  )) : $the_query->the_post(  ); ?>
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
                    echo paginate_links( array(
                        'current' => $paged,
                        'total' => $the_query->max_num_pages,
                        'prev_next' => false

                    ) );
                ?>
            </div>
        </div>
    </div>
<?php get_footer(  ); ?>