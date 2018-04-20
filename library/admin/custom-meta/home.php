<?php
/**
 * Adds extra meta to home page.
 *
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || die();

add_action( 'add_meta_boxes', 'vibrantlife_add_mb_home' );

/**
 * Adds meta boxes for products.
 *
 * @since 1.0.0
 * @access private
 */
function vibrantlife_add_mb_home() {

	if ( vibrantlife_field_helpers() === false ) {
		return;
	}

	if ( get_the_ID() !== (int) get_option( 'page_on_front' ) ) {
		return;
	}
	wp_enqueue_editor();

	add_filter( 'rbm_fieldhelpers_load_select2', '__return_true' );

	add_meta_box(
		'vibrantlife-home-settings',
		'Page Settings',
		'vibrantlife_mb_home_settings',
		'page'
	);
}

/**
 * Outputs the meta box for home page settings.
 *
 * @since 1.0.0
 * @access private
 */
function vibrantlife_mb_home_settings() {

	$pages = get_posts( array(
		'post_type'   => 'page',
		'numberposts' => - 1,
	) );

	$hero_page_options = array();

	foreach ( $pages as $page ) {

		$hero_page_options[] = array(
			'value' => "page:::{$page->ID}",
			'text'  => $page->post_title,
		);
	}

	vibrantlife_field_helpers()->fields->do_field_text( 'subhead', array(
		'group'       => 'home',
		'label'       => 'Hero Page Sub Header Text',
		'input_class' => 'widefat',
	) );

	vibrantlife_field_helpers()->fields->do_field_text( 'hero_page_link_text', array(
		'group'       => 'home',
		'label'       => 'Hero Page Link Button Text',
		'input_class' => 'regular-text',
	) );

	vibrantlife_field_helpers()->fields->do_field_select( 'hero_page_link', array(
		'group'       => 'home',
		'label'       => 'Hero Page Link',
		'input_class' => 'regular-text',
		'options'     => $hero_page_options,
		'placeholder' => '- Select a Link -',
	) );

	vibrantlife_field_helpers()->fields->do_field_repeater( 'content_blocks', array(
		'group'  => 'home',
		'label'  => 'Content Blocks',
		'fields' => array(
			'title'   => array(
				'type' => 'text',
				'args' => array(
					'label' => 'Title',
				),
			),
			'content' => array(
				'type' => 'textarea',
				'args' => array(
					'label'       => 'Content',
					'wysiwyg'     => true,
					'rows'        => 10,
					'input_class' => 'widefat',
				),
			),
			'image'   => array(
				'type' => 'media',
				'args' => array(
					'label' => 'Image',
				),
			),
		),
	) );

	vibrantlife_field_helpers()->fields->do_field_repeater( 'testimonials', array(
		'group'  => 'home',
		'label'  => 'Testimonials',
		'fields' => array(
			'content' => array(
				'type' => 'textarea',
				'args' => array(
					'rows'        => 4,
					'input_class' => 'widefat',
				),
			),
		),
	) );

	vibrantlife_field_helpers()->fields->save->initialize_fields( 'home' );
}