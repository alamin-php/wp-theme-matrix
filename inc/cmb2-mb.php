<?php
add_action( 'cmb2_init', 'cmb2_add_image_info_metabox' );
function cmb2_add_image_info_metabox() {

	$prefix = '_matrix_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'image_information',
		'title'        => __( 'Image Information', 'matrix' ),
		'object_types' => array( 'post' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );

	$cmb->add_field( array(
		'name' => __( 'Camera Model', 'matrix' ),
		'id' => $prefix . 'camera_model',
		'type' => 'text',
		'default' => 'cannon',
	) );

	$cmb->add_field( array(
		'name' => __( 'Location', 'matrix' ),
		'id' => $prefix . 'location',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Date', 'matrix' ),
		'id' => $prefix . 'date',
		'type' => 'text_date',
	) );

	$cmb->add_field( array(
		'name' => __( 'Licenses', 'matrix' ),
		'id' => $prefix . 'licenses',
		'type' => 'checkbox',
	) );

	$cmb->add_field( array(
		'name' => __( 'Licenses Information', 'matrix' ),
		'id' => $prefix . 'licenses_information',
		'type' => 'textarea',
		'attributes' => array(
			'required'            => true, 
			'data-conditional-id' => $prefix . 'licenses',
		),
	) );

}