
<?php 
    $matrix_layout_class = "col-md-8";
    if( !is_active_sidebar( "sidebar-1" )){
        $matrix_layout_class ="col-md-12";
        $matrix_text_center ="text-center";
    }
?>
<?php get_header(  ); ?>
<body <?php body_class( ); ?>>
<?php get_template_part( "/template-parts/common/hero" ); ?>
<div class="container">
    <div class="row">
    <div class="<?php echo $matrix_layout_class; ?>">
            <div class="posts">
                <!-- Main posts details -->
            <?php if(have_posts(  )) : ?>
                <?php while(have_posts(  )):the_post(  ); ?>
                    <div class="post" <?php post_class(  ); ?>>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 <?php echo $matrix_text_center; ?>">
                                    <h2 class="post-title"><?php the_title(  ); ?></h2>
                                    <p class="">
                                        <strong><?php the_author(  ); ?></strong><br/>
                                        <?php echo get_the_date( "jS M, Y" ); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="slider">
                                        <?php 
                                        if(class_exists('Attachments')){
                                            $attachments = new Attachments('slider');
                                            if($attachments->exist()){
                                                while($attachment = $attachments->get()){?>
                                                <div>
                                                    <?php echo $attachments->image('large'); ?>
                                                </div>
                                                <?php

                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    if( !class_exists('Attachments')){
                                        if(has_post_thumbnail(  )){
                                            $thumbnil_url = get_the_post_thumbnail_url( "null", "large" );
                                            echo '<a href="'.$thumbnil_url.'" data-featherlight="image">';
                                            the_post_thumbnail( "learg", array("class" => "img-fluid") );
                                            echo '</a>';
                                        }else{
                                            ?>
                                                <p>
                                                    <img class="img-fluid" src="<?php echo get_template_directory_uri(  ) ?>/assets/images/default/no_image.png"
                                                    alt="Post Title">
                                                </p>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <?php the_content(  );?>
                                    <!-- Post format ways image info -->
                                    <?php if(get_post_format( ) == "image") : ?>
                                        <?php 
                                            $matrix_camera_model = get_field("camera");
                                            $matrix_location = get_field("location");
                                            $matrix_date = get_field("date");
                                            $matrix_licenses = get_field("licenses");
                                            $matrix_licenses_details = get_field("licenses_details");
                                            $matrix_image = get_field("image");
                                        ?>
                                        <div class="row">
                                        <div class="col-md-12 metainfo">
                                            <strong>Camera: <?php echo $matrix_camera_model; ?></strong><br>
                                            <strong>Location: <?php echo $matrix_location; ?></strong><br>
                                            <strong>Date: <?php echo $matrix_date; ?></strong><br>
                                            <?php if($matrix_licenses) : ?>
                                                <strong> <?php echo apply_filters( "the_content", $matrix_licenses_details ); ?></strong>
                                            <?php endif; ?>
                                            <?php if($matrix_image) :?>
                                                <div class="metaimage">
                                                    <?php 
                                                        $matrix_image_details = wp_get_attachment_image_src( $matrix_image, "matrix-square" );
                                                        echo "<img src='".esc_url( $matrix_image_details[0] )."'/>";
                                                    ?>
                                                </div>
                                            <?php endif; ?>
                                                <?php 
                                                    $file = get_field("attachment");
                                                    if($file){
                                                        $file_url = wp_get_attachment_url( $file );
                                                        $file_thumb = get_field( "thumbnail", $file );
                                                        if($file_thumb){
                                                            $file_thumb_details = wp_get_attachment_image_src($file_thumb);
                                                            echo "<a target='_blank' href='{$file_url}'><img src='".esc_url( $file_thumb_details[0] )."'/></a>";
                                                        }else{
                                                            echo "<a target='_blank' href='{$file_url}'>Download File</a>";
                                                        }
                                                    }
                                                ?>
                                        </div>
                                        </div>
                                    <?php endif; ?>
                                    <!-- Single post pagination -->
                                    <div class="post-pag-wrap">
                                        <div class="post-pag-container prev">
                                            <?php previous_post_link('<span>Previous</span><h3>%link</h3>', '%title', false);?>
                                        </div>                                
                                        <div class="post-pag-container next">
                                            <?php next_post_link('<span>Next</span><h3>%link</h3>', '%title', false);?>
                                        </div>
                                    </div>
                                    <!-- Releated posts -->
                                    <?php if(function_exists('the_field')) : ?>
                                        <div class="">
                                            <h1><?php _e("Related Posts", "matrix"); ?></h1>
                                            <?php 
                                                $matrix_related_posts = get_field("related_posts");
                                                $args = array(
                                                    "post__in" => $matrix_related_posts,
                                                    'orderby' => 'post__in'
                                                );

                                                $matrix_rp = new WP_Query($args);
                                                while($matrix_rp->have_posts(  )){
                                                    $matrix_rp->the_post(  );?>
                                                        <h4><a href="<?php the_permalink(  ) ?>"><?php the_title(  ) ?></a></h4>
                                                    <?php
                                                }
                                                wp_reset_query(  );
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- Display author meta -->
                                <?php if(get_the_author_meta( "display_name" ) && get_the_author_meta( "description" )) : ?>
                                <div class="authorsection my-5">
                                    <div class="row">
                                        <div class="col-md-2 authorimg mt-3">
                                            <?php 
                                                echo get_avatar(get_the_author_meta("id"));
                                            ?>
                                        </div>
                                        <div class="col-md-10">
                                            <h4>
                                                <?php echo get_the_author_meta("display_name"); ?>
                                            </h4>
                                            <p><?php echo get_the_author_meta("description"); ?></p>
                                            <?php if(function_exists('the_field')) : ?>
                                                <p>
                                                    Facebook
                                                    URL: <?php the_field("facebook", "user_".get_the_author_meta( "ID" )); ?><br> 
                                                    Twitter
                                                    URL: <?php the_field("twitter", "user_".get_the_author_meta( "ID" )); ?><br>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                            </div>
            
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(  );?>

            <?php endif; ?>
            </div>
        </div>
        <!-- Active main sidebar -->
        <?php if(is_active_sidebar( "sidebar-1" )) : ?>
        <div class="col-md-4">
            <?php 
                if(is_active_sidebar( "sidebar-1" )) {
                    dynamic_sidebar( "sidebar-1" );
                }
            ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(  ); ?>