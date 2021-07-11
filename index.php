<?php get_header(  ); ?>
<body <?php body_class( ); ?>>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="tagline"><?php bloginfo( "description" ); ?></h3>
                <h1 class="align-self-center display-1 text-center heading"><a href="<?php echo site_url(  ); ?>"><?php bloginfo( "name" ); ?></a></h1>
            </div>
        </div>
    </div>
</div>
<div class="posts">
<?php if(have_posts(  )) : ?>
    <?php while(have_posts(  )):the_post(  ); ?>
        <div class="post" <?php post_class(  ); ?>>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="post-title"><a href="<?php the_permalink(  ) ?>"><?php the_title(  ); ?></a></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>
                            <strong><?php the_author(  ); ?></strong><br/>
                            <?php echo get_the_date( "jS M, Y" ); ?>
                        </p>
                        <?php 
                            $tag_list = get_the_tag_list( "<ul class='list-unstyled tag-list'><li>", "</li><li>", "</li></ul>" );
                            if ( $tag_list && ! is_wp_error( $tag_list ) ) :
                                echo $tag_list;
                            endif;
                        ?>
                    </div>
                    <div class="col-md-8">

                        <?php 
                            if(has_post_thumbnail(  )):
                                the_post_thumbnail( "learg", array("class" => "img-fluid") );
                            else:
                                ?>
                                    <p>
                                        <img class="img-fluid" src="<?php echo get_template_directory_uri(  ) ?>/assets/images/default/no_image.png"
                                        alt="Post Title">
                                    </p>
                                <?php
                            endif;
                        ?>
                        <?php the_excerpt(  ); ?>
                    </div>
                </div>

            </div>
        </div>
    <?php endwhile; wp_reset_postdata(  );?>
<?php endif; ?>
<div class="container post-pagination">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <?php the_posts_pagination(array(
                "screen_reader_text" => " ",
                "prev_text" => __("Latest Posts", "matrix"),
                "next_text" => __("Next Posts", "matrix"),
            )); ?>
        </div>
    </div>
</div>
</div>
<?php get_footer(  ); ?>