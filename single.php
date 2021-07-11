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
                        <?php 
                            next_post_link(  );
                            echo "</br>";
                            previous_post_link(  );
                        ?>
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
<?php get_footer(  ); ?>