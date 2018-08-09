<?php
/**
 * Template Name: Landing Page A (sidebar form)
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
    <div class="main-container">
        <div class="main-grid">
            <main class="main-content-full-width">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'landing-a' ); ?>
				<?php endwhile; ?>
            </main>
        </div>
    </div>
<?php get_footer();
