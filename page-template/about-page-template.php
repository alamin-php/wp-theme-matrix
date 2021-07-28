<?php 
/*
 * Template Name: About Page Template 
 */
?>
<?php get_header(  ); ?>
<body <?php body_class( ); ?>>
<?php get_template_part( "/template-parts/about-page/hero-page" ); ?>
<div class="posts">
<?php if(have_posts(  )) : ?>
    <?php while(have_posts(  )):the_post(  ); ?>
        <div class="post" <?php post_class(  ); ?>>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h2 class="post-title text-center"><a href="<?php the_permalink(  ) ?>"><?php the_title(  ); ?></a></h2>
                    </div>
                </div>
                        <p class="text-center">
                            <strong><?php the_author(  ); ?></strong><br/>
                            <?php echo get_the_date( "jS M, Y" ); ?>
                        </p>
                        <?php 
                            $tag_list = get_the_tag_list( "<ul class='list-unstyled tag-list'><li>", "</li><li>", "</li></ul>" );
                            if ( $tag_list && ! is_wp_error( $tag_list ) ) :
                                echo $tag_list;
                            endif;
                        ?>
                    <div class="col-md-10 offset-md-1">

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
<?php get_footer(  ); ?>