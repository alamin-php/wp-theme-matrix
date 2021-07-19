<?php get_header(  ); ?>
<body <?php body_class( ); ?>>
<?php get_template_part( "template-parts/hero" ); ?>
<div class="posts">
<?php if(have_posts(  )) : ?>
    <?php while(have_posts(  )):the_post(  ); ?>
        <div class="post" <?php post_class(  ); ?>>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h2 class="post-title text-center"><?php the_title(  ); ?></h2>
                        <p class="text-center">
                            <strong><?php the_author(  ); ?></strong><br/>
                            <?php echo get_the_date( "jS M, Y" ); ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-md-1">

                        <?php 
                            if(has_post_thumbnail(  )){
                                the_post_thumbnail( "learg", array("class" => "img-fluid") );
                            }else{
                                ?>
                                    <p>
                                        <img class="img-fluid" src="<?php echo get_template_directory_uri(  ) ?>/assets/images/default/no_image.png"
                                        alt="Post Title">
                                    </p>
                                <?php
                            }
                        ?>
                        <?php the_content(  );?>
                            <div class="single-pagination">
                                <div class="latest-post">
                                    <?php next_post_link(  );?>
                                </div>                                
                                <div class="old-post">
                                    <?php previous_post_link(  );?>
                                </div>
                            </div>
                    </div>
<?php /*comments_template( "template-parts/post-comment" )*/ ?>
                </div>

            </div>
        </div>
    <?php endwhile; wp_reset_postdata(  );?>
<?php endif; ?>
</div>
<?php get_footer(  ); ?>