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
    array(
        'name'      => 'caption',    
        'type'      => 'text',
        'label'     => __( 'Caption', 'matrix' ),
        'default'   => 'title'
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
