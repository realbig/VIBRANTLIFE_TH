<?php
/**
 * The default template for Landing A.
 *
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="landing-a-left">
        <div class="entry-content">
			<?php the_content(); ?>
        </div>
    </section>

    <section class="landing-a-right">
		<?php if ( function_exists( 'ninja_forms_display_form' ) ) {
			$form_ID = vibrantlife_field_helpers()->fields->get_field( 'landing_form' );
			if ( $form_ID ) {
				ninja_forms_display_form( $form_ID );
			}
		}
		?>
    </section>
</article>