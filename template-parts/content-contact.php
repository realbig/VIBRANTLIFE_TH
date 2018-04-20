<?php
/**
 * The default template for Contact.
 *
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="contact-upper">
        <div class="entry-content">
			<?php the_content(); ?>
        </div>
    </section>

    <section class="contact-lower">
		<?php if ( function_exists( 'ninja_forms_display_form' ) ) : ?>
            <div class="contact-container-left">
				<?php
				$form_ID = vibrantlife_field_helpers()->fields->get_field( 'ninjaformid' );

				if ( $form_ID ) {

					ninja_forms_display_form( $form_ID );
				}
				?>
            </div>
		<?php endif; ?>

        <div class="contact-container-right">
			<?php if ( $address = vibrantlife_field_helpers()->fields->get_field( 'address' ) ) : ?>
                <div class="contact-widget">
                    <h2>Location</h2>

					<?php echo do_shortcode( wpautop( $address ) ); ?>
                </div>
			<?php endif; ?>

			<?php if ( $phone = vibrantlife_field_helpers()->fields->get_field( 'phone' ) ) : ?>
                <div class="contact-widget">
                    <h2>Phone</h2>

                    <a href="tel:<?php echo esc_attr( $phone ); ?>">
						<?php echo esc_attr( $phone ); ?>
                    </a>
                </div>
			<?php endif; ?>

			<?php if ( $map_link = vibrantlife_field_helpers()->fields->get_field( 'map_link' ) ) : ?>
                <div class="contact-widget">
                    <h2>Map</h2>

                    <a href="<?php echo esc_url_raw( $map_link ); ?>" class="button secondary" target="_blank" rel="nofollow">
                        View on Google Maps&nbsp;&nbsp;<span class="fa fa-chevron-right"></span>
                    </a>
                </div>
			<?php endif; ?>
        </div>
    </section>
</article>