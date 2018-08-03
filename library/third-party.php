<?php
/**
 * Third party scripts and tools.
 *
 * @since {{VERSION}}
 */

defined( 'ABSPATH' ) || die();

// Google Tag Manager
add_action( 'wp_head', 'vibrantlife_google_tag_manager_a_code', 99999999 );
add_action( 'vibrantlife_body_open', 'vibrantlife_google_tag_manager_b_code', 1 );
add_action( 'wp_head', 'vibrantlife_google_tag_manager_pixel_code' );

/**
 * Outputs the Google Tag Manager (A) code.
 *
 * @since {{VERSION}}
 * @access private
 */
function vibrantlife_google_tag_manager_a_code() {

	include_once 'inc/google-tag-manager-a.php';
}

/**
 * Outputs the Google Tag Manager (B) code.
 *
 * @since {{VERSION}}
 * @access private
 */
function vibrantlife_google_tag_manager_b_code() {

	include_once 'inc/google-tag-manager-b.php';
}

/**
 * Outputs the Google Tag Manager Pixel code.
 *
 * @since {{VERSION}}
 * @access private
 */
function vibrantlife_google_tag_manager_pixel_code() {

	include_once 'inc/google-tag-manager-pixel.php';
}