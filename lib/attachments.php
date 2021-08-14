<?php
define( 'ATTACHMENTS_SETTINGS_SCREEN', false );
add_filter( 'attachments_default_instance', '__return_false' );

function matrix_attachments( $attachments )
{
  $fields = array(
    array(
      'name'      => 'title',                      
      'type'      => 'text',                         
      'label'     => __( 'Title', 'matrix' ),
    ),
  );

  $args = array(

    'label'         => 'Featured Slider',
    'post_type'     => array( 'post'),
    'filetype'      =>array('image'),
    'note'          => 'Add slider image',
    'button_text'   => __( 'Attach Files', 'matrix' ),
    'fields'        => $fields,
  );

  $attachments->register( 'slider', $args );
}

add_action( 'attachments_register', 'matrix_attachments' );

function matrix_testimonial_attachments( $attachments )
{
  $fields = array(
    array(
      'name'      => 'name',                      
      'type'      => 'text',                         
      'label'     => __( 'Name', 'matrix' ),
    ),    
    array(
      'name'      => 'position',                      
      'type'      => 'text',                         
      'label'     => __( 'Position', 'matrix' ),
    ),    
    array(
      'name'      => 'company',                      
      'type'      => 'text',                         
      'label'     => __( 'Company', 'matrix' ),
    ),    
    array(
      'name'      => 'testimonial',                      
      'type'      => 'textarea',                         
      'label'     => __( 'Testimonial', 'matrix' ),
    ),
  );

  $args = array(
    'label'         => 'Testimonial',
    'post_type'     => array( 'page'),
    'filetype'      =>array('image'),
    'note'          => 'Add Testimonial image',
    'button_text'   => __( 'Attach Files', 'matrix' ),
    'fields'        => $fields,
  );

  $attachments->register( 'testimonials', $args );
}

add_action( 'attachments_register', 'matrix_testimonial_attachments' );

function matrix_team_attachments( $attachments )
{
  $fields = array(
    array(
      'name'      => 'name',                      
      'type'      => 'text',                         
      'label'     => __( 'Name', 'matrix' ),
    ),     
    array(
      'name'      => 'email',                      
      'type'      => 'text',                         
      'label'     => __( 'Email', 'matrix' ),
    ),    
    array(
      'name'      => 'position',                      
      'type'      => 'text',                         
      'label'     => __( 'Position', 'matrix' ),
    ),    
    array(
      'name'      => 'company',                      
      'type'      => 'text',                         
      'label'     => __( 'Company', 'matrix' ),
    ),    
    array(
      'name'      => 'bio',                      
      'type'      => 'textarea',                         
      'label'     => __( 'Bio', 'matrix' ),
    ),
  );

  $args = array(
    'label'         => 'Team Member',
    'post_type'     => array( 'page'),
    'filetype'      =>array('image'),
    'note'          => 'Add Member image',
    'button_text'   => __( 'Attach Files', 'matrix' ),
    'fields'        => $fields,
  );

  $attachments->register( 'team', $args );
}

add_action( 'attachments_register', 'matrix_team_attachments' );
