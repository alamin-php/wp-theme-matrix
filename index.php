<?php get_header(  ); ?>
<body <?php body_class( ); ?>>
<?php get_template_part( "/template-parts/common/hero" ); ?>
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
                        <div class="post-formats">
                        <?php 
                            $post_formats = get_post_format();
                            if($post_formats == "aside"){
                                echo '<span class="dashicons dashicons-format-aside"></span>';
                            }else if($post_formats == "link"){
                                echo '<span class="dashicons dashicons-format-links"></span>';
                            }else if($post_formats == "gallery"){
                                echo '<span class="dashicons dashicons-format-gallery"></span>';
                            }else if($post_formats == "image"){
                                echo '<span class="dashicons dashicons-format-image"></span>';
                            }else if($post_formats == "video"){
                                echo '<span class="dashicons dashicons-format-video"></span>';
                            }else if($post_formats == "quote"){
                                echo '<span class="dashicons dashicons-format-quote"></span>';
                            }else if($post_formats == "audio"){
                                echo '<span class="dashicons dashicons-format-audio"></span>';
                            }else if($post_formats == "chat"){
                                echo '<span class="dashicons dashicons-format-chat"></span>';
                            }
                        ?>
                        </div>
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
<?php get_template_part( "template-parts/posts-pagination" ); ?>
<?php get_footer(  ); ?>