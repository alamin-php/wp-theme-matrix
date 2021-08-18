<?php
add_action( 'cmb2_init', 'cmb2_add_metabox' );
function cmb2_add_metabox() {

	$prefix = '_cmb_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . '',
		'title'        => __( 'Metabox Title', 'cmb2' ),
		'object_types' => array( 'page', 'post' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );

	$cmb->add_field( array(
		'name' => __( 'My Little Box', 'cmb2' ),
		'id' => $prefix . 'my_little_box',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'A Big Old Box', 'cmb2' ),
		'id' => $prefix . 'a_big_old_box',
		'type' => 'textarea',
	) );

	$cmb->add_field( array(
		'name' => __( 'Do You Love the Radio?', 'cmb2' ),
		'id' => $prefix . 'do_you_love_the_radio_',
		'type' => 'radio',
		'options' => array(
			'' => __( '', 'cmb2' ),
		),
	) );

	$my_group_field = $cmb->add_field( array(
		'name' => __( 'My Group Field', 'cmb2' ),
		'id' => $prefix . 'my_group_field',
		'type' => 'group',
	) );

		$cmb->add_group_field( $my_group_field, array(
			'name' => __( 'My Group Sub-field', 'cmb2' ),
			'id' => $prefix . 'my_group_sub_field',
			'type' => 'textarea_small',
		) );

		$cmb->add_group_field( $my_group_field, array(
			'name' => __( 'My Second Sub-field', 'cmb2' ),
			'id' => $prefix . 'my_second_sub_field',
			'type' => 'file',
		) );

}