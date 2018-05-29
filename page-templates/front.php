<?php
/*
Template Name: Front
*/
get_header();

$hero_page_link = vibrantlife_field_helpers()->fields->get_meta_field( 'hero_page_link' );

if ( $hero_page_link ) {

	$hero_page_link_parts = explode( ':::', $hero_page_link );

	switch ( $hero_page_link_parts[0] ) {

		case 'product_cat':

			$hero_page_link = get_term_link( (int) $hero_page_link_parts[1], 'product_cat' );
			break;

		case 'page':

			$hero_page_link = get_permalink( $hero_page_link_parts[1] );
			break;
	}
}
?>

    <header class="front-hero" role="banner"
		<?php echo vibrantlife_get_featured_interchange( get_post_thumbnail_id( $post->ID ) ); ?>>
        <div class="marketing">
            <div class="tagline">
                <h1 class="header"><?php the_title(); ?></h1>
                <h4 class="subheader"><?php echo vibrantlife_field_helpers()->fields->get_meta_field( 'subhead' ); ?></h4>

				<?php if ( $hero_page_link ) : ?>
                    <a role="button" class="large button"
                       href="<?php echo esc_url_raw( $hero_page_link ); ?>">
						<?php echo vibrantlife_field_helpers()->fields->get_meta_field( 'hero_page_link_text' ); ?>
                    </a>
				<?php endif; ?>
            </div>
        </div>

        <span class="flourish flourish-a">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/flourish-a.png" alt="design-flourish" />
        </span>
        <span class="flourish flourish-b">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/flourish-b.png" alt="design-flourish" />
        </span>
    </header>

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <section class="intro" role="main">
        <div class="fp-intro">

            <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
                <div class="entry-content">
					<?php the_content(); ?>
                </div>
                <footer>
					<?php
					wp_link_pages(
						array(
							'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
							'after'  => '</p></nav>',
						)
					);
					?>
                    <p><?php the_tags(); ?></p>
                </footer>
				<?php do_action( 'foundationpress_page_before_comments' ); ?>
				<?php comments_template(); ?>
				<?php do_action( 'foundationpress_page_after_comments' ); ?>
            </div>

        </div>

    </section>
<?php endwhile; ?>
<?php do_action( 'foundationpress_after_content' ); ?>

<?php if ( $content_blocks = vibrantlife_field_helpers()->fields->get_field( 'content_blocks' ) ) : ?>
    <section class="content-blocks">
		<?php foreach ( $content_blocks as $content_block ) : ?>
            <div class="content-block <?php echo $content_block['image'] ? 'has-image' : ''; ?>">
				<?php if ( $content_block['image'] ) : ?>
                    <div class="content-block-image">
						<?php echo wp_get_attachment_image( $content_block['image'], 'full'); ?>
                    </div>
				<?php endif; ?>

                <div class="content-block-content">
                    <h3>
						<?php echo $content_block['title']; ?>
                    </h3>

					<?php echo do_shortcode( wpautop( $content_block['content'] ) ); ?>
                </div>
            </div>
		<?php endforeach; ?>
    </section>
<?php endif; ?>

<?php if ( $testimonials = vibrantlife_field_helpers()->fields->get_field( 'testimonials' ) ) : ?>
    <section class="testimonials" data-equalizer>
		<?php foreach ( $testimonials as $testimonial ) : ?>
            <div class="testimonial">
                <div class="testimonial-content" data-equalizer-watch>
                    <span class="testimonial-icon fa fa-quote-left"></span>
					<?php echo do_shortcode( wpautop( $testimonial['content'] ) ); ?>
                </div>
            </div>
		<?php endforeach; ?>
    </section>
<?php endif; ?>

<?php get_footer();
