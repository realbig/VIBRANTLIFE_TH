<?php
/**
 * The default template for displaying page content
 *
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! has_post_thumbnail() ) : ?>
        <header>
            <h1 class="entry-title"><?php the_title(); ?></h1>

			<?php if ( $description = vibrantlife_field_helpers()->fields->get_field( 'description' ) ) : ?>
                <div class="entry-description">
					<?php echo esc_attr( $description ); ?>
                </div>
			<?php endif; ?>
        </header>
	<?php endif; ?>

    <div class="entry-content">
		<?php the_content(); ?>
		<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
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
		<?php $tag = get_the_tags();
		if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
    </footer>
</article>
