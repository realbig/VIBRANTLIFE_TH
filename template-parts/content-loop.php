<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
	    <?php get_template_part( 'template-parts/featured-image' ); ?>
		<?php foundationpress_entry_meta(); ?>
    </header>

    <div class="entry-content">
		<?php the_excerpt(); ?>
		<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
        <a href="<?php the_permalink(); ?>" class="button large" aria-labelledby="post-title-<?php the_ID(); ?>">
            Read More
        </a>
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
