<?php
/**
 * RBM Field Helpers
 */

defined( 'ABSPATH' ) || die();

/**
 * Gets the Napleon Bee Supply RBM Field Helpers instance.
 *
 * @since 1.0.0
 */
function vibrantlife_field_helpers() {

	if ( ! class_exists( 'RBM_FieldHelpers' ) ) {
	    require_once 'rbm-field-helpers/rbm-field-helpers.php';
	}

	static $field_helpers;

	if ( $field_helpers === null ) {

		$field_helpers = new RBM_FieldHelpers( array(
			'ID' => 'vibrantlife',
		) );
	}

	return $field_helpers;
}

vibrantlife_field_helpers();

/**
 * Gets a field description tip.
 *
 * @since 1.0.0
 *
 * @param string $description Description text.
 */
function vibrantlife_fieldhelpers_get_field_tip( $description ) {

	ob_start();
	?>
	<div class="fieldhelpers-field-description fieldhelpers-field-tip">
		<span class="fieldhelpers-field-tip-toggle dashicons dashicons-editor-help" data-toggle-tip></span>
		<p class="fieldhelpers-field-tip-text">
			<?php echo $description; ?>
		</p>
	</div>
	<?php

	return ob_get_clean();
}