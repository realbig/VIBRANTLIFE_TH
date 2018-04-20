<?php
// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.
if ( has_post_thumbnail( $post->ID ) ) : ?>
    <header class="featured-hero" role="banner"
            data-interchange="[<?php the_post_thumbnail_url( 'featured-small' ); ?>, small], [<?php the_post_thumbnail_url( 'featured-medium' ); ?>, medium], [<?php the_post_thumbnail_url( 'featured-large' ); ?>, large], [<?php the_post_thumbnail_url( 'featured-xlarge' ); ?>, xlarge]">

        <div class="entry-title-content">
            <h1 id="post-title-<?php the_ID(); ?>" class="entry-title">
				<?php the_title(); ?>
            </h1>

			<?php if ( $description = vibrantlife_field_helpers()->fields->get_field( 'description' ) ) : ?>
                <div class="entry-description">
					<?php echo esc_attr( $description ); ?>
                </div>
			<?php endif; ?>
        </div>
    </header>
<?php endif;
