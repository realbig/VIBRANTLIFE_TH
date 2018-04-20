<?php
/**
 * Template Name: Resources
 */

get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
    <div class="main-container">
        <div class="main-grid">
            <main class="main-content">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'page' ); ?>

					<?php if ( $resource_list_items = vibrantlife_field_helpers()->fields->get_field( 'resource_list' ) ) : ?>
                        <ul class="resource-list">
							<?php foreach ( $resource_list_items as $resource_list_item ) : ?>
                                <li class="resource-item <?php echo $resource_list_item['image'] ? 'has-image' : ''; ?>">
                                    <div class="resource-item-image">
										<?php if ( $resource_list_item['image'] ) : ?>
											<?php echo wp_get_attachment_image( $resource_list_item['image'] ); ?>
										<?php endif; ?>
                                    </div>

                                    <div class="resource-item-content">
                                        <p class="resource-item-title">
											<?php echo $resource_list_item['title']; ?>
                                        </p>

										<?php echo $resource_list_item['description']; ?>

										<?php if ( $resource_list_item['link'] ) : ?>
                                            <a href="<?php echo $resource_list_item['link']; ?>">
												<?php echo $resource_list_item['link']; ?>
                                            </a>
										<?php endif; ?>
                                    </div>
                                </li>
							<?php endforeach; ?>
                        </ul>
					<?php endif; ?>
				<?php endwhile; ?>
            </main>
			<?php get_sidebar(); ?>
        </div>
    </div>
<?php
get_footer();
