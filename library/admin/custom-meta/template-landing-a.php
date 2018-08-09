<?php
/**
 * Landing Template A Template extra meta.
 *
 * @since 1.0.2
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

add_action( 'add_meta_boxes', 'vibrantlife_add_metaboxes_landing_a' );

function vibrantlife_add_metaboxes_landing_a() {

	global $post;

	if ( get_post_meta( $post->ID, '_wp_page_template', true ) !== 'page-templates/landing-a.php' ) {
		return;
	}

	wp_enqueue_editor();
	add_filter( 'rbm_fieldhelpers_load_select2', '__return_true' );

	add_meta_box(
		'vibrantlife-landing_a-settings',
		'Landing Template Settings',
		'vibrantlife_mb_landing_a',
		'page'
	);
}

function vibrantlife_mb_landing_a() {

	if ( ! function_exists( 'Ninja_Forms' ) ) {
		echo 'ERROR: Ninja Forms must be active.';

		return;
	}

	$forms = Ninja_Forms()->form()->get_forms();

	$form_options = array();
	if ( $forms ) {
		foreach ( $forms as $form ) {
			$form_options[] = array(
				'text'  => $form->get_setting( 'title' ),
				'value' => $form->get_id(),
			);
		}
	}

	vibrantlife_field_helpers()->fields->do_field_select( 'landing_form', array(
		'group'   => 'landing_a',
		'label'   => 'Action Form',
		'options' => $form_options,
	) );

	vibrantlife_field_helpers()->fields->save->initialize_fields( 'landing_a' );
}