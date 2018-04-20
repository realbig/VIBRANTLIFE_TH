<?php
/**
 * Adds extra meta to page.
 *
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || die();

add_action( 'add_meta_boxes', 'vibrantlife_add_mb_page' );

/**
 * Adds meta boxes for products.
 *
 * @since 1.0.0
 * @access private
 */
function vibrantlife_add_mb_page() {

	if ( vibrantlife_field_helpers() === false ) {
		return;
	}

	wp_enqueue_editor();

	add_filter( 'rbm_fieldhelpers_load_select2', '__return_true' );

	add_meta_box(
		'vibrantlife-page-settings',
		'Page Settings',
		'vibrantlife_mb_page_settings',
		'page'
	);
}

/**
 * Outputs the meta box for page settings.
 *
 * @since 1.0.0
 * @access private
 */
function vibrantlife_mb_page_settings() {

	vibrantlife_field_helpers()->fields->do_field_textarea( 'description', array(
		'group'       => 'page',
		'label'       => 'Page Description',
		'rows'        => 6,
		'input_class' => 'widefat',
	) );

	vibrantlife_field_helpers()->fields->save->initialize_fields( 'page' );
}