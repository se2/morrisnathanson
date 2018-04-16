<?php
/**
 * Displays archive pages if a speicifc template is not set. 
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header(); ?>

	<div class="grid-container">
		<div class="grid-x medium-up-3 small-up-1">
			<div class="cell medium-4">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<!-- To see additional archive styles, visit the /parts directory -->
				<?php get_template_part( 'parts/loop', 'archive-in-the-news' ); ?>

			<?php endwhile; ?>	

				<?php joints_page_navi(); ?>

			<?php else : ?>

				<?php get_template_part( 'parts/content', 'missing' ); ?>

			<?php endif; ?>
				
			</div>
		</div>
	</div>
		
<?php get_footer(); ?>