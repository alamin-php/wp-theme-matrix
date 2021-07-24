<?php get_header(  ); ?>
<body <?php body_class( ); ?>>
<?php get_template_part( "/template-parts/hero" ); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="posts">
            <?php if(have_posts(  )) : ?>
                <?php while(have_posts(  )):the_post(  ); ?>
                    <div class="post" <?php post_class(  ); ?>>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="post-title"><?php the_title(  ); ?></h2>
                                    <p class="">
                                        <strong><?php the_author(  ); ?></strong><br/>
                                        <?php echo get_the_date( "jS M, Y" ); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
            
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
                                    <div class="post-pag-wrap">
                                        <div class="post-pag-container prev">
                                            <?php previous_post_link('<span>Previous</span><h3>%link</h3>', '%title', false);?>
                                        </div>                                
                                        <div class="post-pag-container next">
                                            <?php next_post_link('<span>Next</span><h3>%link</h3>', '%title', false);?>
                                        </div>
                                    </div>
                                </div>
                                <?php if(comments_open(  )) : ?>
                                <div class="col-md-10 offset-md-1">
                                        <?php comments_template(  ); ?>
                                </div>
                                <?php endif; ?>
                            </div>
            
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(  );?>
            <?php endif; ?>
            </div>


        </div>
        <div class="col-md-4">
            <?php 
                if(is_active_sidebar( "sidebar-1" )) {
                    dynamic_sidebar( "sidebar-1" );
                }
            
            ?>
        </div>
    </div>
</div>
<?php get_footer(  ); ?>