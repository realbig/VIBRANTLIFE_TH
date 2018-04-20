<?php
/**
 * Resources Template extra meta.
 *
 * @since 1.0.2
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

add_action( 'add_meta_boxes', 'vibrantlife_add_metaboxes_resources' );

function vibrantlife_add_metaboxes_resources() {

	global $post;

	if ( get_post_meta( $post->ID, '_wp_page_template', true ) !== 'page-templates/resources.php' ) {
		return;
	}

	wp_enqueue_editor();
	add_filter( 'rbm_fieldhelpers_load_select2', '__return_true' );

	add_meta_box(
		'vibrantlife-resources-info',
		'Resources Information',
		'vibrantlife_mb_resources',
		'page'
	);
}

function vibrantlife_mb_resources() {

	vibrantlife_field_helpers()->fields->do_field_repeater( 'resource_list', array(
		'group'  => 'resources',
		'label'  => 'Resource List',
		'fields' => array(
			'image'       => array(
				'type' => 'media',
				'args' => array(
					'label'         => 'Image',
				),
			),
			'title'       => array(
				'type' => 'text',
				'args' => array(
					'label'         => 'Title',
				),
			),
			'description' => array(
				'type' => 'textarea',
				'args' => array(
					'label'         => 'Description',
				),
			),
			'link'       => array(
				'type' => 'text',
				'args' => array(
					'label'         => 'Link',
				),
			),
		),
	) );

	vibrantlife_field_helpers()->fields->save->initialize_fields( 'resources' );
}