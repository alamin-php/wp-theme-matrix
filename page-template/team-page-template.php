<?php 
/*
 * Template Name: Team Page Template 
 */
?>
<?php get_header(  ); ?>
<body <?php body_class( ); ?>>
<?php get_template_part( "/template-parts/about-page/hero-page" ); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="post text-center">
                <?php if(have_posts(  )): ?>
                    <?php while(have_posts(  )) : the_post(  ); ?>
                        <h2><?php the_title(); ?></h2>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <?php  $attachments = new Attachments('team'); ?>
        <?php  if($attachments -> exist()) : ?>
            <?php while($attachment = $attachments->get()): ?>
                <div class="col-md-4 team-member text-center">
                    <?php echo $attachments->image('medium');  ?>
                    <h4><?php echo esc_html( $attachments-> field("name") ) ?></h4>
                    <p><?php echo esc_html( $attachments->field("bio") ) ?></p>
                    <p>
                    <?php echo esc_html( $attachments->field("position") ); ?>,
                    <strong><?php echo esc_html( $attachments->field("company") ) ?></strong>
                    </p>
                    <p><?php echo esc_html( $attachments->field("email") ) ?></p>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(  ); ?>