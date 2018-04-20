<?php
/**
 * Contact Template extra meta.
 *
 * @since 1.0.0
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

add_action( 'add_meta_boxes', 'vibrantlife_add_metaboxes_contact' );

function vibrantlife_add_metaboxes_contact() {

	global $post;

	if ( get_post_meta( $post->ID, '_wp_page_template', true ) !== 'page-templates/contact.php' ) {
		return;
	}

	wp_enqueue_editor();
	add_filter( 'rbm_fieldhelpers_load_select2', '__return_true' );

	add_meta_box(
		'vibrantlife-contact-info',
		'Contact Information',
		'vibrantlife_mb_contact',
		'page'
	);
}

function vibrantlife_mb_contact() {

//	vibrantlife_field_helpers()->fields->do_field_media( 'map_image', array(
//		'group' => 'contact',
//		'label' => 'Map Image',
//	) );

	vibrantlife_field_helpers()->fields->do_field_text( 'map_link', array(
		'group'       => 'contact',
		'label'       => 'Map Link (Google Maps Link)',
		'input_class' => 'widefat',
	) );

	vibrantlife_field_helpers()->fields->do_field_textarea( 'address', array(
		'group'   => 'contact',
		'label'   => 'Address',
		'rows'    => 5,
	) );

	vibrantlife_field_helpers()->fields->do_field_text( 'phone', array(
		'group' => 'contact',
		'label' => 'Phone',
	) );

	if ( function_exists( 'Ninja_Forms' ) ) {

		$forms        = Ninja_Forms()->form()->get_forms();
		$form_options = array();

		/** @var NF_Database_Models_Form $form */
		foreach ( $forms as $form ) {

			$form_options[] = array(
				'text'  => $form->get_setting( 'title' ),
				'value' => $form->get_id(),
			);
		}

		vibrantlife_field_helpers()->fields->do_field_select( 'ninjaformid', array(
			'group'   => 'contact',
			'label'   => 'Contact Form',
			'options' => $form_options,
		) );

	} else {

		echo '<p>ERROR: Please install and activate Ninja Forms.';
	}

	vibrantlife_field_helpers()->fields->save->initialize_fields( 'contact' );
}